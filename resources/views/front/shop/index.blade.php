@extends('layouts.master')

@section('title', 'Shop')

@section('content')

	@section('css')

		<style>

			.pro-image-front, .pro-image-back{
				width: 100%;
				height: 100%;
			}

		</style>

	@endsection

	<!-- banner -->
	<div class="page-head">
		<div class="container">
			<h3>@yield('title')</h3>
		</div>
	</div>
	<!-- //banner -->
	<!-- mens -->
	<div class="men-wear">
		<div class="container">
			<div class="clearfix"></div>
			<div class="ele-bottom-grid">
				<h3><span>Latest </span>Collections</h3>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
			</div>
			<div class="single-pro">
				@if (!empty($allProducts))
					@foreach ($allProducts as $product)
						<div class="col-md-3 product-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="{{ asset($product->image) ?? '' }}" alt="" class="pro-image-front">
									<img src="{{ asset($product->image) ?? '' }}" alt="" class="pro-image-back">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="{{ route('shop.show', $product->id) }}" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
									<span class="product-new-top">{{ ($product->category->title) ?? '' }}</span>
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html">{{ $product->title ?? '' }}</a></h4>
									<div class="info-product-price">
										<span class="item_price">Rs.{{ $product->price - ($product->price * ($product->discount/100)) }}</span>
										<del>Rs.{{ $product->price  }}</del>
									</div>
									<a href="{{ route('shop.addToCart', $product->id) }}" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</div>	
	<!-- //mens -->
		
@endsection
