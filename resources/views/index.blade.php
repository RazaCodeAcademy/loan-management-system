@extends('layouts.master')

@section('title', 'Home')

@section('content')

    @section('css')
        <link rel="stylesheet" href="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/assets/owl.theme.default.min.css">
        <style>
            .hero-cover{
                background: url('{{ $slider->image ? asset($slider->image) : asset('/public/assets/images/ba2.jpg') }}') no-repeat;
                background-position: top;
                background-size: 100%;
                height: 90vh;
            }

            @media (max-width: 576px){
                .hero-cover{
                    height: 200px;
                }
            }
        </style>
    @endsection

    <!-- banner -->
    {{-- <div class="banner-grid">
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
    </div> --}}

    <!-- Set up your HTML -->
    <!-- <div class="owl-carousel owl-theme" >
        @if (!empty($sliders))
            @foreach ($sliders as $slider)
                <div>
                    <img class="img-responsive" style="height: 75vh; object-fit: cover;" src="{{ $slider->image ? asset($slider->image) : asset('/public/assets/images/ba2.jpg') }}" alt="{{ $slider->title }}" />
                </div>
            @endforeach
        @endif
    </div> -->
    <div>
        @if (!empty($slider))
            <div class="hero-cover">
                <!-- <img class="cover-img img-responsive"  src="{{ $slider->image ? asset($slider->image) : asset('/public/assets/images/ba2.jpg') }}" alt="{{ $slider->title }}" /> -->
            </div>
        @endif
    </div>
    <!-- //banner -->

    <div class="box-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                   <div class="box">
                       <div class="box-icon">
                       <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="30" height="30"
                            viewBox="0 0 172 172"
                            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#868686"><path d="M151.0375,3.3325c-0.14781,0.02688 -0.29562,0.06719 -0.43,0.1075c-1.59906,0.36281 -2.72781,1.80063 -2.6875,3.44c0,6.53063 -3.02344,10.11844 -8.6,13.6525c-5.57656,3.53406 -13.63906,6.39625 -21.93,9.89c-8.29094,3.49375 -16.8775,7.69969 -23.5425,14.7275c-6.06031,6.39625 -10.26625,15.18438 -10.965,26.9825c-6.20812,-0.47031 -9.84969,-2.39187 -14.19,-4.6225c-5.02562,-2.58 -10.99187,-5.59 -20.5325,-5.59c-5.88562,0 -11.51594,3.44 -16.8775,8.4925c-5.36156,5.0525 -10.54844,11.91906 -15.1575,19.8875c-9.21812,15.93688 -16.125,36.07969 -16.125,54.18c0,7.45781 1.85438,14.10938 5.375,19.135c3.52063,5.02563 8.96281,8.385 15.265,8.385c16.62219,0 28.68906,-8.39844 38.7,-16.2325c10.01094,-7.83406 18.06,-14.7275 26.66,-14.7275c8.6,0 16.64906,6.89344 26.66,14.7275c10.01094,7.83406 22.07781,16.2325 38.7,16.2325c6.30219,0 11.74438,-3.35937 15.265,-8.385c3.52063,-5.02562 5.375,-11.67719 5.375,-19.135c0,-18.10031 -6.90687,-38.24312 -16.125,-54.18c-4.60906,-7.96844 -9.79594,-14.835 -15.1575,-19.8875c-5.36156,-5.0525 -10.99187,-8.4925 -16.8775,-8.4925c-9.54062,0 -15.50687,3.01 -20.5325,5.59c-4.16562,2.13656 -7.68625,3.95063 -13.4375,4.515c0.67188,-10.11844 4.04469,-16.89094 9.03,-22.145c5.56313,-5.87219 13.16875,-9.83625 21.1775,-13.2225c8.00875,-3.38625 16.24594,-6.11406 22.8975,-10.32c6.65156,-4.20594 11.825,-10.50812 11.825,-19.4575c0.04031,-0.99437 -0.36281,-1.94844 -1.075,-2.62031c-0.72562,-0.68531 -1.70656,-1.02125 -2.6875,-0.92719zM48.16,68.8c8.21031,0 12.28188,2.15 17.3075,4.73c5.02563,2.58 10.99188,5.59 20.5325,5.59c0.33594,0 0.645,0.01344 0.9675,0c0.04031,0 0.06719,0 0.1075,0c8.90906,-0.215 14.63344,-3.10406 19.4575,-5.59c5.02563,-2.58 9.09719,-4.73 17.3075,-4.73c2.98313,0 7.45781,2.15 12.1475,6.5575c4.68969,4.4075 9.51375,10.87094 13.8675,18.3825c8.7075,15.02313 15.265,34.44031 15.265,50.74c0,6.30219 -1.58562,11.69063 -4.085,15.265c-2.49937,3.57438 -5.65719,5.375 -9.675,5.375c-14.33781,0 -24.63094,-7.08156 -34.4,-14.7275c-9.76906,-7.64594 -18.92,-16.2325 -30.96,-16.2325c-12.04,0 -21.19094,8.58656 -30.96,16.2325c-9.76906,7.64594 -20.06219,14.7275 -34.4,14.7275c-4.01781,0 -7.17562,-1.80062 -9.675,-5.375c-2.49937,-3.57437 -4.085,-8.96281 -4.085,-15.265c0,-16.29969 6.5575,-35.71687 15.265,-50.74c4.35375,-7.51156 9.17781,-13.975 13.8675,-18.3825c4.68969,-4.4075 9.16438,-6.5575 12.1475,-6.5575zM127.28,92.88c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88zM41.28,96.32v10.32h-10.32v10.32h10.32v10.32h10.32v-10.32h10.32v-10.32h-10.32v-10.32zM113.52,106.64c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88zM141.04,106.64c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88zM127.28,120.4c-3.80281,0 -6.88,3.07719 -6.88,6.88c0,3.80281 3.07719,6.88 6.88,6.88c3.80281,0 6.88,-3.07719 6.88,-6.88c0,-3.80281 -3.07719,-6.88 -6.88,-6.88z"></path></g></g></svg>
                       </div>
                       <h4>Entertainment</h4>
                       <p>
                            Integer posuere erat a ante venenatis dapibus posuere velit aliquet sed posuere constet.
                       </p>
                       <button>Hire Us</button>
                   </div> 
                </div>
                <div class="col-md-4">
                <div class="box">
                       <div class="box-icon">
                       <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="30" height="30"
                            viewBox="0 0 172 172"
                            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#868686"><path d="M168.6675,3.3325l-3.655,0.1075c0,0 -25.28937,0.33594 -49.665,12.47c-7.83406,3.91031 -15.70844,9.27188 -22.79,16.34c-8.72094,8.72094 -21.02969,23.03188 -32.25,36.55h-29.3475c-0.1075,0 -0.215,0 -0.3225,0c-0.92719,0.09406 -1.78719,0.55094 -2.365,1.29l-17.2,20.64c-0.72562,0.91375 -0.95406,2.13656 -0.57781,3.23844c0.36281,1.10188 1.27656,1.94844 2.40531,2.24406l20.9625,5.2675c-0.16125,0.20156 -1.1825,1.505 -1.1825,1.505l-0.43,0.43l-0.215,0.645c0,0 -0.29562,1.20938 -0.215,2.365c0.02688,0.43 0.1075,0.99438 0.215,1.505l-7.4175,12.47c0,0 -0.33594,0.67188 -0.43,1.075c-0.09406,0.40313 -0.12094,0.90031 -0.1075,1.3975c0.02688,0.99438 0.26875,2.10969 0.86,3.44c1.1825,2.66063 3.70875,6.18125 9.1375,11.61c5.42875,5.41531 8.93594,7.955 11.61,9.1375c1.33031,0.59125 2.44563,0.83313 3.44,0.86c0.49719,0.01344 0.99438,-0.01344 1.3975,-0.1075c0.40313,-0.09406 1.075,-0.43 1.075,-0.43l12.5775,-7.4175c0.47031,0.09406 1.00781,0.18813 1.3975,0.215c1.15563,0.08063 2.365,-0.215 2.365,-0.215l0.645,-0.215l0.5375,-0.43c0,0 1.22281,-0.94062 1.3975,-1.075l5.2675,20.855c0.29563,1.12875 1.14219,2.0425 2.24406,2.40531c1.10187,0.37625 2.32469,0.14781 3.23844,-0.57781l20.64,-17.2c0.81969,-0.65844 1.29,-1.63937 1.29,-2.6875v-29.455c13.61219,-11.31437 28.01719,-23.60969 36.55,-32.1425c7.04125,-7.05469 12.32219,-14.9425 16.2325,-22.79c12.08031,-24.33531 12.5775,-49.665 12.5775,-49.665zM161.25,10.75c-0.28219,5.17344 -1.63937,23.22 -11.395,42.8925c-3.62812,7.29656 -8.4925,14.5125 -14.9425,20.9625c-8.385,8.385 -23.13937,20.9625 -36.8725,32.3575c-0.28219,0.17469 -0.5375,0.38969 -0.7525,0.645c-16.08469,13.33 -30.59719,24.87281 -31.4975,25.585c-0.40312,-0.04031 -1.03469,-0.08062 -2.15,-0.5375c-2.56656,-1.04812 -7.06812,-3.73562 -13.76,-10.4275c-6.69187,-6.69187 -9.48687,-11.30094 -10.535,-13.8675c-0.45687,-1.11531 -0.49719,-1.74687 -0.5375,-2.15c0.71219,-0.90031 12.09375,-15.25156 25.37,-31.2825c0.36281,-0.29562 0.645,-0.65844 0.86,-1.075c11.27406,-13.59875 23.77094,-28.17844 32.3575,-36.765c6.47688,-6.47687 13.67938,-11.30094 20.9625,-14.9425c19.69938,-9.79594 37.7325,-11.12625 42.8925,-11.395zM116.96,37.84c-9.46,0 -17.2,7.74 -17.2,17.2c0,9.46 7.74,17.2 17.2,17.2c9.46,0 17.2,-7.74 17.2,-17.2c0,-9.46 -7.74,-17.2 -17.2,-17.2zM116.96,44.72c5.73781,0 10.32,4.58219 10.32,10.32c0,5.73781 -4.58219,10.32 -10.32,10.32c-5.73781,0 -10.32,-4.58219 -10.32,-10.32c0,-5.73781 4.58219,-10.32 10.32,-10.32zM32.5725,75.68h22.0375c-6.59781,8.04906 -12.02656,14.88875 -16.0175,19.8875l-18.705,-4.73zM35.475,115.5625c1.96188,3.14438 4.8375,6.88 9.46,11.5025c4.60906,4.60906 8.35813,7.49813 11.5025,9.46l-7.4175,4.4075c-0.1075,-0.02687 -0.09406,-0.01344 -0.5375,-0.215c-1.41094,-0.61812 -4.48812,-2.56656 -9.5675,-7.6325c-5.06594,-5.07937 -7.01437,-8.15656 -7.6325,-9.5675c-0.20156,-0.44344 -0.18812,-0.43 -0.215,-0.5375zM96.32,117.39v22.0375l-15.1575,12.685l-4.73,-18.5975c4.98531,-3.99094 11.75781,-9.43312 19.8875,-16.125zM22.0375,131.4725c-5.61687,4.31344 -10.69625,4.86438 -15.265,9.3525c-2.28437,2.24406 -4.09844,5.42875 -5.16,9.7825c-1.06156,4.35375 -1.505,9.97063 -1.505,17.845v3.44h3.44c15.8025,0 23.52906,-2.49937 28.165,-7.2025c4.63594,-4.70312 5.40188,-9.94375 8.9225,-14.7275l-5.59,-4.085c-4.46125,6.07375 -5.45562,11.11281 -8.2775,13.975c-2.48594,2.52625 -8.02219,4.38063 -19.4575,4.8375c0.17469,-4.99875 0.41656,-9.79594 1.075,-12.47c0.86,-3.48031 1.90813,-5.16 3.225,-6.45c2.62031,-2.58 7.75344,-3.73562 14.5125,-8.9225zM48.4825,141.255l-0.3225,0.215v-0.1075c0,0 0.18813,-0.05375 0.3225,-0.1075z"></path></g></g></svg>
                       </div>
                       <h4>Experience</h4>
                       <p>
                            Integer posuere erat a ante venenatis dapibus posuere velit aliquet sed posuere constet.
                       </p>
                       <button>Hire Us</button>
                   </div>
                </div>
                <div class="col-md-4">
                <div class="box">
                       <div class="box-icon">
                       <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                            width="30" height="30"
                            viewBox="0 0 172 172"
                            style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#868686"><path d="M51.6,10.2125c-0.1075,0.02688 -0.215,0.06719 -0.3225,0.1075h-1.1825l-0.43,0.5375c-0.08062,0.06719 -0.14781,0.13438 -0.215,0.215l-0.1075,0.1075c-0.06719,0.02688 -0.14781,0.06719 -0.215,0.1075v0.1075c-0.16125,0.13438 -0.29562,0.26875 -0.43,0.43l-45.365,47.73l-2.0425,2.15l1.8275,2.365l79.335,102.125c0.22844,1.11531 0.99438,2.02906 2.0425,2.4725l1.505,2.0425l1.6125,-2.15c1.00781,-0.47031 1.72,-1.38406 1.935,-2.4725c0,-0.04031 0,-0.06719 0,-0.1075l79.335,-101.91l1.8275,-2.365l-2.0425,-2.15l-45.2575,-47.515c-0.06719,-0.08062 -0.13437,-0.14781 -0.215,-0.215v-0.1075c-0.09406,-0.12094 -0.20156,-0.22844 -0.3225,-0.3225l-0.1075,-0.215c-0.16125,-0.16125 -0.34937,-0.30906 -0.5375,-0.43l-0.3225,-0.43h-0.9675c-0.215,-0.05375 -0.43,-0.09406 -0.645,-0.1075c-0.215,0.01344 -0.43,0.05375 -0.645,0.1075h-67.725c-0.1075,-0.04031 -0.215,-0.08062 -0.3225,-0.1075zM54.395,17.2h23.7575l-30.96,33.4325zM93.8475,17.2h23.7575l7.2025,33.325zM86,18.8125l36.8725,39.6675h-73.8525zM126.3125,24.94l31.82,33.54h-24.725zM45.6875,25.0475l-7.2025,33.4325h-24.6175zM12.9,65.36h26.1225l33.11,76.325zM46.44,65.36h79.12l-39.56,91.16zM132.87,65.36h26.23l-59.2325,76.325z"></path></g></g></svg>
                       </div>
                       <h4>Premium Quality</h4>
                       <p>
                            Integer posuere erat a ante venenatis dapibus posuere velit aliquet sed posuere constet.
                       </p>
                       <button>Hire Us</button>
                   </div>
                </div>
            </div>
        </div>
    </div>

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

@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.boomcdn.com/libs/owl-carousel/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function(){
            // $(".owl-carousel").owlCarousel();
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:false,
                    },
                    600:{
                        items:1,
                        nav:false
                    },
                    1000:{
                        items:1,
                        nav:false,
                        loop:false
                    }
                }
            })
        });
    </script>


@endsection
