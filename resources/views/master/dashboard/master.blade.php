<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{ $title }} | Botany</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="{{ asset('land') }}/images/favicon.ico" />

    <!-- DataTables -->
    <link href="{{ asset('') }}assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('') }}assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('') }}assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('') }}assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/css/style.css" rel="stylesheet" type="text/css">
    @stack('style')

    {{-- sweet alert --}}
    <link rel="stylesheet" href="{{ asset('') }} sweetalert2.min.css">
</head>

@php
function rupiah($angka)
{
    $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
@endphp

<body class="fixed-left">
    @if (session()->has('success'))
        <div class="success-info" data-msg="{{ session('success') }}"></div>
    @endif
    @if (session()->has('error'))
        <div class="error-info" data-msg="{{ session('error') }}"></div>
    @endif
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="wrapper">

        @include('master.dashboard.sidebar')

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                @include('master.dashboard.navbar')

                <div class="page-content-wrapper ">

                    <div class="container-fluid">

                        @yield('content')

                    </div><!-- container fluid -->

                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->
            @stack('modal')

            @include('master.dashboard.footer')

        </div>
        <!-- End Right content here -->

    </div>
    <!-- END wrapper -->


    <!-- jQuery  -->
    <script src="{{ asset('') }}assets/js/jquery.min.js"></script>
    <script src="{{ asset('') }}assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}assets/js/modernizr.min.js"></script>
    <script src="{{ asset('') }}assets/js/detect.js"></script>
    <script src="{{ asset('') }}assets/js/fastclick.js"></script>
    <script src="{{ asset('') }}assets/js/jquery.slimscroll.js"></script>
    <script src="{{ asset('') }}assets/js/jquery.blockUI.js"></script>
    <script src="{{ asset('') }}assets/js/waves.js"></script>
    <script src="{{ asset('') }}assets/js/jquery.nicescroll.js"></script>
    <script src="{{ asset('') }}assets/js/jquery.scrollTo.min.js"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('') }}assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('') }}assets/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ asset('') }}assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('') }}assets/pages/datatables.init.js"></script>

    <script src="{{ asset('') }}sweetalert/sweetalert2.all.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        var success = $('.success-info').data('msg');
        var error = $('.error-info').data('msg');
        if (error) {
            Toast.fire({
                icon: 'error',
                title: error
            })
        }
        if (success) {
            Toast.fire({
                icon: 'success',
                title: success
            })
        }
    </script>
    @stack('script')

    <!-- App js -->
    <script src="{{ asset('') }}assets/js/app.js"></script>

</body>

</html>
