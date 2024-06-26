@extends('adminlte::page')
@section('title', 'Data Calon Pelanggan')
@section('content_header')
<div style="text-align:center;">
    <h1 class="m-0 text-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 36px; color: #3366ff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);">Data Calon Pelanggan</h1>
</div>

@stop
@section('content')
<style>
    
    .center-heading {
        text-align: center;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .btn-create {
        background-color: #007bff; /* Warna biru */
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-radius: 10px;
        transition-duration: 0.4s;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .btn-create:hover {
        background-color: #0056b3; /* Warna biru lebih gelap saat hover */
    }
    .btn-edit {
        background-color: #007bff;
        color: #fff;
        border: none;
        transition: all 0.3s ease;
        border-radius: 20px;
    }

    .btn-edit:hover {
        background-color: #0056b3;
        color: #fff;
        transform: scale(1.05);
    }

    .btn-delete {
        background-color: #dc3545;
        color: #fff;
        border: none;
        transition: all 0.3s ease;
        border-radius: 20px;
    }

    .btn-delete:hover {
        background-color: #c82333;
        color: #fff;
        transform: scale(1.05);
    }

    .bg-info-custom {
        background-color: #17a2b8 !important;
        color: #fff;
    }

    .btn {
        padding: 8px 16px;
        cursor: pointer;
        outline: none;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    /* Gaya untuk tabel */
    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        border-radius: 20px;
        overflow: hidden;
     
    }

    th,
    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
        text-align: center; /* Membuat teks th menjadi terpusat */
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tbody tr:hover {
        background-color: #ddd;
    }

    .table-container {
        background-color: #f2f2f2; /* Warna senada dengan table */
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-body-custom {
        background-color: #f2f2f2; /* Warna yang Anda inginkan untuk card body */
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-container {
    display: grid;
    grid-template-columns: 1fr auto; /* Menempatkan tombol di sebelah kiri dan kanan container */
    align-items: center; /* Posisikan elemen secara vertikal di tengah */
}

    .modal-content {
    border-radius: 20px; /* Atur nilai border-radius sesuai keinginan */
}

.form-control {
    background-color: #FFFAFA; /* Warna latar belakang yang Anda inginkan */
}

/* Warna latar belakang untuk form field saat dalam keadaan fokus */
.form-control:focus {
    background-color: #e6e6e6; /* Warna latar belakang yang berbeda saat form field mendapat fokus */
}

.form-control {
    border-radius: 10px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
}

.btn-save {
    border-radius: 20px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
}

.btn-warning {
    border-radius: 30px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
}

.form-group {
        margin-bottom: 20px;
    }

    .input-group {
        display: flex;
        align-items: center;
    }

    .input-group input[type="text"] {
        flex: 1;
        border-radius: 20px 0 0 20px;
        border-right: none;
    }

    .input-group button {
        border-radius: 0 20px 20px 0;
    }


    .btn-pilih {
    border-radius: 20px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
    background-color: #dc5c5c; /* Warna biru */
    color: white; /* Warna teks putih */
}

.btn-pilih:hover {
    background-color: #ffff00; /* Warna biru lebih gelap saat hover */
}

/* Gaya untuk tombol status */

    /* Warna untuk setiap status */
    /* Gaya untuk tombol status */
.btn-status {
    padding: 8px 16px; /* Padding untuk tombol */
    font-size: 14px; /* Ukuran font */
    cursor: pointer; /* Kursor menjadi tanda tangan saat mengarahkan */
    outline: none; /* Hilangkan border saat tombol ditekan */
    border: none; /* Hilangkan border tombol */
    border-radius: 5px; /* Sudut border */
}

/* Warna untuk setiap status */
.btn-coverage {
    background-color: #cee9be; /* Hijau */
    color: black; /* Warna teks putih */
}

.btn-survey {
    background-color: #b0d0e7; /* Kuning */
    color: black; /* Warna teks hitam */
}

.btn-pemasangan {
    background-color: #ecc7ce; /* Biru */
    color: black; /* Warna teks putih */
}

.btn-aktif {
    background-color: #ffe57e; /* Merah */
    color: black; /* Warna teks putih */
}

</style>

<div class="row justify-content-center">
    <div class="col-md-12 table-container">
        <div class="card card-primary">
            <div class="card-body">
                <button class="btn btn-create mb-2" data-toggle="modal" data-target="#staticBackdrop2">
                    Create New Data
                </button>
                <div class="table-responsive">
                    <table class="table table-hover" id="example2">
                        <thead class="center-heading bg-info-custom">
                        <tr class="bg-info text-white">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Foto KTP</th>
                            <th>Nomor Handphone</th>
                            <th>Nama Paket</th>
                            <th>Alamat Pemasangan</th>
                            <th>Titik Kordinat</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </thead>
                    <tbody>

                        @foreach($datacalonpelanggan as $key => $item)
                        <tr>
                            <td class="center-heading">{{$key+1}}</td>
                            <td>{{$item->Nama}}</td>
                            <td class="center-image">
                                <img src="{{ asset('storage/Foto/'. $item->Foto)}}" alt="{{$item->Foto}} tidak tampil" class="img-thumbnail" width="50%">
                            </td>
                            <td>{{$item->Nomor_Handphone}}</td>
                            <td>{{$item->fpaket->Nama_Paket}}</td>
                            <td>{{$item->Alamat_Pemasangan}}</td>
                            <td>{{$item->Titik_Kordinat}}</td>
                            <td>
                            @if($item->Status == 'coverage')
                                <button class="btn btn-survey">{{$item->Status}}</button>
                            @elseif($item->Status == 'survey')
                                <button class="btn btn-coverage">{{$item->Status}}</button>
                            @elseif($item->Status == 'pemasangan')
                                <button class="btn btn-pemasangan">{{$item->Status}}</button>
                            @elseif($item->Status == 'aktif')
                                <button class="btn btn-aktif">{{$item->Status}}</button>
                            @endif
                        </td>
                            <td>
                                <div class="button-container">
                                <button class="btn btn-edit btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop3{{$item->id}}" data-id="{{$item->id}}">
                                        <i class="fa fa-pen"></i> 
                                    </button>
                                    <a href="{{route('datacalonpelanggan.destroy', $item)}}" onclick="notificationBeforeDelete(event, this)"
                                        class="btn btn-delete btn-sm">
                                        <i class="fa fa-trash"></i>     
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
                            <label for="selected_namapaket">Nama_Paket</label>
                            <div class="input-group">
                                <input type="hidden" name="id_paket" id="selected_namapaket_id">
                                <input type="text" class="form-control border @error('id_paket') is-invalid @enderror" placeholder="Nama_Paket" id="selected_namapaket" name="selected_namapaket" value="{{ old('selected_namapaket') }}" aria-describedby="cari">
                                <button type="button" class="btn btn-warning" data-action="create" id="btn-search-paket">Cari Data Paket</button>
                            </div>
                        </div>


                            <!-- <div class="form-group">
                            <label for="id_paket">Nama_Paket</label>
                            <select id="id_paket"
                                class="form-select @error('Nama_Paket') is-invalid @enderror"
                                name="id_paket" onchange="pilihPaket()">
                                @foreach($paket as $item)
                                <option value="{{ $item->id }}">{{ $item->Nama_Paket }} - {{ $item->Harga_Paket }}
                                </option>
                                @endforeach
                            </select>
                            </div> -->

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

                            <div class="form-group">
                            <label for="Status">Status</label>
                            <select class="form-control" id="Status" name="Status">
                                <option value="coverage">Coverage</option>
                                <option value="survey">Survey</option>
                                <option value="pemasangan">Pemasangan</option>
                                <option value="aktif">Aktif</option>
                            </select>
                        </div>

                            <div class="card-footer btn-container">
                                <button type="submit" class="btn btn-danger btn-save"><i class="fas fa-save"> Simpan
                                    </i></button>
                                <a href="{{ route('datacalonpelanggan.index') }}"
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
@foreach($datacalonpelanggan as $key => $item)
    <div class="modal fade" id="staticBackdrop3{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="modalTitle{{$item->id}}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h1 class="modal-title fs-5" id="modalTitle{{$item->id}}">Edit</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        
                        <form action="{{ route('datacalonpelanggan.update', $item->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Tambahkan method PUT untuk update -->

                            <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control
        @error('Nama') is-invalid @enderror" id="Nama" placeholder="Nama" name="Nama" value="{{$item->Nama ??
        old('Nama')}}">
                            @error('Nama') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                        <label for="Foto" class="form-label">Foto</label>
                        @if($item->Foto)
                            <!-- Menampilkan gambar lama jika ada -->
                            <img src="{{ asset('storage/Foto/'. $item->Foto)}}" id="tampil" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                        @else
                            <!-- Menampilkan placeholder jika tidak ada gambar lama -->
                            <img src="/img/no-image.png" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                        @endif
                        <input class="form-control @error('Foto') is-invalid @enderror" type="file" id="Foto" name="Foto" value="{{$item->Foto ?? old('Foto')}}">
                        @error('Foto') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                        <div class="form-group">
                            <label for="Nomor_Handphone">Nomor_Handphone</label>
                            <input type="alamat" class="form-control
                            @error('Nomor_Handphone') is-invalid @enderror" id="Nomor_Handphone" placeholder="Masukkan nomor handphone" name="Nomor_Handphone" value="{{$item->Nomor_Handphone ??
                            old('Nomor_Handphone')}}">
                            @error('Nomor_Handphone') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="selected_namapaket">Nama_Paket</label>
                                <div class="input-group">
                                <input type="hidden" name="id_paket" id="selected_namapaket_edit_{{$item->id}}" value="{{$item->fpaket->id ?? old('id_paket')}}">
                                <input type="text" class="form-control border @error('id_paket') is-invalid @enderror" placeholder="Nama_Paket" id="selected_namapaket_{{$item->id}}" name="selected_namapaket" value="{{$item->fpaket->Nama_Paket?? old('selected_namapaket')}}" aria-describedby="cari">
                                <button type="button" class="btn btn-warning" data-action="edit" data-paket-id="{{ $item->id }}">Cari Data Paket</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Alamat_Pemasangan">Alamat_Pemasangan</label>
                            <input type="text" class="form-control @error('Alamat_Pemasangan') is-invalid @enderror" id="Alamat_Pemasangan" placeholder="Masukkan nama alamat pemasangan" name="Alamat_Pemasangan" value="{{ $item->Alamat_Pemasangan ?? old('Alamat_Pemasangan') }}">
                            @error('Alamat_Pemasangan') <span class="textdanger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="Titik_Kordinat">Titik_Kordinat</label>
                            <input type="text" class="form-control @error('Titik_Kordinat') is-invalid @enderror" id="Titik_Kordinat" placeholder="Masukkan titik kordinat" name="Titik_Kordinat" value="{{ $item->Titik_Kordinat ?? old('Titik_Kordinat') }}">
                            @error('Titik_Kordinat') <span class="textdanger">{{ $message }}</span> @enderror
                        </div>
                      <div class="form-group">
                        <label for="Status">Status</label>
                        <select class="form-control" id="Status" name="Status">
                            <option value="coverage" {{ $item->Status == 'coverage' ? 'selected' : '' }}>Coverage</option>
                            <option value="survey" {{ $item->Status == 'survey' ? 'selected' : '' }}>Survey</option>
                            <option value="pemasangan" {{ $item->Status == 'pemasangan' ? 'selected' : '' }}>Pemasangan</option>
                        </select>
                    </div>

                    </div>
                    <div class="card-footer btn-container">
                                <button type="submit" class="btn btn-danger btn-save"><i class="fas fa-save"> Simpan
                                    </i></button>
                                <a href="{{ route('datacalonpelanggan.index') }}"
                                    class="btn btn-secondary btn-cancel"><i class="fa fa-times-circle"> Batal </i></a>
                            </div>
                    </form>
               </table>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Modal -->
<div class="modal fade" id="paketModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian data paket </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closePaketModal()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <table class="table table-hover table-bordered table-stripped" id="example1">
                    <thead>
                        <tr>
                        <tr class="bg-info text-white">
                            <th>No.</th>
                            <th>Nama_Paket</th>
                            <th>Harga_Paket</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paket as $key => $pk)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$pk->Nama_Paket}}</td>
                            <td>{{$pk->Harga_Paket}}</td>
                            <td>
                            <button type="button" class="btn btn-btn-xs btn-pilih" onclick="pilih('{{$pk->id}}', '{{$pk->Nama_Paket}}', '{{$pk->Harga_Paket}}',)" data-bs-dismiss="modal">
                                    Pilih
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

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
    background-color: #CD5C5C;
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
    border-radius: 20px; /* Atur nilai border-radius sesuai dengan keinginan Anda */

    /* Border radius untuk sudut tombol */
}

