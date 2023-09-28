@extends('layouts.template')

@section('title')
    STR
@endsection

@section('header')
    Dokumen STR
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
                        <h4 class="card-title">Data Dokumen STR</h4>
                    </div>
                    <div class="card-body">
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
                                                </td> --}}
                                                {{-- <td>
                                                    {{ $str->nama_profesi }}
                                                </td>
                                                <td>
                                                    {{ $str->nama_ruang }}
                                                </td> --}}
                                                <td>{{ $str->berlaku_sd }}</td>
                                                @if ($str->status == 'pending')
                                                    <td>
                                                        <div class="py-2"><i class="fa fa-circle text-warning me-1"></i>
                                                            Pending</div>
                                                    </td>
                                                @elseif ($str->status == 'ditolak')
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
                                            <td colspan="10" class="text-center">Data tidak ditemukan!
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- SIPP Modal -->
                    <div class="modal fade" id="strModal{{ $str->id }}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{ route('dokumenAdmin.strUpdateStatus', $str->id) }}" method="post">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update Status Dokumen STR</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" value="{{ $str->id }}" id="id" name="id">
                                        <pre>NIP Pegawai&nbsp;&nbsp;&nbsp;&nbsp;: {{ $str->pegawai->nip }}</pre>
                                        <pre>No STR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $str->no_dokumen }}</pre>
                                        <pre>Berlaku Sampai&nbsp;: {{ $str->berlaku_sd }}</pre>
                                        <div class="mb-3">
                                            <label class="col-sm-3 col-form-label">Status Dokumen</label>
                                            <select class="default-select form-control wide w-100" name="status">
                                                <option value="pending">Pending</option>
                                                <option value="ditolak">Ditolak</option>
                                                <option value="diterima">Diterima</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-danger light"
                                            data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-sm btn-primary">Perbarui</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
