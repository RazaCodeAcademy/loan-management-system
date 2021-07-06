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

    <!-- content-bottom -->

    <div class="content-bottom" style="margin-bottom: 90px; margin-top: 90px">
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
