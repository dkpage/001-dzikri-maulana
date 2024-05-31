<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
@if (isset($title))
    <title>{{ $title }} # Reporting Information System</title>
@else
    <title>Reisy - Make Your Reporting Easy</title>
@endif
<link rel="icon" href="/assets/files/img/reisy-icon.png" type="image/png">

{{-- FONTS  --}}
{{-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> --}}
<link
    href="https://fonts.googleapis.com/css2?family=Fira+Mono:wght@400;500;700&family=Inter:wght@100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
    rel="stylesheet">
{{-- ICONS  --}}
{{-- UiCons FlatIcon  --}}
<link rel="stylesheet" href="/assets/plugins/uicons-flaticon/uicons-regular-rounded/css/uicons-regular-rounded.css">
<link rel="stylesheet" href="/assets/plugins/uicons-flaticon/uicons-solid-rounded/css/uicons-solid-rounded.css">

{{-- <link rel="stylesheet" href="/assets/plugins/aos/aos.css"> --}}

{{-- SweetAler 2 CSS  --}}
<link rel="stylesheet" href="/assets/plugins/sweetalert2/sweetalert2.css">
{{-- Toastify CSS  --}}
<link rel="stylesheet" href="/assets/plugins/toastify/src/toastify.css">
{{-- Selct2 CSS  --}}
<link rel="stylesheet" href="/assets/plugins/select2/select2-bs5/select2-bootstrap-5-theme.css">
<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">


{{-- APP CSS  --}}
<link rel="stylesheet" href="/assets/dists/css/app.css">

{{-- JQuery  --}}
<script src="/assets/plugins/jquery/jquery-3.7.1.min.js"></script>
