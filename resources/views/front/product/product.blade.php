@extends('front.app')

@section('seo')
@endsection

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/product_page.css') }}" rel="stylesheet">
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
                            <div class="btn_add_to_cart"><a href="#0" class="btn_1">Add to Cart</a></div>
                        </div>
                    </div>
                </div>
                <!-- /prod_info -->
                <div class="product_actions">
                    <ul>
                        <li>
                            <a href="#"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="ti-control-shuffle"></i><span>Add to Compare</span></a>
                        </li>
                    </ul>
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
                        <!-- /card-body -->
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
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            @foreach ($releatedProduct as $releated)
                <div class="item">
                    <div class="grid_item">
                        @if ($releated->discount > 0)
                        <span class="ribbon off">-{{ $releated->discount }}%</span>
                        @endif
                        <figure>
                            <a href="product-detail-1.html">
                                <img class="owl-lazy" src="img/products/product_placeholder_square_medium.jpg"
                                    data-src="@if ($releated->productImage->isNotEmpty()) {{ Storage::url('images/product/' . $releated->productImage[0]->image) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $releated->name }} @endif" alt="">
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
                        <a href="{{ route('product', $product->slug) }}">
                            <h3>{{ $product->name }}</h3>
                        </a>
                        <div class="price_box">
                            <span class="new_price">@money($product->price - ($product->price * $product->discount) / 100)</span>
                            @if ($product->discount > 0)
                                <span class="old_price">@money($product->price)</span>
                            @endif
                        </div>
                        <ul>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a>
                            </li>
                            <li><a href="#0" class="tooltip-1" data-bs-toggle="tooltip" data-bs-placement="left"
                                    title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to
                                        compare</span></a>
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
@endsection
