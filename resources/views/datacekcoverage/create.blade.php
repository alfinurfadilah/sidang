@extends('adminlte::page')
@section('title', 'Tambah datacekcoverage')
@section('content_header')
    <h1 class="m-0 text-dark">Tambah Data Cekcoverage</h1>
@stop
@section('content')
    <form action="{{ route('datacekcoverage.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control
@error('Nama') is-invalid @enderror"
                                id="Nama" placeholder="Nama" name="Nama"
                                value="{{ old('Nama') }}">
                            @error('Nama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Nomor_Handphone">Nomor_Handphone</label>
                            <input type="text" class="form-control
@error('Nomor_Handphone') is-invalid @enderror"
                                id="Nomor_Handphone" placeholder="Nomor_Handphone" name="Nomor_Handphone"
                                value="{{ old('Nomor_Handphone') }}">
                            @error('Nomor_Handphone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Nama_Paket">Nama_Paket</label>
                            <input type="text" class="form-control
@error('Nama_Paket') is-invalid @enderror"
                                id="Nama_Paket" placeholder="Nama_Paket" name="Nama_Paket"
                                value="{{ old('Nama_Paket') }}">
                            @error('Nama_Paket')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Alamat_Pemasangan">Alamat_Pemasangan</label>
                            <input type="text" class="form-control
@error('Alamat_Pemasangan') is-invalid @enderror"
                                id="Alamat_Pemasangan" placeholder="Alamat_Pemasangan" name="Alamat_Pemasangan"
                                value="{{ old('Alamat_Pemasangan') }}">
                            @error('Alamat_Pemasangan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Titik_Kordinat">Titik_Kordinat</label>
                            <input type="text" class="form-control
@error('Titik_Kordinat') is-invalid @enderror"
                                id="Titik_Kordinat" placeholder="Titik_Kordinat" name="Titik_Kordinat"
                                value="{{ old('Titik_Kordinat') }}">
                            @error('Titik_Kordinat')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Hasil_Soft_Survey">Hasil_Soft_Survey</label>
                            <input type="text" class="form-control
@error('Hasil_Soft_Survey') is-invalid @enderror"
                                id="Hasil_Soft_Survey" placeholder="Hasil_Soft_Survey" name="Hasil_Soft_Survey"
                                value="{{ old('Hasil_Soft_Survey') }}">
                            @error('Hasil_Soft_Survey')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan </i></button> 
                                <a href="{{ route('datacekcoverage.index') }}"  class="btn btn-warning"><i class="fa fa-times-circle"> Batal </i></button></a>
                    </div>
                </div>
            </div>
        </div>
    @stop