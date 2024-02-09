@extends('adminlte::page')
@section('title', 'Edit Data Jadwal Pemasangan')
@section('content_header')
<h1 class="m-0 text-dark">Edit Data Jadwal Pemasangan</h1>
@stop
@section('content')
<form action="{{route('jadwalpemasangan.update', $jadwalpemasangan)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <div class="form-group">
                        <label for="nama">nama</label>
                        <input readonly type="text" class="form-control
    @error('nama') is-invalid @enderror" name="nama" value="{{$jadwalpemasangan->nama ??
    old('nama')}}" id="nama">
                        @error('nama') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                    <label for="nomor_handphone">nomor_handphone</label>
                        <div class="input-group">
                            <input type="hidden" name="id_jadwalsurvey" id="id_jadwalsurvey"
                                value="{{ old('id_jadwalsurvey') }}">
                            <input type="text" class="form-control @error('nomor_handphone') is-invalid @enderror"
                                placeholder="nomor-handphone" id="nomor_handphone" name="nomor_handphone"
                                value="{{ old('nomor_handphone') }}" aria-label="nomor_handphone" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"><i class="fa fa-search"> Cari Nomor Handphone</i></i></button>
                        </div>

                    <div class="form-group">
                        <label for="nama_paket">nama paket</label>
                        <input readonly type="nama_paket" class="form-control
    @error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Masukkan nama paket" name="nama_paket"
                            value="{{$jadwalpemasangan->nama_paket ??
    old('nama_paket')}}">
                        @error('nama_paket') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat_pemasangan">alamat pemasangan</label>
                        <input readonly type="alamat_pemasangan" class="form-control
    @error('alamat_pemasangan') is-invalid @enderror" id="alamat_pemasangan" placeholder="Masukkan alamat pemasangan"
                            name="alamat_pemasangan" value="{{$jadwalpemasangan->alamat_pemasangan ??
    old('alamat_pemasangan')}}">
                        @error('alamat_pemasangan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                
                    <div class="form-group">
                        <label for="tanggal_pemasangan">tangal Pemasangan</label>
                        <input  type="date" class="form-control
    @error('tanggal_pemasangan') is-invalid @enderror" id="tanggal_pemasangan" placeholder="Masukkan tanggal_pemasangan"
                            name="tanggal_pemasangan" value="{{$jadwalpemasangan->tanggal_pemasangan??
    old('tanggal_pemasangan')}}">
                        @error('tanggal_pemasangan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="waktu">waktu</label>
                        <input type="waktu" class="form-control
    @error('waktu') is-invalid @enderror" id="waktu" placeholder="Masukkan waktu" name="waktu" value="{{$jadwalpemasangan->waktu ??
    old('waktu')}}">
                        @error('waktu') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="titik_kordinat">titik kordinat</label>
                        <input readonly type="titik_kordinat" class="form-control
    @error('titik_kordinat') is-invalid @enderror" id="titik_kordinat" placeholder="Masukkan titik kordinat"
                            name="titik_kordinat" value="{{$jadwalpemasangan->titik_kordinat ??
    old('titik_kordinat')}}">
                        @error('titik_kordinat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan </i></button>
                    <a href="{{ route('jadwalpemasangan.index') }}" class="btn btn-warning"><i class="fa fa-times-circle">
                            Batal </i></button><a>

                        </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdrop1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdrop1">Pencarian data jadwalsurvey</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered table-stripped" id="example1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>nama</th>
                                        <th>nomor_handphone</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwalsurvey as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td id={{$key+1}}>{{$item->nama}}</td>
                                        <td id={{$key+1}}>{{$item->nomor_handphone}}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-xs"
                                                onclick="pilih1('{{ $item->id }}','{{ $item->nomor_handphone }}')"
                                                data-bs-dismiss="modal">Pilih</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Modal -->
    @stop
    @push('js')
            <script>
                $('#example1').DataTable({
                    "responsive": true,
                });

                function pilih1(id, nama) {
                    document.getElementById('id_jadwalsurvey').value = id
                    document.getElementById('nomor_handphone').value = nomor_handphone
                }