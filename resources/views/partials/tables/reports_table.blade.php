<table id="reports-table" class="table table-bordered table-striped table-hover" style="width:100%">
    <thead>
        <tr>
            <th class="text-center">No</th>
            {{-- <th>No. Dokumen</th> --}}
            <th>No. Dokumen</th>
            <th>Tanggal Laporan</th>
            <th>Judul Laporan</th>
            <th>Nama Karyawan</th>
            <th>Cabang</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        {{-- @dd($reports) --}}
        @foreach ($reports as $report)
            <tr>
                <td class="text-center">{{ $i++ }}</td>
                {{-- <td>RE-232876398809</td> --}}
                <td>{{ $report->document_number }}</td>
                <td>{{ $report->created_at }}</td>
                <td>{{ $report->report_title }}</td>
                <td>{{ $report->user_name }}</td>
                <td>{{ $report->outlet_name }}</td>
                <td>
                    <a href="{{ route('admin.report_detail', $report->id) }}" class="btn btn-sm btn-primary">
                        <i class="fi fi-rr-document"></i>
                        <span>Detail</span>
                    </a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-danger"
                        onclick="deleteReport({{ $report->id }}, '{{ $report->report_title }}')">
                        <i class="fi fi-rr-trash"></i>
                        <span>Hapus</span>
                    </a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
