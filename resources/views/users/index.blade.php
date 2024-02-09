@extends('adminlte::page')

@section('title', 'List User')
@section('content_header')
<h1 class="m-0 text-dark"><mark>List User</mark></h1> @stop
@section('content')
<div class="row g-10">
    <div class="col-12">
        <div class="card mt-5">
            <div class="card-body">

                <!-- <a href="{{route('users.create')}}" class="btn btn btn-primary mb-2">
                <b aria-hidden="true"> Tambah </b> -->
                <button class="btn btn btn-info mb-2" aria-hidden="true" data-toggle="modal"
                    data-target="#staticBackdrop2" class="fa fa-plus mb-2"> Create New Data </button>

                </a>
                <table class="table	align-middle table-row-dashed vs-6 gy-5 " id="example2">
                    <thead>
                        <tr class="table-info">
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
                                <a href="{{route('users.edit', $user)}}" class="btn btn-danger btn-xs"><i
                                        class="fa fa-edit"> Edit </i></a>
                                <a href="{{route('users.destroy', $user)}}"
                                    onclick="notificationBeforeDelete(event, this)" class="btn btn-warning btn-xs"> <i
                                        class="fa fa-trash"> Delete </i></a>
                                </a>
                            </td>
                        </tr> @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- MODAL -->
<div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdrop2" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header">
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
                                                <option value="Admin" @if(old('divisi')=='Admin' )selected @endif>Admin
                                                </option>
                                                <option value="Noc" @if(old('divisi')=='Noc' )selected @endif>Noc
                                                </option>
                                                <option value="Teknisi" @if(old('divisi')=='Teknisi' )selected @endif>
                                                    Teknisi</option>
                                            </select>
                                            @error('divisi') <span class="textdanger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan
                                            </i></button>
                                        <a href="{{ route('users.index') }}" class="btn btn-warning"><i
                                                class="fa fa-times-circle"> Batal </i></button></a>

                                        </a>
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
