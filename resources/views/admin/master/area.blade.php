@extends('layouts.template')

@section('title')
    Area - STR Perawat
@endsection

@section('header')
    Area
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/css/toastr.min.css') }}">
    <link href="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h4 class="card-title">Data Profesi</h4> --}}
                    <div class="btn-group">
                        <button type="button" onclick="input()" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#jenisPkModal">Tambah Data</button>
                        <button type="button" onclick="reload()" class="btn btn-sm btn-light">Refresh</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="area_tabel">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- Modal -->
 <div class="modal fade" id="jenisPkModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div id="jenis_pk_modal">

            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/vendor/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script type="text/javascript">
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
        var url = "{{ route('area.data') }}";
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
        $("#jenisPkModal").modal({backdrop: 'static',keyboard: false});
        var url = "{{ route('profesi.input') }}";
        var param = {};
        $.ajax({
            type: "GET",
            dataType: "json",
            data: param,
            url: url,
            success: function(val) {
                $("#jenis_pk_modal").html(val['data']);
            }
        });
    }

    //fungsi untuk load form edit
    window.edit = function(id) {
        $("#jenisPkModal").modal({backdrop: 'static',keyboard: false});
        var url = "{{ route('profesi.edit') }}";
        var param = {id: id};
        $.ajax({
            type: "GET",
            dataType: "json",
            data: param,
            url: url,
            success: function(val) {
                $("#jenis_pk_modal").html(val['data']);
            }
        });
    }

    //fungsi untuk insert atau update
    window.formSubmit = function(id){
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
                }else{
                    $("#" + id)[0].reset();
                    // alert(val['info']);
                    toastr.success(val['info']);
                    reload();
                    $("#jenisPkModal").modal("hide");
                    $("body").removeClass("modal-open");
                }
            }
        });
    }

    window.hapus = function(id){
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
            if(e.value == true){
                var url = "profesi/destroy/"+id;
                var param = {id: id};
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
    </script>
@endpush