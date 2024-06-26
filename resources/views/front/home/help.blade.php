@extends('front.app')

@section('seo')
@endsection

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/faq.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Category</a></li>
                <li>Page active</li>
            </ul>
        </div>
        <h1>Help and Support</h1>
    </div>
    <!-- /page_header -->
    <div class="search-input">
        <input type="text" placeholder="Search question or article...">
        <button type="submit"><i class="ti-search"></i></button>
    </div>
    <!-- /search-input -->

    <div class="row">
        <div class="col-lg-4 col-md-6">
            <a class="box_topic" href="#0">
                <i class="ti-wallet"></i>
                <h3>Payments</h3>
                <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus.</p>
            </a>
        </div>
        <div class="col-lg-4 col-md-6">
            <a class="box_topic" href="#0">
                <i class="ti-user"></i>
                <h3>Account</h3>
                <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus.</p>
            </a>
        </div>
        <div class="col-lg-4 col-md-6">
            <a class="box_topic" href="#0">
                <i class="ti-help"></i>
                <h3>General help</h3>
                <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus.</p>
            </a>
        </div>
        <div class="col-lg-4 col-md-6">
            <a class="box_topic" href="#0">
                <i class="ti-truck"></i>
                <h3>Shipping</h3>
                <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus.</p>
            </a>
        </div>
        <div class="col-lg-4 col-md-6">
            <a class="box_topic" href="#0">
                <i class="ti-eraser"></i>
                <h3>Cancellation</h3>
                <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus.</p>
            </a>
        </div>
        <div class="col-lg-4 col-md-6">
            <a class="box_topic" href="#0">
                <i class="ti-comments"></i>
                <h3>Reviews</h3>
                <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus.</p>
            </a>
        </div>
    </div>
    <!--/row-->
</div>
<!-- /container -->
<div class="bg_white">
    <div class="container margin_30">
        <h5>Popular Articles</h5>
        <div class="list_articles add_bottom_15 clearfix">
            <ul>
                <li><a href="#0"><i class="ti-file"></i><strong>Account</strong> - Et dicit vidisse epicurei
                        pri</a></li>
                <li><a href="#0"><i class="ti-file"></i><strong>Account</strong> - Ad sit virtute rationibus
                        efficiantur</a></li>
                <li><a href="#0"><i class="ti-file"></i><strong>Refund</strong> - Partem vocibus omittam pri
                        ne</a></li>
                <li><a href="#0"><i class="ti-file"></i><strong>Shipping</strong> - Case debet appareat duo
                        cu</a></li>
                <li><a href="#0"><i class="ti-file"></i><strong>Payments</strong> - Impedit torquatos quo
                        in</a></li>
                <li><a href="#0"><i class="ti-file"></i><strong>Warranty</strong> - Nec omnis alienum no</a>
                </li>
                <li><a href="#0"><i class="ti-file"></i><strong>Refund</strong> - Quo eu soleat facilisi
                        menandri</a></li>
                <li><a href="#0"><i class="ti-file"></i><strong>Reviews</strong> - Et dicit vidisse epicurei
                        pri</a></li>
            </ul>
        </div>
        <!-- /list_articles -->
    </div>
</div>
@endsection


@section('scripts')
    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('front/js/carousel-home.min.js') }}"></script>
@endsection
