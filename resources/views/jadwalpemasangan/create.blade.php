@extends('adminlte::page')
@section('title', 'Tambah Jadwal Pemasangan')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Jadwal Pemasangan</h1>
@stop
@section('content')
<form action="{{ route('jadwalpemasangan.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">nama</label>
                        <div class="input-group">
                            <input type="hidden" name="id_reportsurvey" id="id_reportsurvey"
                                value="{{ old('id_reportsurvey') }}">
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                placeholder="nama" id="nama" name="nama"
                                value="{{ old('nama') }}" aria-label="nama" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop1"><i class="fa fa-search"> Cari Nama</i></i></button>
                        </div>

                        <div class="form-group">
                    <label for="nomor_handphone">nomor_handphone</label>
                        <div class="input-group">
                            <input type="hidden" name="id_jadwalsurvey" id="id_jadwalsurvey"
                                value="{{ old('id_jadwalsurvey') }}">
                            <input type="text" class="form-control @error('nomor_handphone') is-invalid @enderror"
                                placeholder="nomor-handphone" id="nomor_handphone" name="nomor_handphone"
                                value="{{ old('nomor_handphone') }}" aria-label="nomor_handphone" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop2"><i class="fa fa-search"> Cari Nomor Handphone</i></i></button>
                        </div>
                
                    <div class="form-group">
                        <label for="nama_paket">nama_paket</label>
                        <input type="text" class="form-control
@error('nama_paket') is-invalid @enderror" id="nama_paket" placeholder="Masukkan nama paket" name="nama_paket"
                            value="{{ old('nama_paket') }}">
                        @error('nama_paket')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                   
                    <div class="form-group">
                    <label for="alamat_pemasangan">alamat_pemasangan</label>
                        <div class="input-group">
                            <input type="hidden" name="id_jadwalsurvey" id="id_jadwalsurvey"
                                value="{{ old('id_jadwalsurvey') }}">
                            <input type="text" class="form-control @error('alamat_pemasangan') is-invalid @enderror"
                                placeholder="alamat_pemasangan" id="alamat_pemasangan" name="alamat_pemasangan"
                                value="{{ old('alamat_pemasangan') }}" aria-label="alamat_pemasangan" aria-describedby="cari" readonly>
                            <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari"
                                data-bs-target="#staticBackdrop3"><i class="fa fa-search"> Cari alamat pemasangan</i></i></button>
                        </div>
</div>

                    <div class="form-group">
                        <label for="tanggal_pemasangan">tanggal_pemasangan</label>
                        <input type="text" class="form-control
@error('tanggal_pemasangan') is-invalid @enderror" id="tanggal_pemasangan" placeholder="Masukkan tanggal_pemasangan" name="tanggal_pemasangan"
                            value="{{ old('tanggal_pemasangan') }}">
                        @error('tanggal_pemasangan')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="waktu">waktu</label>
                        <input type="text" class="form-control
@error('waktu') is-invalid @enderror" id="waktu" placeholder="Masukkan waktu pemasangan" name="waktu"
                            value="{{ old('waktu') }}">
                        @error('waktu')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="titik_kordinat">titik_kordinat</label>
                        <input type="text" class="form-control
@error('titik_kordinat') is-invalid @enderror" id="titik_kordinat" placeholder="Masukkan Titik Kordinat" name="titik_kordinat"
                            value="{{ old('titik_kordinat') }}">
                        @error('titik_kordinat')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                        <a href="{{ route('jadwalpemasangan.create') }}"><button type="submit"
                                    class="btn btn-danger"><i class="fas fa-save"> Simpan </i></button>
                            <a href="{{ route('jadwalpemasangan.index') }}" class="btn btn-warning"><i class="fa fa-times-circle"> Batal </i>
                                    </button></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropl" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropl">Pencarian Data ReportSurvey</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered table-stripped" id="example1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>nama</th>
                                        <th>status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reportsurvey as $key => $reportsurvey)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td id={{$key+1}}>{{$reportsurvey->nama}}</td>
                                        <td id={{$key+1}}>{{$reportsurvey->status}}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-xs"
                                                onclick="pilih1('{{ $reportsurvey->id }}', '{{ $reportsurvey->nama }}',  '{{ $reportsurvey->status }}')"
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
            
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdrop2" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdrop2">Pencarian data jadwalsurvey</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered table-stripped" id="example2">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>nama</th>
                                        <th>nomor_handphone</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jadwalsurvey as $key => $jadwalsurvey)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td id={{$key+1}}>{{$jadwalsurvey->nama}}</td>
                                        <td id={{$key+1}}>{{$jadwalsurvey->nomor_handphone}}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-xs"
                                                onclick="pilih2('{{ $jadwalsurvey->id }}','{{ $jadwalsurvey->nomor_handphone }}')"
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

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdrop3" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdrop3">Pencarian data jadwalsurvey</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered table-stripped" id="example3">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>nama</th>
                                        <th>alamat_pemasangan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($surveyjadwal as $key => $surveyjadwal)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td id={{$key+1}}>{{$surveyjadwal->nama}}</td>
                                        <td id={{$key+1}}>{{$surveyjadwal->alamat_pemasangan}}</td>
                                        <td>
                                            <button type="button" class="btn btn-danger btn-xs"
                                                onclick="pilih3('{{ $surveyjadwal->id }}','{{ $surveyjadwal->alamat_pemasangan }}')"
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

             

        
            
            @stop
            @push('js')
            <script>
                $('#example1').DataTable({
                    "responsive": true,
                });

                function pilih1(id, nama) {
                    document.getElementById('id_reportsurvey').value = id
                    document.getElementById('nama').value = nama
                }
                $('#example2').DataTable({
 "responsive": true, 
 });
 //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Distributor dari Modal ke form tambah
 function pilih2(id, nomor_handphone){
 document.getElementById('id_jadwalsurvey').value = id
 document.getElementById('nomor_handphone').value = nomor_handphone
 } 

 $('#example3').DataTable({
 "responsive": true, 
 });
 //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Distributor dari Modal ke form tambah
 function pilih3(id, alamat_pemasangan){
 document.getElementById('id_jadwalsurvey').value = id
 document.getElementById('alamat_pemasangan').value = alamat_pemasangan
 } 

 

            </script>

            @endpush
