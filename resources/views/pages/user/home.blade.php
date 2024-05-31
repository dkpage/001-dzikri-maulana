@extends('layout.user')
@section('page_content')
    <section class="user-home-card">
        <div class="card text-white bg-dark">
            <div class="card-body">
                <div class="card-text">
                    <h3>{{ date('l, d F Y') }}</h3>
                    <p class="card-text mb-0">
                        <span class="badge bg-white text-dark">Shift : Operasional Full</span>
                    </p>
                </div>
                <div class="card-btn d-flex justify-content-between align-items-center gap-2">
                    <a href="/user/reporting" class="btn btn-primary">Buat Laporan</a>
                    <a href="/user/reports" class="btn btn-light">Lihat Laporan</a>
                </div>
            </div>
        </div>
    </section>
    <section class="user-home-menu">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Quick Menu</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('partials.components.user_menu')
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="user-home-information">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Laporan Terbaru</h3>
                        </div>
                    </div>

                    <div class="card-body">
                        <ul class="list-unstyled">
                            @for ($i = 1; $i <= 5; $i++)
                                <li class="media d-flex align-items-start">
                                    <img class="d-flex me-3" src="/assets/files/img/user.png" width="60"
                                        alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h4 class="mt-0 mb-1">Judul Informasi yang di publikasikan</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla voluptas nihil
                                            veritatis
                                            explicabo ea quibusdam. Placeat dolorem aperiam omnis molestiae.
                                        </p>
                                    </div>
                                </li>
                            @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
