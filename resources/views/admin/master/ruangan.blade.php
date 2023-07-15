@extends('layouts.template')

@section('title')
    Ruangan - STR Perawat
@endsection

@section('header')
    Ruangan
@endsection

@section('content')
<div class="container-fluid">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    {{-- <h4 class="card-title">Data Profesi</h4> --}}
                    <div class="btn-group">
                        <button type="button" onclick="input()" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#ruanganModal">Tambah Data</button>
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
 <div class="modal fade" id="ruanganModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div id="ruangan_modal">

            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
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
        var url = "{{ route('ruangan.data') }}";
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
        $("#ruanganModal").modal({backdrop: 'static',keyboard: false});
        var url = "{{ route('ruangan.input') }}";
        var param = {};
        $.ajax({
            type: "GET",
            dataType: "json",
            data: param,
            url: url,
            success: function(val) {
                $("#ruangan_modal").html(val['data']);
            }
        });
    }

    //fungsi untuk load form edit
    window.edit = function(id) {
        $("#ruanganModal").modal({backdrop: 'static',keyboard: false});
        var url = "{{ route('ruangan.edit') }}";
        var param = {id: id};
        $.ajax({
            type: "GET",
            dataType: "json",
            data: param,
            url: url,
            success: function(val) {
                $("#ruangan_modal").html(val['data']);
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
                    alert(val['info']);
                }else{
                    $("#" + id)[0].reset();
                    alert(val['info']);
                    reload();
                    $("#ruanganModal").modal("hide");
                    $("body").removeClass("modal-open");
                }
            }
        });
    }

    //fungsi untuk delete dengan konfirmasi
    window.hapus = function(id){
        if (confirm("Anda yakin ingin menghapus?")) {
            var url = "ruangan/destroy/"+id;
            var param = {id: id};
            $.ajax({
                type: "DELETE",
                dataType: "json",
                data: param,
                url: url,
                success: function(val) {
                    if (val["status"] == true) {
                        alert(val['info']);
                        reload();
                    }
                }
            });
        }
        return false;
    }
    </script>
@endpush