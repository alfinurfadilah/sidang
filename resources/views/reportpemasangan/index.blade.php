@extends('adminlte::page')
@section('title', 'Report Pemasangan')
@section('content_header')
<h1 class="m-0 text-dark row justify-content-center">Report Pemasangan</h1>
@stop
@section('content')
<style>
.center-heading {
    text-align: center;
}
</style>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Form Report Pemasangan</h3>
            </div>
            <div class="card-body">
                <div id="edit-forms">
                    @foreach ($reportpemasangan as $sk => $item)
                    <form id="edit-form-{{$item->id}}" action="{{ route('reportpemasangan.update', $item->id) }}"
                        method="post" enctype="multipart/form-data" style="display: none;">
                        @csrf
                        @method('PUT')
                        <!-- Tambahkan method PUT untuk update -->
                        <!-- Isi form edit di sini -->

                        <button type="submit" class="btn btn-info mb-3">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('reportpemasangan.index') }}" class="btn btn-danger mb-3">
                            <i class="fa fa-times-circle"></i> Batal
                        </a>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" value="{{ $item->nama ?? old('nama') }}" id="nama" readonly>
                                    @error('nama') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="site">Site</label>
                                    <div class="input-group">
                                        <input type="hidden" name="id_site" id="id_site" value="{{$fsite->site->id ?? old('id_site')}}">
                                        <input type="text" class="form-control @error('site') is-invalid @enderror" placeholder="site" id="site" name="site"
                                            value="{{ $item->site ? $fsite->site->site : (old('site') ?? '') }}" aria-label="Site" aria-describedby="cari" readonly>
                                        <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop">
                                            Cari Data Site
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_pemasangan">Tanggal Pemasangan</label>
                                    <input type="date"
                                        class="form-control @error('tanggal_pemasangan') is-invalid @enderror"
                                        name="tanggal_pemasangan"
                                        value="{{ $item->tanggal_pemasangan ?? old('tanggal_pemasangan') }}"
                                        id="tanggal_pemasangan" readonly>
                                    @error('tanggal_pemasangan') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="waktu">Waktu</label>
                                    <input type="text" class="form-control @error('waktu') is-invalid @enderror"
                                        id="waktu" placeholder="Masukkan waktu" name="waktu"
                                        value="{{ $item->waktu ?? old('waktu') }}" readonly>
                                    @error('waktu') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_teknisi">Nama Teknisi</label>
                                    <input type="text" class="form-control @error('nama_teknisi') is-invalid @enderror"
                                        id="nama_teknisi" placeholder="Masukkan nama teknisi" name="nama_teknisi"
                                        value="{{ $item->nama_teknisi ?? old('nama_teknisi') }}">
                                    @error('nama_teknisi') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">


                                <div class="form-group">
                                    <label for="hasil_redaman">Hasil Redaman</label>
                                    <input type="text" class="form-control @error('hasil_redaman') is-invalid @enderror"
                                        id="hasil_redaman" placeholder="Masukkan hasil redaman" name="hasil_redaman"
                                        value="{{ $item->hasil_redaman ?? old('hasil_redaman') }}">
                                    @error('hasil_redaman') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kebutuhan_Access_Point">Kebutuhan Access Point</label>
                                    <input type="number"
                                        class="form-control @error('kebutuhan_Access_Point') is-invalid @enderror"
                                        id="kebutuhan_Access_Point" placeholder="Masukkan jumlah AP yang digunakan"
                                        name="kebutuhan_Access_Point"
                                        value="{{ $item->kebutuhan_Access_Point ?? old('kebutuhan_Access_Point') }}">
                                    @error('kebutuhan_Access_Point') <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="SN_Access_Point">SN Access Point</label>
                                    <input type="text"
                                        class="form-control @error('SN_Access_Point') is-invalid @enderror"
                                        id="SN_Access_Point" placeholder="Masukkan Serial Number AP"
                                        name="SN_Access_Point"
                                        value="{{ $item->SN_Access_Point ?? old('SN_Access_Point') }}">
                                    @error('SN_Access_Point') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kebutuhan_HTB">Kebutuhan HTB</label>
                                    <input type="number"
                                        class="form-control @error('kebutuhan_HTB') is-invalid @enderror"
                                        id="kebutuhan_HTB" placeholder="Masukkan jumlah htb yang digunakan"
                                        name="kebutuhan_HTB" value="{{ $item->kebutuhan_HTB ?? old('kebutuhan_HTB') }}">
                                    @error('kebutuhan_HTB') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="status_pemasangan">Status Pemasangan</label>
                                    <select class="form-control @error('status_pemasangan') is-invalid @enderror"
                                        id="status_pemasangan" name="status_pemasangan">
                                        <option value="--pilih--" @if(old('status_pemasangan')=='--pilih--' )selected
                                            @endif>--pilih--</option>
                                        <option value="Bisa Dipasang" @if(old('status_pemasangan')=='Bisa Dipasang'
                                            )selected @endif>Bisa Dipasang</option>
                                        <option value="Tidak Bisa Dipasang"
                                            @if(old('status_pemasangan')=='Tidak Bisa Dipasang' )selected @endif>Tidak
                                            Bisa Dipasang</option>
                                    </select>
                                    @error('status_pemasangan') <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                                <th>Tanggal Pemasangan</th>
                                <th>Waktu</th>
                                <th>Nama Teknisi</th>
                                <th>Hasil Redaman</th>
                                <th>Status Pemasangan</th>
                                <th>Kebutuhan Access Point </th>
                                <th>Kebutuhan HTB</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reportpemasangan as $sk => $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{ optional($item->fsite)->site }}</td> <!-- Menggunakan optional() untuk menghindari kesalahan jika relasi null -->                                <td>{{$item->tanggal_pemasangan}}</td>
                                <td>{{$item->waktu}}</td>
                                <td>{{$item->nama_teknisi}}</td>
                                <td>{{$item->hasil_redaman}}</td>
                                <td>{{$item->status_pemasangan}}</td>
                                <td>{{$item->kebutuhan_Access_Point}} {{$item->SN_Access_Point}}</td>
                                <td>{{$item->kebutuhan_HTB}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm"
                                        onclick="showEditForm({{$item->id}})">
                                        <i class="fa fa-pen" aria-label="Edit"></i>
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
                        @foreach($site as $key => $as)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td id={{$key+1}}>{{$as->site}}</td>
                            <td id={{$key+1}}>{{$as->alamat_site}}</td>
                            <td>
                                <button type="button" class="btn btn-primary 
btn-xs" onclick="pilih('{{$as->id}}', '{{$as->site}}')" data-bs-dismiss="modal">
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
    $('#edit-forms').children().hide();
    // Menampilkan form edit yang sesuai dengan id yang diberikan
    $('#edit-form-' + id).show();
};
</script>
@endpush
