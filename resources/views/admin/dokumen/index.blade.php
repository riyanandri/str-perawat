@extends('layouts.template')

@section('title')
    Data Dokumen
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
                @else
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
                        <h4 class="card-title">Data Dokumen</h4>
                        {{-- <div class="btn-group">
                            <button type="button" onclick="input()" class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                data-bs-target="#jenisPkModal">Tambah Data</button>
                            <button type="button" onclick="reload()" class="btn btn-sm btn-light">Refresh</button>
                        </div> --}}
                    </div>
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#sipp" data-bs-toggle="tab"
                                            class="nav-link active show">SIPP</a>
                                    </li>
                                    <li class="nav-item"><a href="#spkk" data-bs-toggle="tab" class="nav-link">SPKK</a>
                                    </li>
                                    <li class="nav-item"><a href="#str" data-bs-toggle="tab" class="nav-link">STR</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="sipp" class="tab-pane fade active show">
                                        <div class="sipp-content pt-3">
                                            <div class="table-responsive">
                                                <table class="table table-responsive-md">
                                                    <thead>
                                                        <tr>
                                                            <th><strong>No</strong></th>
                                                            <th><strong>Dokumen</strong></th>
                                                            <th><strong>No SIPP</strong></th>
                                                            <th><strong>NIP Pegawai</strong></th>
                                                            <th><strong>Berlaku Sampai</strong></th>
                                                            <th><strong>Status</strong></th>
                                                            <th><strong></strong></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (count($dataSipp) > 0)
                                                            <?php $no = 1; ?>
                                                            @foreach ($dataSipp as $sipp)
                                                                <tr>
                                                                    <td>{{ $no++ }}</td>
                                                                    <td>
                                                                        <a
                                                                            href="{{ asset('uploads/dokumen/' . $sipp->jenis . '/' . $sipp->url) }}"><strong>{{ $sipp->url }}</strong></a>
                                                                    </td>
                                                                    <td>{{ $sipp->no_dokumen }}</td>
                                                                    <td>{{ $sipp->pegawai->nip }}</td>
                                                                    {{-- <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <img src="{{ asset('uploads/profil/' . $sipp->photo) }}"
                                                                                class="rounded-lg me-2"width="24"
                                                                                alt="">
                                                                            <span
                                                                                class="w-space-no">{{ $sipp->nama }}</span>
                                                                        </div>
                                                                    </td> --}}
                                                                    {{-- <td>
                                                                        {{ $sipp->nama_profesi }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $sipp->nama_ruang }}
                                                                    </td> --}}
                                                                    <td>{{ $sipp->berlaku_sd }}</td>
                                                                    @if ($sipp->status == 'pending')
                                                                        <td>
                                                                            <div class="py-2"><i
                                                                                    class="fa fa-circle text-warning me-1"></i>
                                                                                Pending</div>
                                                                        </td>
                                                                    @elseif ($sipp->status == 'ditolak')
                                                                        <td>
                                                                            <div class="py-2"><i
                                                                                    class="fa fa-circle text-danger me-1"></i>
                                                                                Ditolak</div>
                                                                        </td>
                                                                    @else
                                                                        <td>
                                                                            <div class="py-2"><i
                                                                                    class="fa fa-circle text-success me-1"></i>
                                                                                Diterima</div>
                                                                        </td>
                                                                    @endif
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <button type="button"
                                                                                class="btn btn-primary shadow btn-xs sharp me-1"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#sippModal{{ $sipp->id }}"><i
                                                                                    class="fas fa-pencil-alt"></i></button>
                                                                            {{-- <a href="#"
                                                                                class="btn btn-danger shadow btn-xs sharp"><i
                                                                                    class="fa fa-trash"></i></a> --}}
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="10" class="text-center">Data tidak ditemukan!
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="spkk" class="tab-pane fade">
                                        <div class="spkk-content pt-3">
                                            <div class="table-responsive">
                                                <table class="table table-responsive-md">
                                                    <thead>
                                                        <tr>
                                                            <th><strong>No</strong></th>
                                                            <th><strong>Dokumen</strong></th>
                                                            <th><strong>No SPKK</strong></th>
                                                            <th><strong>NIP Pegawai</strong></th>
                                                            <th><strong>Berlaku Sampai</strong></th>
                                                            <th><strong>Status</strong></th>
                                                            <th><strong></strong></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (count($dataSpkk) > 0)
                                                            <?php $no = 1; ?>
                                                            @foreach ($dataSpkk as $spkk)
                                                                <tr>
                                                                    <td>{{ $no++ }}</td>
                                                                    <td>
                                                                        <a
                                                                            href="{{ asset('uploads/dokumen/' . $spkk->jenis . '/' . $spkk->url) }}"><strong>{{ $spkk->url }}</strong></a>
                                                                    </td>
                                                                    <td>{{ $spkk->no_dokumen }}</td>
                                                                    <td>{{ $spkk->pegawai->nip }}</td>
                                                                    {{-- <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <img src="{{ asset('uploads/profil/' . $spkk->photo) }}"
                                                                                class="rounded-lg me-2"width="24"
                                                                                alt="">
                                                                            <span
                                                                                class="w-space-no">{{ $spkk->nama }}</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        {{ $spkk->nama_profesi }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $spkk->nama_ruang }}
                                                                    </td> --}}
                                                                    <td>{{ $spkk->berlaku_sd }}</td>
                                                                    @if ($spkk->status == 'pending')
                                                                        <td>
                                                                            <div class="py-2"><i
                                                                                    class="fa fa-circle text-warning me-1"></i>
                                                                                Pending</div>
                                                                        </td>
                                                                    @elseif ($spkk->status == 'ditolak')
                                                                        <td>
                                                                            <div class="py-2"><i
                                                                                    class="fa fa-circle text-danger me-1"></i>
                                                                                Ditolak</div>
                                                                        </td>
                                                                    @else
                                                                        <td>
                                                                            <div class="py-2"><i
                                                                                    class="fa fa-circle text-success me-1"></i>
                                                                                Diterima</div>
                                                                        </td>
                                                                    @endif
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <button type="button"
                                                                                class="btn btn-primary shadow btn-xs sharp me-1"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#spkkModal{{ $spkk->id }}"><i
                                                                                    class="fas fa-pencil-alt"></i></button>
                                                                            {{-- <a href="#"
                                                                                class="btn btn-danger shadow btn-xs sharp"><i
                                                                                    class="fa fa-trash"></i></a> --}}
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="10" class="text-center">Data tidak
                                                                    ditemukan!
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="str" class="tab-pane fade">
                                        <div class="str-content pt-3">
                                            <div class="table-responsive">
                                                <table class="table table-responsive-md">
                                                    <thead>
                                                        <tr>
                                                            <th><strong>No</strong></th>
                                                            <th><strong>Dokumen</strong></th>
                                                            <th><strong>No STR</strong></th>
                                                            <th><strong>NIP Pegawai</strong></th>
                                                            <th><strong>Berlaku Sampai</strong></th>
                                                            <th><strong>Status</strong></th>
                                                            <th><strong></strong></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (count($dataStr) > 0)
                                                            <?php $no = 1; ?>
                                                            @foreach ($dataStr as $str)
                                                                <tr>
                                                                    <td>{{ $no++ }}</td>
                                                                    <td>
                                                                        <a
                                                                            href="{{ asset('uploads/dokumen/' . $str->jenis . '/' . $str->url) }}"><strong>{{ $str->url }}</strong></a>
                                                                    </td>
                                                                    <td>{{ $str->no_dokumen }}</td>
                                                                    <td>{{ $str->pegawai->nip }}</td>
                                                                    {{-- <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <img src="{{ asset('uploads/profil/' . $str->photo) }}"
                                                                                class="rounded-lg me-2"width="24"
                                                                                alt="">
                                                                            <span
                                                                                class="w-space-no">{{ $str->nama }}</span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        {{ $str->nama_profesi }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $str->nama_ruang }}
                                                                    </td> --}}
                                                                    <td>{{ $str->berlaku_sd }}</td>
                                                                    @if ($str->status == 'pending')
                                                                        <td>
                                                                            <div class="py-2"><i
                                                                                    class="fa fa-circle text-warning me-1"></i>
                                                                                Pending</div>
                                                                        </td>
                                                                    @elseif ($str->status == 'ditolak')
                                                                        <td>
                                                                            <div class="py-2"><i
                                                                                    class="fa fa-circle text-danger me-1"></i>
                                                                                Ditolak</div>
                                                                        </td>
                                                                    @else
                                                                        <td>
                                                                            <div class="py-2"><i
                                                                                    class="fa fa-circle text-success me-1"></i>
                                                                                Diterima</div>
                                                                        </td>
                                                                    @endif
                                                                    <td>
                                                                        <div class="d-flex">
                                                                            <button type="button"
                                                                                class="btn btn-primary shadow btn-xs sharp me-1"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#strModal{{ $str->id }}"><i
                                                                                    class="fas fa-pencil-alt"></i></button>

                                                                            {{-- <a href="#"
                                                                                class="btn btn-danger shadow btn-xs sharp"><i
                                                                                    class="fa fa-trash"></i></a> --}}
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            <tr>
                                                                <td colspan="10" class="text-center">Data tidak
                                                                    ditemukan!</td>
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
                    </div>
                    @include('admin.dokumen.form')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('assets/vendor/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
@endpush
