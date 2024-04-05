@extends('adminlte::page')
@section('title', 'Data Pembayaran')
@section('content_header')
<div style="text-align:center;">
    <h1 class="m-0 text-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 36px; color: #3366ff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);">Data Pembayaran</h1>
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

.btn-detail {
        background-color: #784b84;
        color: #fff;
        border: none;
        transition: all 0.3s ease;
        border-radius: 20px;
    }

    .btn-detail:hover {
        background-color: #311432;
        color: #fff;
        transform: scale(1.05);
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
                                <th>Id Pelanggan</th>
                                <th>Nama </th>
                                <th>Nama Paket</th>
                                <th>Harga Paket</th>
                                <th>Bulan/Tahun</th>
                                <th>Opsi</th>
                                <th>Status Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datapembayaran as $key => $item)
                            <tr>
                                <td class="center-heading">{{$key+1}}</td>
                                <td>{{$item->id_pelanggan}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{$item->fpaket->Nama_Paket}}</td>
                                <td>Rp {{number_format($item->harga_paket, 0, ',', '.')}}</td>
                                <td>{{$item->bulan}} {{$item->tahun}}</td>
                                <td>
                                    <div class="button-container">
                                        <button class="btn btn-edit  btn-xs" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop3{{$item->id}}" data-id="{{$item->id}}">
                                            <i class="fa fa-pen"></i> 
                                    </button>

                                        <a href="{{route('datapembayaran.destroy', $item)}}"
                                            onclick="notificationBeforeDelete(event, this)" class="btn btn-delete  btn-xs">
                                            <i class="fa fa-trash"></i> 
                                        </a>
                                    
                                        <button class="btn btn-primary btn-detail btn-xs" data-toggle="modal"
                                            data-target="#lihatDataModal_{{$item->id_pelanggan}}">
                                            <i class="fa fa-list"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    @if($item->payment_status)
                                        <button class="btn btn-success btn-sm btn-payment">Sudah Dibayar</button>
                                    @else
                                        <button class="btn btn-danger btn-sm btn-payment">Belum Dibayar</button>
                                    @endif
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


<!-- MODAL -->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdrop2" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <!-- Perbaiki tanda kutip di sini -->
                <h1 class="modal-title fs-5" id="staticBackdrop2">Input Data Pembayaran</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered table-stripped" id="example2">
                    <form action="{{ route('datapembayaran.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_pelanggan">Id_Pelanggan</label>
                                <input type="text" class="form-control
@error('id_pelanggan') is-invalid @enderror" id="id_pelanggan" placeholder="id_pelanggan" name="id_pelanggan" value="{{ old('id_pelanggan') }}">
                                @error('id_pelanggan')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
        
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control
@error('nama') is-invalid @enderror" id="nama" placeholder="nama"
                                    name="nama" value="{{ old('nama') }}">
                                @error('nama')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="selected_namapaket">Nama_Paket</label>
                                <div class="input-group">
                                    <input type="hidden" name="id_paket" id="selected_namapaket_id">
                                    <input type="text" class="form-control border @error('id_paket') is-invalid @enderror" placeholder="nama_Paket" id="selected_namapaket" name="selected_namapaket" value="{{ old('selected_namapaket') }}" aria-describedby="cari">
                                    <button type="button" class="btn btn-warning" data-action="create" id="btn-search-paket">Cari Data Paket</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="harga_paket">Harga_Paket</label>
                                <input type="text" class="form-control
