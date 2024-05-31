<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    @yield('pages_css')
</head>

<body>
    {{-- PRELOADER  --}}
    @include('partials.components.preloader')

    {{-- MAIN WRAPPER  --}}
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        {{-- HEADER  --}}
        @include('partials.components.admin_header', ['user' => $user])

        {{-- SIDEBAR  --}}
        @include('partials.components.sidebar', ['user' => $user])
        <div class="page-wrapper">
            {{-- PAGE TITLE  --}}
            @include('partials.components.page_title', ['user' => $user])
            <div class="container-fluid">
                {{-- PAGE CONTENT  --}}
                @yield('page_content')
                {{-- FOOTER  --}}
                @include('partials.components.footer', ['user' => $user])
            </div>
        </div>
    </div>
    {{-- PAGE SCRIPT --}}
    {{-- @yield('pages_scripts') --}}
    {{-- ALL SCRIPT DEFAULT  --}}
    @include('partials.scripts')
</body>

</html>
