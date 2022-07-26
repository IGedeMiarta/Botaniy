<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $validate = $request->validate([
            'email' => 'required|email',
            'password'=>'required|confirmed|min:6',
        ]);
        try {
            User::create([
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
                'status' => 1,
            ]);
            
            return redirect()->intended('/')->with('success','User Created');

        } catch (QueryException $e) {
            return redirect()->back()->with('error','register failed');
        }


    }
    public function login(Request $request){
        if (empty($request->email)||empty($request->password)) {
            return redirect()->back()->with('error','Email & password cannot be empty');
        }
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            return redirect()->back()->with('error','User Tidak Ditemukan!');
        }
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error','Password Salah');
        }
        if (Auth::attempt($request->only('email','password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/home')->with('success','Login Success');
        }
        return redirect()->back()->with('error',"Login Gagal !");
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
