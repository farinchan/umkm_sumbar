<!--begin::Wrapper-->
<div class="hover-scroll-overlay-y mb-5 scroll-ms px-5" data-kt-scroll="true"
    data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
    data-kt-scroll-wrappers="#kt_aside_nav" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
    data-kt-scroll-offset="0px">
    <!--begin::Nav-->
    <ul class="nav flex-column w-100" id="kt_aside_nav_tabs">
        <!--begin::Nav item-->
        <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right"
            data-bs-dismiss="click" title="Projects">
            <!--begin::Nav link-->
            <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-500 btn-active-light active"
                data-bs-toggle="tab" href="#kt_aside_nav_tab_projects">
                <i class="ki-duotone ki-element-11 fs-2x"><span class="path1"></span><span class="path2"></span><span
                        class="path3"></span><span class="path4"></span></i>
            </a>
            <!--end::Nav link-->
        </li>
        <!--end::Nav item-->
        <!--begin::Nav menu admin-->
        @role('admin|superadmin')
            <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right"
                data-bs-dismiss="click" title="Menu">
                <!--begin::Nav link-->
                <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light"
                    data-bs-toggle="tab" id="menu_admin" href="#kt_aside_nav_tab_menu">
                    <i class="ki-duotone ki-shield-tick fs-2x">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </a>
                <!--end::Nav link-->
            </li>
        @endrole
        <!--end::Nav menu admin-->
        <!--begin::Nav menu admin-->
        <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right"
            data-bs-dismiss="click" title="UMKM">
            <!--begin::Nav link-->
            <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light"
                data-bs-toggle="tab" id="menu_shop" href="#kt_aside_nav_tab_shop">
                <i class="ki-duotone ki-shop fs-2x">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                    <span class="path5"></span>
                </i>
            </a>
            <!--end::Nav link-->
        </li>
        <!--end::Nav menu admin-->
        <!--begin::Nav item-->
        <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right"
            data-bs-dismiss="click" title="Pesanan Saya">
            <!--begin::Nav link-->
            <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-500 btn-active-light "
                data-bs-toggle="tab" href="#kt_aside_nav_tab_transaction">
                <i class="ki-duotone ki-cheque fs-2x">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                    <span class="path5"></span>
                    <span class="path6"></span>
                    <span class="path7"></span>
                </i>
            </a>
            <!--end::Nav link-->
        </li>
        <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right"
            data-bs-dismiss="click" title="Akun Saya">
            <!--begin::Nav link-->
            <a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-500 btn-active-light "
                data-bs-toggle="tab" href="#kt_aside_nav_tab_account" id="menu_account">
                <i class="ki-duotone ki-user-square fs-2x">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                </i>
            </a>
            <!--end::Nav link-->
        </li>
    </ul>
    <!--end::Tabs-->
</div>
<!--end::Nav-->
