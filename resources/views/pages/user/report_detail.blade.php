@extends('layout.user')

@section('pages_css')
@endsection

@section('page_content')
    <section id="">
        <div class="users-data-tools d-grid d-md-flex justify-content-end align-items-center gap-2">
            <a href="javascript:void(0)" class="btn btn-sm btn-primary" id="printPage">
                <i class="fi fi-rr-print"></i>
                <span>Cetak Laporan</span>
            </a>
            <a href="/user/edit_laporan/{{ $report->document_number }}" class="btn btn-sm btn-primary" id="editReport"
                onclick="">
                <i class="fi fi-rr-file-edit"></i>
                <span>Edit Laporan</span>
            </a>
            <a href="javascript:void(0)" class="btn btn-sm btn-danger"
                onclick="deleteReport({{ $report->id }}, '{{ $report->report_title }}')">
                <i class="fi fi-rr-trash"></i>
                <span>Hapus</span>
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
                        @if ($report->report_file !== null)
                            <img src="/assets/images/reports/{{ $report->report_file }}" alt="" class="img-fluid">
                        @else
                            <img src="/assets/files/img/reports/work.png" alt="" class="img-fluid">
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </section>
@endsection

@section('pages_scripts')
    <script src="/assets/dists/js/components/docPage.js"></script>
    <script>
        // HAPUS LAPORAN
        function deleteReport(id, name) {
            Swal.fire({
                title: "Hapus?",
                text: "Yakin akan laporan " + name + "?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Hapus",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "/reports/delete",
                        data: {
                            id: id,
                        },
                        success: function(result) {
                            if (result.status == "success") {
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "Data Laporan " + name + " berhasil dihapus",
                                    icon: "success",
                                });
                                setTimeout(function() {
                                    location.replace('/user/report_data');
                                }, 1000);
                            }
                        },
                        error: function(errors) {
                            for (const [key, value] of Object.entries(
                                    errors.responseJSON.errors
                                )) {
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
