@extends('adminlte::page')
@section('title', 'Jadwal Pemasangan')
@section('content_header')
<h1 class="m-0 text-dark"><mark>Jadwal Pemasangan</mark></h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <a href="{{route('jadwalpemasangan.create')}}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Jadwal Pemasangan</a> -->
                <table class="table table-hover table-bordered table-stripped table-responsive table-rounded" id="example2">
                    <thead>
                        <tr class="table-info">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Nomor Handphone</th>
                            <th>Nama Paket</th>
                            <th>Alamat Pemasangan</th>
                            <th>Tanggal Pemasangan</th>
                            <th>Waktu Selesai Survey</th>
                            <th>Titik Kordinat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwalpemasangan as $sk => $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->nomor_handphone}}</td>
                            <td>{{$item->nama_paket}}</td>
                            <td>{{$item->alamat_pemasangan}}</td>
                            <td>{{$item->tanggal_pemasangan}}</td>
                            <td>{{$item->waktu}}</td>
                            <td>{{$item->titik_kordinat}}</td>
                            <td>
                                <button class="btn btn-danger mb-2" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop2{{$item->id}}" data-id="{{$item->id}}">
                                    <i class="fa fa-pen"></i> Edit
                                </button>
                                <a href="{{route('jadwalpemasangan.destroy', $item)}}" onclick="notificationBeforeDelete(event, this)"
                                    class="btn btn-warning btn-xs"> <i class="fa fa-trash"> Delete </i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@foreach($jadwalsurvey as $key => $item)
<!-- Modal -->
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdrop1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header bg-info"> <!-- Perbaiki tanda kutip di sini -->
                <h1 class="modal-title fs-5" id="staticBackdrop1">Pencarian data jadwalsurvey</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered table-stripped" id="example1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>nama</th>
                            <th>nomor_handphone</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwalsurvey as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td id={{$key+1}}>{{$item->nama}}</td>
                            <td id={{$key+1}}>{{$item->nomor_handphone}}</td>
                            <td>
                                <button type="button" class="btn btn-danger btn-xs"
                                    onclick="pilih1('{{ $item->id }}','{{ $item->nama }}','{{ $item->nomor_handphone }}')"
                                    data-bs-dismiss="modal">Pilih</button>
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
@endforeach

@foreach($jadwalpemasangan as $key => $item)
<div class="modal fade" id="staticBackdrop2{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="modalTitle{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h1 class="modal-title fs-5" id="modalTitle{{$item->id}}">Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered table-stripped" id="example2">

                    <form action="{{ route('jadwalpemasangan.update', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Tambahkan method PUT untuk update -->

                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control @error('Nama') is-invalid @enderror" name="nama"
                                value="{{ $item->nama ?? old('nama') }}" id="Nama" readonly>
                            @error('Nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="nomor_handphone">Nomor_Handphone</label>
                            <div class="input-group">
                                <input type="hidden" name="id_jadwalsurvey" id="id_jadwalsurvey"
                                    value="{{ old('id_jadwalsurvey') }}">
                                <input type="text"
                                    class="form-control @error('nomor_handphone') is-invalid @enderror"
                                    placeholder="nomor-handphone" id="nomor_handphone" name="nomor_handphone"
                                    value="{{ old('nomor_handphone') }}" aria-label="nomor_handphone"
                                    aria-describedby="cari" readonly>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                    data-bs-target="#staticBackdrop1"><i class="fa fa-search"> Cari Nomor
                                        Handphone</i></button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Nama_Paket">Nama_Paket</label>
                            <select class="form-control @error('Nama_Paket') is-invalid @enderror" id="Nama_Paket"
                                name="nama_paket">
                                <option value="ALPHA" @if(old('Nama_Paket')=='ALPHA' )selected @endif>ALPHA</option>
                                <option value="BETA" @if(old('Nama_Paket')=='BETA' )selected @endif>BETA</option>
                                <option value="GAMMA" @if(old('Nama_Paket')=='GAMMA' )selected @endif>GAMMA</option>
                                <option value="KENDA" @if(old('Nama_Paket')=='KENDA' )selected @endif>KENDA</option>
                                <option value="SELESA" @if(old('Nama_Paket')=='SELESA' )selected @endif>SELESA</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="Alamat_Pemasangan">Alamat_Pemasangan</label>
                            <input type="text"
                                class="form-control @error('Alamat_Pemasangan') is-invalid @enderror"
                                name="alamat_pemasangan"
                                value="{{ $item->alamat_pemasangan ?? old('alamat_pemasangan') }}"
                                id="Alamat_Pemasangan">
                            @error('Alamat_Pemasangan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Tanggal_Pemasangan">Tanggal_Pemasangan</label>
                            <input type="date"
                                class="form-control @error('Tanggal_Pemasangan') is-invalid @enderror"
                                name="tanggal_pemasangan"
                                value="{{ $item->tanggal_pemasangan?? old('tanggal_pemasangan') }}"
                                id="Tanggal_Pemasangan">
                            @error('Tanggal_Pemasangan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Waktu">Waktu</label>
                            <input type="time" class="form-control @error('Waktu') is-invalid @enderror"
                                id="waktu" placeholder="Masukkan Waktu" name="waktu"
                                value="{{ $item->waktu ?? old('waktu') }}">
                            @error('Waktu') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Titik_Kordinat">Titik_Kordinat</label>
                            <input type="text"
                                class="form-control @error('Titik_Kordinat') is-invalid @enderror"
                                name="titik_kordinat"
                                value="{{ $item->titik_kordinat ?? old('titik_kordinat') }}" id="Titik_Kordinat">
                            @error('Titik_Kordinat') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <!-- ... (lanjutkan dengan field lainnya) -->

                        <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan </i></button>
                        <a href="{{ route('jadwalpemasangan.index') }}" class="btn btn-warning"><i
                                class="fa fa-times-circle"> Batal </i></button></a>
                    </form>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>

<script>
    $('#example1').DataTable({
        "responsive": true,
    });

    function pilih1(id, nama, nomor_handphone) {
        document.getElementById('id_jadwalsurvey').value = id
        document.getElementById('nomor_handphone').value = nomor_handphone
    }

</script>
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

</script>
@endpush