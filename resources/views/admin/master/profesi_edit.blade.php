<div class="modal-header">
    <h5 class="modal-title">Edit Data Profesi</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal">
    </button>
</div>
<form action="javascript:formSubmit('modal_edit')" id="modal_edit" url="{{ route('profesi.update') }}" method="post">
    <div class="modal-body">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">
        <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Nama Profesi</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nama_profesi" placeholder="Masukkan nama profesi" value="{{ $data->nama_profesi }}">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Tutup</button>
        <button type="button" onclick="formSubmit('modal_edit')" class="btn btn-sm btn-primary">Simpan Perubahan</button>
    </div>
</form>
