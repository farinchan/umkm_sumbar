<footer class="revealed">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_1">Quick Links</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_1">
                    <ul>
                        <li><a href="{{ route("home") }}">Home</a></li>
                        <li><a href="{{ route("product-all") }}">Semua Produk</a></li>
                        <li><a href="{{ route("news") }}">Berita</a></li>
                        <li><a href="{{ route("about") }}">Tentang Kami</a></li>
                        <li><a href="{{ route("help") }}">Bantuan</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_2">Categories</h3>
                <div class="collapse dont-collapse-sm links" id="collapse_2">
                    @php
                        $categoriesFooter = \App\Models\ProductCategory::where("parent_id", null)->get();
                    @endphp
                    <ul>
                        @foreach ($categoriesFooter as $categoryFooter)
                            <li><a href="{{ route("product-category", $categoryFooter->slug) }}">{{ $categoryFooter->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_3">Contacts</h3>
                <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                    <ul>
                        <li><i class="ti-home"></i><a
                                href="https://maps.google.com/?q={{ $website->latitude }},{{ $website->longitude }}">{{ $website->address }}</a>
                        </li>
                        <li><i class="ti-headphone-alt"><a
                                    href="tel:{{ $website->phone }}
                            "></i>{{ $website->phone }}</a>
                        </li>
                        <li><i class="ti-email"></i><a
                                href="mailto:{{ $website->email }}
                            ">{{ $website->email }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 data-bs-target="#collapse_4">Keep in touch</h3>
                <div class="collapse dont-collapse-sm" id="collapse_4">
                    <div id="newsletter">
                        <div class="form-group">
                            <input type="email" name="email_newsletter" id="email_newsletter" class="form-control"
                                placeholder="Your email">
                            <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
                        </div>
                    </div>
                    <div class="follow_us">
                        <h5>Ikuti Kami di</h5>
                        <ul>
                            <li><a target="_blank" href="{{ $website->twitter }}"><img
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                        data-src="{{ asset("front/img/twitter_icon.svg") }}" alt="" class="lazy"></a>
                            </li>
                            <li><a target="_blank"  href="{{ $website->facebook  }}"><img
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                        data-src="{{ asset("front/img/facebook_icon.svg") }}" alt="" class="lazy"></a>
                            </li>
                            <li><a target="_blank"  href="{{ $website->instagram }}"><img
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                        data-src="{{ asset("front/img/instagram_icon.svg") }}" alt="" class="lazy"></a>
                            </li>
                            <li><a target="_blank"  href="{{ $website->youtube }}"><img
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                        data-src="{{ asset("front/img/youtube_icon.svg") }}" alt="" class="lazy"></a>
                            </li>
                            <li><a target="_blank"  href="{{ $website->linkedin }}"><img
                                        src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw=="
                                        data-src="{{ asset("front/img/linkedin_icon.svg") }}" alt="" class="lazy"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->
        <hr>
        <div class="row add_bottom_25">
            <div class="col-lg-6">
                <ul class="footer-selector clearfix">
                    <li>
                        <div class="styled-select lang-selector">
                            <select>
                                <option value="Indonesia" selected>Indonesia</option>
                            </select>
                        </div>
                    </li>
                    <li>
                        <div class="styled-select currency-selector">
                            <select>
                                <option value="US Dollars" selected>(Rp) Rupiah </option>
                            </select>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="additional_links">
                    <li><a href="#0">Terms and conditions</a></li>
                    <li><a href="#0">Privacy</a></li>
                    <li><span>© 2024 {{ $website->name }} Team - UIN Bukittinggi
                    </span></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
