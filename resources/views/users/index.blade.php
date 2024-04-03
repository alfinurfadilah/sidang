@extends('adminlte::page')
@section('title', 'Data User')
@section('content_header')
<div style="text-align:center;">
    <h1 class="m-0 text-dark" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 36px; color: #3366ff; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);">Data User</h1>
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
    
</style>
<div class="row justify-content-center">
    <div class="col-md-10 table-container">
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
                            <th>Email</th>
                            <th>Divisi</th>
                            <th>Aktif</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($users as $key => $user)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->divisi}}</td>
                            <td>{{$user->aktif}}</td>
                            <td>
                            <button class="btn btn-edit btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop3{{$user->id}}" data-id="{{$user->id}}">
                                        <i class="fa fa-pen"></i> Edit
                                    </button>
                                    <a href="{{route('users.destroy', $user)}}" onclick="notificationBeforeDelete(event, this)"
                                        class="btn btn-delete btn-sm">
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
</div>
<!-- MODAL -->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdrop2" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
        <div class="modal-header bg-info">
                <h1 class="modal-title fs-5" id="staticBackdrop2">Tambah Data User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <form action="{{route('users.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputName">Nama</label>
                                            <input type="text" class="form-control
    @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="name"
                                                value="{{old('name')}}">
                                            @error('name') <span class="textdanger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail">Email
                                                address</label>
                                            <input type="email" class="form-control
    @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email"
                                                value="{{old('email')}}">
                                            @error('email') <span class="textdanger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword">Password</label>
                                            <input type="password" class="form-control
    @error('password') is-invalid @enderror" id="exampleInputPassword" placeholder="Password" name="password">
                                            @error('password') <span class="textdanger">{{$message}}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword">Konfirmasi
                                                Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword"
                                                placeholder="Konfirmasi Password" name="password_confirmation">
                                        </div>
                                        <div class="form-group">
                                            <label for="divisi">Divisi</label>
                                            <select class="form-control @error('divisi') isinvalid @enderror"
                                                id="divisi" name="divisi">
                                                <option value="Admin" @if(old('divisi')=='Admin' )selected @endif>Admin</option>
                                                <option value="Noc" @if(old('divisi')=='Noc' )selected @endif>Noc</option>
                                                <option value="Teknisi" @if(old('divisi')=='Teknisi' )selected @endif>Teknisi</option>
                                            </select>
                                            @error('divisi') <span class="textdanger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="card-footer btn-container">
                        <button type="submit" class="btn btn- btn-save"><i class="fas fa-save"> Simpan </i></button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-cancel"><i class="fa fa-times-circle"> Batal </i></a>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                    
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

                        <form action="" id="delete-form" method="post"> @method('delete')
                            @csrf
                        </form>
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

                        </script> @endpush
