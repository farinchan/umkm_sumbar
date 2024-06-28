@extends('front.app')

@section('seo')
@endsection

@section('styles')
    <!-- SPECIFIC CSS -->
    <link href="{{ asset('front/css/blog.css') }}" rel="stylesheet">
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
        </div>
        <!-- /page_header -->
        <div class="row">
            <div class="col-lg-9">
                <div class="singlepost">
                    <figure><img alt="" class="img-fluid" src="{{ Storage::url('images/news/' . $news->image) }}">
                    </figure>
                    <h1>{{ $news->title }}</h1>
                    <div class="postmeta">
                        <ul>
                            <li><a href="#"><i class="ti-folder"></i> Category</a></li>
                            <li><i class="ti-calendar"></i> {{ $news->created_at->format('l, j F Y') }}</li>
                            <li><a href="#"><i class="ti-user"></i> {{ $news->user->name }}</a></li>
                            <li><a href="#"><i class="ti-comment"></i> ({{ $news->comments->count() }}) Comments</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /post meta -->
                    <div class="post-content">

                        <p>{!! $news->content !!}</p>


                    </div>
                    <!-- /post -->
                </div>
                <!-- /single-post -->

                <div id="comments">
                    <h5>Komentar</h5>
                    <ul>
                        @foreach ($news->comments as $comment)
                            <li>
                                <div class="avatar">
                                    <a href="#"><img
                                            src="@if ($comment->user->photo) {{ Storage::url('images/user/' . $comment->user->photo) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $comment->user->name }} @endif"
                                            alt="">
                                    </a>
                                </div>
                                <div class="comment_right clearfix">
                                    <div class="comment_info">
                                        By <a
                                            href="#">{{ $comment->user->name }}</a><span>|</span>{{ $comment->created_at->diffForHumans() }}<span>|</span><a
                                            href="#"><i class="icon-reply"></i></a>
                                    </div>
                                    <p>
                                        {{ $comment->comment }}.
                                    </p>
                                </div>

                            </li>
                        @endforeach
                    </ul>
                </div>

                <hr>

                <div id="comments">

                    <h5>Leave a comment</h5>
                    @if (Auth::check())
                        <ul>
                            <li>
                                <div class="avatar">
                                    <a href="#"><img
                                            src="@if (Auth()->user()->photo) {{ Storage::url('images/user/' . Auth()->user()->photo) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ Auth()->user()->name }} @endif"
                                            alt="">
                                    </a>
                                </div>
                                <div class="comment_right clearfix">
                                    <div class="comment_info">
                                        By <a
                                            href="#">{{ Auth()->user()->name }}</a><a
                                            href="#"><i class="icon-reply"></i></a>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="comment" id="comments2" rows="6" placeholder="Comment"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="submit2" class="btn_1 add_bottom_15">Submit</button>
                                    </div>
                                </div>

                            </li>
                        </ul>
                    @else
                        <a href="{{ route('login') }}" class="btn_1 add_bottom_15">Login to comment</a>
                    @endif
                </div>


            </div>
            <!-- /col -->

            <aside class="col-lg-3">
                <div class="widget search_blog d-none d-sm-none d-md-none d-lg-block">
                    <div class="form-group">
                        <input type="text" name="search" id="search_blog" class="form-control" placeholder="Search..">
                        <button type="submit"><i class="ti-search"></i></button>
                    </div>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Berita terbaru</h4>
                    </div>
                    <ul class="comments-list">
                        @foreach ($latest_news as $latest_item)
                            <li>
                                <div class="alignleft">
                                    <a href="{{ route('news-show', $latest_item->slug) }}"><img
                                            src="{{ Storage::url('images/news/' . $latest_item->image) }}"
                                            alt=""></a>
                                </div>
                                <small>Category - {{ $latest_item->created_at->diffForHumans() }}</small>
                                <h3><a href="{{ route('news-show', $latest_item->slug) }}"
                                        title="">{{ Str::limit($latest_item->title, 30, '...') }}</a></h3>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /widget -->
                <div class="widget">
                    <div class="widget-title">
                        <h4>Kategori</h4>
                    </div>
                    <ul class="cats">
                        @foreach ($categories as $category)
                            <li><a href="#">{{ $category->name }} <span>({{ $category->news->count() }})</span></a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
@endsection

@section('scripts')
    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('front/js/sticky_sidebar.min.js') }}"></script>
    <script src="{{ asset('front/js/specific_listing.js') }}"></script>
@endsection
