@extends('layout.admin')

@section('pages_css')
    <link href="/assets/plugins/DataTables-bs5/datatables.min.css" rel="stylesheet">
@endsection

@section('page_content')
    <section id="outletData-tools">
        <div class="users-data-tools d-grid d-md-flex justify-content-end align-items-center gap-2">
            <a href="javascript:void(0)" class="btn btn-primary" id="tambahOutlet">
                <i class="fi fi-rr-plus"></i>
                <span>Tambah Outlet</span>
            </a>

        </div>
    </section>
    <section class="user-database table-responsive">
        <table id="outlets-table" class="table table-bordered table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Id Outlet</th>
                    <th>Nama Outlet</th>
                    <th>Inisial</th>
                    <th>Alamat Outlet</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 50; $i++)
                    <tr>
                        <td class="text-center">{{ $i }}</td>
                        <td>OUT-00{{ $i }}</td>
                        <td>Outlet Maja Atmaja</td>
                        <td>MAJMA</td>
                        <td>Jl. Maja Atmaja KM 02 Cianjur</td>
                        <td>

                            <a href="javascript:void(0)" class="btn btn-sm btn-primary">
                                <i class="fi fi-rr-pencil"></i>
                                <span>Edit</span>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-danger">
                                <i class="fi fi-rr-trash"></i>
                                <span>Hapus</span>
                            </a>
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </section>

    {{-- MODAL FORM TAMBAH OUTLET  --}}
    <div class="modal fade" id="tambahOutletModal" tabindex="-1" aria-labelledby="tambahOutletModal" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Outlet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group mb-2">
                            <label for="out-name">Nama Outlet</label>
                            <input type="text" name="out-name" id="out-name" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="out-init">Inisial Outlet</label>
                            <input type="text" name="out-init" id="out-init" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="out-address">Alamat Outlet</label>
                            <textarea type="text" name="out-address" id="out-address" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL FORM EDIT OUTLET  --}}
    <div class="modal fade" id="editOutletModal" tabindex="-1" aria-labelledby="editOutletModal" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Outlet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="number" class="d-none" name="out-id">
                        <div class="form-group mb-2">
                            <label for="out-name">Nama Outlet</label>
                            <input type="text" name="out-name" id="out-name" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="out-init">Inisial Outlet</label>
                            <input type="text" name="out-init" id="out-init" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="out-address">Alamat Outlet</label>
                            <textarea type="text" name="out-address" id="out-address" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pages_scripts')
    <script src="/assets/plugins/DataTables-bs5/datatables.js"></script>

    </script>
    <script type="text/javascript">
        new DataTable("#outlets-table", {
            layout: {
                topStart: {
                    buttons: [
                        'copy', 'excel', 'pdf', 'colvis'
                    ]
                }
            }
        });
    </script>
    <script type="text/javascript">
        $("#tambahOutlet").on("click", function() {
            $("#tambahOutletModal").modal('show');
        })
        // $(document).ready(function() {
        //     $("#editOutletModal").modal('show');
        // })
    </script>
@endsection
