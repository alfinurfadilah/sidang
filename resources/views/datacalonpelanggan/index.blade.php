@extends('adminlte::page')
@section('title', 'Data Calon Pelanggan')
@section('content_header')
<h1 class="m-0 text-dark"><mark>Data Calon Pelanggan</mark></h1>
@stop
@section('content')




<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-body">
                <!-- <a href="{{route('datacalonpelanggan.create')}}" class="btn btn-danger mb-2"> -->
                <button class="btn btn btn-info mb-2 " aria-hidden="true" data-toggle="modal" data-target="#staticBackdrop2"> create new data </button>
                <table class="table table-hover table-bordered table-stripped table-responsive table-rounded" id="example2">
                    <thead>
                    <tr class="table-info">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Foto KTP</th>
                            <th>Nomor Handphone</th>
                            <th>Nama Paket</th>
                            <th>Alamat Pemasangan</th>
                            <th>Titik Kordinat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($datacalonpelanggan as $key => $datacalonpelanggan)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$datacalonpelanggan->Nama}}</td>
                            <td class="center-image">
                                <img src="storage/{{$datacalonpelanggan->Foto}}" alt="{{$datacalonpelanggan->Foto}} tidak tampil" class="img-thumbnail" width="50%">
                            </td>
                            <td>{{$datacalonpelanggan->Nomor_Handphone}}</td>
                            <td>{{$datacalonpelanggan->Nama_Paket}}</td>
                            <td>{{$datacalonpelanggan->Alamat_Pemasangan}}</td>
                            <td>{{$datacalonpelanggan->Titik_Kordinat}}</td>
                            <td>
                            <a href="{{route('datacalonpelanggan.edit', $datacalonpelanggan)}}" class="btn btn-danger btn-xs"><i class="fa fa-pen"> Edit </i></a>
                                <a href="{{route('datacalonpelanggan.destroy', $datacalonpelanggan)}}"
                                    onclick="notificationBeforeDelete(event, this)"
                                    class="btn btn-secondary btn-xs"> <i class="fa fa-trash"> Delete </i></a>
                                    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- MODAL -->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdrop2" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                    <div class="modal-header bg-info">
                            <h1 class="modal-title fs-5" id="staticBackdrop2">Tambah Data Calon Pelanggan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered table-stripped" id="example2">
                    
<form action="{{ route('datacalonpelanggan.store') }}" method="post" enctype="multipart/form-data">
@csrf
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
                         <img src="/img/no-image.png"class="img-thumbnail d-block" name="tampil" alt="..." width="15%" id="tampil">
                        <input class="form-control @error('Foto') is-invalid @enderror" type="file" id="Foto"
                            name="Foto">
                        @error('Foto') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="Nomor_Handphone">Nomor_Handphone</label>
                        <input type="text" class="form-control
@error('Nomor_Handphone') is-invalid @enderror" id="Nomor_Handphone" placeholder="Nomor_Handphone"
                            name="Nomor_Handphone" value="{{ old('Nomor_Handphone') }}">
                        @error('Nomor_Handphone')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Nama_Paket">Nama_Paket</label>
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
                        <label for="Alamat_Pemasangan">Alamat_Pemasangan</label>
                        <input type="text" class="form-control
@error('Alamat_Pemasangan') is-invalid @enderror" id="Alamat_Pemasangan" placeholder="Alamat_Pemasangan"
                            name="Alamat_Pemasangan" value="{{ old('Alamat_Pemasangan') }}">
                        @error('Alamat_Pemasangan')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Titik_Kordinat">Titik_Kordinat</label>
                        <input type="text" class="form-control
@error('Titik_Kordinat') is-invalid @enderror" id="Titik_Kordinat" placeholder="Titik_Kordinat" name="Titik_Kordinat"
                            value="{{ old('Titik_Kordinat') }}">
                        @error('Titik_Kordinat')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan </i></button>
                    <a href="{{ route('datacalonpelanggan.index') }}" class="btn btn-secondary"><i
                            class="fa fa-times-circle"> Batal </i></button></a>
                </div>
              </form>
            </div>
<style>
    .center-image {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }
</style>
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }

    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#tampil').attr('src', e.target.result);
            } 
            reader.readAsDataURL(input.files[0]);
        } 
    } 
    $("#Foto").change(function(){
        readURL(this);
    });
</script>
@endpush
