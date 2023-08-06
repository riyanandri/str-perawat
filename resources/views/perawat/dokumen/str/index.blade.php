@extends('layouts.user')

@section('title')
    Dokumen STR
@endsection

@section('header')
    Dokumen STR
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
                        <h4 class="card-title">Data STR</h4>
                        <div class="btn-group">
                            <a href="{{ route('str.create') }}">
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
                                        <th class="align-middle pe-7">Berlaku Sd</th>
                                        <th class="align-middle" style="min-width: 12.5rem;">Keterangan</th>
                                        <th class="align-middle text-end">Status Dokumen</th>
                                        <th class="align-middle text-end">Status Upload</th>
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
                                                <a href="#"><strong>{{ $item->url }}</strong></a>
                                                <br>{{ $item->no_str }}
                                            </td>
                                            <td class="py-2">{{ $item->berlaku_sd }}</td>
                                            <td class="py-2">
                                                {{ $item->ket_str }}
                                            </td>
                                            @if ($item->status_dokumen == 'berlaku')
                                                <td class="py-2 text-center"><span class="badge badge-success">Berlaku<span
                                                            class="ms-1 fa fa-check"></span></span>
                                                </td>
                                            @else
                                                <td class="py-2 text-end"><span class="badge badge-danger">On
                                                        Hold<span class="ms-1 fa fa-ban"></span></span>
                                                </td>
                                            @endif
                                            @if ($item->status_upload == 'pending')
                                                <td>
                                                    <div class="py-2 text-center"><i
                                                            class="fa fa-circle text-warning me-1"></i>
                                                        Pending</div>
                                                </td>
                                            @elseif ($item->status_upload == 'ditolak')
                                                <td>
                                                    <div class="py-2 text-center"><i
                                                            class="fa fa-circle text-danger me-1"></i>
                                                        Ditolak</div>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="py-2 text-center"><i
                                                            class="fa fa-circle text-success me-1"></i>
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
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('assets/vendor/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    {{-- <script type="text/javascript">
        $(window).on("load", function() { //otomatis aktif ketika page di refresh
            reload(); //fungsi untuk load table
        });

        $(function() { //otomatis aktif ketika page di jalankan
            //fungsi untuk load csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        //fungsi untuk load tabel
        window.reload = function() {
            var url = "{{ route('str.data') }}";
            var param = {};
            $.ajax({
                type: "GET",
                dataType: "json",
                data: param,
                url: url,
                beforeSend: function() {
                    $("#area_tabel").html("<div class='text-center'>Mohon Tunggu...</div>");
                },
                success: function(val) {
                    $("#area_tabel").html(val['data']);
                }
            });
        }

        //fungsi untuk load form input
        window.input = function() {
            $("#strModal").modal({
                backdrop: 'static',
                keyboard: false
            });
            var url = "{{ route('str.create') }}";
            var param = {};
            $.ajax({
                type: "GET",
                dataType: "json",
                data: param,
                url: url,
                success: function(val) {
                    $("#str_modal").html(val['data']);
                }
            });
        }

        //fungsi untuk load form edit
        window.edit = function(id) {
            $("#strModal").modal({
                backdrop: 'static',
                keyboard: false
            });
            var url = "{{ route('str.edit') }}";
            var param = {
                id: id
            };
            $.ajax({
                type: "GET",
                dataType: "json",
                data: param,
                url: url,
                success: function(val) {
                    $("#str_modal").html(val['data']);
                }
            });
        }

        //fungsi untuk insert atau update
        window.formSubmit = function(id) {
            var param = $("#" + id).serialize();
            var url = $("#" + id).attr("url");
            $.ajax({
                type: "POST",
                dataType: "json",
                data: param,
                url: url,
                success: function(val) {
                    if (val["status"] == false) {
                        // alert(val['info']);
                        toastr.info(val['info']);
                    } else {
                        $("#" + id)[0].reset();
                        // alert(val['info']);
                        toastr.success(val['info']);
                        reload();
                        $("#strModal").modal("hide");
                        $("body").removeClass("modal-open");
                    }
                }
            });
        }

        window.hapus = function(id) {
            swal({
                title: "Yakin ingin menghapus?",
                text: "Data yang telah dihapus tidak dapat dikembalikan!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya, hapus",
                cancelButtonText: "Batal",
                closeOnConfirm: !1
            }).then(function(e) {
                if (e.value == true) {
                    var url = "str/destroy/" + id;
                    var param = {
                        id: id
                    };
                    $.ajax({
                        type: "DELETE",
                        dataType: "json",
                        data: param,
                        url: url,
                        success: function(val) {
                            if (val["status"] == true) {
                                // alert(val['info']);
                                swal({
                                    title: "Berhasil",
                                    text: "Data telah berhasil dihapus",
                                    type: "success",
                                    confirmButtonColor: "#DD6B55"
                                })
                                reload();
                            }
                        }
                    });
                }
            })
            return false;
        }
    </script> --}}
@endpush
