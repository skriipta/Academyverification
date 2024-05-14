<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Skriipta Academy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="../assets/images/favicon.ico"> --}}
    <!-- App css -->
    <link href="{{ asset('assets/css/config/default/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/config/default/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/config/default/bootstrap-dark.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/config/default/app-dark.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet">
    @yield('styles')
</head>


<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": true}, "topbar": {"color": "light"}, "showRightSidebarOnPageLoad": true}'>
    <!-- Begin page -->
    <div id="wrapper">
        @include('layouts.components.header')

        @include('layouts.components.sidebar')
        <div class="content-page">
            <div class="content">
                @yield('content')
            </div>
            @include('layouts.components.footer')

        </div>
    </div>




    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('assets/libs/morris.js06/morris.min.js') }}"></script>
    <script src="{{ asset('assets/libs/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>

</html>
