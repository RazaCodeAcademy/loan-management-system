@extends('layouts.master')

@section('title', 'Home')

@section('content')

    <!-- banner -->
    <div class="banner-grid">
        <div id="visual">
                <div class="slide-visual">
                    <!-- Slide Image Area (1000 x 424) -->
                    <ul class="slide-group">
                        @if (!empty($sliders))
                            @foreach ($sliders as $slider)
                                <li>
                                    <img class="img-responsive" src="{{ $slider->image ? asset($slider->image) : asset('/public/assets/images/ba2.jpg') }}" alt="{{ $slider->title }}" />
                                </li>
                            @endforeach
                        @else
                            <li><img class="img-responsive" src="{{ asset('/public/assets/images/ba1.jpg') }}" alt="Dummy Image" /></li>
                        @endif
                    </ul>

                    <!-- Slide Description Image Area (316 x 328) -->
                    <div class="script-wrap">
                        <ul class="script-group">
                            @if (!empty($sliders))
                                @foreach ($sliders as $slider)
                                    <li>
                                        <div class="inner-script">
                                            <img class="img-responsive" src="{{ $slider->image ? asset($slider->image) : asset('/public/assets/images/baa1.jpg') }}" alt="Dummy Image" style="height: 286px; width:276px" />
                                        </div>
                                    </li>
                                    {{-- <img class="img-responsive" src="{{ $slider->image ? asset($slider->image) : asset('/public/assets/images/ba2.jpg') }}" alt="Dummy Image" /> --}}
                                @endforeach
                            @else
                                <li><div class="inner-script"><img class="img-responsive" src="{{ asset('/public/assets/images/baa1.jpg') }}" alt="Dummy Image" /></div></li>
                            @endif
                        </ul>
                        <div class="slide-controller">
                            <a href="#" class="btn-prev"><img src="{{ asset('/public/assets/images/btn_prev.png') }}" alt="Prev Slide" /></a>
                            <a href="#" class="btn-play"><img src="{{ asset('/public/assets/images/btn_play.png') }}" alt="Start Slide" /></a>
                            <a href="#" class="btn-pause"><img src="{{ asset('/public/assets/images/btn_pause.png') }}" alt="Pause Slide" /></a>
                            <a href="#" class="btn-next"><img src="{{ asset('/public/assets/images/btn_next.png') }}" alt="Next Slide" /></a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        <script type="text/javascript" src="{{ asset('/public/assets/js/pignose.layerslider.js') }}"></script>
        <script type="text/javascript">
        //<![CDATA[
            $(window).load(function() {
                $('#visual').pignoseLayerSlider({
                    play    : '.btn-play',
                    pause   : '.btn-pause',
                    next    : '.btn-next',
                    prev    : '.btn-prev'
                });
            });
        //]]>
        </script>

    </div>
    <!-- //banner -->
    <!-- content -->

    <div class="new_arrivals">
        <div class="container">
            <h3><span>new </span>arrivals</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
            <div class="new_grids">
                <div class="col-md-4 new-gd-left">
                    <img src="{{ asset('/public/assets/images/wed1.jpg') }}" alt=" " />
                    <div class="wed-brand simpleCart_shelfItem">
                        <h4>Wedding Collections</h4>
                        <h5>Flat 50% Discount</h5>
                        <p><i>$250</i> <span class="item_price">$500</span><a class="item_add hvr-outline-out button2" href="#">add to cart </a></p>
                    </div>
                </div>
                <div class="col-md-4 new-gd-middle">
                    <div class="new-levis">
                        <div class="mid-img">
                            <img src="{{ asset('/public/assets/images/levis1.png') }}" alt=" " />
                        </div>
                        <div class="mid-text">
                            <h4>up to 40% <span>off</span></h4>
                            <a class="hvr-outline-out button2" href="product.html">Shop now </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="new-levis">
                        <div class="mid-text">
                            <h4>up to 50% <span>off</span></h4>
                            <a class="hvr-outline-out button2" href="product.html">Shop now </a>
                        </div>
                        <div class="mid-img">
                            <img src="{{ asset('/public/assets/images/dig.jpg') }}" alt=" " />
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-4 new-gd-left">
                    <img src="{{ asset('/public/assets/images/wed2.jpg') }}" alt=" " />
                    <div class="wed-brandtwo simpleCart_shelfItem">
                        <h4>Spring / Summer</h4>
                        <p>Shop Men</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- //content -->

    <!-- content-bottom -->

    <div class="content-bottom" style="margin-bottom: 90px">
        <div class="col-md-7 content-lgrid">
            @foreach ($services as $service)
                @if($loop->iteration % 2 == 0)
                    <div class="col-sm-6 content-img-right">
                        <h3>{{ $service->description }}<span>{{ $service->title }}</span> {{ $service->category->title }}</h3>
                    </div>
                    <div class="col-sm-6 content-img-left text-center">
                        <div class="content-grid-effect slow-zoom vertical">
                            <div class="img-box"><img src="{{ asset($service->image) }}" alt="image" class="img-responsive zoom-img"></div>
                                <div class="info-box">
                                    <div class="info-content simpleCart_shelfItem">
                                        <h4>{{ $service->category->title }}</h4>
                                        <span class="separator"></span>
                                        <p><span class="item_price">{{ $service->price }}</span></p>
                                        <span class="separator"></span>
                                        <a class="item_add hvr-outline-out button2" href="#">add to cart </a>
                                    </div>
                                </div>
                        </div>
                    </div>
                @else
                
                    <div class="col-sm-6 content-img-left text-center">
                        <div class="content-grid-effect slow-zoom vertical">
                            <div class="img-box"><img src="{{ asset('/public/assets/images/p1.jpg') }}" alt="image" class="img-responsive zoom-img"></div>
                                <div class="info-box">
                                    <div class="info-content simpleCart_shelfItem">
                                        <h4>{{ $service->category->title }}</h4>
                                        <span class="separator"></span>
                                        <p><span class="item_price">{{ $service->price }}</span></p>
                                        <span class="separator"></span>
                                        <a class="item_add hvr-outline-out button2" href="#">add to cart </a>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-sm-6 content-img-right">
                        <h3>{{ $service->description }}<span>{{ $service->title }}</span> {{ $service->category->title }}</h3>
                    </div>
                @endif
                    <div class="clearfix"></div>
            @endforeach
            
        </div>
        <div class="col-md-5 content-rgrid text-center">
            <div class="content-grid-effect slow-zoom vertical">
                    <div class="img-box"><img src="{{ asset('/public/assets/images/p4.jpg') }}" alt="image" class="img-responsive zoom-img"></div>
                        <div class="info-box">
                            <div class="info-content simpleCart_shelfItem">
                                        <h4>Shoes</h4>
                                        <span class="separator"></span>
                                        <p><span class="item_price">$150</span></p>
                                        <span class="separator"></span>
                                        <a class="item_add hvr-outline-out button2" href="#">add to cart </a>
                            </div>
                        </div>
                </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- //content-bottom -->


    
@endsection

