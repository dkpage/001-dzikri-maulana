<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
    @include('partials.components.header')
    @include('partials.components.sidebar')
    @yield('admin_layout')
    @include('partials.footer')
</body>

</html>
