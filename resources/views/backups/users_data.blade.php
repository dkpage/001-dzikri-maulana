@extends('layout.admin')

@section('pages_css')
    <link href="/assets/plugins/DataTables-bs5/datatables.min.css" rel="stylesheet">
@endsection

@section('page_content')
    {{-- {{ dd($user_data) }} --}}
    <section id="userData-tools">
        <div class="users-data-tools d-grid d-md-flex justify-content-end align-items-center gap-2">
            <a href="javascript:" class="btn btn-primary" id="tambahUser">
                <i class="fi fi-rr-plus"></i>
                <span>Tambah Pengguna</span>
            </a>

        </div>
    </section>
    <section class="user-database table-responsive">
        <table id="users-table" class="table table-bordered table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama Pengguna</th>
                    <th>Role</th>
                    <th>Tempat Kerja</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{ $i = 1 }}
                @foreach ($users_data as $user)
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if ($user->role == 1)
                                {{ 'Admin' }}
                            @elseif($user->role == 2)
                                {{ 'User' }}
                            @endif
                        </td>
                        <td>Kantor Pusat</td>
                        <td>
                            <a href="javascript:" class="btn btn-sm btn-primary detailBtn" data-id={{ $user->id }}>
                                <i class="fi fi-rr-user"></i>
                                <span>Edit Detail</span>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-danger">
                                <i class="fi fi-rr-trash"></i>
                                <span>Hapus</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    {{-- MODAL FORM UNTUK TAMBAH USER  --}}
    <div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="tambahUserModal" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="formTambahUser">

                        @csrf
                        <div class="form-group mb-2">
                            <label for="nama">Nama Pengguna</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-select select2 form-control">
                                <option value="" selected>Pilih Role</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>

                </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpanUser">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL FORM UNTUK EDIT USER  --}}
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModal" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="number" class="d-none" name="user-id">
                        <div class="form-group mb-2">
                            <label for="nama">Nama Pengguna</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="">
                        </div>
                        <div class="form-group mb-2">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" class="form-control">
                            <input type="text" name="pass" id="pass" class="form-control d-none">
                        </div>
                        <div class="form-group mb-2">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-select select2">
                                <option value="">Pilih Role</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <hr>
                        <span class="fw-bold">Data Pekerjaan</span>
                        <hr>
                        <div class="form-group mb-2">
                            <label for="job_position">Jabatan</label>
                            <select name="job_position" id="job_position" class="form-select select2">
                                <option value="">Pilih Jabatan</option>
                                <option value="1">Crew</option>
                                <option value="2">Head Outlet</option>
                                <option value="3">Supervisor</option>
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="outlet">Tempat Kerja</label>
                            <select name="outlet" id="outlet" class="form-select select2">
                                <option value="">Pilih Tempat Kerja</option>
                                <option value="1">MAJMA - Maja Atmaja</option>
                                <option value="2">Head Office</option>
                                <option value="3">Branch Office Cianjur</option>
                            </select>
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
        new DataTable("#users-table", {
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
        $("#tambahUser").on("click", function() {
            $("#tambahUserModal").modal('show');
        })
        // $(document).ready(function() {
        //     $("#editUserModal").modal('show');
        // })
    </script>

    <script type="text/javascript">
        $("#simpanUser").on("click", function() {
            var nama = $("#formTambahUser input#nama");
            var username = $("#formTambahUser input#username");
            var password = $("#formTambahUser input#password");
            var role = $("#formTambahUser select#role");
            var token = $("#formTambahUser input[name=_token]");

            // console.log(nama.val() + username.val() + password.val() + role.val());

            // $.get("{{ route('auth.cek_login') }}", {
            //     // name: nama,
            //     // uname: username,
            //     // pass: password,
            //     // roleUser: role
            // }).done(function() {
            //     console.log('post requested');
            // })
            $.ajax({
                type: "POST",
                url: "{{ route('user_data.add_user') }}",
                // data: {
                //     name: nama.val(),
                //     uname: username.val(),
                //     pass: password.val(),
                //     roleUser: role.val(),
                //     _token: '{!! csrf_token() !!}'
                // },
                data: jQuery("#formTambahUser").serialize(),
                success: function(result) {
                    console.log(result);
                    if (result.success) {
                        console.log("sukses!");
                    } else {
                        $.each(result.error, function(key, value) {
                            console.log(key + value);
                        })
                    }
                },
                dataType: "json"
            });
        })
    </script>
@endsection
