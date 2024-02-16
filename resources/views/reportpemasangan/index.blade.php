@extends('adminlte::page')
@section('title', 'Report Pemasangan')
@section('content_header')
    <h1 class="m-0 text-dark"><mark>Report Pemasangan</mark></h1>
@stop
@section('content')
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('reportpemasangan.create')}}" >
                <i aria-hidden="true">  </i></a>
                <table class="table table-hover table-bordered table-stripped table-responsive table-rounded" id="example2">
                    <thead>
                    <tr class="table-info">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Site</th>
                    <th>Tanggal Pemasangan</th>
                    <th>Waktu</th>
                    <th>Nama Teknisi</th>
                    <th>Hasil Redaman</th>
                    <th>Status Pemasangan</th>
                    <th>Kebutuhan Access Point </th>
                    <!-- <th>SN Access Point</th> -->
                    <th>Kebutuhan HTB</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reportpemasangan as $sk => $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->site}}</td>
                    <td>{{$item->tanggal_pemasangan}}</td>
                    <td>{{$item->waktu}}</td>
                    <td>{{$item->nama_teknisi}}</td>
                    <td>{{$item->hasil_redaman}}</td>
                    <td>{{$item->status_pemasangan}}</td>
                    <td>{{$item->kebutuhan_Access_Point}} {{$item->SN_Access_Point}}</td>
                    <!-- <td>{{$item->SN_Access_Point}}</td> -->
                    <td>{{$item->kebutuhan_HTB}}</td>
                    <td>
                            <button class="btn btn-info btn-xs  mb-2" aria-hidden="true" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop2{{$item->id}}" data-id="{{$item->id}}">
                                    <i class="fa fa-pen" arial-label="Edit"></i></button>
                                <a href="{{route('reportpemasangan.destroy', $item)}}"
                                    onclick="notificationBeforeDelete(event, this)"
                                    class="btn btn-danger btn-xs mb-2"> <i class="fa fa-trash" arial-label="Delete"></i></a>
                                    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@foreach($reportpemasangan as $key => $item)
<div class="modal fade" id="staticBackdrop2{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="modalTitle{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header bg-info>
            <h1 class="modal-title fs-5" id="modalTitle{{$item->id}}">Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered table-stripped" id="example2">

                    <form action="{{ route('reportpemasangan.update', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Tambahkan method PUT untuk update -->

                        
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                value="{{ $item->nama ?? old('nama') }}" id="nama" readonly>
                            @error('Nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="site">Site</label>
                            <input type="text" class="form-control @error('site') is-invalid @enderror" name="site"
                                value="{{ $item->site ?? old('site') }}" id="site">
                            @error('Site') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="tanggal_pemasangan">Tanggal Pemasangan</label>
                            <input type="date" class="form-control @error('Tanggal_Pemasangan') is-invalid @enderror" name="tanggal_pemasangan"
                                value="{{ $item->tanggal_pemasangan ?? old('tanggal_pemasangan') }}" id="tanggal_pemasangan">
                            @error('Tanggal_Pemasangan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="waktu">Waktu</label>
                            <input type="text" class="form-control @error('waktu') is-invalid @enderror"
                                id="waktu" placeholder="Masukkan waktu" name="waktu"
                                value="{{ $item->waktu ?? old('waktu') }}">
                            @error('Waktu') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- ... (lanjutkan dengan field lainnya) -->

                        <div class="form-group">
                            <label for="nama_teknisi">Nama_Teknisi</label>
                            <input type="text" class="form-control @error('Nama_Teknisi') is-invalid @enderror"
                                id="nama_teknisi" placeholder="Masukkan nama_teknisi" name="nama_teknisi"
                                value="{{ $item->nama_teknisi ?? old('nama_teknisi') }}">
                            @error('Nama_Teknisi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="hasil_redaman">Hasil Redaman</label>
                            <input type="text" class="form-control @error('hasil_redaman') is-invalid @enderror"
                                id="hasil_redaman" placeholder="Masukkan hasil_redaman" name="hasil_redaman"
                                value="{{ $item->hasil_redaman ?? old('hasil_redaman') }}">
                            @error('hasil_redaman') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                            <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="kebutuhan_Access_Point">Kebutuhan Access Point</label>
                                    <input type="number" class="form-control @error('kebutuhan_Access_Point') is-invalid @enderror"
                                        id="kebutuhan_Access_Point" placeholder="Masukkan jumlah AP yang digunakan" name="kebutuhan_Access_Point"
                                        value="{{ $item->kebutuhan_Access_Point ?? old('kebutuhan_Access_Point') }}">
                                    @error('kebutuhan_Access_Point') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="SN_Access_Point">SN Access Point</label>
                                    <input type="text" class="form-control @error('SN_Access_Point') is-invalid @enderror"
                                        id="SN_Access_Point" placeholder="Masukkan Serial Number AP" name="SN_Access_Point"
                                        value="{{ $item->SN_Access_Point ?? old('SN_Access_Point') }}">
                                    @error('SN_Access_Point') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="kebutuhan_HTB">Kebutuhan HTB</label>
                            <input type="number" class="form-control @error('kebutuhan_HTB') is-invalid @enderror"
                                id="kebutuhan_HTB" placeholder="Masukkan jumlah htb yang digunakan" name="kebutuhan_HTB"
                                value="{{ $item->kebutuhan_HTB ?? old('kebutuhan_HTB') }}">
                            @error('Kebutuhan HTB') <span class="text-danger">{{ $message }}</span> @enderror
</div>

                        <div class="form-group">
                        <label for="status_pemasangan">Status Pemasangan</label>
                        <select class="form-control @error('status') isinvalid @enderror" id="status_pemasangan"
                            name="status_pemasangan" >
                            <option value="--pilih--" @if(old('status')=='--pilih--' )selected @endif>--pilih--</option>
                            <option value="Bisa Dipasang" @if(old('status')=='BisaDipasang' )selected @endif>Bisa Dipasang</option>
                            <option value="Tidak Bisa Dipasang" @if(old('status')=='TidakBisaDipasang' )selected @endif>Tidak Bisa Dipasang</option>
                           
                        </select>
                        @error('divisi') <span class="textdanger">{{$message}}</span> @enderror
                    </div>


                        <!-- ... (lanjutkan dengan field lainnya) -->

                        

                        <button type="submit" class="btn btn-danger">
        <i class="fas fa-save"></i> Simpan
    </button>
</form>

<a href="{{ route('reportpemasangan.index') }}" class="btn btn-warning">
    <i class="fa fa-times-circle"></i> Batal
</a>
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