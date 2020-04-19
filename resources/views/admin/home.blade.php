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
    <script src="{{ asset('back/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <script src="{{ asset('back/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('back/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('back/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="{{ asset('back/modules/jquery-ui/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('back/js/scripts.js') }}"></script>
    <script src="{{ asset('back/js/custom.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('back/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/modules/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/modules/leaflet/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('back/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('back/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="{{ asset('back/modules/summernote/summernote-lite.css') }}">
    <link rel="stylesheet" href="{{ asset('back/modules/chocolat/dist/css/chocolat.css') }}">
    <link rel="stylesheet" href="{{ asset('back/modules/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('back/css/style.css') }}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      @include('layouts.topbar');
      @include('layouts.sidebar');
      @php
            $url_segment = \Request::segment(2);
      @endphp

        @switch($url_segment)
            @case('home')
                @include('admin.dashboard');
                @break
            @case('profil')
                @include('admin.profile');
                @break
            @case('datanelayan')
                @include('admin.nelayan');
                @break
            @case('petanelayan')
                @include('admin.petanelayan');
                @break
            @case('ikan')
                @include('admin.ikan');
                @break
            @case('harga')
                @include('admin.harga');
                @break
            @default
                @include('admin.dashboard');
        @endswitch
      
      @include('layouts.footer');
    </div>
  </div>
</body>
</html>