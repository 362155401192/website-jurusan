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
    <title>Reset Password - {{ getSetting('web_name') }}</title>
    <link rel="apple-touch-icon" href="{{ asset('storage/images/themes/' . getSetting('favicon')) }}">
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('storage/images/themes/' . getSetting('favicon')) }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/backend/app-assets/css/themes/dark-layout.css') }}">
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
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-7 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0 w-100">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center p-0">
                                    <img src="{{ asset('assets/backend/app-assets/images/pages/reset-password.png') }}"
                                        alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Reset Password</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Silahkan masukkan password baru kamu.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form action="{{ route('password.update') }}" method="post"
                                                    data-request="ajax">
                                                    @csrf
                                                    <input type="hidden" name="token"
                                                        value="{{ $request['token'] }}">
                                                    <fieldset class="form-label-group">
                                                        <input type="text" name="email" class="form-control"
                                                            id="user-email" placeholder="Email"
                                                            value="{{ $request['email'] }}" required>
                                                        <label for="user-email">Email</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group">
                                                        <input type="password" name="password" class="form-control"
                                                            id="user-password" placeholder="Password" required>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group">
                                                        <input type="password" name="password_confirmation"
                                                            class="form-control" id="user-confirm-password"
                                                            placeholder="Konfirmasi Password" required>
                                                        <label for="user-confirm-password">Konfirmasi Password</label>
                                                    </fieldset>
                                                    <div class="row pt-2">
                                                        <div class="col-12 col-md-6 mb-1">
                                                            <a href="{{ route('login') }}"
                                                                class="btn btn-outline-primary btn-block px-0">Go Back
                                                                to Login</a>
                                                        </div>
                                                        <div class="col-12 col-md-6 mb-1">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-block px-0">Reset</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
