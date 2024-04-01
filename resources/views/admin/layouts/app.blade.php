<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords"
        content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">

    <title>Blog</title>
    <link rel="apple-touch-icon" href="{{ \Storage::disk('public')->url('favicon.ico.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ \Storage::disk('public')->url('favicon.ico.png') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/selects/select2.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/timeline/vertical-timeline.css') }}">

    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.css') }}">
    <!-- END: Theme CSS-->
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/users.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/tags/tagging.css') }}">

    @yield('page-css')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/tables/datatable/datatables.min.css') }}">


    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/vendors/css/pickers/daterange/daterangepicker.css') }}">
    <!-- END: Custom CSS-->

    <script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=ycb60dltyodzrwpw3qfkxa" async="true">
    </script>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
@auth
    @hasSection('hasNavigation')

        <body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image blank-page blank-page" data-open="click"
            data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="1-column">
        @else

            <body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click"
                data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red" data-col="2-columns">
                <!-- BEGIN: Header-->
                @include('admin.layouts.partials.header')
                <!-- END: Header-->

                <!-- BEGIN: Main Menu-->
                @include('admin.layouts.partials.navigation')
                <!-- END: Main Menu-->
            @endif
        @else

            <body class="vertical-layout vertical-menu-modern 1-column  bg-full-screen-image blank-page blank-page"
                data-open="click" data-menu="vertical-menu-modern" data-color="bg-gradient-x-purple-red"
                data-col="1-column">
            @endauth

            <!-- BEGIN: Content-->
            <div class="app-content content">
                <div class="content-wrapper">
                    <div class="content-wrapper-before"></div>
                    @yield('content')
                </div>
            </div>
            <!-- END: Content-->

            @auth
                @hasSection('hasNavigation')
                @else
                    {{-- <!-- BEGIN: Footer--><a class="btn btn-try-builder btn-bg-gradient-x-purple-red btn-glow white"
                    href="https://www.themeselection.com/layout-builder/horizontal" target="_blank">Try Layout Builder</a> --}}
                    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
                        <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">2019 &copy; Copyright <a class="text-bold-800 grey darken-2" href="https://themeselection.com" target="_blank">ThemeSelection</a></span>
                            <ul class="list-inline float-md-right d-block d-md-inline-blockd-none d-lg-block mb-0">
                                <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/" target="_blank"> More themes</a></li>
                                <li class="list-inline-item"><a class="my-1" href="https://themeselection.com/support" target="_blank"> Support</a></li>
                            </ul>
                        </div>
                    </footer>
                    <!-- END: Footer-->
                @endif
            @endauth
            <!-- BEGIN: Vendor JS-->
            <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
            <!-- BEGIN Vendor JS-->
            @yield('page-vendor-scripts')
            <script src="{{ asset('app-assets/vendors/js/editors/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
            <!-- BEGIN: Theme JS-->
            <script src="{{ asset('app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
            <script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
            <script src="{{ asset('app-assets/vendors/js/forms/tags/tagging.min.js') }}" type="text/javascript"></script>
            <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}" type="text/javascript">
            </script>
            <!-- END: Theme JS-->

            <!-- BEGIN: Page JS-->
            <script src="{{ asset('app-assets/js/scripts/forms/tags/tagging.js') }}" type="text/javascript"></script>
            <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.js') }}" type="text/javascript">
            </script>
            <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js') }}" type="text/javascript"></script>
            <script>
                var base_url = "{{ URL::to('/') }}";
            </script>
            <script src="{{ asset('assets/js/scripts.js') }}" type="text/javascript"></script>
            @yield('page-scripts')

            {{-- <script src="{{ asset('app-assets/vendors/js/pickers/daterange/daterangepicker.js') }}"></script> --}}
            <!-- END: Page JS-->

        </body>
        <!-- END: Body-->

</html>
