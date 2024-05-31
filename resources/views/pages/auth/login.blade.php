@extends('layout.main')

@section('page_content')
    <div id="login-page" class="bg-white">
        <div class="login-box">
            <div class="login-content">

                <section class="login-header mb-4">
                    <img src="/assets/files/img/reisy-logo.png" alt="">
                    <br>
                    <br>
                    <h2 class="text-dark mb-0">Sign In</h2>
                    <span class="text-muted">Silahkan masuk untuk mengakses aplikasi</span>
                </section>
                <form action="{{ route('auth.authenticate') }}" method="post">
                    @csrf
                    <section class="login-form">
                        <div class="form-group mb-3">
                            <label for="username"
                                class="@error('username')
                                text-danger
                        @enderror">Username</label>
                            <input type="text" name="username" id="username"
                                class="form-control @error('username')
                                is-invalid
                            @enderror"
                                autofocus value="{{ old('username') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password"
                                class="@error('password')
                            text-danger
                        @enderror">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password')
                            is-invalid
                        @enderror"
                                value="{{ old('password') }}">
                        </div>

                    </section>
                    <section class="login-button">
                        <button type="submit" class="btn btn-primary d-grid">
                            Sign in
                        </button>
                    </section>
                </form>
                <section class="login-link">
                    <span>Lupa akun? <b><a href="#">Klik Disini!</a></b></span>
                </section>
            </div>
        </div>
    </div>
@endsection
