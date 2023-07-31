@extends('layouts.user')

@section('title')
    Dokumen
@endsection

@section('header')
    Data Dokumen
@endsection

@section('content')
<div class="container-fluid">
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                                <tr>
                                    <th class="align-middle">
                                        <div class="form-check custom-checkbox">
                                            <input type="checkbox" class="form-check-input" id="checkAll">
                                            <label class="form-check-label" for="checkAll"></label>
                                        </div>
                                    </th>
                                    <th class="align-middle">Order</th>
                                    <th class="align-middle pe-7">Date</th>
                                    <th class="align-middle" style="min-width: 12.5rem;">Ship To</th>
                                    <th class="align-middle text-end">Status</th>
                                    <th class="align-middle text-end">Amount</th>
                                    <th class="no-sort"></th>
                                </tr>
                            </thead>
                            <tbody id="orders">
                                <tr class="btn-reveal-trigger">
                                    <td class="py-2">
                                        <div class="form-check custom-checkbox checkbox-success">
                                            <input type="checkbox" class="form-check-input" id="checkbox">
                                            <label class="form-check-label" for="checkbox"></label>
                                        </div>
                                    </td>
                                    <td class="py-2">
                                        <a href="#">
                                            <strong>#181</strong></a> by <strong>Ricky
                                            Antony</strong><br><a href="mailto:ricky@example.com">ricky@example.com</a></td>
                                    <td class="py-2">20/04/2020</td>
                                    <td class="py-2">Ricky Antony, 2392 Main Avenue, Penasauka, New Jersey 02149
                                        <p class="mb-0 text-500">Via Flat Rate</p>
                                    </td>
                                    <td class="py-2 text-end"><span class="badge badge-success">Completed<span class="ms-1 fa fa-check"></span></span>
                                    </td>
                                    <td class="py-2 text-end">$99
                                    </td>
                                    <td class="py-2 text-end">
                                        <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-0" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-0">
                                                <div class="py-2"><a class="dropdown-item" href="javascript:void(0);">Completed</a><a class="dropdown-item" href="javascript:void(0);">Processing</a><a class="dropdown-item" href="javascript:void(0);">On Hold</a><a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td class="py-2">
                                        <div class="form-check custom-checkbox ">
                                            <input type="checkbox" class="form-check-input" id="checkbox1">
                                            <label class="form-check-label" for="checkbox1"></label>
                                        </div>
                                    </td>
                                    <td class="py-2">
                                        <a href="#">
                                            <strong>#182</strong></a> by <strong>Kin Rossow</strong><br><a href="mailto:kin@example.com">kin@example.com</a></td>
                                    <td class="py-2">20/04/2020</td>
                                    <td class="py-2">Kin Rossow, 1 Hollywood Blvd,Beverly Hills, California 90210
                                        <p class="mb-0 text-500">Via Free Shipping
                                        </p>
                                    </td>
                                    <td class="py-2 text-end"><span class="badge badge-primary">Processing<span class="ms-1 fa fa-redo"></span></span>
                                    </td>
                                    <td class="py-2 text-end">$120
                                    </td>
                                    <td class="py-2 text-end">
                                        <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-1" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-1">
                                                <div class="py-2"><a class="dropdown-item" href="javascript:void(0);">Completed</a><a class="dropdown-item" href="javascript:void(0);">Processing</a><a class="dropdown-item" href="javascript:void(0);">On Hold</a><a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td class="py-2">
                                        <div class="form-check custom-checkbox checkbox-secondary">
                                            <input type="checkbox" class="form-check-input" id="checkbox2">
                                            <label class="form-check-label" for="checkbox2"></label>
                                        </div>
                                    </td>
                                    <td class="py-2">
                                        <a href="#">
                                            <strong>#183</strong></a> by <strong>Merry
                                            Diana</strong><br><a href="mailto:merry@example.com">merry@example.com</a></td>
                                    <td class="py-2">30/04/2020</td>
                                    <td class="py-2">Merry Diana, 1 Infinite Loop, Cupertino, California 90210
                                        <p class="mb-0 text-500">Via Link Road</p>
                                    </td>
                                    <td class="py-2 text-end"><span class="badge badge-secondary">On
                                            Hold<span class="ms-1 fa fa-ban"></span></span>
                                    </td>
                                    <td class="py-2 text-end">$70
                                    </td>
                                    <td class="py-2 text-end">
                                        <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-2" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-2">
                                                <div class="py-2"><a class="dropdown-item" href="javascript:void(0);">Completed</a><a class="dropdown-item" href="javascript:void(0);">Processing</a><a class="dropdown-item" href="javascript:void(0);">On Hold</a><a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td class="py-2">
                                        <div class="form-check custom-checkbox  checkbox-warning">
                                            <input type="checkbox" class="form-check-input" id="checkbox3">
                                            <label class="form-check-label" for="checkbox3"></label>
                                        </div>
                                    </td>
                                    <td class="py-2">
                                        <a href="#">
                                            <strong>#184</strong></a> by <strong>Bucky
                                            Robert</strong><br><a href="mailto:bucky@example.com">bucky@example.com</a></td>
                                    <td class="py-2">30/04/2020</td>
                                    <td class="py-2">Bucky Robert, 1 Infinite Loop, Cupertino, California 90210
                                        <p class="mb-0 text-500">Via Free Shipping</p>
                                    </td>
                                    <td class="py-2 text-end"><span class="badge badge-warning">Pending<span class="ms-1 fas fa-stream"></span></span>
                                    </td>
                                    <td class="py-2 text-end">$92
                                    </td>
                                    <td class="py-2 text-end">
                                        <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-3" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewbox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                            <div class="dropdown-menu dropdown-menu-end border py-0" aria-labelledby="order-dropdown-3">
                                                <div class="py-2"><a class="dropdown-item" href="javascript:void(0);">Completed</a><a class="dropdown-item" href="javascript:void(0);">Processing</a><a class="dropdown-item" href="javascript:void(0);">On Hold</a><a class="dropdown-item" href="javascript:void(0);">Pending</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection