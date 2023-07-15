<div class="modal-header">
    <h5 class="modal-title">Edit Data Ruang</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal">
    </button>
</div>
<form action="javascript:formSubmit('modal_edit')" id="modal_edit" url="{{ route('ruangan.update') }}" method="post">
    <div class="modal-body">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Nama Ruang</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nama_ruang" placeholder="Masukkan nama ruang" value="{{ $data->nama_ruang }}">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Tutup</button>
        <button type="button" onclick="formSubmit('modal_edit')" class="btn btn-sm btn-primary">Simpan Perubahan</button>
    </div>
</form>
