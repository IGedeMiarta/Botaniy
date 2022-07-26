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
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Detail</th>
                        <th width="50px">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jenis as $t)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset($t->gambar) }}" alt="img-{{ $t->nama }}" style="max-width: 100px">
                            </td>
                            <td>{{ $t->nama }}</td>
                            <td>{{ $t->detail }}</td>
                            <td width="50px">
                                <div class="btn-group btn-group-toggle text-center" data-toggle="buttons">
                                    <a href="#" class="btn btn-warning editBtn" data-toggle="modal"
                                        data-target="#modalEdt" data-id="{{ $t->id }}"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger deleteBtn" data-id="{{ $t->id }}"><i
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Tanaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateTanaman">
                        <input type="hidden" name="id" id="id">

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="preview-zone">
                                    <div class="box box-solid">
                                        <div class="box-header with-border">
                                            <div><b>Gambar</b></div>
                                        </div>
                                        <div class="row" id="alert-info">
                                            <div class="col-sm-11"><i
                                                    class="fas fa-exclamation-triangle text-danger alert-icon d-none"></i>
                                                <span class="text-center text-danger" id="alert"></span>
                                            </div>
                                        </div>
                                        <div class="image-prev">
                                            <div class="box-body"></div>
                                        </div>
                                        <div class="edited-image d-flex justify-content-center">
                                            <img src="{{ asset('files/images/1658306487.jpg') }}" alt="edited_images"
                                                class="edit-img" style="max-width: 300px">
                                        </div>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-danger btn-sm remove-preview d-none">
                                                <i class="fas fa-times me-2 "></i> Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropzone-wrapper dropz" id="dropz">
                                    <div class="dropzone-desc">
                                        <i class="glyphicon glyphicon-download-alt"></i>
                                        <p>Klik / drag gambar disini</p>
                                    </div>
                                    <input type="file" name="gambar" class="dropzone gambar" id="gambar">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Jenis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control err_nama nama" name="nama" id="nama"
                                    placeholder="nama">
                                <span class="text-danger txt_nama"></span>
                                <input type="hidden" name="sts_gambar" id="sts_bambar">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Detail</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control khasiat err_detail detail" id="detail"
                                    name="detail" placeholder="detail">
                                <span class="text-danger txt_detail"></span>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnUpdate">Update</button>
                </div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Tanaman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="insertTanaman" method="post" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="preview-zone hidden">
                                    <div class="box box-solid">
                                        <div class="box-header with-border">
                                            <div><b>Upload Gambar</b></div>
                                        </div>
                                        <div class="row" id="alert-info">
                                            <div class="col-sm-11"><i
                                                    class="fas fa-exclamation-triangle text-danger alert-icon d-none"></i>
                                                <span class="text-center text-danger" id="alert"></span>
                                            </div>
                                        </div>
                                        <div class="image-prev">
                                            <div class="box-body"></div>
                                        </div>

                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-danger btn-sm remove-preview d-none">
                                                <i class="fas fa-times me-2 "></i> Hapus
                                            </button>
                                        </div>
                                    </div>
                                </div>


                                <div class="dropzone-wrapper dropz" id="dropz">
                                    <div class="dropzone-desc">
                                        <i class="glyphicon glyphicon-download-alt"></i>
                                        <p>Klik / drag gambar disini</p>
                                    </div>
                                    <input type="file" name="gambar" class="dropzone gambar" id="gambar">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Jenis</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control err_nama nama" name="nama"
                                    placeholder="nama">
                                <span class="text-danger txt_nama"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Detail</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control khasiat err_detail detail" id="detail"
                                    name="detail" placeholder="detail">
                                <span class="text-danger txt_detail"></span>

                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSimpan">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('script')
    <script>
        function readFile(input) {
            $('#dropz').removeClass('d-none');
            var excel = "{{ asset('assets/img/excelfile.png') }}"
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var fileExtension = ['jpg', 'png', 'svg', 'webp', 'jpeg', 'PNG', 'JPG'];
                var ext = filenameExtention(input.files);
                if ($.inArray(ext, fileExtension) == -1) {
                    $('#alert').text('Format harus : .jpg, .png, .svg, .webp');
                    $('.alert-icon').removeClass('d-none');
                } else {
                    $('#alert-info').addClass('d-none');
                    $('.buttons').removeClass('d-none');
                    reader.onload = function(e) {
                        var htmlPreview =
                            '<img width="200" src="' + e.target.result + '" />' +

                            '<p>' + input.files[0].name + '</p>';
                        var wrapperZone = $(input).parent();
                        var previewZone = $(input).parent().parent().find('.preview-zone');
                        var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

                        wrapperZone.removeClass('dragover');
                        previewZone.removeClass('hidden');
                        boxZone.empty();
                        boxZone.append(htmlPreview);
                    };
                    $('.dropz').addClass('d-none');
                    $('.remove-preview').removeClass('d-none');

                    reader.readAsDataURL(input.files[0]);
                }
            }
        }

        function reset(e) {
            e.wrap('<form>').closest('form').get(0).reset();
            e.unwrap();
            $('.dropz').removeClass('d-none');
            $('.buttons').addClass('d-none');


        }

        function filenameExtention(file) {
            var fileName = file[0].name
            var extention = fileName.replace(/^.*\./, '');
            // var extention = fileName;
            return extention;
        }

        $(".dropzone").change(function() {
            readFile(this);
        });
        $('.dropzone-wrapper').on('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('dragover');
        });
        $('.dropzone-wrapper').on('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('dragover');
        });
        $('.remove-preview').on('click', function() {
            var boxZone = $(this).parents('.preview-zone').find('.box-body');
            var previewZone = $(this).parents('.preview-zone');
            var dropzone = $(this).parents('.form-group').find('.dropzone');
            boxZone.empty();
            previewZone.addClass('hidden');
            reset(dropzone);
            $('.remove-preview').addClass('d-none');
            $('.edited-image').addClass('d-none');
            $('.edit-img').addClass('d-none');
            $('#sts_bambar').val(1);
        });
    </script>
    <script>
        $(document).on('click', '.editBtn', function(e) {
            e.preventDefault();
            $('.remove-preview').removeClass('d-none');
            $('#dropz').addClass('d-none');

            var id = $(this).data('id');
            $.ajax({
                url: "{{ url('jenis-tanaman') }}" + '/' + id,
                type: "GET",
                success: function(rs) {
                    console.log(rs);
                    $('#id').val(rs.data.id);
                    $('#nama').val(rs.data.nama);
                    $('#detail').val(rs.data.detail);
                    $('#sts_bambar').val(0);
                }
            })
        })
        $('#btnUpdate').on('click', function(e) {
            e.preventDefault();
            clearInp();
            var id = $('#id').val()
            var files = $('#gambar')[0].files;
            var nama = $('#nama').val();
            var detail = $('#detail').val();
            var status = $('#sts_bambar').val();
            var form = new FormData();
            // form.append('file', files[0]);
            // form.append('nama', nama);
            form.append('nama', 'test');
            // form.append('detail', detail);
            form.append('detail', 'detail');
            // form.append('status', status);
            form.append('status', 1);

            console.log(form);
            $.ajax({
                url: "{{ url('jenis-tanaman') }}/" + id,
                type: 'PUT',
                data: form,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(rs) {
                    console.log(rs);
                    //     if (rs.status == 401) {
                    //         $.each(rs.errors, function(key, val) {
                    //             $('.err_' + key).addClass('is-invalid');
                    //             $('.txt_' + key).html(val);
                    //         })
                    //     }
                    //     if (rs.status == 201) {
                    //         Toast.fire({
                    //             icon: 'success',
                    //             title: rs.msg
                    //         })
                    //         $('#modalAdd').modal('hide');

                    //         setTimeout(function() {
                    //             location.reload();
                    //         }, 3300)
                    //     }
                    //     if (rs.status == 500) {
                    //         Toast.fire({
                    //             icon: 'error',
                    //             title: rs.msg
                    //         })
                    //     }
                }


            })
        })

        $('#btnSimpan').on('click', function(e) {
            e.preventDefault();
            clearInp();
            var files = $('.gambar')[0].files;
            var nama = $('.nama').val();
            var detail = $('.detail').val();
            var fd = new FormData();
            fd.append('file', files[0]);
            fd.append('nama', nama);
            fd.append('detail', detail);
            console.log(fd);
            $.ajax({
                url: "{{ url('jenis-tanaman') }}",
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(rs) {
                    console.log(rs);
                    if (rs.status == 401) {
                        $.each(rs.errors, function(key, val) {
                            $('.err_' + key).addClass('is-invalid');
                            $('.txt_' + key).html(val);
                        })
                    }
                    if (rs.status == 201) {
                        Toast.fire({
                            icon: 'success',
                            title: rs.msg
                        })
                        $('#modalAdd').modal('hide');

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
                        url: "{{ url('tanaman') }}" + '/' + id,
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
            $('.err_khasiat').removeClass('is-invalid');
            $('.err_harga').removeClass('is-invalid');

            $('.txt_nama').html('');
            $('.txt_khasiat').html('');
            $('.txt_harga').html('');
        }
    </script>
@endpush
