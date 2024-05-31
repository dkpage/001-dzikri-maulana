@extends('layout.admin')
@section('page_content')
    <section>
        <div class="card">

            {{-- <div class="card-header">
                <h3 class="card-title">Tambah Pengguna</h3>
            </div> --}}
            <div class="card-body">
                <form action="{{ route('user_data.add_user') }}" method="post" id="formTambahUser">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name">Nama Pengguna</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username"
                            class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                    </div>
                    <div class="form-group mb-2 d-grid">
                        <label for="role">Role</label>
                        <select name="role" id="role"
                            class="form-select select2 form-control @error('role') is-invalid @enderror"
                            value="{{ old('role') }}">
                            <option value="">Pilih Role</option>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                    <span class="fw-bold">Data Pekerjaan</span>
                    <div class="form-group mb-2 d-grid">
                        <label for="job_position">Jabatan</label>
                        <select name="job_position" id="job_position" class="form-select select2">
                            <option value="">Pilih Jabatan</option>
                            <option value="1">Crew</option>
                            <option value="2">Head Outlet</option>
                            <option value="3">Supervisor</option>
                        </select>
                    </div>
                    <div class="form-group mb-2 d-grid">
                        <label for="outlet">Tempat Kerja</label>
                        <select name="outlet" id="outlet" class="form-select select2">
                            <option value="">Pilih Tempat Kerja</option>
                            <option value="1">MAJMA - Maja Atmaja</option>
                            <option value="2">Head Office</option>
                            <option value="3">Branch Office Cianjur</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="upFoto">Upload Foto</label>
                        <input type="file" name="upFoto" id="upFoto" class="form-control" accept="image/*">
                    </div>
                    <div class="mt-5">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="simpanUser">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('pages_scripts')
    {{-- <script>
        $(function() {
            var inSelect = $("select");

            $.each(inSelect, function(index) {
                var selectVal = $(this).attr("value");
                console.log(selectVal);
                $(this).children("option[value=" + selectVal + "]").attr("selected", "selected");
            })
        })
    </script> --}}
@endsection
