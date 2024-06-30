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
            <a class="menu-link" href="../../demo7/dist/landing.html">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/communication/com001.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path opacity="0.3"
                                d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                fill="black" />
                            <path
                                d="M19 10.4C19 10.3 19 10.2 19 10C19 8.9 18.1 8 17 8H16.9C15.6 6.2 14.6 4.29995 13.9 2.19995C13.3 2.09995 12.6 2 12 2C11.9 2 11.8 2 11.7 2C12.4 4.6 13.5 7.10005 15.1 9.30005C15 9.50005 15 9.7 15 10C15 11.1 15.9 12 17 12C17.1 12 17.3 12 17.4 11.9C18.6 13 19.9 14 21.4 14.8C21.4 14.8 21.5 14.8 21.5 14.9C21.7 14.2 21.8 13.5 21.9 12.7C20.9 12.1 19.9 11.3 19 10.4Z"
                                fill="black" />
                            <path
                                d="M12 15C11 13.1 10.2 11.2 9.60001 9.19995C9.90001 8.89995 10 8.4 10 8C10 7.1 9.40001 6.39998 8.70001 6.09998C8.40001 4.99998 8.20001 3.90005 8.00001 2.80005C7.30001 3.10005 6.70001 3.40002 6.20001 3.90002C6.40001 4.80002 6.50001 5.6 6.80001 6.5C6.40001 6.9 6.10001 7.4 6.10001 8C6.10001 9 6.80001 9.8 7.80001 10C8.30001 11.6 9.00001 13.2 9.70001 14.7C7.10001 13.2 4.70001 11.5 2.40001 9.5C2.20001 10.3 2.10001 11.1 2.10001 11.9C4.60001 13.9 7.30001 15.7 10.1 17.2C10.2 18.2 11 19 12 19C12.6 20 13.2 20.9 13.9 21.8C14.6 21.7 15.3 21.5 15.9 21.2C15.4 20.5 14.9 19.8 14.4 19.1C15.5 19.5 16.5 19.9 17.6 20.2C18.3 19.8 18.9 19.2 19.4 18.6C17.6 18.1 15.7 17.5 14 16.7C13.9 15.8 13.1 15 12 15Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">Landing Page</span>
            </a>
        </div>
        <div class="menu-item">
            <div class="menu-content pt-8 pb-2">
                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Crafted</span>
            </div>
        </div>


        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion @if (request()->is('back/admin/toko/*') || request()->is('back/admin/toko')) hover show @endif">
            <span class="menu-link">
                <span class="menu-icon">
                    <i class="ki-duotone ki-shop fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>
                </span>
                <span class="menu-title">Toko</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    <a class="menu-link @if (request()->is('back/admin/toko/create')) active @endif"
                        href="{{ route('admin.toko.create') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Tambah Toko</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (request()->is('back/admin/toko')) )
                        active @endif"
                        href="{{ route('admin.toko.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Data Toko</span>
                    </a>
                </div>
            </div>
        </div>
        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion @if (request()->is('back/admin/product/category/*') || request()->is('back/admin/product/category')) hover show @endif">
            <span class="menu-link">
                <span class="menu-icon">

                    <span class="menu-icon">
                        <i class="ki-duotone ki-lots-shopping fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                            <span class="path6"></span>
                            <span class="path7"></span>
                            <span class="path8"></span>
                        </i>
                    </span>
                </span>
                <span class="menu-title">Kategori Produk</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg">
                <div class="menu-item">
                    <a class="menu-link @if (request()->is('back/admin/product/category/create')) active @endif"
                        href="{{ route('admin.product.category.create') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Tambah Kategori</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (request()->is('back/admin/product/category')) active @endif"
                        href="{{ route('admin.product.category.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Daftar Kategori</span>
                    </a>
                </div>
            </div>
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
        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion @if (request()->is('back/admin/news/*') || request()->is('back/admin/news')) hover show @endif">
            <span class="menu-link @if (request()->is('back/admin/news/*') || request()->is('back/admin/news')) active @endif">
                <span class="menu-icon">

                    <i class="ki-duotone ki-subtitle fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>
                </span>
                <span class="menu-title">Berita</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg hover">

                <div class="menu-item ">
                    <a class="menu-link @if (request()->is('back/admin/news/category')) active @endif"
                        href="{{ route('admin.news.category.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Kategori</span>
                    </a>
                </div>
                <div class="menu-item ">
                    <a class="menu-link @if (request()->is('back/admin/news/add')) active @endif"
                        href="{{ route('admin.news.create') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Tambah Berita</span>
                    </a>
                </div>
                <div class="menu-item ">
                    <a class="menu-link @if (request()->is('back/admin/news')) active @endif"
                        href="{{ route('admin.news.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Daftar Berita</span>
                    </a>
                </div>

            </div>
        </div>
        <div data-kt-menu-trigger="click"
            class="menu-item menu-accordion @if (request()->is('back/admin/pengguna/*') || request()->is('back/admin/pengguna')) hover show @endif">
            <span class="menu-link @if (request()->is('back/admin/pengguna/*') || request()->is('back/admin/pengguna')) active @endif">
                <span class="menu-icon">
                    <i class="ki-duotone ki-profile-user fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                    </i>

                </span>
                <span class="menu-title">Pengguna</span>
                <span class="menu-arrow"></span>
            </span>
            <div class="menu-sub menu-sub-accordion menu-active-bg hover">
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion @if (request()->is('back/admin/pengguna/super-admin') ||
                            request()->is('back/admin/pengguna/super-admin/*') ||
                            request()->is('back/admin/pengguna/admin') ||
                            request()->is('back/admin/pengguna/admin/*')) show hover @endif">
                    <span class="menu-link ">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Admin</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">
                        <div class="menu-item">
                            <a class="menu-link @if (request()->is('back/admin/pengguna/super-admin') || request()->is('back/admin/pengguna/super-admin/*')) active @endif"
                                href="{{ route('admin.pengguna.superadmin.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Super Admin</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link @if (request()->is('back/admin/pengguna/admin') || request()->is('back/admin/pengguna/admin/*')) active @endif"
                                href="{{ route('admin.pengguna.admin.index') }}">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Admin Kota/Kabupaten</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="menu-item ">
                    <a class="menu-link @if (request()->is('back/admin/pengguna')) active @endif"
                        href="{{ route('admin.pengguna.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Pengguna Biasa</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="menu-item">
            <div class="menu-content pt-8 pb-0">
                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Data
                    Master</span>
            </div>
        </div>
        <div class="menu-item">
            <a class="menu-link @if (request()->is('back/admin/kota') || request()->is('back/admin/kota/*')) active @endif"
                href="{{ route('admin.kota.index') }}" data-bs-toggle="tooltip" data-bs-trigger="hover"
                data-bs-dismiss="click" data-bs-placement="right">
                <span class="menu-icon">
                    <i class="ki-duotone ki-bank fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </span>
                <span class="menu-title">Kota/Kabupaten</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link @if (request()->is('back/admin/file-manager')) active @endif"
                href="{{ route('admin.file-manager') }}" data-bs-toggle="tooltip" data-bs-trigger="hover"
                data-bs-dismiss="click" data-bs-placement="right">

                <span class="menu-icon">
                    <i class="ki-duotone ki-folder fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </span>
                <span class="menu-title">File Manager</span>
            </a>
        </div>
        <div class="menu-item">
            <div class="menu-content pt-8 pb-0">
                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Pengaturan</span>
            </div>
        </div>
        <div class="menu-item">
            <a class="menu-link @if (request()->is('back/admin/setting/banner')) active @endif"
                href="{{ route('admin.setting.banner') }}" data-bs-toggle="tooltip" data-bs-trigger="hover"
                data-bs-dismiss="click" data-bs-placement="right">
                <span class="menu-icon">
                    <i class="ki-duotone ki-row-horizontal fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </span>
                <span class="menu-title">Banner</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link @if (request()->is('back/admin/setting/website')) active @endif"
                href="{{ route('admin.setting.website') }}" data-bs-toggle="tooltip" data-bs-toggle="tooltip"
                data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                <span class="menu-icon">
                    <i class="ki-duotone ki-star fs-2">
                    </i>

                </span>
                <span class="menu-title">Website</span>
            </a>
        </div>
        <div class="menu-item">
            <div class="menu-content">
                <div class="separator mx-1 my-4"></div>
            </div>
        </div>
        <div class="menu-item">
            <a class="menu-link" href="#">
                <span class="menu-icon">
                    <i class="ki-duotone ki-code fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                    </i>
                </span>
                <span class="menu-title">Changelog v1.0.0</span>
            </a>
        </div>
    </div>
</div>
<!--end::Menu-->
