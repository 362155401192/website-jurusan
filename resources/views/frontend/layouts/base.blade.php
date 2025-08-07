<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('storage/images/' . getSetting('logo')) }}" type="image/png" sizes="16x16">
    <title>{{ $title }} - {{ getSetting('web_name') }}</title>
    <link rel="stylesheet" type="text/css"  href="{{ asset('assets/backend/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/main.css') }}">
</head>

<body>
    <!--preloader start-->
    <div id="preloader">
        <div class="preloader-wrap">
            {{-- <img src="{{ asset('assets/frontend/assets/img/logo-color.png') }}" alt="logo" class="img-fluid" /> --}}
            <div class="preloader">
                <i>.</i>
                <i>.</i>
                <i>.</i>
            </div>
        </div>
    </div>
    <!--preloader end-->
    <div class="main">
        @yield('app')
    </div>
</body>

</html>
