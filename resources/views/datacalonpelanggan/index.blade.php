@extends('adminlte::page')
@section('title', 'Data Calon Pelanggan')
@section('content_header')
<h1 class="m-0 text-dark">Data Calon Pelanggan</h1>
@stop
@section('content')
<style>
    /* CSS untuk membuat pinggiran tabel lebih bulat */
    /* .table {
        border-radius: 25px; 
        overflow: hidden; 
    } */

    .center-heading {
        text-align: center;
    }
</style>
<div class="row justify-content-center">
    <div class="col-md-12">
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
                            <th>Nama</th>
                            <th>Foto KTP</th>
                            <th>Nomor Handphone</th>
                            <th>Nama Paket</th>
                            <th>Alamat Pemasangan</th>
                            <th>Titik Kordinat</th>
                            <th>Opsi</th>
                        </thead>
                    <tbody>

                        @foreach($datacalonpelanggan as $key => $cp)
                        <tr>
                            <td class="center-heading">{{$key+1}}</td>
                            <td>{{$cp->Nama}}</td>
                            <td class="center-image">
                                <img src="storage/{{$cp->Foto}}"
                                    alt="{{$cp->Foto}} tidak tampil" class="img-thumbnail" width="50%">
                            </td>
                            <td>{{$cp->Nomor_Handphone}}</td>
                            <td>{{$cp->fpaket->Nama_Paket}}</td>
                            <td>{{$cp->Alamat_Pemasangan}}</td>
                            <td>{{$cp->Titik_Kordinat}}</td>
                            <td>
                                <div class="button-container">
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop3{{$cp->id}}" data-id="{{$cp->id}}">
                                        <i class="fa fa-pen"></i> Edit
                                    </button>
                                    <div class="button-space"></div> <!-- Spacer between buttons -->
                                    <a href="{{route('paket.destroy', $cp)}}" onclick="notificationBeforeDelete(event, this)"
                                        class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </div>
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
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdrop2" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <!-- Perbaiki tanda kutip di sini -->
                <h1 class="modal-title fs-5" id="staticBackdrop2">Input Data Calon pelanggan</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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
                            <div class="form-group">
                                <label for="Foto" class="input-group">Foto KTP</label>
                                <img src="/img/no-image.png" class="img-thumbnail d-block" name="tampil" alt="..."
                                    width="15%" id="tampil">
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
                            <label for="id_paket">Nama_Paket</label>
                            <select id="id_paket"
                                class="form-select @error('Nama_Paket') is-invalid @enderror"
                                name="id_paket" onchange="pilihPaket()">
                                @foreach($paket as $cp)
                                <option value="{{ $cp->id }}">{{ $cp->Nama_Paket }} - {{ $cp->Harga_Paket }}
                                </option>
                                @endforeach
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
    <button type="submit" class="btn btn-danger btn-save"><i class="fas fa-save"> Simpan </i></button>
    <a href="{{ route('datacalonpelanggan.index') }}" class="btn btn-secondary btn-cancel"><i class="fa fa-times-circle"> Batal </i></a>
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
@foreach($datacalonpelanggan as $key => $cp)
    <div class="modal fade" id="staticBackdrop3{{$cp->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="modalTitle{{$cp->id}}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h1 class="modal-title fs-5" id="modalTitle{{$cp->id}}">Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">

                        <form action="{{ route('datacalonpelanggan.update', $cp->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Tambahkan method PUT untuk update -->

                            <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control
        @error('Nama') is-invalid @enderror" id="Nama" placeholder="Nama" name="Nama" value="{{$cp->Nama ??
        old('Nama')}}">
                            @error('Nama') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="Foto" class="form-label">Foto</label>
                            @if($cp->Foto)
                            <!-- Jika ada foto sebelumnya -->
                            <img src="storage/{{$cp->Foto}}" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                            @else
                            <!-- Jika tidak ada foto sebelumnya -->
                            <img src="/img/no-image.png" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                            @endif
                            <input class="form-control @error('Foto') is-invalid @enderror" type="file" id="Foto" name="Foto" value="{{$cp->Foto ?? old('Foto')}}" onchange="previewImage()">
                            @error('Foto') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="Nomor_Handphone">Nomor_Handphone</label>
                            <input type="alamat" class="form-control
                            @error('Nomor_Handphone') is-invalid @enderror" id="Nomor_Handphone" placeholder="Masukkan nomor handphone" name="Nomor_Handphone" value="{{$cp->Nomor_Handphone ??
                            old('Nomor_Handphone')}}">
                            @error('Nomor_Handphone') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="Nama_Paket">Nama_Paket</label>
                            <select id="id_paket" class="form-select @error('Nama_Paket') is-invalid @enderror" name="id_paket" onchange="pilihPaket()">
                                @foreach($paket as $p)
                                    <option value="{{ $p->id }}" {{ ($cp->id_paket ?? old('id_paket')) == $p->id ? 'selected' : '' }}>
                                        {{ $p->Nama_Paket }} - {{ $p->Harga_Paket }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Nama_Paket') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="Alamat_Pemasangan">Alamat_Pemasangan</label>
                            <input type="text" class="form-control @error('Alamat_Pemasangan') is-invalid @enderror" id="Alamat_Pemasangan" placeholder="Masukkan nama alamat pemasangan" name="Alamat_Pemasangan" value="{{ $cp->Alamat_Pemasangan ?? old('Alamat_Pemasangan') }}">
                            @error('Alamat_Pemasangan') <span class="textdanger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="Titik_Kordinat">Titik_Kordinat</label>
                            <input type="text" class="form-control @error('Titik_Kordinat') is-invalid @enderror" id="Titik_Kordinat" placeholder="Masukkan titik kordinat" name="Titik_Kordinat" value="{{ $cp->Titik_Kordinat ?? old('Titik_Kordinat') }}">
                            @error('Titik_Kordinat') <span class="textdanger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn- btn-save"><i class="fas fa-save"> Simpan </i></button>
                        <a href="{{ route('datacalonpelanggan.index') }}" class="btn btn-secondary btn-cancel"><i class="fa fa-times-circle"> Batal </i></a>
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
        background-color: #ffcccb; /* Purple color */
        color: #fff; /* White text */
        /* Add any other styles as needed */
    }
    .custom-btn-edit {
        background-color: #a0a8c6; /* Warna biru */
        border-color: #a0a8c6;
        color: #fff; /* Warna teks putih */
    }

    .custom-btn-delete {
        background-color: #c99da4; /* Warna merah tua */
        border-color: #c3a3b6;
        color: #fff; /* Warna teks putih */
    }
    mark {
        background-color: #f3dddf; /* Warna latar belakang */
        color: #000000; /* Warna teks */
        padding: 0.2em; /* Ruang di sekitar teks */
        margin: 0; /* Margin nol untuk memastikan tidak ada ruang tambahan */
        border-radius: 3px; /* Sudut border */
    }
    /* Gaya untuk Tombol "Create New Data" */
    .btn-create-new-data {
        background-color:  	#957DAD; /* Warna latar belakang tombol (hijau) */
        color: #fff; /* Warna teks tombol (putih) */
        border: none; /* Tidak ada border */
        padding: 10px 20px; /* Padding tombol */
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 5px; /* Border radius untuk sudut tombol */
    }

    /* Hover Effect */
    .btn-create-new-data:hover {
        background-color: #E0BBE4; /* Warna latar belakang tombol saat dihover (hijau lebih gelap) */
        color: white; /* Warna teks tombol saat dihover (putih) */
    }
    /* Gaya untuk Tombol "Simpan" */
    .btn-save {
        background-color: #F08080; /* Warna latar belakang tombol (merah) */
        color: #fff; /* Warna teks tombol (putih) */
        border: none; /* Tidak ada border */
        padding: 10px 20px; /* Padding tombol */
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-right: 10px; /* Jarak kanan dari tombol "Batal" */
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 5px; /* Border radius untuk sudut tombol */
    }

    /* Hover Effect untuk Tombol "Simpan" */
    .btn-save:hover {
        background-color: #FFB6C1; /* Warna latar belakang tombol saat dihover (merah lebih gelap) */
        color: dark; /* Warna teks tombol saat dihover (putih) */
    }

    /* Gaya untuk Tombol "Batal" */
    .btn-cancel {
        background-color: #ADD8E6; /* Warna latar belakang tombol (biru) */
        color: #fff; /* Warna teks tombol (putih) */
        border: none; /* Tidak ada border */
        padding: 10px 20px; /* Padding tombol */
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 5px; /* Border radius untuk sudut tombol */
    }

    /* Hover Effect untuk Tombol "Batal" */
    .btn-cancel:hover {
        background-color: #7FFFD4; /* Warna latar belakang tombol saat dihover (biru lebih gelap) */
        color: white; /* Warna teks tombol saat dihover (putih) */
    }

    .button-container {
    display: flex;
    align-items: center;
}

.button-space {
    flex: 1; /* Take up remaining space */
}

.btn {
    border: none;
    padding: 5px 10px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s,  border-color 0.3s;
}

.btn-info {
    color: #3498db; /* Blue color */
    background-color: transparent;
}

.btn-danger {
    color: #e74c3c; /* Red color */
    background-color: transparent;
}

.btn:hover {
    background-color: rgba(0, 0, 0, 0.1);
    color: #333;
    border-color: rgba(0, 0, 0, 0.1);
}

    
</style>

<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $(document).ready(function() {
        $('#example1').DataTable({
            "responsive": true
        });
    });

    function pilihPaket(id, Nama_Paket, Harga_Paket) {
        var idPaketElement = document.getElementById('id_paket');
        var nomorHandphoneElement = document.getElementById('Nama_Paket');

        // Periksa apakah elemen ditemukan sebelum mengubah nilainya
        if (idPaketElement && namaPaketElement) {
            idPaketElement.value = id;
            namaPaketElement.value = Nama_Paket;
        } else {
            console.error("Elemen tidak ditemukan.");
        }
    }
    
</script>
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