@extends('adminlte::page')
@section('title', 'Jadwal Pemasangan')
@section('content_header')
<h1 class="m-0 text-dark"><mark>Jadwal Pemasangan Teknisi</mark></h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-bordered table-stripped table-responsive table-rounded" id="example2">
                    <thead>
                        <tr class="table-info">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Nomor Handphone</th>
                            <th>Nama Paket</th>
                            <th>Alamat Pemasangan</th>
                            <th>Tanggal Pemasangan</th>
                            <th>Waktu Selesai Survey</th>
                            <th>Titik Kordinat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwalpemasangan as $sk => $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->nomor_handphone}}</td>
                            <td>{{$item->nama_paket}}</td>
                            <td>{{$item->alamat_pemasangan}}</td>
                            <td>{{$item->tanggal_pemasangan}}</td>
                            <td>{{$item->waktu}}</td>
                            <td>{{$item->titik_kordinat}}</td>
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
    $('#example1').DataTable({
        "responsive": true,
    });

    function pilih1(id, nama, nomor_handphone) {
        document.getElementById('id_jadwalsurvey').value = id
        document.getElementById('nomor_handphone').value = nomor_handphone
    }

</script>
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