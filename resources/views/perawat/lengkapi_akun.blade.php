@extends('layouts.user')

@section('title')
    Detail Akun
@endsection

@section('header')
    Lengkapi data akun
@endsection

@push('css')
<link href="{{ asset('assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.date.css') }}">
@endpush

@section('content')
<div class="container-fluid"> 
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="mb-3">Data Akun</h4>
                            <form action="{{ route('complete-account.save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="{{ Auth::user()->nama }}" disabled>
                                      
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="whatsapp" class="form-label">No WhatsApp</label>
                                        <input type="number" class="form-control" id="whatsapp" name="whatsapp" value="{{ Auth::user()->whatsapp }}" disabled>
                                       
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" disabled>
                                  
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nip" class="form-label">NIP</label>
                                        <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip') }}">
                                     
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status Kepegawaian</label>
                                        <select class="default-select form-control wide w-100" name="status_id">
                                            <option selected="">Pilih...</option>
                                            @foreach ($status_pegawai as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_status }}</option>  
                                            @endforeach
                                        </select>
                                     
                                    </div>
                                </div>

                                <div class="row form-material">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <select class="default-select form-control wide w-100" name="gender">
                                            <option selected="">Pilih...</option>
                                            <option value="L">Laki - laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                      
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                      
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Tanggal Lahir</label>
                                        <input type="text" class="form-control" name="tgl_lahir" id="mdate" value="{{ old('tgl_lahir') }}">
                                      
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="pend_terakhir" class="form-label">Pendidikan Terakhir</label>
                                    <input type="text" class="form-control" id="pend_terakhir" name="pend_terakhir" value="{{ old('pend_terakhir') }}">
                                  
                                </div>

                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}">
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Profesi</label>
                                        <select class="default-select form-control wide w-100" name="profesi_id">
                                            <option selected="">Pilih...</option>
                                            @foreach ($profesi as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_profesi }}</option>
                                            @endforeach
                                        </select>
                                     
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Ruangan</label>
                                        <select class="default-select form-control wide w-100" name="ruangan_id">
                                            <option selected="">Pilih...</option>
                                            @foreach ($ruang as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_ruang }}</option>  
                                            @endforeach
                                        </select>
                                    
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Jenis PK</label>
                                        <select class="default-select form-control wide w-100" name="pk_id">
                                            <option selected="">Pilih...</option>
                                            @foreach ($pk as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_pk }}</option> 
                                            @endforeach
                                        </select>
                                     
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Area</label>
                                        <select class="default-select form-control wide w-100" name="area_id">
                                            <option selected="">Pilih...</option>
                                            @foreach ($area as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama_area }}</option>
                                            @endforeach
                                        </select>
                                      
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="{{ asset('assets/vendor/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('assets/vendor/pickadate/picker.js') }}"></script>
<script src="{{ asset('assets/vendor/pickadate/picker.date.js') }}"></script>
<script src="{{ asset('assets/js/plugins-init/material-date-picker-init.js') }}"></script>
<script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
@endpush