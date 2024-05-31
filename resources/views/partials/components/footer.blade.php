@if (session('alert'))
    <script>
        $(document).ready(function() {
            var alType = "{{ session('alert')['type'] }}";
            var alMess = "{{ session('alert')['msg'] }}";
            showToastify(alType, alMess);
        });
    </script>
@endif

@if ($errors->any())
    {{-- <h1>{{ print_r($errors) }}</h1> --}}
    @foreach ($errors->all() as $error)
        <script>
            $(document).ready(function() {
                var alType = "error";
                var alMess = "{{ $error }}";
                showToastify(alType, alMess);
            });
        </script>
    @endforeach

@endif

@if (session('success'))
    <script>
        $(document).ready(function() {
            var alType = "success";
            var alMess = "{{ session('success') }}";
            showToastify(alType, alMess);
        });
    </script>
@endif

@if (session('info'))
    <script>
        $(document).ready(function() {
            var alType = "info";
            var alMess = "{{ session('info') }}";
            showToastify(alType, alMess);
        });
    </script>
@endif
