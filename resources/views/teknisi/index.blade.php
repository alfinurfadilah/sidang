@extends('adminlte::page')
@section('title', 'Data Teknisi')
@section('content_header')
<h1 class="m-0 text-dark row justify-content-center">Data Teknisi</h1>
@stop
@section('content')
<style>
.center-heading {
    text-align: center;
}
</style>
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <!-- Form untuk menambahkan atau mengedit data -->
                <form id="form_teknisi" action="{{ route('teknisi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <button type="submit" class="btn btn-info mb-3">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="nama_teknisi">Nama Teknisi</label>
                                <input type="text" class="form-control @error('nama_teknisi') is-invalid @enderror" id="nama_teknisi" placeholder="Masukan Nama Teknisi" name="nama_teknisi" value="{{ old('nama_teknisi') }}">
                                @error('nama_teknisi')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="site">Site</label>
                                <div class="input-group">
                                    <input type="hidden" name="id_site" id="id_site" value="{{ old('id_site') }}">
                                    <input type="text" class="form-control @error('site') is-invalid @enderror" placeholder="Site" id="site" name="site" value="{{ old('site') }}" aria-describedby="cari" readonly>
                                    <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop">
                                        Cari Data Site
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="example2">
                        <thead class="center-heading">
                            <tr class="bg-info text-white" id="row_1">
                                <th>No.</th>
                                <th>Nama Teknisi</th>
                                <th>Site</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teknisi as $key => $tk)
                            <tr class="center-heading">
                                <td>{{$key+1}}</td>
                                <td>{{$tk->nama_teknisi}}</td>
                                <td>{{ optional($tk->fsite)->site }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm" onclick="showEditForm({{$tk->id}})">
                                        <i class="fa fa-pen" aria-label="Edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteTeknisi({{ $tk->id }})">
                                        <i class="fa fa-trash"></i> Delete
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
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            @foreach($site as $key => $as)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td id={{$key+1}}>{{$as->site}}</td>
                                <td id={{$key+1}}>{{$as->alamat_site}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs" onclick="pilih('{{$as->id}}', '{{$as->site}}')" data-bs-dismiss="modal">
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
@stop
@push('js')
<script>
$(document).ready(function() {
    $('#example2').DataTable({
        "responsive": true,
    });
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
};

function pilih(id, asite) {
    document.getElementById('id_site').value = id;
    document.getElementById('site').value = asite;
};

function showEditForm(id) {
    // Menyembunyikan semua form edit
    $('#edit-form').children().hide();
    // Menampilkan form edit yang sesuai dengan id yang diberikan
    $('#edit-form').show();
};

$(document).ready(function() {
    $('#form_teknisi').submit(function(event) {
        event.preventDefault(); // Mencegah form submit secara default
        var formData = $(this).serialize(); // Mengambil data form
        
        $.ajax({
            type: 'POST',
            url: '{{ route("teknisi.store") }}',
            data: formData,
            success: function(response) {
                console.log(response); // Debug response dari server
                alert('Data berhasil disimpan!'); // Tampilkan alert sukses
                
                // Perbarui tabel dengan data baru
                var tableBody = $('#example2 tbody'); // Ganti dengan selector yang sesuai untuk tabel Anda
                
                // Tambahkan baris baru untuk setiap entri data
                var number = $('#example2 tbody tr').length;
                var newNumber = number + 1;

                var row = '<tr class="center-heading">'+
                    '<td>' + newNumber + '</td>'+ // Menambah nomor urut baru
                    '<td>' + response.nama_teknisi + '</td>'+
                    '<td>' + response.site + '</td>'+
                    '<td><button type="button" class="btn btn-primary btn-sm" onclick="showEditForm(' + response.id + ')"><i class="fa fa-pen" aria-label="Edit"></i></button> <a href="#" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a></td>'+
                    '</tr>';
                tableBody.append(row);
            },

            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Debug error dari server
                alert('Terjadi kesalahan! Mohon coba lagi.'); // Tampilkan alert kesalahan
                // Lakukan operasi lain sesuai kebutuhan
            }
        });
    });
});



function deleteTeknisi(id) {
    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        $.ajax({
            url: '/teknisi/' + id, // Ganti dengan URL yang sesuai di controller Anda
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert('Data berhasil dihapus!');
                // Perbarui tabel setelah penghapusan berhasil
                removeTableRow(id);
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert('Terjadi kesalahan saat menghapus data!');
            }
        });
    }
}

function removeTableRow(id) {
    $('#row_1' + id).remove(); // Hapus baris tabel dengan ID yang sesuai
}

</script>

@endpush
