@extends('laporan.master')
@push('head')
    <title>Cetak Laporan - SMK Muhammadiyah Mlati, Sleman</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <table class="table table-borderless table-condensed table-hover" width="100%">
        <tr>
            <td width="13%" align="center"><img src="{{ asset('favicon.ico') }}"></td>
            <td width="74%" align="center">
                <p class="kecil">
                    <font size="5" face="times new roman"><b>Taman Botaniy<br><br></b></font>
                    <font size="4" face="times new roman">
                        NPSN. 20401319<br><br>
                        Jl. Raya Kangetan, Singapadu Kaler, Kec. Sukawati, Kabupaten Gianyar, Bali 80571
                    </font>
                </p>
            </td>
            <td width="13%" align="center">
                {{-- <img src="{{ asset('') }}images/Logo.png"> --}}
            </td>
        </tr>
    </table>
@endpush
@section('content')
    <table id="datatable" class="table table-bordered dt-responsive nowrap"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th width="10px">No</th>
                <th>QR-Code</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Khasiat</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tanaman as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{!! DNS2D::getBarcodeSVG(url('/') . '/find/' . $t->slug, 'QRCODE', 4, 4) !!}
                    <td><img src="{{ asset($t->gambar) }}" alt="img-{{ $t->nama }}" style="max-width: 100px">
                    </td>
                    <td>{{ $t->nama }}</td>
                    <td>{{ $t->jenis->nama }}</td>
                    <td>{{ $t->khasiat }}</td>
                    <td>{{ 'Rp ' . number_format($t->harga, 2, ',', '.') }}</td>


                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@push('ttd')
    <p align="right">
        <font size="4" face="times new roman">
            Gianyar, <?php echo date('d M Y '); ?>
            <br><br>
            <br><br>
            (..........................................)
        </font>

    </p>
@endpush
