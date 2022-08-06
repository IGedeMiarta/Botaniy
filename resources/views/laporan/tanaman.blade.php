@extends('master.dashboard.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">{{ $title }}</h4>
                    </div>
                    <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                            <div class="btn-group btn-group-toggle text-center" data-toggle="buttons">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-qrcode mr-2"></i> QR-Code
                                </button>
                                <button class="btn btn-danger" type="button">
                                    <i class="fas fa-file-pdf mr-2"></i> PDF
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title-box -->
        </div>
    </div>
    <!-- end page title -->
    <div class="card">
        <div class="card-body">
            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                    <tr>
                        <th width="10px">No</th>
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
        </div>
    </div>
@endsection
