<table class="table table-responsive-md">
    <thead>
        <tr>
            <th><strong>No</strong></th>
            <th><strong>Nama PK</strong></th>
            <th><strong>Ditambahkan Pada</strong></th>
            <th><strong>Diupdate Pada</strong></th>
            <th><strong>Aksi</strong></th>
        </tr>
    </thead>
    <tbody>
        @if (count($data) > 0)
            <?php $no=1; ?>
            @foreach ($data as $d)
            <tr>
                <td><strong>{{ $no++ }}</strong></td>
                <td>{{ $d->nama_area }}</td>
                <td>{{ $d->created_at }}</td>
                <td>{{ $d->updated_at }}</td>
                <td>
                    <div class="d-flex">
                        <button type="button" onclick="edit({{ $d->id }})" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt" data-bs-toggle="modal" data-bs-target="#jenisPkModal"></i></button>
                        <button type="button" onclick="hapus({{ $d->id }})" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                    </div>
                </td>
            </tr>  
            @endforeach
        @else
            <tr>
                <td class="text-center">Data tidak ditemukan!</td>
            </tr>
        @endif
    </tbody>
</table>
