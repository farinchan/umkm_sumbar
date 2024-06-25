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
        
        <h1>UMKM Sumbar Blog &amp; News</h1>
    </div>
    <!-- /page_header -->
    <div class="row">
        <div class="col-lg-9">
            <div class="widget search_blog d-block d-sm-block d-md-block d-lg-none">
                <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search..">
                    <button type="submit"><i class="ti-search"></i></button>
                </div>
            </div>
            <!-- /widget -->
            <div class="row">
            @foreach ($news as $item)
                <div class="col-md-6">
                    <article class="blog">
                        <figure>
                            <a href="{{ route("news-show", $item->slug) }}"><img src="{{ Storage::url("images/news/". $item->image); }}" alt="">
                                <div class="preview"><span>Read more</span></div>
                            </a>
                        </figure>
                        <div class="post_info">
                            <small>{{ $item->category  }} - {{ $item->created_at->diffForHumans() }}</small>
                            <h2><a href="{{ route("news-show", $item->slug) }}">{{ Str::limit($item->title, 100, '...') }}</a></h2>
                            <p>{{ Str::limit(strip_tags($item->content), 200, '...') }}</p>
                            <ul>
                                <li>
                                    <div class="thumb"><img src="@if ($item->user->photo) {{ Storage::url("images/user/". $item->user->photo) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ $item->user->name }} @endif" alt=""></div>
                                    {{ $item->user->name }}
                                </li>
                                <li><i class="ti-comment"></i>{{ $item->comments->count() }}</li>
                            </ul>
                        </div>
                    </article>
                    <!-- /article -->
                </div>
                @endforeach
            </div>
            <!-- /row -->

            <div class="pagination__wrapper no_border add_bottom_30">
                <ul class="pagination">
                    @if ($news->onFirstPage())
                        <li class="page-item previous">
                            <a href="#" class="page-link"><i class="previous"></i></a>
                        </li>
                        <li>
                            <a href="#" class="prev" title="previous page">&#10094;</a>
                        </li>
                    @else
                        <li class="page-item previous">
                            <a href="{{ $product->previousPageUrl() }}" class="page-link bg-light"><i
                                    class="previous"></i></a>
                        </li>
                        <li>
                            <a href="#" class="prev" title="previous page">&#10094;</a>
                        </li>
                    @endif


                    @php
                        // Menghitung halaman pertama dan terakhir yang akan ditampilkan
                        $start = max($news->currentPage() - 2, 1);
                        $end = min($start + 4, $news->lastPage());
                    @endphp

                    @if ($start > 1)
                        <!-- Menampilkan tanda elipsis jika halaman pertama tidak termasuk dalam tampilan -->
                        <li>
                            <a>...</a>
                        </li>
                    @endif

                    @foreach ($news->getUrlRange($start, $end) as $page => $url)
                        <li>
                            <a href="{{ $url }}"
                                class="{{ $page == $news->currentPage() ? ' active' : '' }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($end < $news->lastPage())
                        <!-- Menampilkan tanda elipsis jika halaman terakhir tidak termasuk dalam tampilan -->
                        <li>
                            <a>...</a>
                        </li>
                    @endif

                    @if ($news->hasMorePages())
                        <li><a href="{{ $product->nextPageUrl() }}" class="next" title="next page">&#10095;</a>
                        </li>
                    @else
                        <li><a href="#" class="next" title="next page">&#10095;</a></li>
                    @endif
                </ul>
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
                            <a href="{{ route("news-show", $latest_item->slug) }}"><img src="{{ Storage::url("images/news/". $latest_item->image); }}" alt=""></a>
                        </div>
                        <small>Category - {{ $latest_item->created_at->diffForHumans() }}</small>
                        <h3><a href="{{ route("news-show", $latest_item->slug) }}" title="">{{ Str::limit($latest_item->title, 30, '...') }}</a></h3>
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
                    @foreach ($categories as $category )
                        <li><a href="#">{{ $category->name }} <span>({{ $category->news->count() }})</span></a></li> 
                    @endforeach
                </ul>
            </div>
            <!-- /widget -->
            {{-- <div class="widget">
                <div class="widget-title">
                    <h4>Popular Tags</h4>
                </div>
                <div class="tags">
                    <a href="#">Food</a>
                    <a href="#">Bars</a>
                    <a href="#">Cooktails</a>
                    <a href="#">Shops</a>
                    <a href="#">Best Offers</a>
                    <a href="#">Transports</a>
                    <a href="#">Restaurants</a>
                </div>
            </div> --}}
            <!-- /widget -->
        </aside>
        <!-- /aside -->
    </div>
    <!-- /row -->
</div>
@endsection

@section('script')
    <!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset('front/js/sticky_sidebar.min.js') }}"></script>
    <script src="{{ asset('front/js/specific_listing.js') }}"></script>
@endsection
