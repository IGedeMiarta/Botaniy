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
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalAdd">
                                <i class="fa fa-plus mr-1"></i> Tambah
                            </button>
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
                        <th width="50px">Opsi</th>
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
                            <td width="50px">
                                <div class="btn-group btn-group-toggle text-center" data-toggle="buttons">
                                    <a href="#" class="btn btn-warning editBtn" data-toggle="modal"
                                        data-target="#modalEdt" data-id="{{ $t->id }}"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-danger deleteBtn" data-id="{{ $t->id }}"><i
                                            class="fas fa-trash"></i></a>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('modal')
    <div class="modal fade" id="modalEdt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="update" action="" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">User</label>
                            <div class="col-sm-10">
                                <select name="user_id" id="user_id" class="custom-select">
                                    <option selected disabled>--pilih</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control err_nama" id="nama" name="nama"
                                    placeholder="nama">
                                <span class="text-danger txt_nama"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control err_tmp_lahir"
                                    placeholder="Tempat Lahir">
                                <span class="text-danger txt_tmp_lahir"></span>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tgl Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control err_tgl_lahir" id="tgl_lahir" name="tgl_lahir"
                                    placeholder="dd/mm/yyyy">
                                <span class="text-danger txt_tgl_lahir"></span>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">No Hp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control err_no_hp" id="no_hp" name="no_hp"
                                    placeholder="No Hp">
                                <span class="text-danger txt_no_hp"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select name="status" id="status" class="custom-select">
                                    <option value="1">Aktif</option>
                                    <option value="0">Non Aktif</option>
                                </select>
                                <span class="text-danger txt_no_hp"></span>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnUpdate">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endpush


@push('modal')
    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="insertTanaman" method="POST" action="{{ url('pegawai') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">User</label>
                            <div class="col-sm-10">
                                <select name="user_id" id="" class="custom-select">
                                    <option selected disabled>--pilih</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control err_nama" name="nama" placeholder="nama">
                                <span class="text-danger txt_nama"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control err_tmp_lahir"
                                    placeholder="Tempat Lahir">
                                <span class="text-danger txt_tmp_lahir"></span>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tgl Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control err_tgl_lahir" id="tgl_lahir" name="tgl_lahir"
                                    placeholder="dd/mm/yyyy">
                                <span class="text-danger txt_tgl_lahir"></span>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">No Hp</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control err_no_hp" id="no_hp" name="no_hp"
                                    placeholder="No Hp">
                                <span class="text-danger txt_no_hp"></span>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="btnSimpan">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endpush


@push('script')
    <script>
        $(document).on('click', '.editBtn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var url = "{{ url('pegawai') }}" + '/' + id;
            $.ajax({
                url: url,
                type: "GET",
                success: function(rs) {
                    console.log(rs);
                    $('#id').val(rs.data.id);
                    $('#user_id').val(rs.data.user_id);
                    $('#nama').val(rs.data.nama);
                    $('#tmp_lahir').val(rs.data.tmp_lahir);
                    $('#tgl_lahir').val(rs.data.tgl_lahir);
                    $('#no_hp').val(rs.data.no_hp);
                    $('#status').val(rs.data.status);
                    $('#update').attr('action', url)
                }
            })
        })

        $(document).on('click', '.deleteBtn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                title: 'Yakin menghapus?',
                text: "Data yang terhapus mungkin tidak dapat dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('pegawai') }}" + '/' + id,
                        type: 'DELETE',
                        success: function(rs) {
                            console.log(rs);
                            if (rs.status == 401) {
                                Toast.fire({
                                    icon: 'error',
                                    title: rs.msg
                                })
                            }
                            if (rs.status == 201) {
                                Toast.fire({
                                    icon: 'success',
                                    title: rs.msg
                                })
                                $('#modalEdt').modal('hide');

                                setTimeout(function() {
                                    location.reload();
                                }, 3300)
                            }
                            if (rs.status == 500) {
                                Toast.fire({
                                    icon: 'error',
                                    title: rs.msg
                                })
                            }
                        }

                    })
                }
            })
        })


        function clearInp() {
            $('.err_nama').removeClass('is-invalid');
            $('.err_tmp_lahir').removeClass('is-invalid');
            $('.err_tgl_lahir').removeClass('is-invalid');
            $('.err_no_hp').removeClass('is-invalid');

            $('.txt_nama').html('');
            $('.txt_tmp_lahir').html('');
            $('.txt_tgl_lahir').html('');
            $('.txt_no_hp').html('');
        }
    </script>
@endpush
