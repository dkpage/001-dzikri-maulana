@extends('layout.main')

@section('pages_css')
    <style>
        .cover-container {
            height: 100vh;
            /* padding: 20px 50px 20px 50px; */
        }

        h1>img {
            width: 180px;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
@endsection


@section('page_content')
    <div class="d-flex h-100 text-center text-bg-light">
        <div class="cover-container d-flex p-3 mx-auto flex-column justify-content-center align-items-center">

            <main class="px-3">
                <h1>
                    <img src="/assets/files/img/reisy-logo.png" alt="">
                </h1>
                <br>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid consectetur doloremque
                    <br>
                    sint. Voluptatibus amet vitae necessitatibus, distinctio excepturi architecto soluta.
                </p>
                <p class="lead">
                    <a href="{{ route('auth.login') }}" class="btn btn-primary fw-bold rounded">Login</a>
                </p>
            </main>
        </div>
    </div>
@endsection

@section('pages_scripts')
@endsection
