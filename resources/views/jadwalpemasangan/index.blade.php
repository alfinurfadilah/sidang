@extends('adminlte::page')
@section('title', 'Data Jadwal Pemasangan')
@section('content_header')
<div style="text-align:center;">
    <h1 class="m-0 text-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 36px; color: #3366ff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);">Data Jadwal Pemasangan</h1>
</div>

@stop
@section('content')
<style>
    
    .center-heading {
        text-align: center;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .btn-create {
        background-color: #007bff; /* Warna biru */
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 10px;
        transition-duration: 0.4s;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .btn-create:hover {
        background-color: #0056b3; /* Warna biru lebih gelap saat hover */
    }
    .btn-edit {
        background-color: #007bff;
        color: #fff;
        border: none;
        transition: all 0.3s ease;
        border-radius: 20px;
    }

    .btn-edit:hover {
        background-color: #0056b3;
        color: #fff;
        transform: scale(1.05);
    }

    .btn-delete {
        background-color: #dc3545;
        color: #fff;
        border: none;
        transition: all 0.3s ease;
        border-radius: 20px;
    }

    .btn-delete:hover {
        background-color: #c82333;
        color: #fff;
        transform: scale(1.05);
    }


    .bg-info-custom {
        background-color: #17a2b8 !important;
        color: #fff;
    }

    .btn {
        padding: 8px 16px;
        cursor: pointer;
        outline: none;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    /* Gaya untuk tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        border-radius: 20px;
        overflow: hidden;
     
    }

    th,
    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
        text-align: center; /* Membuat teks th menjadi terpusat */
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tbody tr:hover {
        background-color: #ddd;
    }

    .table-container {
        background-color: #f2f2f2; /* Warna senada dengan table */
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-body-custom {
        background-color: #f2f2f2; /* Warna yang Anda inginkan untuk card body */
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }


    .modal-content {
    border-radius: 20px; /* Atur nilai border-radius sesuai keinginan */
}

.form-control {
    background-color: #FFFAFA; /* Warna latar belakang yang Anda inginkan */
}

/* Warna latar belakang untuk form field saat dalam keadaan fokus */
.form-control:focus {
    background-color: #e6e6e6; /* Warna latar belakang yang berbeda saat form field mendapat fokus */
}

.form-control {
    border-radius: 10px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
}

.btn-save {
    border-radius: 20px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
}

.btn-warning {
    border-radius: 30px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
}

.form-group {
        margin-bottom: 20px;
    }

    .input-group {
        display: flex;
        align-items: center;
    }

    .input-group input[type="text"] {
        flex: 1;
        border-radius: 20px 0 0 20px;
        border-right: none;
    }

    .input-group button {
        border-radius: 0 20px 20px 0;
    }

    .btn-pilih {
    border-radius: 20px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
    background-color: #dc5c5c; /* Warna biru */
    color: white; /* Warna teks putih */
}

.btn-pilih:hover {
    background-color: #ffff00; /* Warna biru lebih gelap saat hover */
}
</style>

<div class="row justify-content-center">
    <div class="col-md-12 table-container">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Form Jadwal Pemasangan</h3>
                </div>
                <div class="card-body">
                    <div id="edit-forms">
                        @foreach ($jadwalpemasangan as $sk => $item)
                            <form id="edit-form-{{ $item->id }}" action="{{ route('jadwalpemasangan.update', $item->id) }}"
                                method="post" enctype="multipart/form-data" style="display: none;">
                                @csrf
                                @method('PUT')
                                <!-- Tambahkan method PUT untuk update -->
                                <div class="card-footer btn-container">
                                    <button type="submit" class="btn btn-info btn-save">
                                        <i class="fas fa-save"></i> Simpan
                                    </button>
                                    <a href="{{ route('jadwalpemasangan.index') }}" class="btn btn-cancel">
                                        <i class="fa fa-times-circle"></i> Batal
                                    </a>
                                </div>
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="Nama">Nama</label>
                                            <input type="text" class="form-control @error('Nama') is-invalid @enderror"
                                                name="nama" value="{{ $item->nama ?? old('nama') }}" id="Nama" readonly>
                                            @error('Nama') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group">
                                        <label for="nomor_handphone">Nomor Handphone</label>
                                            <div class="input-group">
                                                <input type="hidden" name="id_jadwalsurvey" id="id_jadwalsurvey-{{$item->id}}" value="{{ $fjadwalsurvey->nomor_handphone->id ?? old('id_jadwalsurvey') }}">
                                                <input type="text" class="form-control @error('nomor_handphone') is-invalid @enderror" placeholder="Masukkan Nomor Handphone" id="nomor_handphone-{{$item->id}}" name="nomor_handphone"
                                                    value="{{ $item->jadwalsurvey ? $jadwalsurvey->paket->nomor_handphone : (old('nomor_handphone') ?? '') }}" aria-label="nomor_handphone" aria-describedby="cari">
                                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-id="{{$item->id}}" id="cari" data-bs-target="#staticBackdrop">
                                                    Ambil No Hadnphone
                                                </button>
                                            </div>
                                            @error('nomor_handphone') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_paket">Nama Paket</label>
                                            <div class="input-group">
                                                <input type="hidden" name="id_paket" id="id_paket-{{$item->id}}" value="{{ $fpaket->nama_paket->id ?? old('id_paket') }}">
                                                <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" placeholder="Masukkan Nama Paket" id="nama_paket-{{$item->id}}" name="nama_paket"
                                                    value="{{ $item->paket ? $fpaket->paket->nama_paket : (old('nama_paket') ?? '') }}" aria-label="nama_paket" aria-describedby="cari">
                                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-id="{{$item->id}}" id="cari" data-bs-target="#staticBackdrop1">
                                                    Cari Data Paket
                                                </button>
                                            </div>
                                            @error('nama_paket') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="alamat_pemasangan">Alamat Pemasangan</label>
                                            <input type="text"
                                                class="form-control @error('alamat_pemasangan') is-invalid @enderror"
                                                id="alamat_pemasangan" placeholder="Masukkan Alamat Pemasangan"
                                                name="alamat_pemasangan"
                                                value="{{ $item->alamat_pemasangan ?? old('alamat_pemasangan') }}">
                                            @error('alamat_pemasangan') <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_pemasangan">Tanggal Pemasangan</label>
                                            <input type="date"
                                                class="form-control @error('tanggal_pemasangan') is-invalid @enderror"
                                                id="tanggal_pemasangan" placeholder="Masukkan tanggal_pemasangan"
                                                name="tanggal_pemasangan"
                                                value="{{ $item->tanggal_pemasangan ?? old('tanggal_pemasangan') }}">
                                            @error('tanggal_pemasangan') <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="waktu">Waktu</label>
                                            <input type="time" class="form-control @error('waktu') is-invalid @enderror"
                                                id="waktu" placeholder="Masukkan waktu" name="waktu"
                                                value="{{ $item->waktu ?? old('waktu') }}">
                                            @error('waktu') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="titik_kordinat">Titik Kordinat</label>
                                            <input type="text"
                                                class="form-control @error('titik_kordinat') is-invalid @enderror"
                                                id="titik_kordinat" placeholder="Masukkan titik kordinat" name="titik_kordinat"
                                                value="{{ $item->titik_kordinat ?? old('titik_kordinat') }}">
                                            @error('titik_kordinat') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </div>

                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="example2">
                        <thead class="center-heading">
                            <tr class="bg-info text-white">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Nomor Handphone</th>
                                <th>Nama Paket</th>
                                <th>Alamat Pemasangan</th>
                                <th>Tanggal Pemasangan</th>
                                <th>Waktu</th>
                                <th>Titik Kordinat </th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwalpemasangan as $sk => $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item ->nomor_handphone }}</td>
                                <td>{{$item->nama_paket }}</td>
                                <!-- Menggunakan optional() untuk menghindari kesalahan jika relasi null -->
                                <td>{{$item->alamat_pemasangan }}</td>
                                <td>{{$item->tanggal_pemasangan}}</td>
                                <td>{{$item->waktu}}</td>
                                <td>{{$item->titik_kordinat}}</td>
                                <td>
                                <div class="button-container">
                                <button class="btn btn-edit btn-sm"  onclick="showEditForm({{$item->id}})">
                                            <i class="fa fa-pen" aria-label="Edit"></i>
                                    </button>
                                    <a href="{{route('jadwalpemasangan.destroy', $item)}}" onclick="notificationBeforeDelete(event, this)"
                                        class="btn btn-delete btn-sm">
                                        <i class="fa fa-trash"></i> 
</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal Data Paket -->
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Paket</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="example1">
                        <thead class="center-heading">
                            <tr class="bg-info text-white">
                                <th>No.</th>
                                <th>Nama Paket</th>
                                <th>Harga Paket</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paket as $key => $pk)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td id={{$key+1}}>{{$pk->Nama_Paket}}</td>
                                <td id={{$key+1}}>{{$pk->Harga_Paket}}</td>
                                <td>

                                    <button type="button" class="btn btn-primary btn-xs btn-pilih"
                                        onclick="pilihPaket('{{$pk->id}}', '{{$pk->Nama_Paket}}')"
                                        data-bs-dismiss="modal">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
<!-- Modal Data Jadwal Survey -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Jadwal Survey</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="example">
                        <thead class="center-heading">
                            <tr class="bg-info text-white">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Nomor Handphone</th>
                                <th>Alamat Pemasangan</th>
                                <th>Titik Kordinat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwalsurvey as $key => $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->nomor_handphone }}</td>
                                <td>{{$item->alamat_pemasangan}}</td>
                                <td>{{$item->titik_kordinat}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-pilih
btn-xs" onclick="pilihNomorhandphone('{{$item->id}}','{{$item->nomor_handphone}}', '{{$item->alamat_pemasangan}}', '{{$item->titik_kordinat}}')"
                                        data-bs-dismiss="modal">
                                        Pilih
                                        </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
@stop
@push('js')
<style>
    .btn-save {
        background-color: #CD5C5C;
        color: #fff;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-right: 10px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 20px;
    }

    .btn-save:hover {
        background-color: #8b0000;
        color: dark;
        transform: scale(1.05);
    }

    .btn-cancel {
        background-color: #6495ED;
        color: #fff;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 20px;
    }

    .btn-cancel:hover {
        background-color: #191970;
        color: white;
        transform: scale(1.05);
    }
</style>
<script>
    $(document).ready(function () {
        $('#example2, #example1, #example').DataTable({
            "responsive": true,
        });
    });

    function pilihPaket(id, nama_paket) {
        var elements = document.querySelectorAll('[id*="edit-form-"]');
        
        elements.forEach(function(element) {
            var getIdElement = element.id.split('-')[2];
            if (window.getComputedStyle(element).display !== 'none') {
                document.getElementById('id_paket-' + getIdElement).value = id;
                document.getElementById('nama_paket-' + getIdElement).value = nama_paket;
            }
        });
    }

    function pilihNomorhandphone(id, nomor_handphone) {
        var elements = document.querySelectorAll('[id*="edit-form-"]');
        
        elements.forEach(function(element) {
            var getIdElement = element.id.split('-')[2];
            if (window.getComputedStyle(element).display !== 'none') {
                document.getElementById('id_jadwalsurvey-' + getIdElement).value = id;
                document.getElementById('nomor_handphone-' + getIdElement).value = nomor_handphone;
            }
        });
    }

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }

    function showEditForm(id) {
        $('#edit-forms').children().hide();
        $('#edit-form-' + id).show();
    }
</script>
@endpush
