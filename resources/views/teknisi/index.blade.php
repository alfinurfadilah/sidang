@extends('adminlte::page')
@section('title', 'Data Teknisi')
@section('content_header')
<div style="text-align:center;">
    <h1 class="m-0 text-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 36px; color: #3366ff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);">Data Teknisi</h1>
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


    .btn-edit,
.btn-delete {
    border-radius: 20px; /* Atur nilai border-radius sesuai dengan keinginan Anda */
}

.btn-edit:hover,
.btn-delete:hover {
    transform: scale(1.05); /* Efek scaling pada hover */
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

.modal-content {
    border-radius: 20px !important; /* Gunakan !important untuk meningkatkan spesifisitas */
}

</style>

<div class="row justify-content-center">
    <div class="col-md-10 table-container">
        <div class="card">
            <div class="card-body">
                <!-- Form untuk menambahkan atau mengedit data -->
                <form id="form_teknisi" action="{{ route('teknisi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-footer btn-container">
                                <button type="submit" class="btn btn-danger btn-save"><i class="fas fa-save"> Simpan
                                    </i></button>
                                <a href="{{ route('teknisi.index') }}"
                                    class="btn btn-secondary btn-cancel"><i class="fa fa-times-circle"> Batal </i></a>
                            </div>
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
                                <td>{{$tk->site }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm btn-edit" onclick="showEditForm({{$tk->id}})">
                                     <i class="fa fa-pen"></i> Edit
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm btn-delete" onclick="deleteTeknisi({{ $tk->id }})">
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
                                   <!-- Button "Pilih" -->
                                <button type="button" class="btn btn-warning btn-xs btn-pilih" onclick="pilih('{{$as->id}}', '{{$as->site}}')" data-bs-dismiss="modal">
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
