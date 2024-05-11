<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
    @include('partials.components.header')
    @include('partials.components.sidebar')
    @yield('user_layout')
    @include('partials.footer')
</body>

</html>
