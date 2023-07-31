@extends('layouts.template')

@section('title')
    Dokumen STR
@endsection

@section('header')
    Data Dokumen STR
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h4 class="card-title">Exam Toppers</h4> --}}
                        <div class="btn-group">
                            <button type="button" onclick="input()" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#jenisPkModal">Tambah Data</button>
                            <button type="button" onclick="reload()" class="btn btn-sm btn-light">Refresh</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th style="width:50px;">
                                            <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="checkAll" required="">
                                                <label class="form-check-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th><strong>NIP</strong></th>
                                        <th><strong>Nama Pegawai</strong></th>
                                        <th><strong>Profesi</strong></th>
                                        <th><strong>Ruang</strong></th>
                                        <th><strong>No STR</strong></th>
                                        <th><strong>Masa Berlaku</strong></th>
                                        <th><strong>Status</strong></th>
                                        <th><strong></strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox2" required="">
                                                <label class="form-check-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td><strong>198805072009122001</strong></td>
                                        <td><div class="d-flex align-items-center"><img src="images/avatar/1.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">Endah Prihati</span></div></td>
                                        <td>PERAWAT	</td>
                                        <td>Aster 5</td>
                                        <td>401522224435962</td>
                                        <td>9 Juli 2027</td>
                                        <td><div class="d-flex align-items-center"><i class="fa fa-circle text-success me-1"></i> Diterima</div></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox3" required="">
                                                <label class="form-check-label" for="customCheckBox3"></label>
                                            </div>
                                        </td>
                                        <td><strong>198412302006041004</strong></td>
                                        <td><div class="d-flex align-items-center"><img src="images/avatar/2.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">KUSIWARDANI, SKep.Ners</span></div></td>
                                        <td>PERAWAT	</td>
                                        <td>Edelweis</td>
                                        <td>1401722224434469</td>
                                        <td>25 Desember 2027</td>
                                        <td><div class="d-flex align-items-center"><i class="fa fa-circle text-danger me-1"></i> Ditolak</div></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-check custom-checkbox checkbox-success check-lg me-3">
                                                <input type="checkbox" class="form-check-input" id="customCheckBox4" required="">
                                                <label class="form-check-label" for="customCheckBox4"></label>
                                            </div>
                                        </td>
                                        <td><strong>197710102001122002</strong></td>
                                        <td><div class="d-flex align-items-center"><img src="images/avatar/3.jpg" class="rounded-lg me-2" width="24" alt=""> <span class="w-space-no">Indah Pratiwi, A.Md.Kep</span></div></td>
                                        <td>PERAWAT	</td>
                                        <td>Dahlia 5</td>
                                        <td>1401522224468329</td>
                                        <td>26 Desember 2023</td>
                                        <td><div class="d-flex align-items-center"><i class="fa fa-circle text-warning me-1"></i> Diproses</div></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection