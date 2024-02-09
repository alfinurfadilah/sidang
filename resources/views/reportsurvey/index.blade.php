@extends('adminlte::page')
@section('title', 'Report Survey Teknisi')
@section('content_header')
<h1 class="m-0 text-dark"><mark>Report Survey Teknisi</mark></h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('reportsurvey.create')}}" class="">
                <i class="" aria-hidden="true">  </i></a>
                <table class="table-responsive table-hover table-bordered table-stripped" id="example2">
                    <thead>
                    <tr class="table-info">
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Site</th>
                            <th>Tanggal Survey</th>
                            <th>Nama Teknisi</th>
                            <th>Waktu</th>
                            <th>FDT</th>
                            <th>ODP</th>
                            <th>Kabel</th>
                            <th>Clamp</th>
                            <th>Kabel Tis</th>
                            <th>Fascon</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($reportsurvey as $sk => $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->nama}}</td>
                            <td>{{$item->site}}</td>
                            <td>{{$item->tanggal_survey}}</td>
                            <td>{{$item->nama_teknisi}}</td>
                            <td>{{$item->waktu}}</td>
                            <td>{{$item->FDT}}</td>
                            <td>{{$item->ODP}}</td>
                            <td>{{$item->kabel}}</td>
                            <td>{{$item->clamp}}</td>
                            <td>{{$item->kabel_tis}}</td>
                            <td>{{$item->fascon}}</td>
                            <td>{{$item->status}}</td>
                            <td>
                            <button class="btn btn-danger btn-sm mb-1" aria-hidden="true" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop2{{$item->id}}" data-id="{{$item->id}}">
                                    <i class="fa fa-pen"></i> Edit
                                </button>
                                <a href="{{route('reportsurvey.destroy', $item)}}"
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
@foreach($reportsurvey as $key => $item)
<div class="modal fade" id="staticBackdrop2{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="modalTitle{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
        <div class="modal-content">
            <div class="modal-header bg-primary>
                <h1 class="modal-title fs-5" id="modalTitle{{$item->id}}">Edit</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered table-stripped" id="example2">

                    <form action="{{ route('reportsurvey.update', $item->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Tambahkan method PUT untuk update -->

                        
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control @error('Nama') is-invalid @enderror" name="nama"
                                value="{{ $item->nama ?? old('nama') }}" id="Nama">
                            @error('Nama') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Site">Site</label>
                            <input type="text" class="form-control @error('Site') is-invalid @enderror" name="site"
                                value="{{ $item->site ?? old('site') }}" id="Site">
                            @error('Site') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Tanggal_Survey">Tanggal_Survey</label>
                            <input type="text" class="form-control @error('Tanggal_Survey') is-invalid @enderror" name="tanggal_survey"
                                value="{{ $item->tanggal_survey ?? old('tanggal_survey') }}" id="Tanggal_Survey">
                            @error('Tanggal_Survey') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Waktu">Waktu</label>
                            <input type="text" class="form-control @error('Waktu') is-invalid @enderror"
                                id="waktu" placeholder="Masukkan Waktu" name="waktu"
                                value="{{ $item->waktu ?? old('waktu') }}">
                            @error('Waktu') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- ... (lanjutkan dengan field lainnya) -->

                        <div class="form-group">
                            <label for="Nama_Teknisi">Nama_Teknisi</label>
                            <input type="text" class="form-control @error('Nama_Teknisi') is-invalid @enderror"
                                id="nama_teknisi" placeholder="Masukkan Nama_Teknisi" name="nama_teknisi"
                                value="{{ $item->nama_teknisi ?? old('nama_teknisi') }}">
                            @error('Nama_Teknisi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        

                        <!-- ... (lanjutkan dengan field lainnya) -->

                        <div class="form-group">
                            <label for="FDT">FDT</label>
                            <input type="text" class="form-control @error('FDT') is-invalid @enderror"
                                id="FDT" placeholder="Masukkan Kode FDT" name="FDT"
                                value="{{ $item->FDT ?? old('FDT') }}">
                            @error('FDT') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- ... (lanjutkan dengan field lainnya) -->

                        <div class="form-group">
                            <label for="ODP">ODP</label>
                            <input type="text" class="form-control @error('ODP') is-invalid @enderror"
                                id="ODP" placeholder="Masukkan Kode ODP" name="ODP"
                                value="{{ $item->ODP ?? old('ODP') }}">
                            @error('ODP') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- ... (lanjutkan dengan field lainnya) -->
                       
                        <div class="form-group">
                            <label for="Kabel">Kabel</label>
                            <input type="text" class="form-control @error('Kabel') is-invalid @enderror" name="kabel"
                                value="{{ $item->kabel ?? old('kabel') }}" id="Kabel">
                            @error('Kabel') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label for="Clamp">Clamp</label>
                            <input type="number" class="form-control @error('Clamp') is-invalid @enderror" name="clamp"
                                value="{{ $item->clamp ?? old('clamp') }}" id="Clamp">
                            @error('Clamp') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                        <!-- ... (lanjutkan dengan field lainnya) -->

                        <div class="form-group">
                            <label for="Kabel_Tis">Kabel_Tis</label>
                            <input type="number" class="form-control @error('Kabel_Tis') is-invalid @enderror"
                                id="Kabel_Tis" placeholder="Masukkan Jumlah Kabel Tis" name="kabel_tis"
                                value="{{ $item->kabel_tis ?? old('kabel_tis') }}">
                            @error('Kabel_Ties') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-group">
                            <label for="Fascon">Fascon</label>
                            <input type="number" class="form-control @error('Fascon') is-invalid @enderror" name="fascon"
                                value="{{ $item->fascon?? old('fascon') }}" id="Fascon">
                            @error('Fascon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control @error('status') isinvalid @enderror" id="status"
                            name="status" >
                            <option value="" @if(old('status')=='' )selected @endif></option>
                            <option value="Bisa Dipasang" @if(old('status')=='BisaDipasang' )selected @endif>Bisa Dipasang</option>
                            <option value="Tidak Bisa Dipasang" @if(old('status')=='TidakBisaDipasang' )selected @endif>Tidak Bisa Dipasang</option>
                           
                        </select>
                        @error('divisi') <span class="textdanger">{{$message}}</span> @enderror
                    </div>


                        <!-- ... (lanjutkan dengan field lainnya) -->

                        

                        <button type="submit" class="btn btn-danger"><i class="fas fa-save"> Simpan </i></button> 
                                <a href="{{ route('reportsurvey.index') }}"  class="btn btn-warning"><i class="fa fa-times-circle"> Batal </i></button></a>
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