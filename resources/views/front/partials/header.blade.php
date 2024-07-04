{{-- @dd(Auth()->user()->shop) --}}
<header class="version_1">
    <div class="layer"></div><!-- Mobile menu overlay mask -->
    <div class="main_header">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                    <div id="logo">
                        <a href="{{ route('home') }}"><img src="{{ Storage::url('images/setting/' . $website->logo) }}"
                                alt="" width="200"></a>
                    </div>
                </div>
                <nav class="col-xl-6 col-lg-7">
                    <a class="open_close" href="javascript:void(0);">
                        <div class="hamburger hamburger--spin">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </a>
                    <!-- Mobile menu button -->
                    <div class="main-menu">
                        <div id="header_menu">
                            <a href="index.html"><img src="img/logo_black.svg" alt="" width="100"
                                    height="35"></a>
                            <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('product-all') }}">Semua Produk</a>
                            </li>
                            <li>
                                <a href="{{ route('news') }}">Berita</a>
                            </li>
                            <li class="megamenu submenu">
                                <a href="{{ route('shop') }}" class="show-submenu-mega">UMKM</a>
                                <div class="menu-wrapper">
                                    <div class="row small-gutters">
                                        @php
                                            $kota = App\Models\City::all();
                                            // Hitung jumlah data
                                            $totalData = $kota->count();
                                            // Tentukan ukuran setiap bagian
                                            $chunkSize = ceil($totalData / 3);
                                            // Bagi data menjadi 3 bagian
                                            $chunks = $kota->chunk($chunkSize);
                                        @endphp
                                        <div class="col-lg-3">
                                            <h3>List UMKM Sumatera barat</h3>
                                            <ul>
                                                @foreach ($chunks[0] as $kota1)
                                                    <li><a
                                                            href="{{ route('shop', ['city' => $kota1->slug]) }}">{{ $kota1->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-lg-3">
                                            <h3>.</h3>
                                            <ul>
                                                @foreach ($chunks[1] as $kota2)
                                                    <li><a
                                                            href="{{ route('shop', ['city' => $kota2->slug]) }}">{{ $kota2->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-lg-3">
                                            <h3>.</h3>
                                            <ul>
                                                @foreach ($chunks[2] as $kota3)
                                                    <li><a
                                                            href="{{ route('shop', ['city' => $kota3->slug]) }}">{{ $kota3->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 d-xl-block d-lg-block d-md-none d-sm-none d-none">
                                            <div class="banner_menu">
                                                <a href="#0">
                                                    <img src="{{ asset('front/img/logo_') }}"
                                                        data-src="{{ asset('front/img/logo_sumbar.png') }}"
                                                        width="400" height="550" alt=""
                                                        class="img-fluid lazy">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /row -->
                                </div>
                                <!-- /menu-wrapper -->
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Informasi</a>
                                <ul>
                                    <li><a href="{{ route('about') }}">tentang Kami</a></li>
                                    <li><a href="{{ route('help') }}">Bantuan</a></li>
                                </ul>
                            </li>
                            {{-- @if (Auth::check())
                                <li>
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                            @endif --}}
                        </ul>
                    </div>
                    <!--/main-menu -->
                </nav>
                <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
                    <a class="phone_top" href="{{ $website->whatsapp }}"><strong><span>Butuh bantuan?</span>
                    Whatsapp : {{ $website->phone }}
                    </strong></a>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /main_header -->

    <div class="main_nav Sticky">
        <div class="container">
            <div class="row small-gutters">
                <div class="col-xl-3 col-lg-3 col-md-3">
                    <nav class="categories">
                        <ul class="clearfix">
                            <li><span>
                                    <a href="#">
                                        <span class="hamburger hamburger--spin">
                                            <span class="hamburger-box">
                                                <span class="hamburger-inner"></span>
                                            </span>
                                        </span>
                                        Categories
                                    </a>
                                </span>
                                <div id="menu">
                                    <ul>
                                        @php
                                            $category = App\Models\ProductCategory::where('parent_id', null)
                                                ->with('subcategories')
                                                ->get();
                                        @endphp

                                        @foreach ($category as $item)
                                            <li><span><a href="#0">{{ $item->name }}</a></span>
                                                <ul>
                                                    @foreach ($item->subcategories as $subitem)
                                                        <li><a
                                                                href="{{ route('product-category', $subitem->slug) }}">{{ $subitem->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                        <li><span><a>-</a></span></li>
                                        <li><span><a>-</a></span></li>
                                        <li><span><a>-</a></span></li>
                                        <li><span><a>-</a></span></li>
                                        <li><span><a>-</a></span></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                    <div class="custom-search-input">
                        <form action="{{ route('product-all') }}" method="GET">

                            <input type="text" name="search" placeholder="Cari Produk Yang Kamu Inginkan Disini"
                                value="{{ request('search') }}">
                            <button type="submit"><i class="header-icon_search_custom"></i></button>
                        </form>
                    </div>

                </div>
                <div class="col-xl-3 col-lg-2 col-md-3">
                    <ul class="top_tools">
                        <li>
                            <div class="dropdown dropdown-cart">
                                <a href="cart.html" class="cart_bt"><strong>2</strong></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li>
                                            <a href="product-detail-1.html">
                                                <figure><img src="img/products/product_placeholder_square_small.jpg"
                                                        data-src="img/products/shoes/thumb/1.jpg" alt=""
                                                        width="50" height="50" class="lazy"></figure>
                                                <strong><span>1x Armor Air x Fear</span>$90.00</strong>
                                            </a>
                                            <a href="#0" class="action"><i class="ti-trash"></i></a>
                                        </li>
                                        <li>
                                            <a href="product-detail-1.html">
                                                <figure><img src="img/products/product_placeholder_square_small.jpg"
                                                        data-src="img/products/shoes/thumb/2.jpg" alt=""
                                                        width="50" height="50" class="lazy"></figure>
                                                <strong><span>1x Armor Okwahn II</span>$110.00</strong>
                                            </a>
                                            <a href="0" class="action"><i class="ti-trash"></i></a>
                                        </li>
                                    </ul>
                                    <div class="total_drop">
                                        <div class="clearfix"><strong>Total</strong><span>$200.00</span></div>
                                        <a href="cart.html" class="btn_1 outline">View Cart</a><a
                                            href="checkout.html" class="btn_1">Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /dropdown-cart-->
                        </li>
                        <li>
                            <a href="#0" class="wishlist"><span>Wishlist</span></a>
                        </li>
                        <li>
                            <div class="dropdown dropdown-access">
                                <a href="#" class="access_link ">
                                </a>
                                <div class="dropdown-menu">
                                    @if (!Auth::check())
                                        <a href="{{ route('login') }}" class="btn_1">Sign In or Sign Up</a>
                                    @endif
                                    <ul>
                                        @if (Auth::check())
                                            <li>
                                                <a href="account.html"><i class="ti-user"></i>
                                                    {{ Auth::user()->name }} <br>
                                                    <small>
                                                        {{ Auth::user()->email }}
                                                    </small>

                                                </a>
                                            </li>
                                            <li>
                                                @if (Auth::user()->shop)
                                                    <a href="{{ route('shop.detail') }}"><i class="ti-layout"></i>
                                                        Toko Ku <br>
                                                        <small>
                                                            {{ Auth::user()->shop->name }}
                                                        </small>
                                                    </a>
                                                @else
                                                    <a href="{{ route('shop.create') }}"><i class="ti-layout"></i>
                                                        Toko Ku <br>
                                                        <small>
                                                            Buat Toko UMKM KU Sekarang!
                                                        </small>
                                                    </a>
                                                @endif
                                            </li>
                                            <li>
                                                <a href="#"><i class="ti-package"></i>My Orders</a>
                                            </li>
                                            <li>
                                                <a href="track-order.html"><i class="ti-truck"></i>Track your
                                                    Order</a>
                                            </li>
                                        @endif
                                        <li>
                                            <a href="help.html"><i class="ti-help-alt"></i>Help and Faq</a>
                                        </li>
                                        @if (Auth::check())
                                            <li>
                                                <a href="{{ route('logout') }}"><i
                                                        class="ti-power-off"></i>Logout</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!-- /dropdown-access-->
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
                        </li>
                        <li>
                            <a href="#menu" class="btn_cat_mob">
                                <div class="hamburger hamburger--spin" id="hamburger">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                                Categories
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <div class="search_mob_wp">
            <form action="{{ route('product-all') }}" method="GET">
                @csrf
                <input type="text" name="search" class="form-control"
                    placeholder="Cari Produk Yang Kamu Inginkan Disini">
                <input type="submit" class="btn_1 full-width" value="Search">
            </form>
        </div>
        <!-- /search_mobile -->
    </div>
    <!-- /main_nav -->
</header>
