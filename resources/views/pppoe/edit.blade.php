@extends('adminlte::page')
@section('title', 'Edit PPPoE User')
@section('content_header')
@stop
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2>Form Edit</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">PPPoE</li>
                        <li class="breadcrumb-item active">{{ $user['name'] ?? ''}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="mx-auto"> <!-- Tambahkan kelas mx-auto di sini -->
                <form action="{{ route('pppoe.update')}}" method="POST">
                    @csrf
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Edit Information</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <!-- Left column form inputs -->
                                    <div class="form-group">
                                        <label for="user">Username</label>
                                        <input type="hidden" value="{{ $user['.id'] }}" name="id">
                                        <input type="text" name="user" class="form-control" value="{{ $user['name'] ?? ''}}" id="user" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" name="password" class="form-control" value="{{ $user['password'] ?? '' }}" id="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="service">Service</label>
                                        <select name="service" id="service" class="form-select" required>
                                            <option disabled selected>--Select Service--</option>
                                            <option value="{{ $user['service'] }}" selected>{{ $user['service'] }}</option>
                                            <option value="any">ANY</option>
                                            <option value="async">ASYNC</option>
                                            <option value="pppoe">PPPoE</option>
                                            <option value="pptp">PPTP</option>
                                            <option value="sstp">SSTP</option>
                                            <option value="l2tp">L2TP</option>
                                            <option value="ovpn">OVPN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="profile">Profile</label>
                                        <select name="profile" id="profile" class="form-select">
                                            <option disabled selected>--Select Profile--</option>
                                            <option value="{{ $user['profile'] }}" selected>{{ $user['profile'] }}</option>
                                            @foreach ($profile as $data)
                                                <option>{{ $data['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- Right column form inputs -->
                                    <div class="form-group">
                                        <label for="localaddress">Local Address</label>
                                        <input type="text" name="localaddress" value="{{ $user['local-address'] ?? '' }}" class="form-control" id="localaddress">
                                    </div>
                                    <div class="form-group">
                                        <label for="remoteaddress">Remote Address</label>
                                        <input type="text" name="remoteaddress" class="form-control" value="{{ $user['remote-address'] ?? '' }}" id="remoteaddress">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="disabled">Status</label>
                                        <select name="disabled" id="disabled" class="form-select">
                                            <option disabled selected>--Select Status--</option>
                                            @if ($user['disabled'] == "false")
                                                <option value="true">Disable</option>
                                                <option value="false" selected>Enable</option>
                                            @elseif($user['disabled'] == "true")
                                                <option value="true" selected>Disable</option>
                                                <option value="false">Enable</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Comment</label>
                                        <input type="text" name="comment" class="form-control" value="{{ $user['comment'] ?? '' }}" id="comment">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{route('pppoe.secret')}}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
