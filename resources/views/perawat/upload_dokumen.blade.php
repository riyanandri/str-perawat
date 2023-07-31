@extends('layouts.user')

@section('title')
    Upload Dokumen STR
@endsection

@section('header')
    Upload Dokumen STR
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
                            <h4 class="mb-3">Form Upload STR</h4>
                            <form action="{{ route('complete-account.save') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                
                                    <div class="input-group mb-3">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input form-control">
                                        </div>
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nip" class="form-label">No STR</label>
                                        <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Berlaku SD</label>
                                        <input type="text" class="form-control" name="tgl_lahir" id="mdate" value="{{ old('tgl_lahir') }}">
                                      
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="pend_terakhir" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="pend_terakhir" name="pend_terakhir" value="{{ old('pend_terakhir') }}">
                                  
                                </div>


                                
                                <hr class="mb-4">
                                <button class="btn btn-sm btn-primary" type="submit">Upload</button>
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