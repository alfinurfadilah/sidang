@extends('adminlte::page')
@section('title', 'Edit Data Report Survey')
@section('content_header')
<h1 class="m-0 text-dark">Edit Data Report Survey</h1>
@stop
@section('content')
<form action="{{route('reportsurvey.update', $reportsurvey)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input readonly type="text" class="form-control
    @error('nama') is-invalid @enderror" name="nama" value="{{$reportsurvey->nama ??old('nama')}}" id="nama">
                        @error('nama') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="site">Site</label>
                        <input type="site" class="form-control
    @error('site') is-invalid @enderror" id="site" placeholder="site"
                            name="site" value="{{$reportsurvey->site ?? old('site')}}">
                        @error('site') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_survey">Tanggal Survey</label>
                        <input readonly type="tanggal_survey" class="form-control
    @error('tanggal_survey') is-invalid @enderror" id="tanggal_survey" placeholder="Tanggal Survey" name="tanggal_survey"
                            value="{{$reportsurvey->tanggal_survey ??
    old('tanggal_survey')}}">
                        @error('tanggal_survey') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <input type="text" class="form-control
    @error('waktu') is-invalid @enderror" id="waktu" placeholder="Waktu Survey"
                            name="waktu" value="{{$reportsurvey->waktu ?? old('waktu')}}">
                        @error('waktu') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_teknisi">Nama Teknisi</label>
                        <input type="text" class="form-control
    @error('nama_teknisi') is-invalid @enderror" id="nama_teknisi" placeholder="Teknisi yang Bertugas"
                            name="nama_teknisi" value="{{$reportsurvey->nama_teknisi ??
    old('nama_teknisi')}}">
                        @error('nama_teknisi') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="FDT">FDT</label>
                        <input type="text" class="form-control
    @error('FDT') is-invalid @enderror" id="FDT" placeholder="FDT Terdekat"
                            name="FDT" value="{{$reportsurvey->FDT ??
    old('FDT')}}">
                        @error('FDT') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="ODP">ODP</label>
                        <input  type="text" class="form-control
    @error('ODP') is-invalid @enderror" id="ODP" placeholder="Masukkan ODP Terdekat"
                            name="ODP" value="{{$reportsurvey->ODP ??
    old('ODP')}}">
                        @error('ODP') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="kabel">Kabel</label>
                        <input type="text" class="form-control
    @error('kabel') is-invalid @enderror" id="kabel" placeholder="Panjang Kabel" name="kabel" value="{{$reportsurvey->kabel ??
    old('kabel')}}">
                        @error('kabel') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="clamp">Clamp</label>
                        <input type="text" class="form-control
    @error('clamp') is-invalid @enderror" id="clamp" placeholder="Jumlah Clamp" name="clamp" value="{{$reportsurvey->clamp ??
    old('clamp')}}">
                        @error('clamp') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="kabel_tis">Kabel Ties</label>
                        <input type="text" class="form-control
    @error('kabel_tis') is-invalid @enderror" id="kabel_tis" placeholder="Jumlah Kabel Ties" name="kabel_tis" value="{{$reportsurvey->kabel_tis ??
    old('kabel_tis')}}">
                        @error('kabel_tis') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="fascon">Fascon</label>
                        <input type="text" class="form-control
    @error('fascon') is-invalid @enderror" id="fascon" placeholder="Jumlah Fascon" name="fascon" value="{{$reportsurvey->fascon ??
    old('fascon')}}">
                        @error('fascon') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control
    @error('status') is-invalid @enderror" id="status" placeholder="Status" name="status" value="{{$reportsurvey->status ??
    old('status')}}">
                        @error('status') <span class="textdanger">{{$message}}</span> @enderror
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan </i></button>
                    <a href="{{ route('reportsurvey.index') }}" class="btn btn-warning"><i class="fa fa-times-circle">
                            Batal </i></button><a>

                        </a>
                </div>
            </div>
        </div>
    </div>
    @stop
