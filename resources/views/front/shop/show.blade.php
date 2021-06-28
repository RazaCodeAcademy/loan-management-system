@extends('layouts.master')

@section('title', 'Single Product')

@section('content')

	<!-- banner -->
	<div class="page-head">
		<div class="container">
			<h3>@yield('title')</h3>
		</div>
	</div>
	<!-- //banner -->
	<!-- single -->
	<div class="single">
		<div class="container">
			<div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						<!-- FlexSlider -->
							<script>
							// Can also be used with $(document).ready()
								$(window).load(function() {
									$('.flexslider').flexslider({
									animation: "slide",
									controlNav: "thumbnails"
									});
								});
							</script>
						<!-- //FlexSlider-->
						<ul class="slides">
							<div class="thumb-image"> 
								<img src="{{ asset($product->image) ?? '' }}" data-imagezoom="true" class="img-responsive" style="height: 300px; width:100%"> 
							</div>
						</ul>
						<div class="clearfix"></div>
					</div>	
				</div>
			</div>
			<div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
				<h3>{{ $product->title }}</h3>
				<p><span class="item_price">Rs.{{ $product->price - ($product->price * ($product->discount/100)) }}</span> <del>- Rs.{{ $product->price  }}</del></p>
				<div class="color-quality" style="margin-bottom: 25px;">
					<div class="color-quality-right">
						<h5>Quantity :</h5>
						<input type="number" value="1" min="1" max="1" style="width:270px;">
					</div>
				</div>
				<div class="occasion-cart">
					<a href="{{ route('shop.addToCart', $product->id) }}" class="item_add hvr-outline-out button2">Add to cart</a>
				</div>
			</div>
			<div class="clearfix"> </div>
			<div class="bootstrap-tab animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
							<h5>Product Brief Description</h5>
							<p>{{ $product->description ?? '' }}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //single -->

@endsection

