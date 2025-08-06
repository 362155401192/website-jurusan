<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="{{ getSetting('meta_description') }}">
    <meta name="keywords" content="{{ getSetting('meta_keyword') }}">
    <meta name="author" content="{{ getSetting('web_author') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <meta name="asset-url" content="{{ asset('/') }}">
    <meta name="user-permissions" content="{{ getAuthPermissions() }}">
    <title>{{ $title }} - {{ getSetting('web_name') }}</title>
    <link rel="apple-touch-icon" href="{{ asset('storage/images/' . getSetting('favicon')) }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/images/' . getSetting('favicon')) }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/vendors/css/charts/apexcharts.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/vendors/datepicker/datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/vendors/css/extensions/tether-theme-arrows.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/vendors/css/extensions/tether.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/vendors/css/extensions/shepherd-theme-default.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/vendors/css/forms/select/select2.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/vendors/dropify/css/dropify.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/css/themes/semi-dark-layout.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/css/pages/dashboard-analytics.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/css/pages/card-analytics.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/pages/aggrid.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/vendors/datepicker/datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/css/plugins/tour/tour.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/vendors/daterangepicker/daterangepicker.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/css/style.css') }}">

</head>


<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click"
    data-menu="vertical-menu-modern" data-col="2-columns">
    @yield('app')
</body>

</html>
