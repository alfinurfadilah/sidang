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
                            <th>Kebutuhan MODEM</th>
                            <th>Kebutuhan HTB</th>
                            <!-- <th>FDT</th>
                            <th>ODP</th>
                            <th>Kabel</th>
                            <th>Clamp</th>
                            <th>Kabel Tis</th>
                            <th>Fascon</th> -->
        
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
                            <td>{{$item->kebutuhan_MODEM}}</td>
                            <td>{{$item->kebutuhan_HTB}}</td>
                            <!-- <td>{{$item->FDT}}</td>
                            <td>{{$item->ODP}}</td>
                            <td>{{$item->kabel}}</td>
                            <td>{{$item->clamp}}</td>
                            <td>{{$item->kabel_tis}}</td>
                            <td>{{$item->fascon}}</td> -->
                            <!-- <td>{{$item->status}}</td> -->
                            <td>
                            <button class="btn btn-danger btn-sm mb-1" aria-hidden="true" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop2{{$item->id}}" data-id="{{$item->id}}">
                                    <i class="fa fa-pen"></i> Edit
                                </button>
                                <a href="{{route('reportpemasangan.destroy', $item)}}"
                                    onclick="notificationBeforeDelete(event, this)"
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

                        <div class="form-group">
                            <label for="status_pemasangan">Status Pemasangan</label>
                            <input type="text" class="form-control @error('status_pemasangan') is-invalid @enderror"
                                id="status_pemasangan" placeholder="Masukkan status pemasangan" name="status_pemasangan"
                                value="{{ $item->status_pemasangan ?? old('status_pemasangan') }}">
                            @error('status_pemasangan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="kebutuhan_MODEM">Kebutuhan MODEM</label>
                            <input type="number" class="form-control @error('kebutuhan_MODEM') is-invalid @enderror"
                                id="kebutuhan_MODEM" placeholder="Masukkan jumlah modem yang digunakan" name="kebutuhan_MODEM"
                                value="{{ $item->kebutuhan_MODEM ?? old('kebutuhan_MODEM') }}">
                            @error('Kebutuhan MODEM') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="kebutuhan_HTB">Kebutuhan HTB</label>
                            <input type="number" class="form-control @error('kebutuhan_HTB') is-invalid @enderror"
                                id="kebutuhan_HTB" placeholder="Masukkan jumlah htb yang digunakan" name="kebutuhan_HTB"
                                value="{{ $item->kebutuhan_HTB ?? old('kebutuhan_HTB') }}">
                            @error('Kebutuhan HTB') <span class="text-danger">{{ $message }}</span> @enderror
</div>


                        <!-- ... (lanjutkan dengan field lainnya) -->

                        

                        <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan </i></button> 
                                <a href="{{ route('reportpemasangan.index') }}"  class="btn btn-warning"><i class="fa fa-times-circle"> Batal </i></button></a>
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