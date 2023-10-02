@extends('layouts.user')

@section('title')
    Detail Akun
@endsection

@section('header')
    Lengkapi data akun
@endsection

@push('css')
    <link href="{{ asset('assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/pickadate/themes/default.date.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
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
                                <form action="{{ route('complete-account.save') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nama" class="form-label">Nama Lengkap</label>
                                            <input type="text"
                                                class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                                id="nama" name="nama" value="{{ Auth::user()->nama }}" disabled>
                                            <div class="invalid-feedback">
                                                @if ($errors->has('nama'))
                                                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="whatsapp" class="form-label">No WhatsApp</label>
                                            <input type="number"
                                                class="form-control{{ $errors->has('whatsapp') ? ' is-invalid' : '' }}"
                                                id="whatsapp" name="whatsapp" value="{{ Auth::user()->whatsapp }}"
                                                disabled>
                                            <div class="invalid-feedback">
                                                @if ($errors->has('whatsapp'))
                                                    <span class="text-danger">{{ $errors->first('whatsapp') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ Auth::user()->email }}" disabled>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nip" class="form-label">NIP</label>
                                            <input type="text"
                                                class="form-control{{ $errors->has('nip') ? ' is-invalid' : '' }}"
                                                id="nip" name="nip" value="{{ old('nip') }}">
                                            <div class="invalid-feedback">
                                                @if ($errors->has('nip'))
                                                    <span class="text-danger">{{ $errors->first('nip') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Status Kepegawaian</label>
                                            <select class="default-select form-control wide w-100" name="status_id">
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
                                                <option value="L">Laki - laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-5 mb-3">
                                            <label class="form-label">Tempat Lahir</label>
                                            <input type="text"
                                                class="form-control{{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}"
                                                id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                                            <div class="invalid-feedback">
                                                @if ($errors->has('tempat_lahir'))
                                                    <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="text"
                                                class="form-control{{ $errors->has('tgl_lahir') ? ' is-invalid' : '' }}"
                                                name="tgl_lahir" id="mdate" value="{{ old('tgl_lahir') }}">
                                            <div class="invalid-feedback">
                                                @if ($errors->has('tgl_lahir'))
                                                    <span class="text-danger">{{ $errors->first('tgl_lahir') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="pend_terakhir" class="form-label">Pendidikan Terakhir</label>
                                        <input type="text"
                                            class="form-control{{ $errors->has('pend_terakhir') ? ' is-invalid' : '' }}"
                                            id="pend_terakhir" name="pend_terakhir" value="{{ old('pend_terakhir') }}">
                                        <div class="invalid-feedback">
                                            @if ($errors->has('pend_terakhir'))
                                                <span class="text-danger">{{ $errors->first('pend_terakhir') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat Lengkap</label>
                                        <input type="text"
                                            class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}"
                                            id="alamat" name="alamat" value="{{ old('alamat') }}">
                                        <div class="invalid-feedback">
                                            @if ($errors->has('alamat'))
                                                <span class="text-danger">{{ $errors->first('alamat') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="photo" class="form-label">Photo</label>
                                        <div class="input-group">
                                            <div class="form-file">
                                                <input type="file"
                                                    class="form-file-input form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}"
                                                    id="photo" name="photo" value="{{ Auth::user()->photo }}">
                                                <div class="invalid-feedback">
                                                    @if ($errors->has('photo'))
                                                        <span class="text-danger">{{ $errors->first('photo') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Profesi</label>
                                            <select class="select2-width-50 form-control" name="profesi_id"
                                                style="width: 50%">
                                                @foreach ($profesi as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_profesi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Ruangan</label>
                                            <select class="select2-width-50 form-control" name="ruangan_id"
                                                style="width: 50%">
                                                @foreach ($ruang as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_ruang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Jenis PK</label>
                                            <select class="select2-width-50 form-control" name="pk_id"
                                                style="width: 50%">
                                                @foreach ($pk as $item)
                                                    <option value="{{ $item->id }}">{{ $item->nama_pk }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Area</label>
                                            <select class="select2-width-50 form-control" name="area_id"
                                                style="width: 50%">
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
    <script src="{{ asset('assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
    </script>
    <script src="{{ asset('assets/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('assets/vendor/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/material-date-picker-init.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins-init/select2-init.js') }}"></script>
@endpush
