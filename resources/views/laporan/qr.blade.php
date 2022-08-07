@extends('laporan.master')
@section('content')
    <table id="datatable" class="table table-bordered dt-responsive nowrap"
        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
        <thead>
            <tr>
                <th>QR-Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tanaman as $t)
                <tr>
                    <td class="text-center border">
                        {!! DNS2D::getBarcodeSVG(url('/') . '/find/' . $t->slug, 'QRCODE', 10, 10) !!}
                        <br>
                        <br>
                        {{-- {{ $t->nama }} --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
