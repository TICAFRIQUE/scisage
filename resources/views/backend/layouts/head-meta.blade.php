<meta charset="utf-8" />
<title>@yield('title') | SCI SAGES Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Espace d'administration du site SCI SAGES">
<meta name="author" content="Ticafrique">
<meta name="robots" content="noindex, nofollow">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="theme-color" content="#1E1308">

<!-- Favicons (mêmes que le site) -->
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">

@include('backend.layouts.head-css')
