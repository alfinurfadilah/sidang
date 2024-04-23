@extends('adminlte::page')
@section('title', 'Data Report Survey')
@section('content_header')
<div style="text-align:center;">
    <h1 class="m-0 text-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 36px; color: #3366ff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);">Data Report Survey</h1>
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

.btn-warning {
    border-radius: 30px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
}

.btn-warning {
    border-radius: 30px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
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

</style>

<div class="row justify-content-center">
    <div class="col-md-12 table-container">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Form Report Survey</h3>
            </div>
            <div class="card-body">
                <div id="edit-forms">
                    @foreach ($reportsurvey as $sk => $item)
                        <form id="edit-form-{{$item->id}}" action="{{ route('reportsurvey.update', $item->id) }}"
                            method="post" enctype="multipart/form-data" style="display: none;">
                            @csrf
                            @method('PUT')
                            <!-- Tambahkan method PUT untuk update -->
                            <!-- Isi form edit di sini -->
                            <div class="card-footer btn-container">
                                <button type="submit" class="btn btn-danger btn-save"><i class="fas fa-save"> Simpan
                                    </i></button>
                                <a href="{{ route('reportsurvey.index') }}"
                                    class="btn btn-secondary btn-cancel"><i class="fa fa-times-circle"> Batal </i></a>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nama">Nama</label>
                                        <input type="text" class="form-control @error('Nama') is-invalid @enderror" name="nama"
                                            value="{{ $item->nama ?? old('nama') }}" id="Nama" readonly>
                                        @error('Nama') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                    <label for="site">Site</label>
                                    <div class="input-group">
                                        <input type="hidden" name="id_site" id="id_site-{{$item->id}}" value="{{$fsite->site->id ?? old('id_site')}}">
                                        <input type="text" class="form-control @error('site') is-invalid @enderror" placeholder="site" id="site-{{$item->id}}" name="site"
                                            value="{{ $item->site ? $fsite->site->site : (old('site') ?? '') }}" aria-label="Site" aria-describedby="cari">
                                        <button class="btn btn-warning" type="button" data-bs-toggle="modal" data-id="{{$item->id}}" id="cari" data-bs-target="#staticBackdrop">
                                            Cari Data Site
                                        </button>
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label for="Tanggal_Survey">Tanggal_Survey</label>
                                        <input type="date" class="form-control @error('Tanggal_Survey') is-invalid @enderror" name="tanggal_survey"
                                            value="{{ $item->tanggal_survey ?? old('tanggal_survey') }}" id="Tanggal_Survey" readonly>
                                        @error('Tanggal_Survey') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="Waktu">Waktu</label>
                                        <input type="time" class="form-control @error('Waktu') is-invalid @enderror"
                                            id="waktu" placeholder="Masukkan Waktu" name="waktu"
                                            value="{{ $item->waktu ?? old('waktu') }}" readonly>
                                        @error('Waktu') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">

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



                                    <div class="form-group">
                                        <label for="hard_survey">Hard Survey</label>
                                        <input type="text" class="form-control @error('hard_survey') is-invalid @enderror"
                                            id="hard_survey" placeholder="Masukkan hard_survey" name="hard_survey"
                                            value="{{ $item->hard_survey ?? old('hard_survey') }}">
                                        @error('hard_survey') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control @error('status') is-invalid @enderror" id="status"
                                            name="status" >
                                            <option value="--pilih--" @if(old('status')=='--pilih--' )selected @endif>--pilih--</option>
                                            <option value="Bisa Dipasang" @if(old('status')=='BisaDipasang' )selected @endif>Bisa Dipasang</option>
                                            <option value="Tidak Bisa Dipasang" @if(old('status')=='TidakBisaDipasang' )selected @endif>Tidak Bisa Dipasang</option>
                                        </select>
                                        @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="example2">
                        <thead class="center-heading">
                            <tr class="bg-info text-white">
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Site</th>
                                <th>Tanggal Survey</th>
                                <th>Waktu</th>
                                <th>Nama Teknisi</th>
                                <th>Hard Survey</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reportsurvey as $sk => $item)
                                <tr class="center-heading">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{ optional($item->fsite)->site }}</td>
                                    <td>{{$item->tanggal_survey}}</td>
                                    <td>{{$item->waktu}}</td>
                                    <td>
                                        @foreach ($item->teknisis as $teknisi)
                                            {{ $teknisi->nama_teknisi }}
                                            @if (!$loop->last)
                                                , <!-- Tambahkan koma jika bukan teknisi terakhir -->
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$item->hard_survey}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <button class="btn btn-edit btn-sm"  onclick="showEditForm({{$item->id}})">
                                            <i class="fa fa-pen" aria-label="Edit"></i>
                                    </button>
                                    <a href="{{route('reportsurvey.destroy', $item)}}" onclick="notificationBeforeDelete(event, this)"
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
