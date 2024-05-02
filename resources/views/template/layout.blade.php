<link href="{{ asset('sweetalert') }}/dist/sweetalert2.min.css" rel="stylesheet">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>caffe coffe</title>
    <link rel="stylesheet" href="{{ asset('adminlte3')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <script src="{{ asset('template') }}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template') }}/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="{{ asset ( 'template') }}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset ( 'template') }}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset ( 'template') }}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset ( 'template') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset ( 'template') }}/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset ( 'template') }}/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset ( 'template') }}/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset ( 'template') }}/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>caffe coffe</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="coffe.jpg" alt="{{ asset ( 'template') }}." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>Resha</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Admin <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                    <li><a href="grafik">Dashboard</a></li>
                                        <li><a href="jenis">jenis</a></li>
                                        <li><a href="menu">menu</a></li>
                                        <li><a href="stok">stok</a></li>
                                        <!-- <li><a href="produk">produk</a></li> -->
                                        <!-- <li><a href="about">Tentang</a></li> -->
                                        <li><a href="meja">meja</a></li>
                                        <li><a href="Kategori">Kategori</a></li>
                                        <!-- <li><a href="AbsensiKerja">AbsensiKerja</a></li> -->
                                        <!-- <li><a href="contact us">Contact us</a></li> -->
                                        <li><a href="logout">logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->


                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
            <!-- /top navigation -->
            @yield('content')
            <!-- page content -->

            <!-- /top tiles -->

        </div>
    </div>
    <!-- /page content -->

    <!-- footer content -->
    @include('template.footer')