@extends('layout.user')
@section('page_content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end align-items-end gap-2">
                <a href="javascript:" class="btn btn-sm btn-primary" onclick="openEdit()" id="editBtn">
                    <i class="fi fi-rr-user-pen"></i>
                    <span>Edit</span>
                </a>
                <a href="javascript:" class="d-none btn btn-sm btn-primary" onclick="saveData()" id="saveBtn">
                    <i class="fi fi-rr-check"></i>
                    <span>Simpan</span>
                </a>
            </div>
            <br>
            <form action="" method="post" id="formEditUser" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $user->usid }}" id="id">
                <div class="modal-body py-4">
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <div id="detUserImg" class="border border-1 rounded-2 overflow-hidden image-edit-state">
                                @if ($user->photo !== null)
                                    <img src="/assets/images/users/{{ $user->photo }}" alt="" data-src="photo"
                                        class="img-fluid ">
                                @else
                                    <img src="/assets/images/users/default.png" alt="" data-src="photo"
                                        class="img-fluid ">
                                @endif

                            </div>
                            <br>
                            <div class="form-group mb-2 d-none">
                                <label for="photo">Ubah Foto</label>
                                <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="col-12 col-md-5 ">
                            <h5 class="fw-bold mb-3">Info Dasar</h5>
                            <div class="form-group mb-2">
                                <label for="detName">Nama Pengguna</label>
                                <input type="text" name="name" id="detName" class="form-control"
                                    value="{{ $user->name }}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="detUsername">Username</label>
                                <input type="text" name="username" id="detUsername" class="form-control"
                                    value="{{ $user->username }}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="detEmail">e-Mail</label>
                                <input type="email" name="email" id="detEmail" class="form-control"
                                    value="{{ $user->email }}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="password">Password</label>
                                <input type="text" name="password" id="password" class="form-control" value="">
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

        </div>
    </div>
@endsection

@section('pages_scripts')
    <script>
        $("input, select").attr("disabled", "disabled")
    </script>
    @if ($user->job_id !== null)
        <script>
            $("#detJabatan").val({{ $user->job_id }});
            $(".select2").trigger("change");
        </script>
    @endif
    @if ($user->outlet_id !== null)
        <script>
            $("#detCabang").val({{ $user->outlet_id }});
            $(".select2").trigger("change");
        </script>
    @endif
    <script>
        $("#detUserImg").on("click", function() {
            $("input[name=photo]").trigger("click");
        })
        // 
    </script>
    <script>
        function openEdit() {
            $("input, select").removeAttr("disabled");
            $("#editBtn").addClass("d-none");
            $("#saveBtn").removeClass("d-none");
        }

        function saveData() {
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
                    // console.log(result);
                    showToastify("success", "Profil Berhasil di Update");
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                },
                error: function(errors) {
                    for (const [key, value] of Object.entries(errors.responseJSON.errors)) {
                        showToastify("error", `${value}`);
                    }

                },
                dataType: "json",

            });
        }
    </script>
@endsection
