<div class="modal-header">
    <h5 class="modal-title">Tambah Data Ruang</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal">
    </button>
</div>
<form action="javascript:formSubmit('modal_input')" id="modal_input" url="{{ route('ruangan.create') }}" method="post">
    <div class="modal-body">
        @csrf
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Nama Ruang</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nama_ruang" placeholder="Masukkan nama ruang">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Tutup</button>
        <button type="button" onclick="formSubmit('modal_input')" class="btn btn-sm btn-primary">Simpan</button>
    </div>
</form>
