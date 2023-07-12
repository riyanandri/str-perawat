@extends('layouts.template')

@section('title')
    Profesi - STR Perawat
@endsection

@section('header')
    Profesi
@endsection

@push('css')
    <link href="{{ asset('assets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
				
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Master</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Profesi</a></li>
        </ol>
    </div>
    <!-- row -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Profesi</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Nama Profesi</th>
                                    <th>Ditambahkan</th>
                                    <th>Diupdate</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($profesi as $item)
                                <tr>
                                    <td>{{ $item->nama_profesi }}</td>
                                    <td>{{ $item->created_at->format('d, M Y - H:i') }}</td>
                                    <td>{{ $item->updated_at->format('d, M Y - H:i') }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                            <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>												
                                    </td>												
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Profesi belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $profesi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{ asset('assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/datatables.init.js') }}"></script>
@endpush