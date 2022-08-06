<?php

namespace App\Http\Controllers;

use App\Models\JenisTanaman;
use App\Models\Tanaman;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $data['jenis'] = JenisTanaman::orderByDesc('id')->take(6)->get();
        $data['tanaman'] = Tanaman::with('jenis')->orderByDesc('id')->take(6)->get();
        return view('master.landing.master',$data);
    }
    public function getTanaman($slug)
    {
        $data['tanaman'] = Tanaman::with('jenis')->where('slug',$slug)->first();
        if($data['tanaman']){
            return view('find',$data);
        }else{
            return redirect()->intended('/')->with('error','404!, Tanaman not found!');
        }
    }
}
