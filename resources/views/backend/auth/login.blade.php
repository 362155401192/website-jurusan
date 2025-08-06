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
    <title>Login - {{ getSetting('web_name') }}</title>
    <link rel="apple-touch-icon" href="{{ asset('storage/images/' . getSetting('favicon')) }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/images/' . getSetting('favicon')) }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/css/pages/authentication.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/assets/css/style.css') }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body
    class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page"
    data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-11 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-12 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="row m-0 justify-content-center mt-2">
                                            <div class="col-12 d-flex justify-content-center">
                                                <img src="{{ asset('assets/backend/app-assets/images/pages/logo.png') }}"
                                                    alt="branding logo"
                                                    style="max-width: 120px; height: auto;">
                                            </div>
                                        </div>
                                       <h4 class="px-2">Sistem Informasi Jurusan Bisnis dan Informatika.</h4>
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Login</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Selamat datang kembali, silakan masuk ke akun Anda.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1 mb-3">
                                                <form action="{{ url('/login') }}" method="post" data-request="ajax"
                                                    data-success-callback="{{ route('dashboards') }}"
                                                    data-redirect="true">
                                                    @csrf

                                                    <!-- Username -->
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left mb-2">
                                                        <input type="text" name="username" class="form-control"
                                                            id="user-name" placeholder="Username" autocomplete="off">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="username" class="form-label" style="font-size: 14px;">Username</label>
                                                    </fieldset>

                                                    <!-- Password -->
                                                    <fieldset class="form-label-group position-relative has-icon-left mb-2">
                                                        <input type="password" name="password" class="form-control"
                                                            id="user-password" placeholder="Password">
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="password" class="form-label" style="font-size: 14px;">Password</label>
                                                    </fieldset>

                                                    <!-- Remember Me & Forgot -->
                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">Remember me</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="text-right">
                                                            <a href="{{ route('password.request') }}" class="card-link">Forgot Password?</a>
                                                        </div>
                                                    </div>

                                                    <!-- Submit -->
                                                    <button type="submit" class="btn btn-primary float-right btn-inline">Login</button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div> <!-- end card -->
                    </div> <!-- end col-xl-8 -->
                </section>
            </div>
        </div>
    </div>

    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/notify/js/bootstrap-notify.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/backend/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/js/scripts/components.js') }}"></script>
    <script src="{{ asset('assets/backend/assets/js/custom.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
