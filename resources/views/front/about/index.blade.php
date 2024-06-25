@extends('front.app')

@section('seo')
@endsection

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/blog.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container margin_60_35 add_bottom_30">
    <div class="main_title">
        <h2>About Allaia</h2>
        <p>Euismod phasellus ac lectus fusce parturient cubilia a nisi blandit sem cras nec tempor adipiscing rcu ullamcorper ligula.</p>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-5">
            <div class="box_about">
                <h2>Top Products</h2>
                <p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
                <p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
                <img src="img/arrow_about.png" alt="" class="arrow_1">
            </div>
        </div>
        <div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
                <img src="img/about_1.svg" alt="" class="img-fluid" width="350" height="268">
        </div>
    </div>
    <!-- /row -->
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-5 pr-lg-5 text-center d-none d-lg-block">
                <img src="img/about_2.svg" alt="" class="img-fluid" width="350" height="268">
        </div>
        <div class="col-lg-5">
            <div class="box_about">
                <h2>Top Brands</h2>
                <p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
                <p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
                <img src="img/arrow_about.png" alt="" class="arrow_2">
            </div>
        </div>
    </div>
    <!-- /row -->
    <div class="row justify-content-center align-items-center ">
        <div class="col-lg-5">
            <div class="box_about">
                <h2>+5000 products</h2>
                <p class="lead">Est falli invenire interpretaris id, magna libris sensibus mel id.</p>
                <p>Per eu nostrud feugiat. Et quo molestiae persecuti neglegentur. At zril definitionem mei, vel ei choro volumus. An tota nulla soluta has, ei nec essent audiam, te nisl dignissim vel. Ex velit audire perfecto pro, ei mei doming vivendo legendos. Cu sit magna zril, an odio delectus constituto vis. Vis ludus omnesque ne, est veri quaeque ad.</p>
            </div>

        </div>
        <div class="col-lg-5 pl-lg-5 text-center d-none d-lg-block">
                <img src="img/about_3.svg" alt="" class="img-fluid" width="350" height="316">
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->

<div class="bg_white">
    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Why Choose Allaia</h2>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="box_feat">
                    <i class="ti-medall-alt"></i>
                    <h3>+ 1000 Customers</h3>
                    <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="box_feat">
                    <i class="ti-help-alt"></i>
                    <h3>H24 Support</h3>
                    <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="box_feat">
                    <i class="ti-gift"></i>
                    <h3>Great Sale Offers</h3>
                    <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="box_feat">
                    <i class="ti-headphone-alt"></i>
                    <h3>Help Direct Line</h3>
                    <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="box_feat">
                    <i class="ti-wallet"></i>
                    <h3>Secure Payments</h3>
                    <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="box_feat">
                    <i class="ti-comments"></i>
                    <h3>Support via Chat</h3>
                    <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
                </div>
            </div>
        </div>
        <!--/row-->
    </div>
</div>
<!-- /bg_white -->

<div class="container margin_60">
<div class="main_title">
    <h2>Meet Allaia Staff</h2>
    <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
</div>
<div class="owl-carousel owl-theme carousel_centered">
    <div class="item">
        <a href="#0">
            <div class="title">
                <h4>Julia Holmes<em>CEO</em></h4>
            </div><img src="img/staff/1_carousel.jpg" alt="">
        </a>
    </div>
    <div class="item">
        <a href="#0">
            <div class="title">
                <h4>Lucas Smith<em>Marketing</em></h4>
            </div><img src="img/staff/2_carousel.jpg" alt="">
        </a>
    </div>
    <div class="item">
        <a href="#0">
            <div class="title">
                <h4>Paul Stephens<em>Business strategist</em></h4>
            </div><img src="img/staff/3_carousel.jpg" alt="">
        </a>
    </div>
    <div class="item">
        <a href="#0">
            <div class="title">
                <h4>Pablo Himenez<em>Customer Service</em></h4>
            </div><img src="img/staff/4_carousel.jpg" alt="">
        </a>
    </div>
    <div class="item">
        <a href="#0">
            <div class="title">
                <h4>Andrew Stuttgart<em>Admissions</em></h4>
            </div><img src="img/staff/5_carousel.jpg" alt="">
        </a>
    </div>
</div>
<!-- /carousel -->
</div>
<!-- /container -->
@endsection

@section('script')
    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('front/js/sticky_sidebar.min.js') }}"></script>
    <script src="{{ asset('front/js/specific_listing.js') }}"></script>
@endsection