/* Hover Effect untuk Tombol "Simpan" */
.btn-save:hover {
    background-color: #8b0000;
    /* Warna latar belakang tombol saat dihover (merah lebih gelap) */
    color: dark;
    /* Warna teks tombol saat dihover (putih) */
    transform: scale(1.05);
}

/* Gaya untuk Tombol "Batal" */
.btn-cancel {
    background-color: #6495ED;
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
    border-radius: 20px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
    /* Border radius untuk sudut tombol */
}

/* Hover Effect untuk Tombol "Batal" */
.btn-cancel:hover {
    background-color: #191970;
    /* Warna latar belakang tombol saat dihover (biru lebih gelap) */
    color: white;
    /* Warna teks tombol saat dihover (putih) */
    transform: scale(1.05);
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

$(document).ready(function() {
        $('#example1').DataTable({
            "responsive": true
        });
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

function closePaketModal() {
        $('#paketModal').modal('hide');
    }

    function pilih(paketId, namapaket, hargapaket) {
    var action = $('#paketModal').data('action');

    if (action === 'edit') {
        // Set input values in the edit modal form
        $('#selected_namapaket_edit_' + $('#paketModal').data('paket-id')).val(paketId);
        $('#selected_namapaket_' + $('#paketModal').data('paket-id')).val(namapaket);
    } else {
        // Set input values in the create modal form
        $('#selected_namapaket_id').val(paketId);
        $('#selected_namapaket').val(namapaket);
    }

    // Hide the modal after selecting a package
    $('#paketModal').modal('hide');
}

$(document).ready(function() {
    // Fungsi untuk membuka modal pemilihan pengguna dengan tindakan (edit atau create)
    function openPaketModal(action, paketId = null) {
        $('#paketModal').data('action', action);
        $('#paketModal').data('paket-id', paketId); // Simpan ID karyawan untuk mode edit
        $('#paketModal').modal('show');
    }

    // Event handler untuk tombol "Cari Data Users" pada mode edit
    $('[data-action="edit"]').on('click', function() {
        // Dapatkan ID karyawan dari atribut data-karyawan-id pada tombol yang diklik
        var paketId = $(this).data('paket-id');
        // Panggil fungsi openUserModal dengan tindakan edit dan ID karyawan
        openPaketModal('edit', paketId);
    });

    // Event handler untuk tombol "Cari Data Users" pada mode create
    $('[data-action="create"]').on('click', function() {
        // Panggil fungsi openUserModal dengan tindakan create
        openPaketModal('create');
    });

    // Fungsi untuk menangani pemilihan pengguna saat menggunakan tombol "pilih"
    $('[data-action="pilih"]').on('click', function() {
        var paketId = $(this).data('paket-id');
        var namapaket = $(this).data('namapaket');
        var hargapaket = $(this).data('hargapaket');
        
        // Panggil fungsi pilih dengan data pengguna yang dipilih
        pilih(paketId, namapaket, hargapaket);
    });
});
</script>
@endpush

@push('js')
<script>
    // Function to handle image preview for edit mode
    function readEditURL(input, previewId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(previewId).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Iterate over each edit modal and attach change event handlers
    @foreach($datacalonpelanggan as $key => $item)
        $("#staticBackdrop3{{$item->id}} #Foto").change(function () {
            readEditURL(this, '#staticBackdrop3{{$item->id}} #tampil');
        });
    @endforeach
</script>
@endpush