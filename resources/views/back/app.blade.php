<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

@php
    $website = \App\Models\SettingWebsite::first();
@endphp

<head>
    <base href="" />
    <title>{{ $website->name }}</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="{{ strip_tags($website->about) }}" />
    <meta name="keywords"content="{{ $website->name }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:title" content="{{ $website->name }}" />
    <meta property="og:url" content="{{ request()->fullUrl() }}" />
    <meta property="og:site_name" content="{{ $website->name }}" />
    
    <link rel="shortcut icon" href="{{ Storage::url('images/setting/' . $website->favicon) }}" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{ asset('back/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('back/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{ asset('back/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('back/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    @yield('styles')
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
    
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" style="background-image: url()"
    class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-enabled">
    @include('back/partials/theme-mode/_init')
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            @include('back/layout/aside/_base')
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('back/layout/header/_base')
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @yield('content')
                </div>
                <!--end::Content-->
                @include('back/layout/_footer')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    @include('back/partials/_drawers')
    <!--end::Main-->
    @include('back/partials/_scrolltop')
    <!--begin::Modals-->
    @include('back/partials/modals/_upgrade-plan')
    @include('back/partials/modals/_invite-friends')
    @include('back/partials/modals/create-app/_main')
    @include('back/partials/modals/users-search/_main')
    <!--end::Modals-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "/back";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{ asset('back/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('back/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="{{ asset('back/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="{{ asset('back/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{ asset('back/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('back/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('back/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('back/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('back/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('back/js/custom/utilities/modals/users-search.js') }}"></script>
    <!--end::Custom Javascript-->
    @yield('scripts')
    <script>
        if (window.location.href.includes('back/information')) {
            document.getElementById('menu_information').click();
        }
        if (window.location.href.includes('back/admin')) {
            document.getElementById('menu_admin').click();
        }
        if (window.location.href.includes('back/shop')) {
            document.getElementById('menu_shop').click();
        }
        if (window.location.href.includes('back/account')) {
            document.getElementById('menu_account').click();
        }
    </script>
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
