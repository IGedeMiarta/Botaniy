<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Botaniy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Premium Bootstrap 5 Template" />
    <meta name="keywords" content="bootstrap 5, premium, marketing, multipurpose" />
    <meta content="Themesdesign" name="author" />

    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('land') }}/images/favicon.ico" />

    <!-- tinyslider -->
    <link rel="stylesheet" href="{{ asset('land') }}/css/tiny-slider.css" />

    <!-- css -->
    <link href="{{ asset('land') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('land') }}/css/style.min.css" rel="stylesheet" type="text/css" />


    {{-- sweet alert --}}
    <link rel="stylesheet" href="{{ asset('') }} sweetalert2.min.css">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="67">
   
    <!-- end navbar -->
    @if (session()->has('success'))
        <div class="success-info" data-msg="{{ session('success') }}"></div>
    @endif
    @if (session()->has('error'))
        <div class="error-info" data-msg="{{ session('error') }}"></div>
    @endif
    
    @yield('content')

    <!-- start footer -->
    @include('master.landing.footer')
    <!-- end footer -->

    


    <!-- Modal -->
    @include('login')
    @include('register')
    <!-- end modal -->

    <script src="{{ asset('land') }}/js/bootstrap.bundle.min.js"></script>

    <!-- feather icon -->
    <script src="{{ asset('land') }}/js/feather.js"></script>

    <!-- client-slider -->
    <script src="{{ asset('land') }}/js/tiny-slider.js"></script>
    <script src="{{ asset('land') }}/js/tiny.init.js"></script>

    <!-- moving letter -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <script src="{{ asset('land') }}/js/text-animation.init.js"></script>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('') }}sweetalert/sweetalert2.all.js"></script>
    <script>
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
    <script src="{{ asset('land') }}/js/app.js"></script>
</body>

</html>
