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
            <a class="menu-link @if (request()->is('back/admin/dashboard')) active @endif" href="{{ route('admin.dashboard') }}"
                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                <span class="menu-icon">
                    <i class="ki-duotone ki-element-11 fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                    </i>
                </span>
                <span class="menu-title">Dashboard</span>
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
                    <a class="menu-link @if (request()->is('back/admin/product/review')) active @endif"
                        href="{{ route('admin.product.review') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                        <span class="menu-title">Review</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a class="menu-link @if (request()->is('back/admin/product/viewer')) active @endif"
                        href="{{ route('admin.product.viewer') }}">
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
                    <i class="ki-duotone ki-square-brackets fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
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
