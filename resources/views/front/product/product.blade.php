@extends('front.app')

@php
    $website = \App\Models\SettingWebsite::first();
@endphp

@section('seo')
    <title>{{ $product->meta_title }} | {{ $website->name }}</title>
    <meta name="description" content="{{ $product->meta_description }}">
    <meta name="keywords" content="{{ $product->meta_keyword }}">
    <meta name="author" content="{{ $product->shop->name }}">
@endsection

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/product_page.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/leave_review.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container margin_30">
        @if ($product->discount > 0)
            <div class="countdown_inner">
                <strong>Discount!</strong> This product has a discount of {{ $product->discount }}%.
            </div>
        @endif


        <div class="row">
            <div class="col-md-6">
                <div class="all">
                    <div class="slider">
                        <div class="owl-carousel owl-theme main">
                            @foreach ($product->productImage as $image)
                                <div style="background-image: url({{ Storage::url('images/product/' . $image->image) }});"
                                    class="item-box"></div>
                            @endforeach
                        </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme thumbs">
                            @foreach ($product->productImage as $image)
                                <div style="background-image: url({{ Storage::url('images/product/' . $image->image) }});"
                                    class="item {{ $loop->index === 0 ? 'active' : '' }}"></div>
                            @endforeach
                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Category</a></li>
                        <li>Page active</li>
                    </ul>
                </div>
                <!-- /page_header -->
                <div class="prod_info">
                    <h1>{{ $product->name }}</h1>
                    <span class="rating">

                        @for ($i = 0; $i < round($product->productReview->average('rating')); $i++)
                            <i class="icon-star voted"></i>
                        @endfor
                        @for ($i = 0; $i < 5 - round($product->productReview->average('rating')); $i++)
                            <i class="icon-star"></i>
                        @endfor
                        <em>{{ $product->productReview->count() }} reviews</em>
                    </span>

                    <p>{{ $product->short_description }}</p>
                    <div class="prod_options">
                        @if ($product->size)
                            <div class="row">
                                <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a
                                        href="#0" data-bs-toggle="modal" data-bs-target="#size-modal"><i
                                            class="ti-help-alt"></i></a></label>
                                <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                    <div class="custom-select-form">
                                        <select class="wide">
                                            {{-- @foreach ($product->size as $size)
                                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                <div class="numbers-row">
                                    <input type="text" value="1" id="quantity_1" class="qty2" name="quantity_1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="price_main"><span class="new_price">@money($product->price - ($product->price * $product->discount) / 100)</span>
                                @if ($product->discount > 0)
                                    <span class="percentage">-{{ $product->discount }}%</span> <span
                                        class="old_price">{{ $product->price }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div id="addCart" class="btn_add_to_cart"><a href="#0" class="btn_1">Tambah
                                    kekeranjang</a></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                        </div>
                        <div class="col-lg-4 col-md-6 text-center mt-2">
                            <a href="https://wa.me/{{ $product->shop->phone }}?text=Halo toko {{ $product->shop->name }}"
                                class="btn btn-outline-success"><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                    width="25" height="25" viewBox="0 0 48 48">
                                    <path fill="#fff"
                                        d="M4.9,43.3l2.7-9.8C5.9,30.6,5,27.3,5,24C5,13.5,13.5,5,24,5c5.1,0,9.8,2,13.4,5.6C41,14.2,43,18.9,43,24	c0,10.5-8.5,19-19,19c0,0,0,0,0,0h0c-3.2,0-6.3-0.8-9.1-2.3L4.9,43.3z">
                                    </path>
                                    <path fill="#fff"
                                        d="M4.9,43.8c-0.1,0-0.3-0.1-0.4-0.1c-0.1-0.1-0.2-0.3-0.1-0.5L7,33.5c-1.6-2.9-2.5-6.2-2.5-9.6	C4.5,13.2,13.3,4.5,24,4.5c5.2,0,10.1,2,13.8,5.7c3.7,3.7,5.7,8.6,5.7,13.8c0,10.7-8.7,19.5-19.5,19.5c-3.2,0-6.3-0.8-9.1-2.3	L5,43.8C5,43.8,4.9,43.8,4.9,43.8z">
                                    </path>
                                    <path fill="#cfd8dc"
                                        d="M24,5c5.1,0,9.8,2,13.4,5.6C41,14.2,43,18.9,43,24c0,10.5-8.5,19-19,19h0c-3.2,0-6.3-0.8-9.1-2.3L4.9,43.3	l2.7-9.8C5.9,30.6,5,27.3,5,24C5,13.5,13.5,5,24,5 M24,43L24,43L24,43 M24,43L24,43L24,43 M24,4L24,4C13,4,4,13,4,24	c0,3.4,0.8,6.7,2.5,9.6L3.9,43c-0.1,0.3,0,0.7,0.3,1c0.2,0.2,0.4,0.3,0.7,0.3c0.1,0,0.2,0,0.3,0l9.7-2.5c2.8,1.5,6,2.2,9.2,2.2	c11,0,20-9,20-20c0-5.3-2.1-10.4-5.8-14.1C34.4,6.1,29.4,4,24,4L24,4z">
                                    </path>
                                    <path fill="#40c351"
                                        d="M35.2,12.8c-3-3-6.9-4.6-11.2-4.6C15.3,8.2,8.2,15.3,8.2,24c0,3,0.8,5.9,2.4,8.4L11,33l-1.6,5.8l6-1.6l0.6,0.3	c2.4,1.4,5.2,2.2,8,2.2h0c8.7,0,15.8-7.1,15.8-15.8C39.8,19.8,38.2,15.8,35.2,12.8z">
                                    </path>
                                    <path fill="#fff" fill-rule="evenodd"
                                        d="M19.3,16c-0.4-0.8-0.7-0.8-1.1-0.8c-0.3,0-0.6,0-0.9,0s-0.8,0.1-1.3,0.6c-0.4,0.5-1.7,1.6-1.7,4	s1.7,4.6,1.9,4.9s3.3,5.3,8.1,7.2c4,1.6,4.8,1.3,5.7,1.2c0.9-0.1,2.8-1.1,3.2-2.3c0.4-1.1,0.4-2.1,0.3-2.3c-0.1-0.2-0.4-0.3-0.9-0.6	s-2.8-1.4-3.2-1.5c-0.4-0.2-0.8-0.2-1.1,0.2c-0.3,0.5-1.2,1.5-1.5,1.9c-0.3,0.3-0.6,0.4-1,0.1c-0.5-0.2-2-0.7-3.8-2.4	c-1.4-1.3-2.4-2.8-2.6-3.3c-0.3-0.5,0-0.7,0.2-1c0.2-0.2,0.5-0.6,0.7-0.8c0.2-0.3,0.3-0.5,0.5-0.8c0.2-0.3,0.1-0.6,0-0.8	C20.6,19.3,19.7,17,19.3,16z"
                                        clip-rule="evenodd"></path>
                                </svg></a>
                            <a href="mailto:{{ $product->shop->email }}?subject=Halo toko {{ $product->shop->name }}"
                                class="btn btn-outline-secondary"><i class="ti-email"></i></a>
                            <a href="tel:{{ $product->shop->phone }}" class="btn btn-outline-secondary"><i
                                    class="ti-headphone-alt"></i></a>
                        </div>
                    </div>
                </div>
                <!-- /prod_info -->
                <div class="product_actions">
                    {{-- {{ $product->short_description }} --}}
                </div>
                <!-- /product_actions -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="tabs_product">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#pane-A" class="nav-link active" data-bs-toggle="tab"
                        role="tab">Description</a>
                </li>
                <li class="nav-item">
                    <a id="tab-B" href="#pane-B" class="nav-link" data-bs-toggle="tab" role="tab">Reviews</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /tabs_product -->
    <div class="tab_content_wrapper">
        <div class="container">
            <div class="tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header" role="tab" id="heading-A">
                        <h5 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-A" aria-expanded="false"
                                aria-controls="collapse-A">
                                Description
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-6">
                                    <h3>Deskripsi</h3>
                                    <p>{!! $product->description !!}</p>
                                </div>
                                <div class="col-lg-5">
                                    <h3>Informasi</h3>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Stok</strong></td>
                                                    <td>{{ $product->stock }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>berat</strong></td>
                                                    <td>{{ $product->weight }} Gram</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Ukuran</strong></td>
                                                    <td>{{ $product->size }}</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Manufaktur</strong></td>
                                                    <td>{{ $product->brand }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /table-responsive -->
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ Storage::url('images/shop/' . $product->shop->logo) }}"
                                                    class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body ms-5">
                                                    <h5 class="card-title">{{ $product->shop->name }}
                                                        @if ($product->shop->verified == 1)
                                                        <small>
                                                            <i class="fa-solid fa-badge-check text-success ps-1"
                                                                data-bs-toggle="tooltip" data-bs-placement="right"
                                                                data-bs-title="UMKM ini telah diverifikasi"></i>
                                                        </small>
                                                    @endif
                                                    </h5>
                                                    
                                                    <div>
                                                        <i class="ti-location-pin me-2"></i>
                                                        {{ $product->shop->city->name }}
                                                    </div>
                                                    <div>
                                                        <i class="ti-email me-2"></i>
                                                        {{ $product->shop->email }}
                                                    </div>
                                                    <div>
                                                        <i class="ti-headphone-alt me-2"></i>
                                                        {{ $product->shop->phone }}
                                                    </div>
                                                    <a href="{{ route('shop-detail', $product->shop->slug) }}"
                                                        class="btn_1 mt-2">Kunjungi ></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /TAB A -->
                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                    <div class="card-header" role="tab" id="heading-B">
                        <h5 class="mb-0">
                            <a class="collapsed" data-bs-toggle="collapse" href="#collapse-B" aria-expanded="false"
                                aria-controls="collapse-B">
                                Penilaian
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                        <!-- Button trigger modal -->

                        <div class="card-body">
                            <div class="row justify-content-between">
                                @foreach ($product->productReview as $review)
                                    <div class="col-lg-6">
                                        <div class="review_content">
                                            <div class="clearfix add_bottom_10">
                                                <span class="rating">
                                                    @for ($i = 0; $i < $review->rating; $i++)
                                                        <i class="icon-star voted"></i>
                                                    @endfor
                                                    @for ($i = 0; $i < 5 - $review->rating; $i++)
                                                        <i class="icon-star"></i>
                                                    @endfor
                                                    <em>{{ $review->rating }}/5.0</em>
                                                </span>
                                                <em>Published {{ $review->created_at->diffForHumans() }}</em>
                                            </div>
                                            <h4>"{{ $review->user->name }}"</h4>
                                            <p>{{ $review->review }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        @auth

                            <div class="card-body text-center">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#addReview">
                                    <i class="ti-plus"></i>
                                    Buat Review Saya
                                </button>
                            </div>
                        @endauth
                        @guest
                            <div class="card-body text-center">
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary">
                                    <i class="ti-user"></i>
                                    Login untuk membuat review
                                </a>
                            </div>
                        @endguest
                    </div>
                </div>
                <!-- /tab B -->
            </div>
            <!-- /tab-content -->
        </div>
        <!-- /container -->
    </div>
    <!-- /tab_content_wrapper -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Related</h2>
            <span>Products</span>
            <p>Produk yang relate dengan ini.</p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            @foreach ($releatedProduct as $releated)
                <div class="item">
                    <div class="grid_item">
                        @if ($releated->discount > 0)
                            <span class="ribbon off">-{{ $releated->discount }}%</span>
                        @endif
                        <figure>
                            <a href="{{ route('product', $releated->slug) }}">
                                <img class="owl-lazy" src="img/products/product_placeholder_square_medium.jpg"
                                    data-src="@if ($releated->productImage->isNotEmpty()) {{ Storage::url('images/product/' . $releated->productImage[0]->image) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $releated->name }} @endif"
                                    alt="">
                            </a>
                        </figure>
                        <div class="rating">

                            @for ($i = 0; $i < round($releated->productReview->average('rating')); $i++)
                                <i class="icon-star voted"></i>
                            @endfor
                            @for ($i = 0; $i < 5 - round($releated->productReview->average('rating')); $i++)
                                <i class="icon-star"></i>
                            @endfor
                        </div>
                        <a href="{{ route('product', $releated->slug) }}">
                            <h3>{{ $releated->name }}</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">@money($releated->price - ($releated->price * $releated->discount) / 100)</span>
                            @if ($releated->discount > 0)
                                <span class="old_price">@money($releated->price)</span>
                            @endif
                        </div>
                        <ul>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a>
                            </li>

                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>
            @endforeach
        </div>
        <!-- /products_carousel -->
    </div>
    <!-- /container -->

    <div class="feat">
        <div class="container">
            <ul>
                <li>
                    <div class="box">
                        <i class="ti-gift"></i>
                        <div class="justify-content-center">
                            <h3>Free Shipping</h3>
                            <p>For all oders over $99</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box">
                        <i class="ti-wallet"></i>
                        <div class="justify-content-center">
                            <h3>Secure Payment</h3>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box">
                        <i class="ti-headphone-alt"></i>
                        <div class="justify-content-center">
                            <h3>24/7 Support</h3>
                            <p>Online top support</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--/feat-->
@endsection

@section('scripts')
    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('front/js/carousel_with_thumbs.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @auth
        <script>
            $(document).ready(function() {
                $('#addCart').click(function() {
                    var quantity = $('#quantity_1').val();
                    var productId = '{{ $product->id }}';
                    $.ajax({
                        url: "{{ route('cart-add') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            product_id: productId,
                            quantity: quantity
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                $('.top_panel').addClass('show');
                                $('.top_panel label').text(response.message);
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr);
                        }
                    });



                });
            });
        </script>
    @else
        <script>
            $(document).ready(function() {
                $('#addCart').click(function() {
                    Swal.fire({
                        title: 'Anda belum login',
                        text: 'Silahkan login terlebih dahulu untuk menambahkan produk ke keranjang',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Login',
                        cancelButtonText: 'Batal',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('login') }}";
                        }
                    });
                });
            });
        </script>
    @endauth
@endsection