@error('harga_paket') is-invalid @enderror" id="harga_paket" placeholder="harga_paket"
                                    name="harga_paket" value="{{ old('harga_paket') }}">
                                @error('harga_paket')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="payment_status">Status Pembayaran</label>
                                <select class="form-control" id="payment_status" name="payment_status">
                                    <option value="1">Sudah Dibayar</option>
                                    <option value="0">Belum Dibayar</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="bulan">Bulan</label>
                            <select class="form-control" id="bulan" name="bulan">
                                <option value="">Pilih Bulan</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <select class="form-control" id="tahun" name="tahun">
                                <option value="">Pilih Tahun</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                            </select>
                        </div>
                    </div>
                            <div class="card-footer btn-container">
                                <button type="submit" class="btn btn-danger btn-save"><i class="fas fa-save"> Simpan
                                    </i></button>
                                <a href="{{ route('datapembayaran.index') }}"
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
@foreach($datapembayaran as $key => $item)
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
                        
                        <form action="{{ route('datapembayaran.update', $item->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Tambahkan method PUT untuk update -->

                            <div class="form-group">
                            <label for="id_pelanggan">Id Pelanggan</label>
                            <input type="text" class="form-control
        @error('id_pelanggan') is-invalid @enderror" id="id_pelanggan" placeholder="id_pelanggan" name="id_pelanggan" value="{{$item->id_pelanggan ??
        old('id_pelanggan')}}">
                            @error('id_pelanggan') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="alamat" class="form-control
                            @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan nomor handphone" name="nama" value="{{$item->nama ??
                            old('nama')}}">
                            @error('nama') <span class="textdanger">{{$message}}</span> @enderror
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
                            <label for="harga_paket">Harga Paket</label>
                            <input type="text" class="form-control @error('harga_paket') is-invalid @enderror" id="harga_paket" placeholder="Masukkan nama alamat pemasangan" name="harga_paket" value="{{ $item->harga_paket ?? old('harga_paket') }}">
                            @error('harga_paket') <span class="textdanger">{{ $message }}</span> @enderror
                        </div>
                            
                        <div class="form-group">
                        <label for="payment_status">Status Pembayaran</label>
                        <select class="form-control" id="payment_status" name="payment_status">
                            <option value="1" {{ $item->payment_status == 1 ? 'selected' : '' }}>Sudah Dibayar</option>
                            <option value="0" {{ $item->payment_status == 0 ? 'selected' : '' }}>Belum Dibayar</option>
                        </select>
                    </div>
                    <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="bulan">Bulan</label>
                        <select class="form-control" id="bulan" name="bulan">
                            <option value="Januari" {{ $item->bulan == 'Januari' ? 'selected' : '' }}>Januari</option>
                            <option value="Februari" {{ $item->bulan == 'Februari' ? 'selected' : '' }}>Februari</option>
                            <option value="Maret" {{ $item->bulan == 'Maret' ? 'selected' : '' }}>Maret</option>
                            <option value="April" {{ $item->bulan == 'April' ? 'selected' : '' }}>April</option>
                            <option value="Mei" {{ $item->bulan == 'Mei' ? 'selected' : '' }}>Mei</option>
                            <option value="Juni" {{ $item->bulan == 'Juni' ? 'selected' : '' }}>Juni</option>
                            <option value="Juli" {{ $item->bulan == 'Juli' ? 'selected' : '' }}>Juli</option>
                            <option value="Agustus" {{ $item->bulan == 'Agustus' ? 'selected' : '' }}>Agustus</option>
                            <option value="September" {{ $item->bulan == 'September' ? 'selected' : '' }}>September</option>
                            <option value="Oktober" {{ $item->bulan == 'Oktober' ? 'selected' : '' }}>Oktober</option>
                            <option value="November" {{ $item->bulan == 'November' ? 'selected' : '' }}>November</option>
                            <option value="Desember" {{ $item->bulan == 'Desember' ? 'selected' : '' }}>Desember</option>
                        </select>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <select class="form-control" id="tahun" name="tahun">
                            <option value="2024" {{ $item->tahun == '2024' ? 'selected' : '' }}>2024</option>
                            <option value="2025" {{ $item->tahun == '2025' ? 'selected' : '' }}>2025</option>
                            <option value="2026" {{ $item->tahun == '2026' ? 'selected' : '' }}>2026</option>
                            <option value="2027" {{ $item->tahun == '2027' ? 'selected' : '' }}>2027</option>
                            <option value="2028" {{ $item->tahun == '2028' ? 'selected' : '' }}>2028</option>
                            <option value="2029" {{ $item->tahun == '2029' ? 'selected' : '' }}>2029</option>
                            <option value="2030" {{ $item->tahun == '2030' ? 'selected' : '' }}>2030</option>
                        </select>
                        </div>
                    </div>
                    <div class="card-footer btn-container">
                                <button type="submit" class="btn btn-danger btn-save"><i class="fas fa-save"> Simpan
                                    </i></button>
                                <a href="{{ route('datapembayaran.index') }}"
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

<!-- MODAL DETAIL-->
@foreach($datapembayaran as $item)
<div class="modal fade" id="lihatDataModal_{{$item->id_pelanggan}}" tabindex="-1" role="dialog"
    aria-labelledby="lihatDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lihatDataModalLabel">Data Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <strong>No. {{$item->id_pelanggan}}</strong><br>
                        <strong>Id Pelanggan:</strong> {{$item->id_pelanggan}}<br>
                        <strong>Nama:</strong> {{$item->nama}}<br>
                        <strong>Nama Paket:</strong> {{$item->fpaket->Nama_Paket}}<br>
                        <strong>Harga Paket:</strong> Rp {{number_format($item->harga_paket, 0, ',', '.')}}<br>
                        <strong>Bulan/Tahun:</strong> {{$item->bulan}} {{$item->tahun}}<br>
                        <strong>Status Pembayaran:</strong>
                        @if($item->payment_status)
                            <span class="badge badge-success">Sudah Dibayar</span>
                        @else
                            <span class="badge badge-danger">Belum Dibayar</span>
                        @endif
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ENDMODAL DETAIL -->


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
   
</script>
@endpush