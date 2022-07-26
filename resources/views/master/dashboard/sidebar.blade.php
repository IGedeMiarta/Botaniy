<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="mdi mdi-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">

            <a href="index.html" class="logo"><img src="{{ asset('') }}assets/images/logo_dark.png" height="20"
                    alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>

                <li>
                    <a href="index.html" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="menu-title">Feature</li>


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-document"></i><span>
                            Master Data </span> <span class="menu-arrow float-right"><i
                                class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('') }}">User</a></li>
                        <li><a href="{{ url('tanaman') }}">Tanaman</a></li>
                        <li><a href="{{ url('jenis-tanaman') }}">Jenis Tanaman</a></li>
                        <li><a href="{{ url('pegawai') }}">Pegawai</a></li>
                    </ul>
                </li>




                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-view-thumb"></i><span>
                            Transaksi </span> <span class="menu-arrow float-right"><i
                                class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="tables-basic.html">Basic Tables</a></li>
                        <li><a href="tables-datatable.html">Data Table</a></li>
                    </ul>
                </li>

                <li class="menu-title">Repost</li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-archive"></i></i><span>
                            Laporan </span> <span class="menu-arrow float-right"><i
                                class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="tables-basic.html">Basic Tables</a></li>
                        <li><a href="tables-datatable.html">Data Table</a></li>
                    </ul>
                </li>



            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
