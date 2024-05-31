@extends('layout.admin')

@section('pages_css')
@endsection

@section('page_content')
    <section id="">
        <div class="users-data-tools d-grid d-md-flex justify-content-end align-items-center gap-2">
            <a href="javascript:void(0)" class="btn btn-primary" id="printPage">
                <i class="fi fi-rr-print"></i>
                <span>Cetak Laporan</span>
            </a>

        </div>
    </section>

    <section class="mt-4 ">
        <div class="report_detail container-fluid table-responsive">
            <table class="table table-striped" style="width: 100%">
                <tr>
                    <td style="">No. Dokumen</td>
                    <td>:</td>
                    <td>{{ $report->document_number }}</td>
                </tr>
                <tr>
                    <td>Nama Karyawan</td>
                    <td>:</td>
                    <td>{{ $report->user_name }}</td>
                </tr>
                <tr>
                    <td>Outlet</td>
                    <td>:</td>
                    <td>{{ $report->outlet_name }}</td>
                </tr>
                <tr>
                    <td>Tanggal Laporan</td>
                    <td>:</td>
                    <td>{{ $report->created_at }}</td>
                </tr>
                <tr>
                    <td>Judul Laporan</td>
                    <td>:</td>
                    <td>{{ $report->report_title }}</td>
                </tr>
                <tr>
                    <td>Deskripsi Laporan</td>
                    <td>:</td>
                    <td>{{ $report->report_desc }}
                    </td>
                </tr>
                <tr>
                    <td colspan="3">Dokumentasi</td>

                </tr>
                <tr>
                    <td colspan="3">
                        <img src="/assets/files/img/reports/work.png" alt="" class="img-luid">
                    </td>
                </tr>
            </table>
        </div>
    </section>

    {{-- <section class="documentPage">
        <div class="docWrapper" data-margin-x="15mm" data-margin-y="20mm">
            <div class="docContent">
                <div class="page-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="col-6 d-grid">
                            <h4>Reporting Information System</h4>
                            <span>V-1.0.0</span>
                        </div>
                        <div class="col-6 text-end">
                            <img src="/assets/files/img/reisy-icon.png" alt="" style="width: 100px">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="page-content">
                    <table class="">
                        <tr>
                            <td>No. Dokumen </td>
                            <td>: </td>
                            <td>RE-009098798</td>
                        </tr>
                        <tr>
                            <td>Nama </td>
                            <td>: </td>
                            <td>Dzikry Maulana</td>
                        </tr>
                        <tr>
                            <td>Outlet </td>
                            <td>: </td>
                            <td>OT-MAJMA</td>
                        </tr>
                    </table>
                    <br>
                    <h3 class="text-dark">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, fugit.
                    </h3>
                    <br>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus officia atque deleniti sunt quia
                        ducimus omnis. Quos maxime dolor saepe amet fuga eligendi minus sed commodi. Ratione et modi illo
                        illum recusandae quia aliquid reiciendis iure, soluta repellat tempora consequatur culpa quam ut
                        laborum eum? Iure veniam, possimus quo adipisci veritatis accusamus, est a, odit voluptatum animi
                        enim officia ex blanditiis ad qui ducimus omnis beatae consectetur assumenda! Voluptates labore
                        commodi, fugiat atque, laborum iure mollitia quasi ea praesentium quos alias qui! Eum laboriosam
                        alias nostrum fugiat necessitatibus dolor nemo quo? Dolores quos totam, temporibus sequi ullam vitae
                        accusantium dolore.
                    </p>
                    <br>
                    <img src="https://source.unsplash.com/office" alt="" class="img-fluid">
                </div>

            </div>
        </div>
    </section> --}}
@endsection

@section('pages_scripts')
    <script src="/assets/dists/js/components/docPage.js"></script>
@endsection
