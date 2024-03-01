@extends('adminlte::page')
@section('title', 'Data Teknisi')
@section('content_header')
<div style="text-align:center;">
    <h1 class="m-0 text-dark">Data Teknisi</h1>
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
                            <tr class="bg-info text-white">
                                <th>No.</th>
                                <th>Nama_Teknisi</th>
                                <th>Site</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teknisi as $key => $tk)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$tk->Nama_Teknisi}}</td>
                                <td>{{$tk->Site}}</td>
                                <td>{{$tk->fsite->id_site}}</td>
                                <td class="center-heading">
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop3{{$tk->id}}" data-id="{{$tk->id}}">
                                        <i class="fa fa-pen"></i> Edit
                                    </button>
                                    <a href="{{route('teknisi.destroy', $tk)}}" onclick="notificationBeforeDelete(event, this)"
                                        class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Delete
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


<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdrop2" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <!-- Perbaiki tanda kutip di sini -->
                <h1 class="modal-title fs-5" id="staticBackdrop2">Input Data Teknisi</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered table-stripped" id="example2">

                    <form action="{{ route('teknisi.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="Nama_Teknisi">Nama Teknisi</label>
                                <input type="text" class="form-control
@error('Nama_Teknisi') is-invalid @enderror" id="Nama_Teknisi" placeholder="Masukan Nama Teknisi" name="Nama_Teknisi" value="{{ old('Nama_Teknisi') }}">
                                @error('Nama_Teknisi')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="selected_site">Site</label>
                                <div class="input-group">
                                    <input type="hidden" name="id_site" id="selected_site_id" value="{{ old('id_site') }}">
                                    <input type="text" class="form-control border @error('id_site') is-invalid @enderror" placeholder="Site" id="selected_site" name="selected_site" value="{{ old('selected_site') }}" aria-label="site" aria-describedby="cari" readonly>
                                    <button type="button" class="btn btn-warning" data-action="create"><i class="fa fa-search"> Cari Data Site</i></button>
                                </div>

                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-danger btn-save"><i class="fas fa-save"> Simpan
                                    </i></button>
                                <a href="{{ route('teknisi.index') }}"
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

        // Search button functionality
        


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