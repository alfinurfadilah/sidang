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
<style>
  .center-heading {
        text-align: center;
    }
  .btn-status {
    padding: 8px 16px; /* Padding untuk tombol */
    font-size: 14px; /* Ukuran font */
    cursor: pointer; /* Kursor menjadi tanda tangan saat mengarahkan */
    outline: none; /* Hilangkan border saat tombol ditekan */
    border: none; /* Hilangkan border tombol */
    border-radius: 5px; /* Sudut border */
}

/* Warna untuk setiap status */
.btn-coverage {
    background-color: #cee9be; /* Hijau */
    color: black; /* Warna teks putih */
}

.btn-survey {
    background-color: #b0d0e7; /* Kuning */
    color: black; /* Warna teks hitam */
}

.btn-pemasangan {
    background-color: #ecc7ce; /* Biru */
    color: black; /* Warna teks putih */
}

.btn-aktif {
    background-color: #ffe57e; /* Merah */
    color: black; /* Warna teks putih */
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #e9d8fd; /* Warna ungu muda */
}

.table-hover tbody tr:hover {
    background-color: #d6b8f9; /* Warna ungu muda yang lebih gelap saat hover */
}

</style>

<body>
 <!-- Content Wrapper. Contains page content -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  {{$totalTeknisi}}
                </h3>

                <p>Jumlah Teknisi</p>
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
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$totalJadwalSurvey}}</h3>

                <p>Total Jadwal Survey</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$totalJadwalPemasangan}}</h3>

                <p>Total Jadwal Pemasangan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
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

        <div class="row">
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Survey</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="table-responsive">
                  <table class="display table table-striped table-hover" id="example1">
                    <thead class="center-heading">
                        <tr class="">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Nomor Handphone</th>
                            <th>Alamat Pemasangan</th>
                            <th>Tanggal Survey</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($jadwalsurvey as $sk => $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->nomor_handphone}}</td>
                            <td>{{$item->alamat_pemasangan}}</td>
                            <td>{{$item->tanggal_survey}}</td>
                            <td>{{$item->waktu}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card bg-info">
              <div class="card-header">
                <h3 class="card-title">Pemasangan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="display table table-striped table-hover" id="example1">
                    <thead class="center-heading">
                    <tr class="bg-info text-white">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Nomor Handphone</th>
                                <th>Nama Paket</th>
                                <th>Alamat Pemasangan</th>
                                <th>Tanggal Pemasangan</th>
                                <th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwalpemasangan as $sk => $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item ->nomor_handphone }}</td>
                                <td>{{$item->nama_paket }}</td>
                                <td>{{$item->alamat_pemasangan }}</td>
                                <td>{{$item->tanggal_pemasangan}}</td>
                                <td>{{$item->waktu}}</td>
                            @endforeach
                            </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
</body>
<script>
  $(document).ready(function() {
        $('#example').DataTable({
            "responsive": true,
        });
    });

  $(document).ready(function() {
      $('#example1').DataTable({
          "responsive": true,
      });
  });
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

@section('content')