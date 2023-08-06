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
                        {{-- <div class="btn-group">
                            <button type="button" onclick="input()" class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                data-bs-target="#strModal">Upload Dokumen</button>
                            <button type="button" onclick="reload()" class="btn btn-sm btn-light">Refresh</button>
                        </div> --}}
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
                                            <td class="py-2 text-end"><span
                                                    class="badge badge-success">{{ $item->status }}<span
                                                        class="ms-1 fa fa-check"></span></span>
                                            </td>
                                            <td class="py-2 text-end">
                                                <div class="dropdown text-sans-serif"><button
                                                        class="btn btn-primary tp-btn-light sharp" type="button"
                                                        id="order-dropdown-0" data-bs-toggle="dropdown"
                                                        data-boundary="viewport" aria-haspopup="true"
                                                        aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                                                height="18px" viewbox="0 0 24 24" version="1.1">
                                                                <g stroke="none" stroke-width="1" fill="none"
                                                                    fill-rule="evenodd">
                                                                    <rect x="0" y="0" width="24"
                                                                        height="24"></rect>
                                                                    <circle fill="#000000" cx="5" cy="12"
                                                                        r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="12" cy="12"
                                                                        r="2">
                                                                    </circle>
                                                                    <circle fill="#000000" cx="19" cy="12"
                                                                        r="2">
                                                                    </circle>
                                                                </g>
                                                            </svg></span></button>
                                                    <div class="dropdown-menu dropdown-menu-end border py-0"
                                                        aria-labelledby="order-dropdown-0">
                                                        <div class="py-2">
                                                            <a class="dropdown-item" href="javascript:void(0);">Show</a>
                                                            <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                            <div class="dropdown-divider"></div><a
                                                                class="dropdown-item text-danger"
                                                                href="javascript:void(0);">Delete</a>
                                                        </div>
                                                    </div>
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
