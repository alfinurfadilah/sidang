@extends('adminlte::page')
@section('title', 'Jadwal Pemasangan')
@section('content_header')
    <h1 class="m-0 text-dark row justify-content-center">Jadwal Pemasangan</h1>
@stop
@section('content')
    <style>
        .center-heading {
            text-align: center;
        }

        .btn-group-action {
            margin-bottom: 15px;
        }

        .form-group-row {
            display: flex;
            justify-content: space-between;
        }

        .form-group-col {
            width: 48%; /* Sesuaikan lebar kolom */
        }

    </style>
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                                <div class="btn-group-action">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fas fa-save"></i> Simpan
                                    </button>
                                    <a href="{{ route('jadwalpemasangan.index') }}" class="btn btn-danger">
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
                                                <input type="hidden" name="id_jadwalsurvey" id="id_jadwalsurvey"
                                                    value="{{ $fjadwalsurvey->nomor_handphone->id ?? old('id_jadwalsurvey') }}">
                                                <input type="text"
                                                    class="form-control @error('nomor_handphone') is-invalid @enderror"
                                                    placeholder="Masukkan Nomor Handphone" id="nomor_handphone" name="nomor_handphone"
                                                    value="{{ $item->jadwalsurvey ? $jadwalsurvey->paket->nomor_handphone : (old('nomor_handphone') ?? '') }}"
                                                    aria-label="nomor_handphone" aria-describedby="cari">
                                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                                    data-bs-target="#staticBackdrop">
                                                    Ambil No Hadnphone
                                                </button>
                                            </div>
                                            @error('nomor_handphone') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="nama_paket">Nama Paket</label>
                                            <div class="input-group">
                                                <input type="hidden" name="id_paket" id="id_paket"
                                                    value="{{ $fpaket->nama_paket->id ?? old('id_paket') }}">
                                                <input type="text"
                                                    class="form-control @error('nama_paket') is-invalid @enderror"
                                                    placeholder="Masukkan Nama Paket" id="nama_paket" name="nama_paket"
                                                    value="{{ $item->paket ? $fpaket->paket->nama_paket : (old('nama_paket') ?? '') }}"
                                                    aria-label="nama_paket" aria-describedby="cari">
                                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                                    data-bs-target="#staticBackdrop1">
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
                                    <button type="button" class="btn btn-danger btn-sm"
                                        onclick="showEditForm({{$item->id}})">
                                        <i class="fa fa-pen" aria-label="Edit"></i>
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

                                    <button type="button" class="btn btn-primary btn-xs"
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
                                <td>
                                    <button type="button" class="btn btn-primary 
btn-xs" onclick="pilihNomorhandphone('{{$item->id}}','{{$item->nomor_handphone}}', '{{$item->alamat_pemasangan}}')"
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
    <script>
       $(document).ready(function () {
        $('#example2').DataTable({
            "responsive": true,
        });
    });
    $(document).ready(function () {
        $('#example1').DataTable({
            "responsive": true,
        });
    });
    $(document).ready(function () {
        $('#example').DataTable({
            "responsive": true,
        });
    });


        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        };

        function pilihPaket(id, nama_paket) {
            document.getElementById('id_paket').value = id;
            document.getElementById('nama_paket').value = nama_paket;
        };

        function pilihNomorhandphone(id, nomor_handphone) {
            document.getElementById('id_jadwalsurvey').value = id;
            document.getElementById('nomor_handphone').value = nomor_handphone;
        };

        function showEditForm(id) {
            // Menyembunyikan semua form edit
            $('#edit-forms').children().hide();
            // Menampilkan form edit yang sesuai dengan id yang diberikan
            $('#edit-form-' + id).show();
        };

    </script>
@endpush
