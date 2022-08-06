@extends('master.landing.index')
@section('content')
    <!-- start navbar -->
    @include('master.landing.navbar')
    <!-- start hero -->
    @include('master.landing.hero')
    <!-- end hero -->

    <!-- start solution -->
    @include('master.landing.jenis')
    <!-- end solution -->
    @include('master.landing.catalog')
@endsection
