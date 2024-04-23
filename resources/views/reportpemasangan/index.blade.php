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
                                    <input type="hidden" name="id_site" id="id_site-{{$item->id}}" value="{{ $item->fsite->site->id ?? old('id_site') }}">
                                    <input type="text" class="form-control @error('site') is-invalid @enderror" placeholder="Site" id="site-{{$item->id}}" name="site"
                                        value="{{ $item->fsite->site->site ?? old('site') }}" aria-label="Site" aria-describedby="cari" readonly>
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-id="{{$item->id}}" id="cari" data-bs-target="#staticBackdrop">
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
                                        <input type="text" class="form-control @error('teknisi') is-invalid @enderror" placeholder="Masukan Teknisi" id="nama_teknisi-{{$item->id}}" name="nama_teknisi" value="{{ $item->teknisis->implode('nama_teknisi', ', ') }}" aria-label="teknisi" aria-describedby="cari">
                                        <input type="hidden" name="id_teknisi" id="id_teknisi-{{$item->id}}" value="{{ $item->teknisis->pluck('id')->implode(',') }}">
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
        color: #fff;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-right: 10px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 20px;
    }

    .btn-save:hover {
        background-color: #8b0000;
        color: dark;
        transform: scale(1.05);
    }

    .btn-cancel {
        background-color: #6495ED;
        color: #fff;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        transition-duration: 0.4s;
        cursor: pointer;
        border-radius: 20px;
    }

    .btn-cancel:hover {
        background-color: #191970;
        color: white;
        transform: scale(1.05);
    }
</style>
<script>
    $(document).ready(function() {
        $('#example2, #example1, #example').DataTable({
            "responsive": true,
        });
    });

    $('#pilih-teknisi').click(function() {
        var selectedTeknisi = [];
        var elements = document.querySelectorAll('[id*="edit-form-"]');
        var idData;

        elements.forEach(function(element) {
            var getIdElement = element.id.split('-')[2];
            if (window.getComputedStyle(element).display !== 'none') {
                idData = getIdElement;
            }
        });

        $('.pilih-teknisi:checked').each(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            selectedTeknisi.push({ id: id, nama: nama });
        });

        var namaTeknisi = selectedTeknisi.map(function(teknisi) {
            return teknisi.nama;
        }).join(', ');

        $('#nama_teknisi-' + idData).val(namaTeknisi);

        var idTeknisi = selectedTeknisi.map(function(teknisi) {
            return teknisi.id;
        }).join(',');
        $('#id_teknisi-' + idData).val(idTeknisi);

        $('#staticBackdrop1').modal('hide');
    });

    function pilihSite(id, asite) {
        var elements = document.querySelectorAll('[id*="edit-form-"]');
        
        elements.forEach(function(element) {
            var getIdElement = element.id.split('-')[2];
            if (window.getComputedStyle(element).display !== 'none') {
                document.getElementById('id_site-' + getIdElement).value = id;
                document.getElementById('site-' + getIdElement).value = asite;
            } 
        });
    };

    function showEditForm(id) {
        $('#edit-forms').children().hide();
        $('#edit-form-' + id).show();
    };

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    };
</script>
@endpush
