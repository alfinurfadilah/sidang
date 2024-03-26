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
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('teknisi') is-invalid @enderror" placeholder="Masukan Teknisi" id="nama_teknisi" name="nama_teknisi" value="{{ $item->teknisis->implode('nama_teknisi', ', ') }}" aria-label="teknisi" aria-describedby="cari">
                                        <input type="hidden" name="id_teknisi" id="id_teknisi" value="{{ $item->teknisis->pluck('id')->implode(',') }}">
                                        <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop1">
                                            Cari Data Teknisi
                                        </button>
                                    </div>
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
                            <tr class="center-heading">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->nama}}</td>
                                <td>{{ optional($item->fsite)->site }}</td> <!-- Menggunakan optional() untuk menghindari kesalahan jika relasi null -->                                <td>{{$item->tanggal_pemasangan}}</td>
                                <td>{{$item->waktu}}</td>
                                <td>
                                    @foreach ($item->teknisis as $teknisi)
                                        {{ $teknisi->nama_teknisi }}
                                        @if (!$loop->last)
                                            , <!-- Tambahkan koma jika bukan teknisi terakhir -->
                                        @endif
                                    @endforeach
                                </td>
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
<!-- Modal Data Site -->
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
                            @foreach($site as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td id="site{{$key+1}}">{{$item->site}}</td>
                                <td id="alamat_site{{$key+1}}">{{$item->alamat_site}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-xs" onclick="pilihSite('{{$item->id}}', '{{$item->site}}')" data-bs-dismiss="modal">
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
<!-- Modal Data Teknisi -->
<div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Pencarian Data Teknisi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped" id="example">
                        <thead class="center-heading">
                            <tr class="bg-info text-white">
                                <th>No.</th>
                                <th>Nama Teknisi</th>
                                <th>Site</th>
                                <th>Pilih</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teknisis as $key => $tk)
                            <tr class="center-heading">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$tk->nama_teknisi}}</td> <!-- Menggunakan atribut nama_teknisi dari objek teknisi -->
                                <td>{{$tk->site}}</td>
                                <td>
                                    <input type="checkbox" class="pilih-teknisi" data-id="{{$tk->id}}" data-nama="{{$tk->nama_teknisi}}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="pilih-teknisi">Pilih</button>
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
            "responsive": true,
        });
    });
    $(document).ready(function() {
        $('#example').DataTable({
            "responsive": true,
        });
    });

    $(document).ready(function() {
    $('#pilih-teknisi').click(function() {
        var selectedTeknisi = [];
        $('.pilih-teknisi:checked').each(function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            selectedTeknisi.push({ id: id, nama: nama });
        });

        // Menyiapkan teks yang akan ditampilkan di field nama teknisi
        var namaTeknisi = selectedTeknisi.map(function(teknisi) {
            return teknisi.nama;
        }).join(', ');

        // Mengisi field nama teknisi pada form edit dengan nama teknisi yang dipilih
        $('#nama_teknisi').val(namaTeknisi);

        // Mengisi field id teknisi pada form edit dengan id teknisi yang dipilih
        var idTeknisi = selectedTeknisi.map(function(teknisi) {
            return teknisi.id;
        }).join(',');
        $('#id_teknisi').val(idTeknisi);

        // Menutup modal setelah data dipilih
        $('#staticBackdrop1').modal('hide');
    });
});


    
    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    };

    function pilihSite(id, asite) {
        document.getElementById('id_site').value = id;
        document.getElementById('site').value = asite;
    };

    // function pilihTeknisi(id, ateknisi) {
    //     document.getElementById('id_teknisi').value = id;
    //     document.getElementById('nama_teknisi').value = ateknisi;
    // };

    function showEditForm(id) {
        // Menyembunyikan semua form edit
        $('#edit-forms').children().hide();
        // Menampilkan form edit yang sesuai dengan id yang diberikan
        $('#edit-form-' + id).show();
    };
</script>
@endpush
