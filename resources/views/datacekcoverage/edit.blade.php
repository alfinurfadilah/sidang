@extends('adminlte::page')
@section('title', 'Edit Data Calon Pelanggan')
@section('content_header')
<h1 class="m-0 text-dark">Edit Data Calon Pelanggan</h1>
@stop
@section('content')
<form action="{{route('datacekcoverage.update', $datacekcoverage)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

         
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control
    @error('Nama') is-invalid @enderror" name="Nama" value="{{$datacekcoverage->nama ??
    old('nama')}}" id="Nama" readonly>
                        @error('Nama') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="Nomor_Handphone">Nomor_Handphone</label>
                        <input type="alamat" class="form-control
    @error('Nomor_Handphone') is-invalid @enderror" id="Nomor_Handphone" placeholder="Masukkan nomor handphone" name="Nomor_Handphone" value="{{$datacekcoverage->nomor_handphone ??
    old('nomor_handphone')}}">
                        @error('Nomor_Handphone') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Nama_Paket">Nama_Paket</label>
                        <input type="Nama_Paket" class="form-control
    @error('Nama_Paket') is-invalid @enderror" id="Nama_Paket" placeholder="Masukkan nama paket" name="Nama_Paket" value="{{$datacekcoverage->nama_paket ??
    old('nama_paket')}}">
                        @error('Nama_Paket') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Alamat_Pemasangan">Alamat_Pemasangan</label>
                        <input type="Alamat_Pemasangan" class="form-control
    @error('Alamat_Pemasangan') is-invalid @enderror" id="Alamat_Pemasangan" placeholder="Masukkan nama alamat pemasangan" name="Alamat_Pemasangan" value="{{$datacekcoverage->alamat_pemasangan ??
    old('alamat_pemasangan')}}">
                        @error('Alamat_Pemasangan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Titik_Kordinat">Titik_Kordinat</label>
                        <input type="Titik_Kordinat" class="form-control
    @error('Titik_Kordinat') is-invalid @enderror" id="Titik_Kordinat" placeholder="Masukkan titik kordinat" name="Titik_Kordinat" value="{{$datacekcoverage->titik_kordinat ??
    old('titik_kordinat')}}">
                        @error('Titik_Kordinat') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="Hasil_Soft_Survey">Hasil_Soft_Survey</label>
                        <input type="Hasil_Soft_Survey" class="form-control
    @error('Hasil_Soft_Survey') is-invalid @enderror" id="Hasil_Soft_Survey" placeholder="Masukkan Hasil_Soft_Survey" name="Hasil_Soft_Survey" value="{{$datacekcoverage->hasil_soft_survey ??
    old('hasil_soft_survey')}}">
                        @error('Hasil_Soft_Survey') <span class="textdanger">{{$message}}</span> @enderror
                    </div>


                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan </i></button>
                    <a href="{{ route('datacalonpelanggan.index') }}" class="btn btn-warning"><i class="fa fa-times-circle"> Batal </i></button><a>
                    
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
