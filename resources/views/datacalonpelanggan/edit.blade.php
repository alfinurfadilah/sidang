@extends('adminlte::page')
@section('title', 'Edit Data Calon Pelanggan')
@section('content_header')
<h1 class="m-0 text-dark">Edit Data Calon Pelanggan</h1>
@stop
@section('content')
<form action="{{route('datacalonpelanggan.update', $datacalonpelanggan)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control
    @error('Nama') is-invalid @enderror" id="Nama" placeholder="Nama" name="Nama" value="{{$datacalonpelanggan->Nama ??
    old('Nama')}}">
                        @error('Nama') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    
                    <div class="form-group">
                            <label for="Foto" class="form-label">Foto</label>
                            @if($datacalonpelanggan->Foto)
                            <img src="/img/no-image.png"  class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                            @else
                            <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @endif
                            <input class="form-control @error('Foto') is-invalid @enderror" type="file"  id="Foto" name="Foto" value="{{$datacalonpelanggan->Foto ?? old('Foto')}}" onchange="previewImage()">
                            @error('Foto') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Nomor_Handphone">Nomor_Handphone</label>
                        <input type="alamat" class="form-control
    @error('Nomor_Handphone') is-invalid @enderror" id="Nomor_Handphone" placeholder="Masukkan nomor handphone" name="Nomor_Handphone" value="{{$datacalonpelanggan->Nomor_Handphone ??
    old('Nomor_Handphone')}}">
                        @error('Nomor_Handphone') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Nama_Paket">Nama_Paket</label>
                        <input type="Nama_Paket" class="form-control
    @error('Nama_Paket') is-invalid @enderror" id="Nama_Paket" placeholder="Masukkan nama paket" name="Nama_Paket" value="{{$datacalonpelanggan->Nama_Paket ??
    old('Nama_Paket')}}">
                        @error('Nama_Paket') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Alamat_Pemasangan">Alamat_Pemasangan</label>
                        <input type="Alamat_Pemasangan" class="form-control
    @error('Alamat_Pemasangan') is-invalid @enderror" id="Alamat_Pemasangan" placeholder="Masukkan nama alamat pemasangan" name="Alamat_Pemasangan" value="{{$datacalonpelanggan->Alamat_Pemasangan ??
    old('Alamat_Pemasangan')}}">
                        @error('Alamat_Pemasangan') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="Titik_Kordinat">Titik_Kordinat</label>
                        <input type="Titik_Kordinat" class="form-control
    @error('Titik_Kordinat') is-invalid @enderror" id="Titik_Kordinat" placeholder="Masukkan titik kordinat" name="Titik_Kordinat" value="{{$datacalonpelanggan->Titik_Kordinat ??
    old('Titik_Kordinat')}}">
                        @error('Titik_Kordinat') <span class="textdanger">{{$message}}</span> @enderror
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
