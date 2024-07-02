<!--begin::Aside-->
<div id="kt_aside" class="aside aside-extended " data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <!--begin::Primary-->
    <div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
        <!--begin::Logo-->
        <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10"
            id="kt_aside_logo">
            <a href="?page=index">
                <img alt="Logo" src="assets/media/logos/demo7.svg" class="h-35px" />
            </a>
        </div>
        <!--end::Logo-->
        <!--begin::Nav-->
        <div class="aside-nav d-flex flex-column align-items-center flex-column-fluid w-100 pt-5 pt-lg-0"
            id="kt_aside_nav">
            @include('back/layout/aside/__tabs')
        </div>
        <!--end::Nav-->
        <!--begin::Footer-->
        <div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
            <!--begin::Quick links-->
            <div class="d-flex align-items-center mb-2">
                <!--begin::Menu wrapper-->
                <div class="btn btn-icon btn-active-color-primary btn-color-gray-500 btn-active-light"
                    data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start"
                    data-bs-toggle="tooltip" data-bs-placement="right" data-bs-dismiss="click" title="Quick links">
                    <i class="ki-duotone ki-educare fs-2 fs-lg-1"><span class="path1"></span><span
                            class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                </div>
                @include('back/partials/menus/_quick-links-menu')
                <!--end::Menu wrapper-->
            </div>
            <!--end::Quick links-->
            <!--begin::User-->
            <div class="d-flex align-items-center mb-10" id="kt_header_user_menu_toggle">
                <!--begin::Menu wrapper-->
                <div class="cursor-pointer symbol symbol-40px" data-kt-menu-trigger="click" data-kt-menu-overflow="true"
                    data-kt-menu-placement="top-start" data-bs-toggle="tooltip" data-bs-placement="right"
                    data-bs-dismiss="click" title="User profile">
                    <img src="@if (Auth::user()->photo) {{ Storage::url(Auth::user()->photo) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ Auth::user()->name }} @endif" alt="image" />
                </div>
                @include('back/partials/menus/_user-account-menu')
                <!--end::Menu wrapper-->
            </div>
            <!--end::User-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Primary-->
    <!--begin::Secondary-->
    <div class="aside-secondary d-flex flex-row-fluid">
        <!--begin::Workspace-->
        <div class="aside-workspace my-5 p-5" id="kt_aside_wordspace">
            @include('back/layout/aside/__tab-contents/_base')
        </div>
        <!--end::Workspace-->
    </div>
    <!--end::Secondary-->
    <!--begin::Aside Toggle-->
    <button id="kt_aside_toggle"
        class="aside-toggle btn btn-sm btn-icon bg-body btn-color-gray-700 btn-active-primary position-absolute translate-middle start-100 end-0 bottom-0 shadow-sm d-none d-lg-flex mb-5 "
        data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
        data-kt-toggle-name="aside-minimize">
        <i class="ki-duotone ki-arrow-left fs-2 rotate-180"><span class="path1"></span><span class="path2"></span></i>
    </button>
    <!--end::Aside Toggle-->
</div>
<!--end::Aside-->
