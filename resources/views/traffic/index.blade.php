@extends('adminlte::page')
@section('title', 'PPPoE Users')
@section('content_header')
@stop
@section('content')
<style>
    .center-heading {
        text-align: center;
    }
</style>
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h5 class="text-black op-7 mb-2">Total Traffic : {{ $report->count() }}</h5>
                    </div>
                    <div class="ml-md-auto py-2 py-md-0">
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body">
                    <center>
                            <div>
                                <table>
                                    <tr>
                                        <form class="form-inline" action="{{route('traffic.index')}}" method="GET">
                                            <div class="form-group">
                                                <td><label><b>Mulai Tanggal:</b></label></td>
                                                <td><input type="date" class="form-control datepicker" name="tgl_awal" id="tgl_awal" value="{{ date('Y-m-d') }}" required></td>
                                            </div>

                                            <div class="form-group">
                                                <td><label><b>Sampai Tanggal:</b></label></td>
                                                <td><input type="date" class="form-control datepiscker" name="tgl_akhir" id="tgl_akhir" value="{{ date('Y-m-d') }}" required></td>
                                            </div>

                                            <div class="form-group">
                                                <td><button type="submit" class="btn btn-primary">Search</button></td>
                                            </div>
                                            <div class="form-group">
                                                <td><a href="{{route('traffic.index')}}" type="reset" value="reset" class="btn btn-danger">Reset</a></td>
                                            </div>
                                        </form>
                                    </tr>
                                </table>
                            </div>
                        </center>
                        <center class="mt-4">
                            {{ $view_tgl }}
                        </center>
                    <div class="card-body">
                        <!-- Modal Add-->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                New</span>
                                                <span class="fw-light">
                                                    Secret PPPoE
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped" id="example2">
                                    <thead class="center-heading">
                                        <tr class="bg-info text-white">
                                            <th>No</th>
                                            <th>Status</th>
                                            <th>Date/Time</th>                                         
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="center-heading">
                                            <th>No</th>
                                            <th>Status</th>
                                            <th>Date/Time</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($report as $no => $item)
                                        <tr class="center-heading">
                                            <td>{{ $no+1 }} </td>
                                            <td>{!! $item->text !!} </td>
                                            <td>{{ date("d F Y h:i: A", strtotime($item->created_at)) }} </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('js')
<script>
    $(document).ready(function() {
        $('#example2').DataTable({
            "responsive": true
        });
    });
</script>
@endpush
