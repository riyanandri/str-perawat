@extends('layouts.template')

@section('title')
    SIPP
@endsection

@section('header')
    Dokumen SIPP
@endsection

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
                        <h4 class="card-title">Data Dokumen SIPP</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>No</strong></th>
                                        <th><strong>Dokumen</strong></th>
                                        <th><strong>No SIPP</strong></th>
                                        <th><strong>Berlaku Sampai</strong></th>
                                        <th><strong>Keterangan</strong></th>
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
                                                    <a target="_blank"
                                                        href="{{ asset('uploads/dokumen/' . $sipp->jenis . '/' . $sipp->url) }}"><strong>{{ $sipp->url }}</strong></a>
                                                </td>
                                                <td>{{ $sipp->no_dokumen }}</td>
                                                {{-- <td>{{ $sipp->pegawai->nip }}</td> --}}
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
                                                <td>{{ $sipp->keterangan }}</td>
                                                @if ($sipp->status == 'pending')
                                                    <td>
                                                        <span class="badge badge-warning">Pending</span>
                                                    </td>
                                                @elseif ($sipp->status == 'ditolak')
                                                    <td>
                                                        <span class="badge badge-danger">Ditolak</span>
                                                    </td>
                                                @else
                                                    <td>
                                                        <span class="badge badge-success">Diterima</span>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('dokumenAdmin.detailSipp', $sipp->id) }}"
                                                            class="btn btn-sm btn-rounded btn-primary">Lihat detail</a>
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
            </div>
        </div>
    </div>
@endsection
