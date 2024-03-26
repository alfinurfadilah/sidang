@extends('adminlte::page')
@section('title', 'Report Survey')
@section('content_header')
<h1 class="m-0 text-dark row justify-content-center">Report Survey</h1>
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
                <h3 class="card-title">Form Report Survey</h3>
            </div>
            <div class="card-body">
                <div id="edit-forms">
                    @foreach ($reportsurvey as $sk => $item)
                        <form id="edit-form-{{$item->id}}" action="{{ route('reportsurvey.update', $item->id) }}"
                            method="post" enctype="multipart/form-data" style="display: none;">
                            @csrf
                            @method('PUT')
                            <!-- Tambahkan method PUT untuk update -->
                            <!-- Isi form edit di sini -->
                            <button type="submit" class="btn btn-info mb-3">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="{{ route('reportsurvey.index') }}" class="btn btn-danger mb-3">
                                <i class="fa fa-times-circle"></i> Batal
                            </a>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="Nama">Nama</label>
                                        <input type="text" class="form-control @error('Nama') is-invalid @enderror" name="nama"
                                            value="{{ $item->nama ?? old('nama') }}" id="Nama" readonly>
                                        @error('Nama') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                    <label for="site">Site</label>
                                    <div class="input-group">
                                        <input type="hidden" name="id_site" id="id_site" value="{{$fsite->site->id ?? old('id_site')}}">
                                        <input type="text" class="form-control @error('site') is-invalid @enderror" placeholder="site" id="site" name="site"
                                            value="{{ $item->site ? $fsite->site->site : (old('site') ?? '') }}" aria-label="Site" aria-describedby="cari">
                                        <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop">
                                            Cari Data Site
                                        </button>
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <label for="Tanggal_Survey">Tanggal_Survey</label>
                                        <input type="date" class="form-control @error('Tanggal_Survey') is-invalid @enderror" name="tanggal_survey"
                                            value="{{ $item->tanggal_survey ?? old('tanggal_survey') }}" id="Tanggal_Survey" readonly>
                                        @error('Tanggal_Survey') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="Waktu">Waktu</label>
                                        <input type="time" class="form-control @error('Waktu') is-invalid @enderror"
                                            id="waktu" placeholder="Masukkan Waktu" name="waktu"
                                            value="{{ $item->waktu ?? old('waktu') }}" readonly>
                                        @error('Waktu') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">

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



                                    <div class="form-group">
                                        <label for="hard_survey">Hard Survey</label>
                                        <input type="text" class="form-control @error('hard_survey') is-invalid @enderror"
                                            id="hard_survey" placeholder="Masukkan hard_survey" name="hard_survey"
                                            value="{{ $item->hard_survey ?? old('hard_survey') }}">
                                        @error('hard_survey') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control @error('status') is-invalid @enderror" id="status"
                                            name="status" >
                                            <option value="--pilih--" @if(old('status')=='--pilih--' )selected @endif>--pilih--</option>
                                            <option value="Bisa Dipasang" @if(old('status')=='BisaDipasang' )selected @endif>Bisa Dipasang</option>
                                            <option value="Tidak Bisa Dipasang" @if(old('status')=='TidakBisaDipasang' )selected @endif>Tidak Bisa Dipasang</option>
                                        
                                        </select>
                                        @error('divisi') <span class="text-danger">{{ $message }}</span> @enderror
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
                                <th>Tanggal Survey</th>
                                <th>Waktu</th>
                                <th>Nama Teknisi</th>
                                <th>Hard Survey</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reportsurvey as $sk => $item)
                                <tr class="center-heading">
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{ optional($item->fsite)->site }}</td>
                                    <td>{{$item->tanggal_survey}}</td>
                                    <td>{{$item->waktu}}</td>
                                    <td>
                                        @foreach ($item->teknisis as $teknisi)
                                            {{ $teknisi->nama_teknisi }}
                                            @if (!$loop->last)
                                                , <!-- Tambahkan koma jika bukan teknisi terakhir -->
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$item->hard_survey}}</td>
                                    <td>{{$item->status}}</td>
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
