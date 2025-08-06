@extends('frontend.layouts.base')
@section('app')
    <!-- Header -->
    @include('frontend.layouts.partials.header')
    <!-- Content -->
    @yield('breadcrumb')
    @yield('content')
    <!-- Footer -->
    @include('frontend.layouts.partials.footer')
    <!--scroll bottom to top button start-->
    <div class="scroll-top scroll-to-target primary-bg text-white" data-target="html">
        <span class="fas fa-hand-point-up"></span>
    </div>
    <!--scroll bottom to top button end-->
    <!--build:js-->
    <script src="{{ asset('assets/frontend/assets/js/vendors/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/vendors/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/vendors/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/vendors/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/vendors/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/vendors/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/vendors/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/vendors/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/vendors/jquery.rcounterup.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/vendors/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/vendors/validator.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/vendors/hs.megamenu.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/app.js') }}"></script>
    
    <!--endbuild-->
@endsection
