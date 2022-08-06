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
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modalEdt">
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

        </div>
    </div>
@endsection
@push('modal')
    <div class="modal fade" id="modalEdt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-light" id="exampleModalLabel">Pembelian</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ url('pembelian') }}" method="post" id="pembelian">
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="row border">
                                    <div class="col-md-8 border">
                                        <div class="form-group row mt-4">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">Pembeli</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="pembeli" id=""
                                                    class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 border">
                                        <span class="text-end float-right mt-3">
                                            total
                                            <h4 class="total">Rp. 100,000</h4>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group arrayInput row mt-4 border" id="newRow">
                                    {{-- <div class=""> --}}
                                    <div class="col-md-4 Tanaman-1">
                                        <label for="tanaman" class="mt-2">Tanaman</label>
                                        <select name="tanaman[]" id=""
                                            class="custom-select tanaman[] custom-select-sm">
                                            <option selected disabled>--pilih</option>
                                            @foreach ($tanaman as $t)
                                                <option value="{{ $t->id }}">{{ $t->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2 Qty-1">
                                        <label for="tanaman" class="mt-2">QTY</label>
                                        <input type="text" name="qty[]" id=""
                                            class="form-control form-control-sm mb-3 qty[]">
                                    </div>
                                    <div class="col-md-4 Harga-1">
                                        <label for="tanaman" class="mt-2">Harga</label>
                                        <input type="text" name="harga[]" id=""
                                            class="form-control form-control-sm mb-3 harga[]">
                                    </div>
                                    <div class="col-md-2 Opsi-1">
                                        <label for="tanaman" class="mt-2">Opsi</label><br>
                                        <button class="btn btn-success btn-sm plusBtn"><i class="fas fa-plus"></i></button>
                                        <button class="btn btn-danger btn-sm delete" data-id="1"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                    <hr>

                                    {{-- </div> --}}
                                </div>

                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btnUpdate">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush
@push('script')
    <script>
        $(document).ready(function() {
            let id = 1;
            $(document).on('click', '.plusBtn', function(e) {
                e.preventDefault();
                id++
                $.ajax({
                    url: "{{ url('get-all-tanman') }}",
                    type: "GET",
                    success: function(rs) {
                        console.log(rs);
                        var content =
                            `<div class="col-md-4 Tanaman-${id}">
                                <label for="tanaman" class="mt-2">Tanaman</label>
                                <select name="tanaman[]" id=""
                                    class="custom-select tanaman[] custom-select-sm">
                                    <option selected disabled>--pilih</option>`
                        $.each(rs.data, function(key, value) {
                            console.log(value);
                            content +=
                                `<option value="${value.id}">${value.nama}</option>`
                        })
                        content +=
                            `</select>
                            </div>
                            <div class="col-md-2 Qty-${id}">
                                <label for="tanaman" class="mt-2">QTY</label>
                                <input type="text" name="qty[]" id=""
                                    class="form-control form-control-sm mb-3 qty[]">
                            </div>
                            <div class="col-md-4 Harga-${id}">
                                <label for="tanaman" class="mt-2">Harga</label>
                                <input type="text" name="harga[]" id=""
                                    class="form-control form-control-sm mb-3 harga[]">
                            </div>
                            <div class="col-md-2 Opsi-${id}">
                                <label for="tanaman" class="mt-2">Opsi</label><br>
                                <button class="btn btn-success btn-sm plusBtn"><i class="fas fa-plus"></i></button>
                                <button class="btn btn-danger btn-sm delete" data-id="${id}"><i class="fas fa-trash"></i></button>
                            </div>
                            <hr>`;
                        $('#newRow').append(content);
                    }
                })


            })
        });
    </script>
@endpush
