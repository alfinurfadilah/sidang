@extends('adminlte::page')
@section('title', 'Tambah User')
@section('content_header')
<h1 class="m-0 text-dark">Tambah User</h1>
@stop
@section('content')
<form action="{{route('users.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control
    @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="name"
                            value="{{old('name')}}">
                        @error('name') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email
                            address</label>
                        <input type="email" class="form-control
    @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email"
                            value="{{old('email')}}">
                        @error('email') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Password</label>
                        <input type="password" class="form-control
    @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password">
                        @error('password') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Konfirmasi
                            Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword"
                            placeholder="Konfirmasi Password" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <label for="divisi">Divisi</label>
                        <select class="form-control @error('divisi') isinvalid @enderror" id="divisi"
                            name="divisi" >
                            <option value="Admin" @if(old('divisi')=='Admin' )selected @endif>Admin</option>
                            <option value="Noc" @if(old('divisi')=='Noc' )selected @endif>Noc</option>
                            <option value="Teknisi" @if(old('divisi')=='Teknisi' )selected @endif>Teknisi</option>
                        </select>
                        @error('divisi') <span class="textdanger">{{$message}}</span> @enderror
                    </div>
                </div>
                <div class="card-footer">
                <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan </i></button> 
                                <a href="{{ route('users.index') }}"  class="btn btn-warning"><i class="fa fa-times-circle"> Batal </i></button></a>
                        
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop
