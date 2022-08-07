@extends('master.dashboard.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4 class="page-title m-0">Dashboard</h4>
                    </div>
                    {{-- <div class="col-md-4">
                        <div class="float-right d-none d-md-block">
                            <button class="btn btn-primary" type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa fa-plus mr-1"></i> Tambah
                            </button>
                        </div>
                    </div> --}}
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title-box -->
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Jenis Tanaman</h6>
                        <h4 class="mb-3 mt-0 float-right">{{ $jenis }}</h4>
                    </div>
                    <div>
                        {{-- <span class="badge badge-light text-info"> +11% </span> <span class="ml-2">From previous
                            period</span> --}}
                    </div>

                </div>
                {{-- <div class="p-3">
                    <div class="float-right">
                        <a href="#" class="text-white-50"><i class="mdi mdi-cube-outline h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Last : 1447</p>
                </div> --}}
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-info mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Tanaman</h6>
                        <h4 class="mb-3 mt-0 float-right">{{ $tanaman }}</h4>
                    </div>
                    <div>
                        {{-- <span class="badge badge-light text-danger"> -29% </span> <span class="ml-2">From previous
                            period</span> --}}
                    </div>
                </div>
                {{-- <div class="p-3">
                    <div class="float-right">
                        <a href="#" class="text-white-50"><i class="mdi mdi-buffer h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Last : $47,596</p>
                </div> --}}
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-pink mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">User</h6>
                        <h4 class="mb-3 mt-0 float-right">{{ $user }}</h4>
                    </div>
                    <div>
                        {{-- <span class="badge badge-light text-primary"> 0% </span> <span class="ml-2">From previous
                            period</span> --}}
                    </div>
                </div>
                {{-- <div class="p-3">
                    <div class="float-right">
                        <a href="#" class="text-white-50"><i class="mdi mdi-tag-text-outline h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Last : 15.8</p>
                </div> --}}
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-success mini-stat text-white">
                <div class="p-3 mini-stat-desc">
                    <div class="clearfix">
                        <h6 class="text-uppercase mt-0 float-left text-white-50">Pegawai</h6>
                        <h4 class="mb-3 mt-0 float-right">{{ $pegawai }}</h4>
                    </div>
                    <div>
                        {{-- <span class="badge badge-light text-info"> +89% </span> <span class="ml-2">From previous
                            period</span> --}}
                    </div>
                </div>
                {{-- <div class="p-3">
                    <div class="float-right">
                        <a href="#" class="text-white-50"><i class="mdi mdi-briefcase-check h5"></i></a>
                    </div>
                    <p class="font-14 m-0">Last : 1776</p>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- end row -->


    {{-- <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Latest Messages</h4>
                    <div class="latest-massage">
                        <a href="#" class="latest-message-list">
                            <div class="border-bottom position-relative">
                                <div class="float-left user mr-3">
                                    <h5 class="bg-primary text-center rounded-circle text-white mt-0">
                                        v</h5>
                                </div>
                                <div class="message-time">
                                    <p class="m-0 text-muted">Just Now</p>
                                </div>
                                <div class="massage-desc">
                                    <h5 class="font-14 mt-0 text-dark">Victor Zamora</h5>
                                    <p class="text-muted">Hey! there I'm available...</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="latest-message-list">
                            <div class="border-bottom mt-3 position-relative">
                                <div class="float-left user mr-3">
                                    <h5 class="bg-success text-center rounded-circle text-white mt-0">
                                        p</h5>
                                </div>
                                <div class="message-time">
                                    <p class="m-0 text-muted">2 Min. ago</p>
                                </div>
                                <div class="massage-desc">
                                    <h5 class="font-14 mt-0 text-dark">Patrick Beeler</h5>
                                    <p class="text-muted">I've finished it! See you so...</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="latest-message-list">
                            <div class="border-bottom mt-3 position-relative">
                                <div class="float-left user mr-3">
                                    <img src="{{ asset('') }}assets/images/users/avatar-3.jpg" alt=""
                                        class="rounded-circle mb-3">
                                </div>
                                <div class="message-time">
                                    <p class="m-0 text-muted">6 Min. ago</p>
                                </div>
                                <div class="massage-desc">
                                    <h5 class="font-14 mt-0 text-dark">Ralph Ramirez</h5>
                                    <p class="text-muted">This theme is awesome!</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="latest-message-list">
                            <div class="border-bottom mt-3 position-relative">
                                <div class="float-left user mr-3">
                                    <h5 class="bg-pink text-center rounded-circle text-white mt-0">
                                        b</h5>
                                </div>
                                <div class="message-time">
                                    <p class="m-0 text-muted">01:34 pm</p>
                                </div>
                                <div class="massage-desc">
                                    <h5 class="font-14 mt-0 text-dark">Bryan Lacy</h5>
                                    <p class="text-muted">I've finished it! See you so...</p>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="latest-message-list">
                            <div class="mt-3 position-relative">
                                <div class="float-left user mr-3">
                                    <img src="{{ asset('') }}assets/images/users/avatar-4.jpg" alt=""
                                        class="rounded-circle mb-3">
                                </div>
                                <div class="message-time">
                                    <p class="m-0 text-muted">02:05 pm</p>
                                </div>
                                <div class="massage-desc">
                                    <h5 class="font-14 mt-0 text-dark">James Sorrells</h5>
                                    <p class="text-muted">Hey! there I'm available...</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

        </div>
        <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Recent Activity</h4>
                    <ol class="activity-feed mb-0">
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <span class="date text-white-50">Jan 10</span>
                                <span class="activity-text text-white">Responded to need “Volunteer
                                    Activities”</span>
                            </div>
                        </li>
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <span class="date text-white-50">Jan 09</span>
                                <span class="activity-text text-white">Added an interest “Volunteer
                                    Activities”</span>
                            </div>
                        </li>
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <span class="date text-white-50">Jan 08</span>
                                <span class="activity-text text-white">Joined the group
                                    “Boardsmanship Forum”</span>
                            </div>
                        </li>
                        <li class="feed-item">
                            <div class="feed-item-list">
                                <span class="date text-white-50">Jan 07</span>
                                <span class="activity-text text-white">Responded to need “In-Kind
                                    Opportunity”</span>
                            </div>
                        </li>
                    </ol>

                </div>
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Social Source</h4>
                    <div class="text-center">
                        <div class="social-source-icon lg-icon mb-3">
                            <i class="mdi mdi-facebook h2 bg-primary text-white"></i>
                        </div>
                        <h5 class="font-16"><a href="#" class="text-dark">Facebook - <span class="text-muted">125
                                    sales</span> </a></h5>
                        <p class="text-muted">Maecenas nec odio et ante tincidunt tempus. Donec
                            vitae sapien ut libero venenatis tincidunt.</p>
                        <a href="#" class="text-primary font-14">Learn more <i
                                class="mdi mdi-chevron-right"></i></a>
                    </div>
                    <div class="row mt-5">
                        <div class="col-md-4">
                            <div class="social-source text-center mt-3">
                                <div class="social-source-icon mb-2">
                                    <i class="mdi mdi-facebook h5 bg-primary text-white"></i>
                                </div>
                                <p class="font-14 text-muted mb-2">125 sales</p>
                                <h6>Facebook</h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="social-source text-center mt-3">
                                <div class="social-source-icon mb-2">
                                    <i class="mdi mdi-twitter h5 bg-info text-white"></i>
                                </div>
                                <p class="font-14 text-muted mb-2">112 sales</p>
                                <h6>Twitter</h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="social-source text-center mt-3">
                                <div class="social-source-icon mb-2">
                                    <i class="mdi mdi-instagram h5 bg-pink text-white"></i>
                                </div>
                                <p class="font-14 text-muted mb-2">104 sales</p>
                                <h6>Instagram</h6>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end col -->
    </div> --}}
    <!-- end row -->
@endsection

@push('script')
    <script>
        console.log('test');
    </script>
@endpush
