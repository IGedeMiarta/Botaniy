@extends('master.landing.index')
@section('content')
    <section class="hero-1 bg-white position-relative d-flex align-items-center justify-content-center overflow-hidden"
        style="background-image: url({{ asset('land') }}/images/hero-1-bg.png);" id="home">


        <div class="container">
            <div class="row align-items-center text-center text-lg-start">
                <div class="col-lg-6 mt-lg-4 pt-2">
                    <img class="hero-img" src="{{ asset($tanaman->gambar) }}" alt="Tanaman">
                </div>
                <div class="col-lg-6 mt-4 pt-2">
                    <h1 class="ml11 mb-2">
                        <span class="text-wrapper">
                            <span class="line line1"></span>
                            <span class=" pb-0">{{ $tanaman->nama }}</span>
                        </span>
                    </h1>
                    <h5 class="my-4">Rp. {{ number_format($tanaman->harga, 2, ',', '.') }}</h5>

                    <p class="text-muted mb-2">Tanaman yang berjenis {{ $tanaman->jenis->nama }},
                        {{ $tanaman->jenis->detail }}
                        <br>
                        Memiliki
                        khasiat sebagai
                        {{ $tanaman->khasiat }}
                    </p>
                </div>


            </div>
        </div>
        <!-- end container -->
    </section>
@endsection
