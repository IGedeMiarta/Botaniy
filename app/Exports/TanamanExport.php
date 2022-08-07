<?php

namespace App\Exports;

use App\Models\Tanaman;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TanamanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
     public function view(): View
    {
        return view('laporan.excel.tanaman', [
            'tanaman' => Tanaman::with('jenis')->get()
        ]);
    }
}
