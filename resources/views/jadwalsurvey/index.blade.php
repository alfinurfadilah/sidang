@extends('adminlte::page')
@section('title', 'Data Jadwal Survey')
@section('content_header')
<div style="text-align:center;">
    <h1 class="m-0 text-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 36px; color: #3366ff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);">Data Jadwal Survey</h1>
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
    border-radius: 20px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
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

    
</style>

<div class="row justify-content-center">
    <div class="col-md-12 table-container">
        <div class="card card-primary">
            <div class="card-body">
                <!-- <button class="btn btn-primary mb-2" data-toggle="modal" data-target="#staticBackdrop2">
                    Create New Data -->
                </button>
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="example2">
                        <thead class="center-heading">
                            <tr class="bg-info text-white">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Nomor Handphone</th>
                            <th>Nama Paket</th>
                            <th>Alamat Pemasangan</th>
                            <th>Titik Kordinat</th>
                            <th>Hasil Soft Survey</th>
                            <th>Tanggal Survey</th>
                            <th>Waktu</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($jadwalsurvey as $sk => $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->nomor_handphone}}</td>
                            <td>{{$item->nama_paket}}</td>
                            <td>{{$item->alamat_pemasangan}}</td>
                            <td>{{$item->titik_kordinat}}</td>
                            <td>{{$item->hasil_soft_survey}}</td>
                            <td>{{$item->tanggal_survey}}</td>
                            <td>{{$item->waktu}}</td>
                            <td>
                                 <div class="button-container">
                            <button class="btn btn-edit btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop2{{$item->id}}" data-id="{{$item->id}}">
                                        <i class="fa fa-pen"></i> 
                                    </button>
                                    <a href="{{route('jadwalsurvey.destroy', $item)}}" onclick="notificationBeforeDelete(event, this)"
                                        class="btn btn-delete btn-sm">
                                        <i class="fa fa-trash"></i>     
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
@foreach($jadwalsurvey as $key => $item)
<div class="modal fade" id="staticBackdrop2{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="modalTitle{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h1 class="modal-title fs-5" id="modalTitle{{$item->id}}">Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered table-stripped" id="example2">

                    <form action="{{ route('jadwalsurvey.update', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Tambahkan method PUT untuk update -->

                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control @error('Nama') is-invalid @enderror" name="nama"
                                value="{{ $item->nama ?? old('nama') }}" id="Nama" readonly>
                            @error('Nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Nomor_handphone">Nomor_Handphone</label>
                            <input type="text" class="form-control @error('Nomor_Handphone') is-invalid @enderror" name="nomor_handphone"
                                value="{{ $item->nomor_handphone ?? old('nomor_handphone') }}" id="Nomor_Handphone" readonly>
                            @error('Nomor_Handphone') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Nama_Paket">Nama_Paket</label>
                            <input type="text" class="form-control @error('Nama_Paket') is-invalid @enderror" name="nama_paket"
                                value="{{ $item->nama_paket ?? old('nama_paket') }}" id="Nama_Paket" readonly>
                            @error('Nama_Paket') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                       
                        <div class="form-group">
                            <label for="Alamat_Pemasangan">Alamat_Pemasangan</label>
                            <input type="text" class="form-control @error('Alamat_Pemasangan') is-invalid @enderror" name="alamat_pemasangan"
                                value="{{ $item->alamat_pemasangan ?? old('alamat_pemasangan') }}" id="Alamat_Pemasangan" readonly>
                            @error('Alamat_Pemasangan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Titik_Kordinat">Titik_Kordinat</label>
                            <input type="text" class="form-control @error('Titik_Kordinat') is-invalid @enderror" name="titik_kordinat"
                                value="{{ $item->titik_kordinat ?? old('titik_kordinat') }}" id="Titik_Kordinat" readonly>
                            @error('Titik_Kordinat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                        <!-- ... (lanjutkan dengan field lainnya) -->

                        <div class="form-group">
                            <label for="Hasil_Soft_Survey">Hasil_Soft_Survey</label>
                            <input type="text" class="form-control @error('Hasil_Soft_Survey') is-invalid @enderror"
                                id="Hasil_Soft_Survey" readonly placeholder="Masukkan Hasil_Soft_Survey" name="hasil_soft_survey"
                                value="{{ $item->hasil_soft_survey ?? old('hasil_soft_survey') }}">
                            @error('Hasil_Soft_Survey') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            <label for="Tanggal_Survey">Tanggal_Survey</label>
                            <input type="date" class="form-control @error('Tanggal_Survey') is-invalid @enderror" name="tanggal_survey"
                                value="{{ $item->tanggal_survey?? old('tanggal_survey') }}" id="Tanggal_Survey">
                            @error('Tanggal_Survey') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                        <!-- ... (lanjutkan dengan field lainnya) -->

                        <div class="form-group">
                            <label for="Waktu">Waktu</label>
                            <input type="time" class="form-control @error('Waktu') is-invalid @enderror"
                                id="waktu" placeholder="Masukkan Waktu" name="waktu"
                                value="{{ $item->waktu ?? old('waktu') }}">
                            @error('Waktu') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- ... (lanjutkan dengan field lainnya) -->

                        <div class="card-footer btn-container">
                                <button type="submit" class="btn btn-danger btn-save"><i class="fas fa-save"> Simpan
                                    </i></button>
                                <a href="{{ route('jadwalsurvey.index') }}"
                                    class="btn btn-secondary btn-cancel"><i class="fa fa-times-circle"> Batal </i></a>
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
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<style>
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

</script>
@endpush