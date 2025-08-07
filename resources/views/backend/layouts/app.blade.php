@extends('backend.layouts.base')

@section('app')
    <!-- Top Nav -->
    @include('backend.layouts.partials.top-bar')

    <!-- Sidebar -->
    @include('backend.layouts.partials.sidebar')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <v-content-rendering></v-content-rendering>
        </div>
    </div>
    </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">Copyright
                &copy; 2022 - {{ date('Y') }}<a class="text-bold-800 grey darken-2" href="#"
                    target="_blank">{{ getSetting('web_author') }},</a>All rights
                Reserved</span>
        </p>
    </footer>
    <!-- END: Footer-->

    <script src="{{ asset('assets/backend/assets/js/jquery.min.js') }}"></script>
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('assets/backend/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('assets/backend/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/extensions/tether.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/extensions/shepherd.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/notify/js/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/forms/select/select2.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/autonumeric/autoNumeric.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('assets/backend/app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}">
    </script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/tables/datatable/dataTables.checkboxes.min.js') }}">
    </script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}">
    </script>
    <script src="{{ asset('assets/backend/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('assets/backend/app-assets/vendors/datatables-select/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/vendors/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/backend/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('assets/backend/app-assets/js/scripts/components.js') }}"></script>
    <!-- END: Theme JS-->

    <script src="{{ asset('assets/backend/assets/js/custom.js') }}"></script>
@endsection
