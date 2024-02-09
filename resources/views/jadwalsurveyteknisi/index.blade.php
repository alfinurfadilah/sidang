@extends('adminlte::page')
@section('title', 'Jadwal Survey Teknisi')
@section('content_header')
<h1 class="m-0 text-dark"><mark>Jadwal Survey Teknisi</mark></h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <a href="{{route('jadwalsurvey.create')}}" class="btn btn-danger mb-2">
                <i class="fa fa-medkit" aria-hidden="true"> Tambah </i></a> -->
                <table class="table table-hover table-bordered table-stripped table-responsive table-rounded" id="example2">
                    <thead>
                    <tr class="table-info">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Nomor Handphone</th>
                            <th>Nama Paket</th>
                            <th>Alamat Pemasangan</th>
                            <th>Titik Kordinat</th>
                            <th>Hasil Soft Survey</th>
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
                            <td>{{$item->nama_paket}}</td>
                            <td>{{$item->alamat_pemasangan}}</td>
                            <td>{{$item->titik_kordinat}}</td>
                            <td>{{$item->hasil_soft_survey}}</td>
                            <td>{{$item->tanggal_survey}}</td>
                            <td>{{$item->waktu}}</td>
                            <!-- <td>
                            <a href="{{route('jadwalsurvey.edit', $item)}}" class="btn btn-danger btn-xs"><i class="fa fa-pen"> Edit </i></a>
                                <a href="{{route('jadwalsurvey.destroy', $item)}}"
                                    onclick="notificationBeforeDelete(event, this)"
                                    class="btn btn-warning btn-xs"> <i class="fa fa-trash"> Delete </i></a>
                                    
                            </td> -->
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }

</script>
@endpush