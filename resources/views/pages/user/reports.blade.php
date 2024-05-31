@extends('layout.user')

@section('pages_css')
    <link href="/assets/plugins/DataTables-bs5/datatables.min.css" rel="stylesheet">
@endsection

@section('page_content')
    <section id="reportData-tools">
        <div class="users-data-tools d-grid d-md-flex justify-content-end align-items-center gap-2">
            <a href="{{ route('user.report_form') }}" class="btn btn-primary" id="tambahUser">
                <i class="fi fi-rr-plus"></i>
                <span>Buat Laporan</span>
            </a>

        </div>
    </section>
    <section class="reports-data table-responsive">
        <table id="reports-table" class="table table-bordered table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>No. Dokumen</th>
                    <th>Tanggal Laporan</th>
                    <th>Judul Laporan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($reports as $report)
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td>{{ $report->document_number }}</td>
                        <td>{{ $report->created_at }}</td>
                        <td>{{ $report->report_title }}</td>
                        <td>
                            <a href="{{ route('user.report_detail', $report->document_number) }}"
                                class="btn btn-sm btn-primary">
                                <i class="fi fi-rr-document"></i>
                                <span>Detail</span>
                            </a>
                            <a href="javascript:void(0)" class="btn btn-sm btn-danger"
                                onclick="deleteReport({{ $report->id }}, '{{ $report->report_title }}', 'TABLE')">
                                <i class="fi fi-rr-trash"></i>
                                <span>Hapus</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection

@section('pages_scripts')
    <script src="/assets/plugins/DataTables-bs5/datatables.js"></script>

    </script>
    <script type="text/javascript">
        new DataTable("#reports-table", {
            layout: {
                topStart: {
                    buttons: [
                        'copy', 'excel', 'pdf', 'colvis'
                    ]
                }
            }
        });
    </script>
    <script>
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
