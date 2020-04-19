<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nelayan | {{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('back/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('back/modules/popper.js') }}"></script>
    <script src="{{ asset('back/modules/tooltip.js') }}"></script>
    <script src="{{ asset('back/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('back/modules/leaflet/leaflet.js') }}"></script>
    <script src="{{ asset('back/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('back/modules/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>
    <script src="{{ asset('back/js/sa-functions.js') }}"></script>
    <script src="{{ asset('back/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <script src="{{ asset('back/js/scripts.js') }}"></script>
    <script src="{{ asset('back/js/custom.js') }}"></script>
    <script src="{{ asset('back/js/demo.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('back/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/modules/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/modules/leaflet/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('back/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('back/modules/summernote/summernote-lite.css') }}">
    <link rel="stylesheet" href="{{ asset('back/modules/chocolat/dist/css/chocolat.css') }}">
    <link rel="stylesheet" href="{{ asset('back/modules/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/style.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('layouts.topbar_fisherman');
      @include('layouts.sidebar_fisherman');
      @php
            $url_segment = \Request::segment(1);
      @endphp

        @switch($url_segment)
            @case('home')
                @include('fisherman.dashboard');
                @break
            @case('peta')
                @include('fisherman.petanelayan');
                @break
            @case('profil')
                @include('fisherman.profilnelayan');
                @break
            @default
                @include('fisherman.dashboard');
        @endswitch
      
      @include('layouts.footer');
    </div>
  </div>
</body>
</html>