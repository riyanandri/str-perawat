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
        @if (count($data) > 0)
            <?php $no = 1; ?>
            @foreach ($data as $d)
                <tr>
                    <td class="py-2">
                        {{ $no++ }}
                    </td>
                    <td class="py-2">
                        <a href="#"><strong>{{ $d->url }}</strong></a>
                        <br>{{ $d->no_str }}
                    </td>
                    <td class="py-2">{{ $d->berlaku_sd }}</td>
                    <td class="py-2">
                        {{ $d->ket_str }}
                    </td>
                    <td class="py-2 text-end"><span class="badge badge-success">Completed<span
                                class="ms-1 fa fa-check"></span></span>
                    </td>
                    <td class="py-2 text-end">$99
                    </td>
                    <td class="py-2 text-end">
                        <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp"
                                type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport"
                                aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px"
                                        viewbox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" cx="5" cy="12" r="2">
                                            </circle>
                                            <circle fill="#000000" cx="12" cy="12" r="2">
                                            </circle>
                                            <circle fill="#000000" cx="19" cy="12" r="2">
                                            </circle>
                                        </g>
                                    </svg></span></button>
                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                <div class="py-2">
                                    <a class="dropdown-item" href="javascript:void(0);">Show</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger"
                                        href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
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
