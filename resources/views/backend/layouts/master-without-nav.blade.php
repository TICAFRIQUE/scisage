<!doctype html>
<html lang="fr" data-topbar="light" data-sidebar-image="none" data-theme="default" data-theme-colors="default">

<head>
    @include('backend.layouts.head-meta')
</head>

<body>
    @include('sweetalert::alert')
    @yield('body')

    @yield('content')

    @include('backend.layouts.vendor-scripts')
</body>

</html>
