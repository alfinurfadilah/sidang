@extends('adminlte::page')

@section('title', 'OSFinet')

@section('content_header')

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  
    <!-- Tautan Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-2xluNgGq2mfQm1lx0EDRM1Z7HzII8lZezBNOgA4gVRf2+06aXzFLpf2S4VpBqW1cbzCx0w4scPtv7Gz28pVQ6g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body>



    <div>
        <h1>Dashboard</h1>
    </div>
    @stop

    @section('content')
    
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3 id="cpu"></h3>

                    <p>CPU Load</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-server"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3 id="uptime"></h3>

                    <p>Uptime</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$totalsecret}}</h3>

                    <p>Total PPPoE Secret</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$totalSite}}</h3>

                    <p>Total Site</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <style>
    .info-box-content {
        min-height: 120px; /* Sesuaikan tinggi minimum sesuai kebutuhan */
    }
</style>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center"> <!-- Menengahkan baris -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Router Board Info</span>
                        <span class="info-box-number">{{$identity}} Model : {{ $model }}</span>
                        <span class="info-box-number">OS : {{ $version }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Free Memory / HDD</span>
                        <span class="info-box-number">Memory: {{$freememory}}</span>
                        <span class="info-box-number">HDD: {{$freehdd}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="ion ion-person-add"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total PPPoE Active</span>
                        <span class="info-box-number">{{$secretactive}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
           
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>


<!-- BAR CHART -->
<div class="row">
<div class="col-md-8">
<div class="card card-info">
        <div class="card-header">
        <h3 class="card-title">Traffic Up</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
            <i class="fas fa-times"></i>
            </button>
        </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="load"></div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
    <div class="col-md-4">
        <div class="card card-body">
            <div class="form-group">
                <label for="defaultSelect">Select Interface</label>
                <select class="form-select form-control" name="interface" id="interface">
                    @foreach ($interface as $data)
                        <option value="{{ $data['name']}}">{{ $data['name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="traffic"></div>
        </div>
    </div>
</div>
    <!-- /.card -->
    <script>
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
        }

        new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
        })

    </script>
<div>
</html>

<script type="text/javascript">
    setInterval('cpu()', 1000);
    function cpu() {
        $('#cpu').load('{{ Route('dashboard.cpu') }}')
    }

    setInterval('uptime()', 1000);
    function uptime() {
        $('#uptime').load('{{ Route('dashboard.uptime') }}')
    }

    setInterval('load()', 1000);
    function load() {
        $('#load').load('{{ Route('dashboard.report') }}')
    }

    setInterval('traffic();', 1000);
    function traffic(){
        var traffic = $('#interface').val();
        var url = '{{ route('dashboard.traffic', ':traffic') }}';
        // console.log(traffic);

        $('#traffic').load(url.replace(':traffic', traffic))
    }
</script>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
@stop