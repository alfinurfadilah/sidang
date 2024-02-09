@extends('adminlte::page')
@section('title', 'Edit Data Jadwal Survey')
@section('content_header')
<h1 class="m-0 text-dark">Edit Data Jadwal Survey</h1>
@stop
@section('content')
<form action="{{route('jadwalsurvey.update', $jadwalsurvey)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input readonly type="text" class="form-control
    @error('nama') is-invalid @enderror" name="nama" value="{{$jadwalsurvey->nama ??
    old('nama')}}" id="nama">
                        @error('nama') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nomor_handphone">Nomor Handphone</label>
                        <input readonly type="nomor_handphone" class="form-control
    @error('nomor_handphone') is-invalid @enderror" id="nomor_handphone" placeholder="Masukkan nomor handphone"
                            name="nomor_handphone" value="{{$jadwalsurvey->nomor_handphone ??
    old('nomor_handphone')}}">
                        @error('nomor_handphone') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input readonly type="nama_paket" class="form-control
    @error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Masukkan nama paket" name="nama_paket"
                            value="{{$jadwalsurvey->nama_paket ??
    old('nama_paket')}}">
                        @error('nama_paket') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat_pemasangan">Alamat Survey</label>
                        <input readonly type="alamat_pemasangan" class="form-control
    @error('alamat_pemasangan') is-invalid @enderror" id="alamat_pemasangan" placeholder="Masukkan alamat pemasangan"
                            name="alamat_pemasangan" value="{{$jadwalsurvey->alamat_pemasangan ??
    old('alamat_pemasangan')}}">
                        @error('alamat_pemasangan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="titik_kordinat">Titik Kordinat</label>
                        <input readonly type="titik_kordinat" class="form-control
    @error('titik_kordinat') is-invalid @enderror" id="titik_kordinat" placeholder="Masukkan titik kordinat"
                            name="titik_kordinat" value="{{$jadwalsurvey->titik_kordinat ??
    old('titik_kordinat')}}">
                        @error('titik_kordinat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="hasil_soft_survey">Hasil Soft Survey</label>
                        <input readonly type="hasil_soft_survey" class="form-control
    @error('hasil_soft_survey') is-invalid @enderror" id="hasil_soft_survey" placeholder="Masukkan hasil_soft_survey"
                            name="hasil_soft_survey" value="{{$jadwalsurvey->hasil_soft_survey ??
    old('hasil_soft_survey')}}">
                        @error('hasil_soft_survey') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_survey">tangal Survey</label>
                        <input  type="date" class="form-control
    @error('tanggal_survey') is-invalid @enderror" id="tanggal_survey" placeholder="Masukkan tanggal_survey"
                            name="tanggal_survey" value="{{$jadwalsurvey->tanggal_survey ??
    old('tanggal_survey')}}">
                        @error('tanggal_survey') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="waktu" class="form-control
    @error('waktu') is-invalid @enderror" id="waktu" placeholder="Masukkan waktu" name="waktu" value="{{$jadwalsurvey->waktu ??
    old('waktu')}}">
                        @error('waktu') <span class="textdanger">{{$message}}</span> @enderror
                    </div>



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan </i></button>
                    <a href="{{ route('jadwalsurvey.index') }}" class="btn btn-warning"><i class="fa fa-times-circle">
                            Batal </i></button><a>

                        </a>
                </div>
            </div>
        </div>
    </div>
    @stop
