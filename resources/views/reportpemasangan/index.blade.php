@extends('adminlte::page')
@section('title', 'Data Report Pemasangan')
@section('content_header')
<div style="text-align:center;">
    <h1 class="m-0 text-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 36px; color: #3366ff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);">Data Report Pemasangan</h1>
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

    .btn-pilih {
    border-radius: 20px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
    background-color: #dc5c5c; /* Warna biru */
    color: white; /* Warna teks putih */
}

.btn-pilih:hover {
    background-color: #ffff00; /* Warna biru lebih gelap saat hover */
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

.btn-warning {
    border-radius: 30px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
}

.red-label {
    color: red;
}

.green-label {
    color: green;
}
</style>

<div class="row justify-content-center">
    <div class="col-md-12 table-container">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Form Report Pemasangan</h3>
            </div>
            <div class="card-body">
                <div id="edit-forms">
                    @foreach ($reportpemasangan as $sk => $item)
                    <form id="edit-form-{{$item->id}}" action="{{ route('reportpemasangan.update', $item->id) }}"
                        method="post" enctype="multipart/form-data" style="display: none;">
                        @csrf
                        @method('PUT')
                        <!-- Tambahkan method PUT untuk update -->
                        <!-- Isi form edit di sini -->

                        <div class="card-footer btn-container">
                                <button type="submit" class="btn btn-danger btn-save"><i class="fas fa-save"> Simpan
                                    </i></button>
                                <a href="{{ route('reportpemasangan.index') }}"
                                    class="btn btn-secondary btn-cancel"><i class="fa fa-times-circle"> Batal </i></a>
                            </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" value="{{ $item->nama ?? old('nama') }}" id="nama" readonly>
                                    @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                <label for="site">Site</label>
                                <div class="input-group">
                                    <input type="hidden" name="id_site" id="id_site" value="{{ $item->fsite->site->id ?? old('id_site') }}">
                                    <input type="text" class="form-control @error('site') is-invalid @enderror" placeholder="Site" id="site" name="site"
                                        value="{{ $item->fsite->site->site ?? old('site') }}" aria-label="Site" aria-describedby="cari" readonly>
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop">
                                        Cari Data Site
                                    </button>
                                </div>
                            </div>


                                <div class="form-group">
                                    <label for="tanggal_pemasangan">Tanggal Pemasangan</label>
                                    <input type="date"
                                        class="form-control @error('tanggal_pemasangan') is-invalid @enderror"
                                        name="tanggal_pemasangan"
                                        value="{{ $item->tanggal_pemasangan ?? old('tanggal_pemasangan') }}"
                                        id="tanggal_pemasangan" readonly>
                                    @error('tanggal_pemasangan') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="waktu">Waktu</label>
                                    <input type="text" class="form-control @error('waktu') is-invalid @enderror"
                                        id="waktu" placeholder="Masukkan waktu" name="waktu"
                                        value="{{ $item->waktu ?? old('waktu') }}" readonly>
                                    @error('waktu') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_teknisi">Nama Teknisi</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('teknisi') is-invalid @enderror" placeholder="Masukan Teknisi" id="nama_teknisi" name="nama_teknisi" value="{{ $item->teknisis->implode('nama_teknisi', ', ') }}" aria-label="teknisi" aria-describedby="cari">
                                        <input type="hidden" name="id_teknisi" id="id_teknisi" value="{{ $item->teknisis->pluck('id')->implode(',') }}">
                                        <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop1">
                                            Cari Data Teknisi
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">


                                <div class="form-group">
                                    <label for="hasil_redaman">Hasil Redaman</label>
                                    <input type="text" class="form-control @error('hasil_redaman') is-invalid @enderror"
                                        id="hasil_redaman" placeholder="Masukkan hasil redaman" name="hasil_redaman"
                                        value="{{ $item->hasil_redaman ?? old('hasil_redaman') }}">
                                    @error('hasil_redaman') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kebutuhan_Access_Point">Kebutuhan Access Point</label>
                                    <input type="number"
                                        class="form-control @error('kebutuhan_Access_Point') is-invalid @enderror"
                                        id="kebutuhan_Access_Point" placeholder="Masukkan jumlah AP yang digunakan"
                                        name="kebutuhan_Access_Point"
                                        value="{{ $item->kebutuhan_Access_Point ?? old('kebutuhan_Access_Point') }}">
                                    @error('kebutuhan_Access_Point') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="SN_Access_Point">SN Access Point</label>
                                    <input type="text"
                                        class="form-control @error('SN_Access_Point') is-invalid @enderror"
                                        id="SN_Access_Point" placeholder="Masukkan Serial Number AP"
                                        name="SN_Access_Point"
                                        value="{{ $item->SN_Access_Point ?? old('SN_Access_Point') }}">
                                    @error('SN_Access_Point') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kebutuhan_HTB">Kebutuhan HTB</label>
                                    <input type="number"
                                        class="form-control @error('kebutuhan_HTB') is-invalid @enderror"
                                        id="kebutuhan_HTB" placeholder="Masukkan jumlah htb yang digunakan"
                                        name="kebutuhan_HTB" value="{{ $item->kebutuhan_HTB ?? old('kebutuhan_HTB') }}">
                                    @error('kebutuhan_HTB') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status_pemasangan">Progres Pemasangan</label>
                                    <input type="range" class="form-control-range @error('status_pemasangan') is-invalid @enderror"
                                        id="status_pemasangan" name="status_pemasangan" min="0%" max="100%" value="{{ $item->status_pemasangan ?? old('status_pemasangan') }}"
                                        style="background: linear-gradient(to right, #28a745 0%, #28a745 50%, #dee2e6 50%, #dee2e6 100%);">
                                    <div id="status_pemasangan_value">{{ $item->status_pemasangan ?? old('status_pemasangan') }}</div>
                                    @error('status_pemasangan') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="example2">
                        <thead class="center-heading">
                            <tr class="bg-info text-white" >
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Site</th>
                                <th>Tanggal Pemasangan</th>
                                <th>Waktu</th>
                                <th>Nama Teknisi</th>
                                <th>Hasil Redaman</th>
                                <th>Progres Pemasangan</th>
                                <th>Kebutuhan Access Point </th>
                                <th>Kebutuhan HTB</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reportpemasangan as $sk => $item)
                            <tr class="center-heading">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{ optional($item->fsite)->site }}</td> <!-- Menggunakan optional() untuk menghindari kesalahan jika relasi null -->                                <td>{{$item->tanggal_pemasangan}}</td>
                                <td>{{$item->waktu}}</td>
                                <td>
                                    @foreach ($item->teknisis as $teknisi)
                                        {{ $teknisi->nama_teknisi }}
                                        @if (!$loop->last)
                                            , <!-- Tambahkan koma jika bukan teknisi terakhir -->
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$item->hasil_redaman}}</td>
                                <td><span class="badge bg-success" style="font-size: 16px;">{{$item->status_pemasangan}}%</span></td>
                                <td>{{$item->kebutuhan_Access_Point}} {{$item->SN_Access_Point}}</td>
                                <td>{{$item->kebutuhan_HTB}}</td>
                                <td>
                                <button class="btn btn-edit btn-sm "  onclick="showEditForm({{$item->id}})">
                                            <i class="fa fa-pen" aria-label="Edit"></i>
                                    </button>
                                    <a href="{{route('reportpemasangan.destroy', $item)}}" onclick="notificationBeforeDelete(event, this)"
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
</div>
<!-- Modal Data Site -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Site</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="example1">
                        <thead class="center-heading">
                            <tr class="bg-info text-white">
                                <th>No.</th>
                                <th>Site</th>
                                <th>Alamat Site</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($site as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td id="site{{$key+1}}">{{$item->site}}</td>
                                <td id="alamat_site{{$key+1}}">{{$item->alamat_site}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs btn-pilih" onclick="pilihSite('{{$item->id}}', '{{$item->site}}')" data-bs-dismiss="modal">
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
</div>
<!-- End Modal -->
<!-- Modal Data Teknisi -->
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Teknisi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="example">
                        <thead class="center-heading">
                            <tr class="bg-info text-white">
                                <th>No.</th>
                                <th>Nama Teknisi</th>
                                <th>Site</th>
                                <th>Pilih</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teknisis as $key => $tk)
                            <tr class="center-heading">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$tk->nama_teknisi}}</td> <!-- Menggunakan atribut nama_teknisi dari objek teknisi -->
                                <td>{{$tk->site}}</td>
                                <td>
                                    <input type="checkbox" class="pilih-teknisi" data-id="{{$tk->id}}" data-nama="{{$tk->nama_teknisi}}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="pilih-teknisi">Pilih</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

