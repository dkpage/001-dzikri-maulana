@extends('layout.admin')

@section('pages_css')
    <link href="/assets/plugins/DataTables-bs5/datatables.min.css" rel="stylesheet">
@endsection

@section('page_content')
    <section id="userData-tools">
        <div class="users-data-tools d-grid d-md-flex justify-content-end align-items-center gap-2">
            <a href="javascript:" class="btn btn-primary" id="tambahUser">
                <i class="fi fi-rr-plus"></i>
                <span>Tambah Pengguna</span>
            </a>

        </div>
    </section>
    <section id="user-database" class="table-responsive">
        {{-- THIS IS STATE FOR TABLE USERS  --}}
    </section>
    {{-- MODAL FORM UNTUK DETAIL USER  --}}
    <div class="modal fade" id="detailUserModal" tabindex="-1" aria-labelledby="detailUserModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" id="formEditUser" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="" id="detId">
                    <div class="modal-body py-4">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <div id="detUserImg" class="border border-1 rounded-2 overflow-hidden image-edit-state">
                                    <img src="/assets/files/img/user_img/default.png" alt="" data-src="photo"
                                        class="img-fluid ">
                                </div>
                                <br>
                                <div class="form-group mb-2 d-none">
                                    <label for="photo">Ubah Foto</label>
                                    <input type="file" name="photo" id="photo" class="form-control"
                                        accept="image/*">
                                </div>
                            </div>
                            <div class="col-12 col-md-5 ">
                                <h5 class="fw-bold mb-3">Info Dasar</h5>
                                <div class="form-group mb-2">
                                    <label for="detName">Nama Pengguna</label>
                                    <input type="text" name="name" id="detName" class="form-control">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="detUsername">Username</label>
                                    <input type="text" name="username" id="detUsername" class="form-control">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="detEmail">e-Mail</label>
                                    <input type="email" name="email" id="detEmail" class="form-control">
                                </div>
                                <div class="form-group mb-2">
                                    <label for="password">Password</label>
                                    <input type="text" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group mb-2 d-grid">
                                    <label for="detRole">Role</label>
                                    <select name="role" id="detRole" class="form-select select2 form-control">
                                        <option value=""></option>
                                        @foreach ($roleData as $role)
                                            <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-5">
                                <h5 class="fw-bold mb-3">
                                    Data Kerja
                                </h5>
                                <div class="form-group mb-2 d-grid">
                                    <label for="detJabatan">Jabatan</label>
                                    <select name="job_id" id="detJabatan" class="form-select select2 form-control">
                                        <option value=""></option>
                                        @foreach ($jobPositionData as $jobPosition)
                                            <option value="{{ $jobPosition->id }}">{{ $jobPosition->position_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-2 d-grid">
                                    <label for="detCabang">Cabang</label>
                                    <select name="outlet_id" id="detCabang" class="form-select select2 form-control">
                                        <option value=""></option>
                                        @foreach ($outletsData as $outlets)
                                            <option value="{{ $outlets->id }}">{{ $outlets->initial }} -
                                                {{ $outlets->outlet_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <a href="javascript:" class="btn btn-primary" id="editUser">Update</a>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL FORM UNTUK TAMBAH USER  --}}
    <div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="tambahUserModal" aria-hidden="true"
        data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="formTambahUser">

                        @csrf
                        <div class="form-group mb-2">
                            <label for="name">Nama Pengguna</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">e-Mail</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group mb-2 d-grid">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-select select2 form-control">
                                <option value=""></option>
                                @foreach ($roleData as $role)
                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endforeach

                            </select>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="simpanUser">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pages_scripts')
    <script src="/assets/plugins/DataTables-bs5/datatables.js"></script>
    <script type="text/javascript">
        $(function() {
            // get table data
            getTable("#user-database", "{{ route('user_data.show_users_table') }}", "#users-table", true);
        })
    </script>

    <script>
        // modal tambah user
        $("#tambahUser").on("click", function() {
            $("#tambahUserModal").modal('show');
        })

        // simpan user
        $("#simpanUser").on("click", function() {

            var formAddUser = $("#formTambahUser")[0];
            var formAddData = new FormData(formAddUser);
            // console.log(formAddData);
            $.ajax({
                type: "POST",
                url: "{{ route('user_data.add_user') }}",
                data: formAddData,
                contentType: false,
                processData: false,
                success: function(result) {
                    // show alert
                    showToastify("success", result.message);
                    // reset form value
                    formAddUser.reset();
                    $(".select2").trigger("change");

                    // get table users
                    getTable("#user-database", "{{ route('user_data.show_users_table') }}",
                        "#users-table", true);
                    // hide modal
                    $("#tambahUserModal").modal('hide');

                    // invalid none
                    resetInvalid();

                },
                error: function(errors) {

                    for (const [key, value] of Object.entries(errors.responseJSON.errors)) {
                        // show alert error 
                        showToastify("error", `${value}`);
                        // form invalid
                        $("[name=" + `${key}` + "]").addClass("is-invalid");
                        $("[name=" + `${key}` + "]").siblings("label").addClass("text-danger");
                        // invalid init field
                        invalidInit();
                    }

                },
                dataType: "json"
            });
        })
    </script>

    <script type="text/javascript">
        // klik input gambar
        $(function() {
            $("#detUserImg").on("click", function() {
                $("input[name=photo]").trigger("click");
            })
        })

        // tampil modal detail/edit
        function showDetail(id) {
            var userId = id;

            var modalDetail = $("#detailUserModal");
            $.ajax({
                type: "POST",
                url: "{{ route('user_data.show_user') }}",
                data: {
                    "id": userId
                },
                success: function(result) {

                    var data = result.data[0];
                    var imgLink = 'default.png';
                    if (data.photo !== null) {
                        imgLink = data.photo;
                    }
                    $("#detUserImg > img").attr("src", "/assets/images/users/" + imgLink);
                    $("#detId").val(data.usid);
                    $("#detName").val(data.name);
                    $("#detUsername").val(data.username);
                    $("#detEmail").val(data.email);
                    $("#detRole").val(data.role);
                    $("#detJabatan").val(data.job_id);
                    $("#detCabang").val(data.outlet_id);
                    $(".select2").trigger("change");
                    modalDetail.modal("show");
                },
                dataType: 'json'
            });

        }

        // simpan hasil edit
        $("#editUser").on("click", function() {
            var formEdit = $("#formEditUser")[0];
            var formData = new FormData(formEdit);
            // console.log(formData);

            $.ajax({
                type: "POST",
                url: "{{ route('user_data.edit_user') }}",
                data: formData,
                contentType: false,
                processData: false,
                success: function(result) {
                    // console.log(result.data);
                    showToastify("success", result.message);
                    getTable("#user-database", "{{ route('user_data.show_users_table') }}",
                        "#users-table", true);
                    $("#detailUserModal").modal('hide');
                    formEdit.reset();
                },
                error: function(errors) {
                    for (const [key, value] of Object.entries(errors.responseJSON.errors)) {
                        showToastify("error", `${value}`);
                    }

                },
                dataType: "json",

            });
        })

        // hapus user
        function deleteUser(id, name) {
            Swal.fire({
                title: "Hapus?",
                text: "Yakin akan menghapus data " + name + "?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('user_data.delete_user') }}",
                        data: {
                            id: id,
                        },
                        success: function(result) {
                            // console.log(result);
                            if (result.status == "success") {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "Data " + name + " berhasil dihapus",
                                    icon: "success",
                                });
                                getTable("#user-database", "{{ route('user_data.show_users_table') }}",
                                    "#users-table", true);
                                $("#detailUserModal").modal('hide');
                            }
                        },
                        error: function(errors) {
                            for (const [key, value] of Object.entries(errors.responseJSON.errors)) {
                                showToastify("error", `${value}`);
                            }

                        },
                        dataType: "json",
                    });
                }
            });
        }
    </script>
@endsection
