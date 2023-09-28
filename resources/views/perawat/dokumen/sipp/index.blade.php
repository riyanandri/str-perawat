@extends('layouts.user')

@section('title')
    Dokumen SIPP
@endsection

@section('header')
    Dokumen SIPP
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/css/toastr.min.css') }}">
    <link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success solid alert-dismissible fade show">
                        <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        <strong>Sukses!</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                @elseif ($message = Session::get('error'))
                    <div class="alert alert-danger solid alert-dismissible fade show">
                        <svg viewbox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2"
                            fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                            </polygon>
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                        <strong>Gagal!</strong> {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data SIPP</h4>
                        <div class="btn-group">
                            <a href="{{ route('sipp.upload') }}">
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
                                        <th class="align-middle">No SIPP</th>
                                        <th class="align-middle">Berlaku Sampai</th>
                                        <th class="align-middle">Keterangan</th>
                                        <th class="align-middle">Status</th>
                                        <th class="align-middle">Diupload</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) > 0)
                                        <?php $no = 1; ?>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="py-2">
                                                    {{ $no++ }}
                                                </td>
                                                <td class="py-2">
                                                    <a target="_blank"
                                                        href="{{ asset('uploads/dokumen/' . $item->jenis . '/' . $item->url) }}"><strong>{{ $item->url }}</strong></a>
                                                </td>
                                                <td class="py-2">{{ $item->no_dokumen }}</td>
                                                <td class="py-2">
                                                    {{ $item->berlaku_sd }}
                                                </td>
                                                <td class="py-2">{{ $item->keterangan }}</td>
                                                @if ($item->status == 'pending')
                                                    <td>
                                                        <span class="badge badge-warning">Pending</span>
                                                    </td>
                                                @elseif ($item->status == 'ditolak')
                                                    <td>
                                                        <span class="badge badge-danger">Ditolak</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge badge-success">Diterima</span>
                                                    </td>
                                                @endif
                                                <td class="py-2">{{ $item->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10" class="text-center">Data SIPP tidak ditemukan!
                                            </td>
                                        </tr>
                                    @endif
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
