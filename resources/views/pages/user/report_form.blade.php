@extends('layout.user')
@section('page_content')
    <?php
    $page_title = 'Form Laporan Kerja';
    $report_title;
    $report_desc;
    $report_file;
    $outlet_id;
    
    if (isset($report)) {
        $report_title = $report->report_title;
        $report_desc = $report->report_desc;
        $report_file = $report->report_file;
        $outlet_id = $report->outlet_id;
    }
    
    ?>
    <section class="form-report mt-4">
        <div class="card">
            <div class="card-header">
                <h3>{{ $page_title }}</h3>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data" id="formReport">
                    @csrf
                    <input type="text" name="user_id" class="d-none" value="{{ $user->usid }}">
                    <div class="form-group mb-2 d-grid">
                        <label for="outlet">Cabang</label>
                        <select name="outlet_id" id="outlet" class="form-select select2 form-control"
                            value="{{ $outlet_id }}">
                            <option value=""></option>
                            @foreach ($outlData as $outlet)
                                <option value="{{ $outlet->id }}">{{ $outlet->initial }} - {{ $outlet->outlet_name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="report_title">Judul Laporan</label>
                        <input type="text" name="report_title" id="report_title" class="form-control"
                            value="{{ $report_title }}">
                    </div>
                    <div class="form-group mb-2">
                        <label for="report_desc">Deskripsi Laporan</label>
                        <textarea type="text" name="report_desc" id="report_desc" class="form-control" value="{{ $report_desc }}">{{ $report_desc }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="report_file">Dokumentasi Laporan</label>
                        <input type="file" name="report_file" id="report_file" class="form-control"
                            accept="image/*"></input>
                        <br>
                        @if ($report_file != '')
                            @if ($report_file != null)
                                <img src="/assets/images/reports/{{ $report_file }}" alt=""class="img-fluid">
                            @else
                                <img src="/assets/images/reports/no-image.png" alt=""class="img-fluid">
                            @endif
                        @else
                            <img src="/assets/images/reports/no-image.png" alt="" class="img-fluid">
                        @endif

                    </div>
                    <div class="d-block text-end mt-4">
                        <a href="javascript:" class="btn btn-primary" id="btnSendReport">
                            <i class="fi fi-rr-check"></i>
                            <span>Simpan</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection

@section('pages_scripts')
    @if ($outlet_id != '')
        <script>
            $("select[name=outlet_id]").val({{ $outlet_id }});
            $(".select2").trigger("change");
        </script>
    @endif
    <script>
        $("#btnSendReport").on("click", function() {
            var repForm = $("#formReport")[0];
            var data = new FormData(repForm);
            $.ajax({
                url: '{{ route('reports.store') }}',
                type: 'POST',
                data: data,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        showToastify("success", "Laporan Berhasil Disimpan!");
                        // console.log(response.data)
                        // repForm.reset();
                        // $(".select2").trigger("change");
                        setTimeout(function() {
                            location.replace('/user/report_data')
                        }, 1000);
                    } else {
                        showToastify("error", "Laporan Gagal Disimpan!");
                    }
                },
                error: function(errors) {
                    for (const [key, value] of Object.entries(errors.responseJSON.errors)) {
                        // show alert error 
                        showToastify("error", `${value}`);
                        // form invalid
                        $("[name=" + `${key}` + "]").addClass("is-invalid");
                        $("[name=" + `${key}` + "]").siblings("label").addClass("text-danger");
                        // invalid init field
                        invalidInit();
                    }
                }
            })
        })
    </script>
@endsection
