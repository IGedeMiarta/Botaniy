<?php

namespace App\Http\Controllers;

use App\Models\Tanaman;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function tanaman(){
        $data['title'] = 'Laporan Tanaman';
        $data['tanaman'] = Tanaman::all();
        return view('laporan.tanaman',$data);
    }
}
