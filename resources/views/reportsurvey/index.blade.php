@extends('adminlte::page')
@section('title', 'Report Survey')
@section('content_header')
<div style="text-align:center;">
    <h1 class="m-0 text-dark">Report Survey</h1>
</div>
@stop
@section('content')
<style>
   
    .center-heading {
        text-align: center;
    }
</style>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-body">
                <!-- <button class="" data-toggle="modal" data-target="#staticBackdrop2">
                </button> -->
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
                            <!-- <th>FDT</th>
                            <th>ODP</th>
                            <th>Kabel</th>
                            <th>Clamp</th>
                            <th>Kabel Tis</th>
                            <th>Fascon</th> -->
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($reportsurvey as $sk => $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->site}}</td>
                            <td>{{$item->tanggal_survey}}</td>
                            <td>{{$item->waktu}}</td>
                            <td>{{$item->nama_teknisi}}</td>
                            <td>{{$item->hard_survey}}</td>
                            <!-- <td>{{$item->FDT}}</td>
                            <td>{{$item->ODP}}</td>
                            <td>{{$item->kabel}}</td>
                            <td>{{$item->clamp}}</td>
                            <td>{{$item->kabel_tis}}</td>
                            <td>{{$item->fascon}}</td> -->
                            <td>{{$item->status}}</td>
                            <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop2{{$item->id}}" data-id="{{$item->id}}">
                                        <i class="fa fa-pen"></i> Edit
                                    </button>
                                    <a href="{{route('reportsurvey.destroy', $item)}}" onclick="notificationBeforeDelete(event, this)"
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
@foreach($reportsurvey as $key => $item)
<div class="modal fade" id="staticBackdrop2{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="modalTitle{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
        <div class="modal-header bg-info">
                <h1 class="modal-title fs-5" id="modalTitle{{$item->id}}">Edit Report Survey</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered table-stripped" id="example2">

                    <form action="{{ route('reportsurvey.update', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Tambahkan method PUT untuk update -->

                        
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control @error('Nama') is-invalid @enderror" name="nama"
                                value="{{ $item->nama ?? old('nama') }}" id="Nama">
                            @error('Nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="selected_site">Site</label>
                                <div class="input-group">
                                <input type="hidden" name="id_site" id="selected_site_edit_{{$item->id}}" value="{{$item->fsite->id ?? old('id_site')}}">
                                <input type="text" class="form-control border @error('id_site') is-invalid @enderror" placeholder="site" id="selected_site_{{$item->id}}" name="selected_site" value="{{$item->fsite->Site?? old('selected_site')}}" aria-describedby="cari">
                                <button type="button" class="btn btn-warning" data-action="edit" data-site-id="{{ $item->id }}">Cari Data Site</button>
                            </div>

                        <!-- <div class="form-group">
                            <label for="Site">Site</label>
                            <select id="id_site" class="form-select @error('site') is-invalid @enderror" name="id_site" onchange="pilihSite()">
                                @foreach($site as $st)
                                    <option value="{{ $st->id }}" {{ ($item->id_site ?? old('id_site')) == $st->id ? 'selected' : '' }}>
                                        {{ $st->site }} - {{ $st->alamat_site }}
                                    </option>
                                @endforeach
                            </select>
                            @error('site') <span class="text-danger">{{ $message }}</span> @enderror
                        </div> -->
                        <div class="form-group">
                            <label for="Tanggal_Survey">Tanggal_Survey</label>
                            <input type="date" class="form-control @error('Tanggal_Survey') is-invalid @enderror" name="tanggal_survey"
                                value="{{ $item->tanggal_survey ?? old('tanggal_survey') }}" id="Tanggal_Survey">
                            @error('Tanggal_Survey') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Waktu">Waktu</label>
                            <input type="time" class="form-control @error('Waktu') is-invalid @enderror"
                                id="waktu" placeholder="Masukkan Waktu" name="waktu"
                                value="{{ $item->waktu ?? old('waktu') }}">
                            @error('Waktu') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- ... (lanjutkan dengan field lainnya) -->

                        <div class="form-group">
                            <label for="Nama_Teknisi">Nama_Teknisi</label>
                            <input type="text" class="form-control @error('Nama_Teknisi') is-invalid @enderror"
                                id="nama_teknisi" placeholder="Masukkan Nama_Teknisi" name="nama_teknisi"
                                value="{{ $item->nama_teknisi ?? old('nama_teknisi') }}">
                            @error('Nama_Teknisi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="hard_survey">Hard Survey</label>
                            <input type="text" class="form-control @error('hard_survey') is-invalid @enderror"
                                id="hard_survey" placeholder="Masukkan hard_survey" name="hard_survey"
                                value="{{ $item->hard_survey ?? old('hard_survey') }}">
                            @error('hard_survey') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        

                        <!-- ... (lanjutkan dengan field lainnya) -->

                        <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control @error('status') isinvalid @enderror" id="status"
                            name="status" >
                            <option value="--pilih--" @if(old('status')=='--pilih--' )selected @endif></option>--pilih--
                            <option value="Bisa Dipasang" @if(old('status')=='BisaDipasang' )selected @endif>Bisa Dipasang</option>
                            <option value="Tidak Bisa Dipasang" @if(old('status')=='TidakBisaDipasang' )selected @endif>Tidak Bisa Dipasang</option>
                           
                        </select>
                        @error('divisi') <span class="textdanger">{{$message}}</span> @enderror
                    </div>


                        <!-- ... (lanjutkan dengan field lainnya) -->

                        

                        <div class="card-footer">
                        <button type="submit" class="btn btn- btn-save"><i class="fas fa-save"> Simpan </i></button>
                        <a href="{{ route('reportsurvey.index') }}" class="btn btn-secondary btn-cancel"><i class="fa fa-times-circle"> Batal </i></a>
                    </div>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- Modal -->
<div class="modal fade" id="siteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
        <div class="modal-header bg-info">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Site </h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeSiteModal()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
            <table class="table table-hover table-bordered table-stripped" id="example1">
                    <thead>
                        <tr>
                        <tr class="bg-info text-white">
                            <th>No.</th>
                            <th>site</th>
                            <th>alamat_site</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($site as $key => $st)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{$st->site}}</td>
                            <td>{{$st->alamat_site}}</td>
                            <td>
                            <button type="button" class="btn btn-warning
                                btn-xs" onclick="pilih('{{$st->id}}', '{{$st->site}}', '{{$st->alamat_site}}',)" data-bs-dismiss="modal">
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
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<style>
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

    function closeSiteModal() {
        $('#siteModal').modal('hide');
    }

    function pilih(siteId, site, alamatsite) {
    var action = $('#siteModal').data('action');

    if (action === 'edit') {
        // Set input values in the edit modal form
        $('#selected_site_edit_' + $('#siteModal').data('site-id')).val(siteId);
        $('#selected_site_' + $('#siteModal').data('site-id')).val(site);
    } else {
        // Set input values in the create modal form
        $('#selected_site_id').val(siteId);
        $('#selected_site').val(site);
    }

    // Hide the modal after selecting a package
    $('#siteModal').modal('hide');
}

$(document).ready(function() {
    // Fungsi untuk membuka modal pemilihan pengguna dengan tindakan (edit atau create)
    function openSiteModal(action, siteId = null) {
        $('#siteModal').data('action', action);
        $('#siteModal').data('site-id', siteId); // Simpan ID karyawan untuk mode edit
        $('#siteModal').modal('show');
    }

    // Event handler untuk tombol "Cari Data Users" pada mode edit
    $('[data-action="edit"]').on('click', function() {
        // Dapatkan ID karyawan dari atribut data-karyawan-id pada tombol yang diklik
        var paketId = $(this).data('site-id');
        // Panggil fungsi openUserModal dengan tindakan edit dan ID karyawan
        openSiteModal('edit', paketId);
    });

    // Event handler untuk tombol "Cari Data Users" pada mode create
    $('[data-action="create"]').on('click', function() {
        // Panggil fungsi openUserModal dengan tindakan create
        openSiteModal('create');
    });

    // Fungsi untuk menangani pemilihan pengguna saat menggunakan tombol "pilih"
    $('[data-action="pilih"]').on('click', function() {
        var siteId = $(this).data('site-id');
        var site = $(this).data('site');
        var alamatsite = $(this).data('alamatsite');
        
        // Panggil fungsi pilih dengan data pengguna yang dipilih
        pilih(siteId, site, alamatsite);
    });
});
    

</script>
@endpush