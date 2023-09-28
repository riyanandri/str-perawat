<!-- SPKK Modal -->
{{-- <div class="modal fade" id="spkkModal{{ $spkk->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('dokumenAdmin.spkkUpdateStatus', $spkk->id) }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Update Status Dokumen SPKK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="{{ $spkk->id }}" id="id" name="id">
                    <pre>NIP Pegawai&nbsp;&nbsp;&nbsp;&nbsp;: {{ $spkk->pegawai->nip }}</pre>
                    <pre>No STR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $spkk->no_dokumen }}</pre>
                    <pre>Berlaku Sampai&nbsp;: {{ $spkk->berlaku_sd }}</pre>
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Status Dokumen</label>
                        <select class="default-select form-control wide w-100" name="status">
                            <option value="pending">Pending</option>
                            <option value="ditolak">Ditolak</option>
                            <option value="diterima">Diterima</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-sm btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

<!-- STR Modal -->
{{-- <div class="modal fade" id="strModal{{ $str->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('dokumenAdmin.strUpdateStatus', $str->id) }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Update Status Dokumen STR</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="{{ $str->id }}" id="id" name="id">
                    <pre>NIP Pegawai&nbsp;&nbsp;&nbsp;&nbsp;: {{ $str->pegawai->nip }}</pre>
                    <pre>No STR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{ $str->no_dokumen }}</pre>
                    <pre>Berlaku Sampai&nbsp;: {{ $str->berlaku_sd }}</pre>
                    <div class="mb-3">
                        <label class="col-sm-3 col-form-label">Status Dokumen</label>
                        <select class="default-select form-control wide w-100" name="status">
                            <option value="pending">Pending</option>
                            <option value="ditolak">Ditolak</option>
                            <option value="diterima">Diterima</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-sm btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
