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
                            <a href="{{ url('pegawai-cetak') }}" target="_blank" class="btn btn-danger">
                                <i class="fas fa-file-pdf mr-2"></i> PDF
                            </a>
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
                        <th>Nama</th>
                        <th>Tmp, Tgl Lahir</th>
                        <th>No Hp</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pegawai as $t)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $t->nama }}</td>
                            <td>{{ $t->tmp_lahir . ', ' . $t->tgl_lahir }}</td>
                            <td>{{ $t->no_hp }}</td>
                            <td>
                                @if ($t->status == 1)
                                    <span class="badge badge-success">Aktif</span>
                                @else
                                    <span class="badge badge-danger">Non Aktif</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
