<?php

namespace App\Http\Controllers;

use App\Exports\TanamanExport;
use App\Models\Pegawai;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Facades\Excel;



class LaporanController extends Controller
{
    public function tanaman(){
        $data['title'] = 'Laporan Tanaman';
        $data['tanaman'] = Tanaman::all();
        return view('laporan.tanaman',$data);
    }
    public function cetak_pdf()
    {
        $data['title'] = 'Laporan Tanaman';
        $data['tanaman'] = Tanaman::all();
        return view('laporan.tanamancetak',$data);
    }
    public function cetak_qr(){
        $data['title'] = 'Laporan Tanaman';
        $data['tanaman'] = Tanaman::all();
        return view('laporan.qr',$data);
    }

    public function tanamanCetak(){
        $data['title'] = 'Laporan Tanaman';
        $data['tanaman'] = Tanaman::all();
        return view('laporan.tanamancetak',$data);
    }
    public function pegawai(){
        $data['title'] = 'Laporan Pegawai';
        $data['pegawai'] = Pegawai::all();
        return view('laporan.pegawai',$data);
    }
    public function cetak_pegawai(){
        $data['title'] = 'Laporan Pegawai';
        $data['pegawai'] = Pegawai::all();
        return view('laporan.pegawaicetak',$data);
    }
}
