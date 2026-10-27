<!doctype html>
<html lang="fr" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>
    @include('backend.layouts.head-meta')
</head>

<body>
    <div id="layout-wrapper">
        @include('backend.layouts.topbar')
        @include('backend.layouts.sidebar')

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @include('sweetalert::alert')
                    @yield('content')
                </div>
            </div>
            @include('backend.layouts.footer')
        </div>
    </div>

    @include('backend.layouts.vendor-scripts')
</body>

</html>
