<!--begin::Menu-->
<div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-5 px-6 my-5 my-lg-0"
    id="kt_aside_menu" data-kt-menu="true">
    <div id="kt_aside_menu_wrapper" class="menu-fit">
        <div class="menu-item">
            <div class="menu-content pb-2">
                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
            </div>
        </div>
        <div class="menu-item">
            <a class="menu-link" href="../../demo7/dist/index.html">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect x="2" y="2" width="9" height="9" rx="2" fill="black" />
                            <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
                                fill="black" />
                            <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
                                fill="black" />
                            <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Default</span>
            </a>
        </div>


        <div class="menu-item">
            <div class="menu-content pt-8 pb-2">
                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Manajemen</span>
            </div>
        </div>
        <div class="menu-item">
            <a class="menu-link active" href="{{ route("shop.detail") }}">
                <span class="menu-icon">
                    <i class="ki-duotone ki-shop fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>
                </span>
                <span class="menu-title">Toko Ku</span>
            </a>
        </div>
        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion @if (
                (request()->is('back/admin/product/*') &&
                    !request()->is('back/admin/product/category/*') &&
                    !request()->is('back/admin/product/category')) ||
                    request()->is('back/admin/product')) hover show @endif">
            <span class="menu-link">
                <span class="menu-icon">

                    <span class="menu-icon">
                        <i class="ki-duotone ki-basket fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </span>
                </span>
                <span class="menu-title">Produk</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    <a class="menu-link @if (request()->is('back/admin/product/create')) active @endif"
                        href="{{ route('admin.product.create') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Tambah Produk</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (request()->is('back/admin/product')) active @endif"
                        href="{{ route('admin.product.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Daftar Produk</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="../../demo7/dist/account/security.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Review</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link" href="../../demo7/dist/account/security.html">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Pengunjung</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <a class="menu-link" href="{{ route("shop.detail-follower")  }}">
                <span class="menu-icon">
                    <i class="ki-duotone ki-user-tick fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                </span>
                <span class="menu-title">Pengikut</span>
            </a>
        </div>


    </div>
</div>
<!--end::Menu-->
