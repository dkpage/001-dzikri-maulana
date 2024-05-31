@extends('layout.admin')

@section('pages_css')
    {{-- <link href="/assets/plugins/_extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="/assets/plugins/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/assets/plugins/_extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" /> --}}
@endsection

@section('page_content')
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="card border-end shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">236</h2>

                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Karyawan
                            </h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted">
                                <i data-feather="users"></i>
                                {{-- <i class="fi fi-rr-users"></i> --}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card border-end shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">120</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Laporan Per Hari
                            </h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="file-text"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card border-end shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <div class="d-inline-flex align-items-center">
                                <h2 class="text-dark mb-1 font-weight-medium">1538</h2>
                                <span
                                    class="badge bg-success font-10 text-white font-weight-medium rounded-pill ms-2 d-md-none d-lg-block">+18.33%</span>
                            </div>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Laporan
                            </h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="folder"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card shadow">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h2 class="text-dark mb-1 font-weight-medium">864</h2>
                            <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Cabang</h6>
                        </div>
                        <div class="ms-auto mt-md-3 mt-lg-0">
                            <span class="opacity-7 text-muted"><i data-feather="grid"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pages_scripts')
    <!--This page JavaScript -->
    {{-- <script src="/assets/plugins/_extra-libs/c3/d3.min.js"></script>
    <script src="/assets/plugins/_extra-libs/c3/c3.min.js"></script>
    <script src="/assets/plugins/chartist/dist/chartist.min.js"></script>
    <script src="/assets/plugins/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="/assets/plugins/_extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/assets/plugins/_extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/assets/theme/js/pages/dashboards/dashboard1.min.js"></script> --}}
@endsection
