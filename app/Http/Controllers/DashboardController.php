<?php

namespace App\Http\Controllers;

use App\Models\JenisTanaman;
use App\Models\Pegawai;
use App\Models\Tanaman;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['title'] = 'Dashboard';
        $data['tanaman'] = Tanaman::get()->count();
        $data['jenis'] = JenisTanaman::get()->count();
        $data['user'] = User::get()->count();
        $data['pegawai'] = Pegawai::get()->count();
        // dd($data);
        return view('dashboard.index',$data);
    }
}
