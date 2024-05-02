@extends('template/layout')

@push('stytle')
@endpush

@section('content')

<!-- page content -->

<div class="right_col" role="main">
    <div class="">
        <div class="row" style="display: inline-block;">
            <div class="top_tiles">
                <div class="animated flipInY col-lg-4 col-md-3 col-sm-6 ">
                    <div class="tile-stats">
                        <div class="count">{{$count_menu}}</div>
                        <h3>Menu</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-5 col-md-6 col-sm-6 ">
                    <div class="tile-stats">
                        <div class="count">{{$count_pelanggan}}</div>
                        <h3>Pelanggan</h3>
                    </div>
                </div>
                <div class="animated flipInY col-lg-5 col-md-5 col-sm-6 ">
                    <div class="tile-stats">
                        <div class="count">{{$count_transaksi}}</div>
                        <h3>Transaksi</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="x_panel">
                <div class="x_title">
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="stat-box">
                    <h3>Pendapatan Bersih</h3>
                    <p>Rp {{ number_format($pendapatan, 2) }}</p>
                </div>
                </li>
                </ul>
            </div>
        </div>
    </div>
        <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> grafik pendapatan<small></small></h2>
                        <div class="filter">
                            <!-- Elemen input tanggal -->
                            <form action="{{ route('grafik.index') }}" method="GET">
                                <label for="tanggal_mulai">Tanggal Mulai:</label>
                                <input type="date" id="tanggal_mulai" name="tanggal_mulai">

                                <label for="tanggal_selesai">Tanggal Selesai:</label>
                                <input type="date" id="tanggal_selesai" name="tanggal_selesai">

                                <button type="submit">Filter</button>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-9 col-sm-12">

                            <!-- Grafik dan data lainnya -->
                            <div class="demo-container" style="height:280px">
                                <div id="chart_plot_02" class="demo-placeholder"></div>
                            </div>
                            <div class="tiles">
                                <div class="col-md-4 tile">
                                    <span>Total Transaksi</span>
                                    <h2>{{ $count_transaksi }}</h2>
                                    <span class="sparkline11 graph" style="height: 160px;">
                                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                                </div>
                                <div class="col-md-4 tile">
                                    <span>Total Pendapatan</span>
                                    <h2>Rp. {{ number_format($pendapatan, 0, ',', '.') }}</h2>
                                    <span class="sparkline22 graph" style="height: 160px;">
                                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                                </div>
                                <div class="col-md-4 tile">
                                    <span>Total Pelanggan</span>
                                    <h2>{{ $count_pelanggan }}</h2>
                                    <span class="sparkline11 graph" style="height: 160px;">
                                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-12">
                            <div>
                                <div class="x_title">
                                    <h2>Pelanggan</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Pengaturan 1</a>
                                                <a class="dropdown-item" href="#">Pengaturan 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <ul class="list-unstyled top_profiles scroll-view">
                                    @foreach ($pelanggan as $p)
                                    <li class="media event">
                                        <a class="pull-left border-aero profile_thumb">
                                            <i class="fa fa-user aero"></i>
                                        </a>
                                        <div class="media-body">
                                            <a class="title">{{ $p->nama }}</a>
                                            <p><strong>{{ $p->email }}</strong> {{ $p->no_tlp }}</p>
                                            <p> <small>{{ $p->alamat }}</small></p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Transaction Summary <small>Weekly progress</small></h2>
                    <div class="filter">
                        <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <!-- <div class="col-md-9 col-sm-12 ">
                                        <div class="demo-container" style="height:280px">
                                            <div id="chart_plot_02" class="demo-placeholder"></div>
                                        </div>
                                        <div class="tiles">
                                            <div class="col-md-4 tile">
                                                <span>Total Sessions</span>
                                                <h2>231,809</h2>
                                                <span class="sparkline11 graph" style="height: 160px;">
                                                    <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                                </span>
                                            </div>
                                            <div class="col-md-4 tile">
                                                <span>Total Revenue</span>
                                                <h2>$231,809</h2>
                                                <span class="sparkline22 graph" style="height: 160px;">
                                                    <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                                </span>
                                            </div>
                                            <div class="col-md-4 tile">
                                                <span>Total Sessions</span>
                                                <h2>231,809</h2>
                                                <span class="sparkline11 graph" style="height: 160px;">
                                                    <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                                </span>
                                            </div>
                                        </div>

                                    </div> -->

                    <!-- <div class="col-md-5 col-sm-12 ">
                            <div>
                                <div class="x_title">
                                    <h2>Pelanggan</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <ul class="list-unstyled top_profiles scroll-view">
                                    @foreach ($pelanggan as $p)
                                    <li class="media event">
                                        <a class="pull-left border-aero profile_thumb">
                                            <i class="fa fa-user aero"></i>
                                        </a>
                                        <div class="media-body">
                                            <a class="title">{{ $p->nama }}</a>
                                            <p><strong>{{ $p->email }}</strong> {{ $p->no_tlp }}</p>
                                            <p> <small>{{ $p->alamat }}</small>
                                            </p>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div> -->

                    <!-- </div>
                </div>
            </div>
        </div> -->



                    <!-- <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Weekly Summary <small>Activity shares</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                            <div class="col-md-7" style="overflow:hidden;">
                                <span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
                                    <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                </span>
                                <h4 style="margin:18px">Weekly sales progress</h4>
                            </div>

                            <div class="col-md-5">
                                <div class="row" style="text-align: center;">
                                    <div class="col-md-4">
                                        <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                        <h4 style="margin:0">Bounce Rates</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                        <h4 style="margin:0">New Traffic</h4>
                                    </div>
                                    <div class="col-md-4">
                                        <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                        <h4 style="margin:0">Device Share</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->



                    <div class="row">
                        <div class="col-md-4">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>TOP 5 PENJUALAN <small></small></h2>
                                        </li>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Settings 1</a>
                                                <a class="dropdown-item" href="#">Settings 2</a>
                                            </div>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <article class="media event">
                                        <ul class="list-unstyled top_profiles scroll-view">
                                            @foreach ($detail_transaksi as $p)
                                            <li class="media event">
                                                <a>
                                                    <img width="50px" src="{{asset('images')}}/{{$p->menu->image }}" alt="" style="margin-right: 10px;">
                                                </a>
                                                <div class="media-body">
                                                    <a class="title">{{ $p->menu->nama_menu }}</a>
                                                    <p><strong>{{ $p->menu->harga }}</strong></p>
                                                    <p> <small>{{ $p->menu->deskripsi }}</small>
                                                    </p>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <!-- 
            <div class="col-md-4">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Transaksi Terbaru <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <article class="media event">
                            <a>
                                <img width="50px" src="{{ asset('images/' . $p->image) }}" alt="" style="margin-right: 10px;">
                            </a>
                            <div class="media-body">
                                <li class="media event">
                                    <a>
                                        <div class="media-body">
                                            @if(isset($transaksi_terbaru))
                                            <p>{{ $transaksi_terbaru->nama_menu }}</p>
                                            <p><strong>{{ $transaksi_terbaru->harga }}</strong></p>
                                            <p> <small>{{ $transaksi_terbaru->deskripsi }}</small></p>
                                            @else
                                            <p>Tidak ada transaksi terbaru.</p>
                                            @endif
                                        </div>
                                    </a>
                                </li>
                            </div>
                        </article>
                    </div>
                </div>
            </div> -->

                        <div class="col-md-4 col-sm-12 ">
                            <div>
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Stok terendah</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <ul class="list-unstyled top_profiles scroll-view">
                                        @foreach ($stok as $p)
                                        <li class="media event">
                                            <a>
                                                <img width="70px" src="{{asset('images')}}/{{ $p->menu-> image }}" alt="" style="margin-right: 20px;">
                                            </a>
                                            <div class="media-body">
                                                <a class="title" style="font-size: 15px;">Menu : {{ $p->menu->nama_menu}}</a>
                                                <p style="font-size: 14px;"><strong>Stok : {{ $p->jumlah }}</strong></p>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-sm-5 ">
                            <div class="x_panel tile fixed_height_330">
                                <div class="x_title">
                                    <h2>Transaksi Terbaru</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                @foreach ($transaksi as $transaksi)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <p>{{ $transaksi->created_at }}</p>
                                        <p>Total: Rp{{ $transaksi->total_harga }}</p>
                                    </div>
                                </li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- /page content -->

                </body>
                @endsection
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('chart_transaksi').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: json_encode($labels),
            datasets: [{
                label: 'Jumlah Transaksi',
                data: json_encode($data),
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>