@stop
@push('js')
<style>
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
   
    var slider = document.getElementById("status_pemasangan");
    var output = document.getElementById("status_pemasangan_value");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }

    document.addEventListener('DOMContentLoaded', function() {
        var progressLabels = document.querySelectorAll('.progress-label');
        
        progressLabels.forEach(function(label) {
            var progress = parseInt(label.innerText);
            if (progress < 50) {
                label.classList.add('red-label');
            } else {
                label.classList.add('green-label');
            }
        });
    });

    $(document).ready(function() {
        $('#example2').DataTable({
            "responsive": true,
        });
    });
    $(document).ready(function() {
        $('#example1').DataTable({
            "responsive": true,
        });
    });
    $(document).ready(function() {
        $('#example').DataTable({
            "responsive": true,
        });
    });

    $(document).ready(function() {
    $('#pilih-teknisi').click(function() {
        var selectedTeknisi = [];
        $('.pilih-teknisi:checked').each(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            selectedTeknisi.push({ id: id, nama: nama });
        });

        // Menyiapkan teks yang akan ditampilkan di field nama teknisi
        var namaTeknisi = selectedTeknisi.map(function(teknisi) {
            return teknisi.nama;
        }).join(', ');

        // Mengisi field nama teknisi pada form edit dengan nama teknisi yang dipilih
        $('#nama_teknisi').val(namaTeknisi);

        // Mengisi field id teknisi pada form edit dengan id teknisi yang dipilih
        var idTeknisi = selectedTeknisi.map(function(teknisi) {
            return teknisi.id;
        }).join(',');
        $('#id_teknisi').val(idTeknisi);

        // Menutup modal setelah data dipilih
        $('#staticBackdrop1').modal('hide');
    });
});


    
    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    };

    function pilihSite(id, asite) {
        document.getElementById('id_site').value = id;
        document.getElementById('site').value = asite;
    };

    // function pilihTeknisi(id, ateknisi) {
    //     document.getElementById('id_teknisi').value = id;
    //     document.getElementById('nama_teknisi').value = ateknisi;
    // };

    function showEditForm(id) {
        // Menyembunyikan semua form edit
        $('#edit-forms').children().hide();
        // Menampilkan form edit yang sesuai dengan id yang diberikan
        $('#edit-form-' + id).show();
    };
</script>
@endpush
