@extends('adminlte::page')
@section('title', 'Data Cek Coverage')
@section('content_header')
<h1 class="m-0 text-dark"><mark>Data Cek Coverage</mark></h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('datacekcoverage.create')}}" class="">
                    <i class="" aria-hidden="true"></i></a>
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
                            <!-- <th>Status</th> -->
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datacekcoverage as $sk => $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->nomor_handphone}}</td>
                            <td>{{$item->nama_paket}}</td>
                            <td>{{$item->alamat_pemasangan}}</td>
                            <td>{{$item->titik_kordinat}}</td>
                            <td>{{$item->hasil_soft_survey}}</td>
                            <td>
                                <button class="btn btn-xs mb-2 custom-btn-edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop2{{$item->id}}" data-id="{{$item->id}}">
                                <i class="fa fa-pen" aria-label="Edit"></i></button>
                                
                                <a href="{{route('reportpemasangan.destroy', $item)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-xs mb-2 custom-btn-delete">
                                <i class="fa fa-trash" aria-label="Delete"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- MODAL Edit -->
@foreach($datacekcoverage as $key => $item)
<div class="modal fade" id="staticBackdrop2{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="modalTitle{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h1 class="modal-title fs-5" id="modalTitle{{$item->id}}">Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <form action="{{ route('datacekcoverage.update', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Tambahkan method PUT untuk update -->

                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control @error('Nama') is-invalid @enderror" name="Nama"
                                value="{{ $item->nama ?? old('nama') }}" id="Nama" readonly>
                            @error('Nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Nomor_handphone">Nomor_Handphone</label>
                            <input type="text" class="form-control @error('Nomor_Handphone') is-invalid @enderror" name="Nomor_Handphone"
                                value="{{ $item->nomor_handphone ?? old('nomor_handphone') }}" id="Nomor_Handphone" readonly>
                            @error('Nomor_Handphone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Nama_Paket">Nama_Paket</label>
                            <input type="text" class="form-control @error('Nama_Paket') is-invalid @enderror" name="Nama_Paket"
                                value="{{ $item->nama_paket ?? old('nama_paket') }}" id="Nama_Paket" readonly>
                            @error('Nama_Paket') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                       
                        <div class="form-group">
                            <label for="Alamat_Pemasangan">Alamat_Pemasangan</label>
                            <input type="text" class="form-control @error('Alamat_Pemasangan') is-invalid @enderror" name="Alamat_Pemasangan"
                                value="{{ $item->alamat_pemasangan ?? old('alamat_pemasangan') }}" id="Alamat_Pemasangan"readonly>
                            @error('Alamat_Pemasangan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Titik_Kordinat">Titik_Kordinat</label>
                            <input type="text" class="form-control @error('Titik_Kordinat') is-invalid @enderror" name="Titik_Kordinat"
                                value="{{ $item->titik_kordinat ?? old('titik_kordinat') }}" id="Titik_Kordinat" readonly>
                            @error('Titik_Kordinat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Hasil_Soft_Survey">Hasil_Soft_Survey</label>
                            <input type="text" class="form-control @error('Hasil_Soft_Survey') is-invalid @enderror"
                                id="Hasil_Soft_Survey" placeholder="Masukkan Hasil_Soft_Survey" name="Hasil_Soft_Survey"
                                value="{{ $item->hasil_soft_survey ?? old('hasil_soft_survey') }}">
                            @error('Hasil_Soft_Survey') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <button type="submit" class="btn btn-info">Simpan perubahan</button>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<style>
    .btn-purple {
        background-color: #ffcccb; /* Purple color */
        color: #fff; /* White text */
        /* Add any other styles as needed */
    }
    .custom-btn-edit {
        background-color: #a0a8c6; /* Warna biru */
        border-color: #a0a8c6;
        color: #fff; /* Warna teks putih */
    }

    .custom-btn-delete {
        background-color: #c99da4; /* Warna merah tua */
        border-color: #c3a3b6;
        color: #fff; /* Warna teks putih */
    }
    mark {
        background-color: #f3dddf; /* Warna latar belakang */
        color: #000000; /* Warna teks */
        padding: 0.2em; /* Ruang di sekitar teks */
        margin: 0; /* Margin nol untuk memastikan tidak ada ruang tambahan */
        border-radius: 3px; /* Sudut border */
    }
</style>
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
