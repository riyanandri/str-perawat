@extends('layouts.user')

@section('title')
    Dokumen
@endsection

@section('header')
    Dokumen
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/css/toastr.min.css') }}">
    <link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Dokumen</h4>
                        <div class="btn-group">
                            <a href="{{ route('dokumenPerawat.upload') }}">
                                <button type="button" class="btn btn-rounded btn-primary"><span
                                        class="btn-icon-start text-primary"><i class="fa fa-plus color-primary"></i>
                                    </span>Tambah data</button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm mb-0">
                                <thead>
                                    <tr>
                                        <th class="align-middle">
                                            No
                                        </th>
                                        <th class="align-middle">Dokumen</th>
                                        <th class="align-middle">No Dokumen</th>
                                        <th class="align-middle">Jenis</th>
                                        <th class="align-middle">Berlaku Sampai</th>
                                        <th class="align-middle">Status</th>
                                        <th class="no-sort"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $i => $item)
                                        <tr>
                                            <td class="py-2">
                                                {{ $i + 1 }}
                                            </td>
                                            <td class="py-2">
                                                <a
                                                    href="{{ asset('uploads/dokumen/' . $item->jenis . '/' . $item->url) }}"><strong>{{ $item->url }}</strong></a>
                                            </td>
                                            <td class="py-2">{{ $item->no_dokumen }}</td>
                                            @if ($item->jenis == 'sipp')
                                                <td class="py-2"><span class="badge badge-pill badge-info">SIPP</span>
                                                </td>
                                            @elseif ($item->jenis == 'str')
                                                <td class="py-2"><span class="badge badge-pill badge-primary">STR</span>
                                                </td>
                                            @else
                                                <td class="py-2"><span class="badge badge-pill badge-dark">SPKK</span>
                                                </td>
                                            @endif
                                            <td class="py-2">
                                                {{ $item->berlaku_sd }}
                                            </td>
                                            @if ($item->status == 'pending')
                                                <td>
                                                    <div class="py-2"><i class="fa fa-circle text-warning me-1"></i>
                                                        Pending</div>
                                                </td>
                                            @elseif ($item->status == 'ditolak')
                                                <td>
                                                    <div class="py-2"><i class="fa fa-circle text-danger me-1"></i>
                                                        Ditolak</div>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="py-2"><i class="fa fa-circle text-success me-1"></i>
                                                        Diterima</div>
                                                </td>
                                            @endif
                                            <td class="py-2 text-end">
                                                <div class="d-flex">
                                                    <button type="button"
                                                        class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                            class="fas fa-pencil-alt"></i></button>
                                                    <button type="button" class="btn btn-danger shadow btn-xs sharp"><i
                                                            class="fa fa-trash"></i></button>
                                                </div>
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
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/vendor/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
@endpush
