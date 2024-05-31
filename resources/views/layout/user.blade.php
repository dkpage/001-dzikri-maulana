<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    @yield('pages_css')
</head>

<body>
    @include('partials.components.preloader')
    {{-- MAIN WRAPPER  --}}
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype=""
        data-sidebar-position="" data-header-position="fixed" data-boxed-layout="full" class="">
        {{-- USER HEADER  --}}
        @include('partials.components.user_header', ['user' => $user])
        {{-- @include('partials.components.sidebar') --}}
        {{-- PAGE WRAPPER  --}}
        <div id="user-page-wrapper" class="page-wrapper user-page">
            <div class="container">
                {{-- PAGE TITLE  --}}
                @include('partials.components.page_title', ['user' => $user])
                <div class="container-fluid">
                    @yield('page_content')
                    @include('partials.components.footer', ['user' => $user])
                    @include('partials.components.user_mobile_nav', ['user' => $user])
                </div>
            </div>
        </div>
    </div>
    @include('partials.scripts')

    <script type="text/javascript">
        $(".back-btn").on("click", function() {
            history.back();
        })
    </script>
</body>

</html>
