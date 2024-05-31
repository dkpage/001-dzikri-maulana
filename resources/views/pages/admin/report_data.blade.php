@extends('layout.admin')

@section('pages_css')
    <link href="/assets/plugins/DataTables-bs5/datatables.min.css" rel="stylesheet">
@endsection

@section('page_content')
    <section id="reports-data" class="table-responsive">
    </section>
@endsection

@section('pages_scripts')
    <script src="/assets/plugins/DataTables-bs5/datatables.js"></script>

    </script>
    <script type="text/javascript">
        $(function() {
            // get table
            getTable(
                "#reports-data",
                "{{ route('reports.index') }}",
                "#reports-table",
                true)
        })
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
                        url: "{{ route('reports.delete') }}",
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
                                getTable(
                                    "#reports-data",
                                    "{{ route('reports.index') }}",
                                    "#reports-table",
                                    true)
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
