@extends('adminlte::page')
@section('title', 'Data Paket')
@section('content_header')
<div style="text-align:center;">
    <h1 class="m-0 text-dark">Data Paket</h1>
</div>
@stop
@section('content')
<style>
   
    .center-heading {
        text-align: center;
    }
</style>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card card-primary">
            <div class="card-body">
                <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#staticBackdrop2">
                    Create New Data
                </button>
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="example2">
                        <thead class="center-heading">
                            <tr class="bg-primary text-white">
                                <th>No.</th>
                                <th>Nama Paket</th>
                                <th>Harga Paket</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paket as $key => $pk)
                            <tr>
                                <td class="center-heading">{{$key+1}}</td>
                                <td>{{$pk->Nama_Paket}}</td>
                                <td>Rp {{number_format($pk->Harga_Paket, 0, ',', '.')}}</td>
                                <td>
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop3{{$pk->id}}" data-id="{{$pk->id}}">
                                        <i class="fa fa-pen"></i> Edit
                                    </button>
                                    <a href="{{route('paket.destroy', $pk)}}" onclick="notificationBeforeDelete(event, this)"
                                        class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
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

<!-- MODAL CREATE -->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdrop2" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <!-- Perbaiki tanda kutip di sini -->
                <h1 class="modal-title fs-5" id="staticBackdrop2">Input Data Paket</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered table-stripped" id="example2">

                    <form action="{{ route('paket.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Nama_Paket">Nama Paket</label>
                                <input type="text" class="form-control
@error('Nama_Paket') is-invalid @enderror" id="Nama_Paket" placeholder="Masukan Nama Paket" name="Nama_Paket" value="{{ old('Nama_Paket') }}">
                                @error('Nama_Paket')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="Harga_Paket">Harga Paket</label>
                                <input type="text" class="form-control
@error('Harga_Paket') is-invalid @enderror" id="Harga_Paket" placeholder="Harga_Paket"
                                    name="Harga_Paket" value="{{ old('Harga_Paket') }}">
                                @error('Harga_Paket')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger btn-save"><i class="fas fa-save"> Simpan
                                    </i></button>
                                <a href="{{ route('paket.index') }}"
                                    class="btn btn-secondary btn-cancel"><i class="fa fa-times-circle"> Batal </i></a>
                            </div>

                        </div>
                    </div>
                </form>
            </table>
        </div>
    </div>
</div>
</div>
<!-- MODAL EDIT -->
<!-- MODAL EDIT -->
@foreach($paket as $key => $pk)
    <div class="modal fade" id="staticBackdrop3{{$pk->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="modalTitle{{$pk->id}}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h1 class="modal-title fs-5" id="modalTitle{{$pk->id}}">Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">

                        <form action="{{ route('paket.update', $pk->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Tambahkan method PUT untuk update -->

                            <div class="form-group">
                            <label for="Nama_Paket">Nama Paket</label>
                            <input type="text" class="form-control
        @error('Nama_Paket') is-invalid @enderror" id="Nama_Paket" placeholder="Nama_Paket" name="Nama_Paket" value="{{$pk->Nama_Paket ??
        old('Nama_Paket')}}">
                            @error('Nama_Paket') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="Harga_Paket">Harga_Paket</label>
                            <input type="Titik_Kordinat" class="form-control
        @error('Harga_Paket') is-invalid @enderror" id="Harga_Paket" placeholder="Harga_Paket" name="Harga_Paket" value="{{$pk->Harga_Paket ??
        old('Titik_Kordinat')}}">
                            @error('Harga_Paket') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                    

                    <div class="card-footer">
                        <button type="submit" class="btn btn- btn-save"><i class="fas fa-save"> Simpan </i></button>
                        <a href="{{ route('paket.index') }}" class="btn btn-secondary btn-cancel"><i class="fa fa-times-circle"> Batal </i></a>
                    </div>
                    </form>
               </table>
            </div>
        </div>
    </div>
</div>
@endforeach
@stop
@push('js')

<style>
.center-image {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.btn-purple {
    background-color: #ffcccb;
    /* Purple color */
    color: #fff;
    /* White text */
    /* Add any other styles as needed */
}

.custom-btn-edit {
    background-color: #a0a8c6;
    /* Warna biru */
    border-color: #a0a8c6;
    color: #fff;
    /* Warna teks putih */
}

.custom-btn-delete {
    background-color: #c99da4;
    /* Warna merah tua */
    border-color: #c3a3b6;
    color: #fff;
    /* Warna teks putih */
}

mark {
    background-color: #f3dddf;
    /* Warna latar belakang */
    color: #000000;
    /* Warna teks */
    padding: 0.2em;
    /* Ruang di sekitar teks */
    margin: 0;
    /* Margin nol untuk memastikan tidak ada ruang tambahan */
    border-radius: 3px;
    /* Sudut border */
}

/* Gaya untuk Tombol "Create New Data" */
.btn-create-new-data {
    background-color: #957DAD;
    /* Warna latar belakang tombol (hijau) */
    color: #fff;
    /* Warna teks tombol (putih) */
    border: none;
    /* Tidak ada border */
    padding: 10px 20px;
    /* Padding tombol */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius: 5px;
    /* Border radius untuk sudut tombol */
}

/* Hover Effect */
.btn-create-new-data:hover {
    background-color: #E0BBE4;
    /* Warna latar belakang tombol saat dihover (hijau lebih gelap) */
    color: white;
    /* Warna teks tombol saat dihover (putih) */
}

/* Gaya untuk Tombol "Simpan" */
.btn-save {
    background-color: #F08080;
    /* Warna latar belakang tombol (merah) */
    color: #fff;
    /* Warna teks tombol (putih) */
    border: none;
    /* Tidak ada border */
    padding: 10px 20px;
    /* Padding tombol */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-right: 10px;
    /* Jarak kanan dari tombol "Batal" */
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius: 5px;
    /* Border radius untuk sudut tombol */
}

/* Hover Effect untuk Tombol "Simpan" */
.btn-save:hover {
    background-color: #FFB6C1;
    /* Warna latar belakang tombol saat dihover (merah lebih gelap) */
    color: dark;
    /* Warna teks tombol saat dihover (putih) */
}

/* Gaya untuk Tombol "Batal" */
.btn-cancel {
    background-color: #ADD8E6;
    /* Warna latar belakang tombol (biru) */
    color: #fff;
    /* Warna teks tombol (putih) */
    border: none;
    /* Tidak ada border */
    padding: 10px 20px;
    /* Padding tombol */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius: 5px;
    /* Border radius untuk sudut tombol */
}

/* Hover Effect untuk Tombol "Batal" */
.btn-cancel:hover {
    background-color: #7FFFD4;
    /* Warna latar belakang tombol saat dihover (biru lebih gelap) */
    color: white;
    /* Warna teks tombol saat dihover (putih) */
}
</style>

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

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#tampil').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#Foto").change(function() {
    readURL(this);
});
</script>
@endpush