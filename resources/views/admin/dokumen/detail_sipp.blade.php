@extends('layouts.template')

@section('title')
    Detail Dokumen SIPP
@endsection

@section('header')
    {{ $sipp->pegawai->user->nama }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-news">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th>NIP</th>
                                                <td>{{ $sipp->pegawai->nip }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Pegawai</th>
                                                <td>{{ $sipp->pegawai->user->nama }}</td>
                                            </tr>
                                            <tr>
                                                <th>Jenis Kelamin</th>
                                                @if ($sipp->pegawai->gender == 'L')
                                                    <td>Laki - laki</td>
                                                @else
                                                    <td>Perempuan</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Tanggal Lahir</th>
                                                <td>{{ $sipp->pegawai->tempat_lahir }}, {{ $sipp->pegawai->tgl_lahir }}</td>
                                            </tr>
                                            <tr>
                                                <th>Pendidikan Terakhir</th>
                                                <td>{{ $sipp->pegawai->pend_terakhir }}</td>
                                            </tr>
                                            <tr>
                                                <th>Profesi</th>
                                                <td>{{ $sipp->pegawai->profesi->nama_profesi }}</td>
                                            </tr>
                                            <tr>
                                                <th>Ruang</th>
                                                <td>{{ $sipp->pegawai->ruangan->nama_ruang }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <form action="{{ route('dokumenAdmin.sippUpdateStatus', $sipp->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="text-black font-w600 form-label">Status Dokumen</label>
                                                    <select class="default-select form-control wide w-100" name="status">
                                                        <option value="pending"
                                                            {{ $sipp->status == 'pending' ? 'selected' : '' }}>Pending
                                                        </option>
                                                        <option value="ditolak"
                                                            {{ $sipp->status == 'ditolak' ? 'selected' : '' }}>Ditolak
                                                        </option>
                                                        <option value="diterima"
                                                            {{ $sipp->status == 'diterima' ? 'selected' : '' }}>Diterima
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mt-4">
                                                    @if ($sipp->status == 'pending')
                                                        <button type="submit" class="btn btn-primary">Perbarui</button>
                                                    @else
                                                        <div class="alert alert-dark solid alert-square">
                                                            <strong>Dokumen ini telah dikonfirmasi.</strong>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <div class="post-details">
                            <h3 class="mb-2 text-black">No SIPP : {{ $sipp->no_dokumen }}</h3>
                            <ul class="mb-4 post-meta d-flex flex-wrap">
                                <li class="post-author me-3">Oleh {{ $sipp->pegawai->user->nama }}</li>
                                <li class="post-date me-3"><i class="far fa-calendar-plus me-2"></i>{{ $sipp->created_at }}
                                </li>
                            </ul>
                            <embed type="application/pdf"
                                src="{{ asset('uploads/dokumen/' . $sipp->jenis . '/' . $sipp->url) }}" width="100%"
                                height="600"></embed>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
