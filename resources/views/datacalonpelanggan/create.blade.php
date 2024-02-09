@extends('adminlte::page')
@section('title', 'Tambah datacalonpelanggan')
@section('content_header')
<h1 class="m-0 text-dark">Data Calon Pelanggan</h1>
@stop
@section('content')
<form action="{{ route('datacalonpelanggan.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12">
          
            <!-- <div class="card"> -->
                <!-- <div class="card-body"> -->

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title ">Tambah Data Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                    <div class="form-group">
                        <label for="Nama">Nama</label>
                        <input type="text" class="form-control
@error('Nama') is-invalid @enderror" id="Nama" placeholder="Nama" name="Nama" value="{{ old('Nama') }}">
                        @error('Nama')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group" >
                        <label for="Foto" class="input-group">Foto KTP</label>
                        <img src="/img/no-image.png" class="img-thumbnail d-block" name="tampil" alt="..." width="15%" id="tampil">
                        <input class="form-control @error('Foto') is-invalid @enderror" type="file" id="Foto"
                            name="Foto">
                        @error('Foto') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <!-- <div class="form-group">
                    <label for="Foto">Foto KTP</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="Foto">
                        <label class="custom-file-label" for="Foto">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->

                    <div class="form-group">
                        <label for="Nomor_Handphone">Nomor Handphone</label>
                        <input type="text" class="form-control
@error('Nomor Handphone') is-invalid @enderror" id="Nomor Handphone" placeholder="Masukan Nomor Hanphone"
                            name="Nomor_Handphone" value="{{ old('Nomor_Handphone') }}">
                        @error('Nomor_Handphone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Nama_Paket">Nama Paket</label>
                        <select class="form-control @error('Nama_Paket') is-invalid @enderror" id="Nama_Paket"
                            name="Nama_Paket">
                            <option value="ALPHA" @if(old('Nama_Paket')=='ALPHA' )selected @endif>ALPHA</option>
                            <option value="BETA" @if(old('Nama_Paket')=='BETA' )selected @endif>BETA</option>
                            <option value="GAMMA" @if(old('Nama_Paket')=='GAMMA' )selected @endif>GAMMA</option>
                            <option value="KENDA" @if(old('Nama_Paket')=='KENDA' )selected @endif>KENDA</option>
                            <option value="SELESA" @if(old('Nama_Paket')=='SELESA' )selected @endif>SELESA</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Alamat_Pemasangan">Alamat Pemasangan</label>
                        <input type="text" class="form-control
@error('Alamat_Pemasangan') is-invalid @enderror" id="Alamat_Pemasangan" placeholder="Alamat_Pemasangan"
                            name="Alamat_Pemasangan" value="{{ old('Alamat_Pemasangan') }}">
                        @error('Alamat_Pemasangan')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Titik_Kordinat">Titik Kordinat</label>
                        <input type="text" class="form-control
@error('Titik_Kordinat') is-invalid @enderror" id="Titik_Kordinat" placeholder="Titik_Kordinat" name="Titik_Kordinat"
                            value="{{ old('Titik_Kordinat') }}">
                        @error('Titik_Kordinat')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan data </i></button>
                    <a href="{{ route('datacalonpelanggan.index') }}" class="btn btn-warning"><i
                            class="fa fa-times-circle"> Batal </i></button></a>
                </div>
              </form>
            </div>
                    
    @stop
   
