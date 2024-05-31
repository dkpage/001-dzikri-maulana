<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    @yield('pages_css')
</head>


<body>
    @include('partials.components.preloader')
    @yield('page_content')
    @include('partials.components.footer')
    @include('partials.scripts')
</body>

</html>
