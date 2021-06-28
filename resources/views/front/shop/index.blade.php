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
			{{-- <div class="col-md-4 products-left">
				<div class="filter-price">
					<h3>Filter By Price</h3>
						<ul class="dropdown-menu6">
							<li>                
								<div id="slider-range"></div>							
								<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
							</li>			
						</ul>
								<!---->
								<script type='text/javascript'>//<![CDATA[ 
								$(window).load(function(){
								$( "#slider-range" ).slider({
											range: true,
											min: 0,
											max: 9000,
											values: [ 1000, 7000 ],
											slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
											}
								});
								$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

								});//]]>  

								</script>
							<script type="text/javascript" src="{{ asset('/public/assets/js/jquery-ui.js') }}"></script>
						<!---->
				</div>
				<div class="css-treeview">
					<h4>Categories</h4>
					<ul class="tree-list-pad">
						@if (!empty($categories))
							@foreach ($categories as $category)
								<li><input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><span></span>{{ $category->title ?? '' }}</label></li>
							@endforeach
						@endif
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-8 products-right">
				<h5>Product Compare(0)</h5>
				<div class="sort-grid">
					<div class="sorting">
						<h6>Sort By</h6>
						<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
							<option value="null">Default</option>
							<option value="null">Name(A - Z)</option> 
							<option value="null">Name(Z - A)</option>
							<option value="null">Price(High - Low)</option>
							<option value="null">Price(Low - High)</option>	
							<option value="null">Model(A - Z)</option>
							<option value="null">Model(Z - A)</option>					
						</select>
						<div class="clearfix"></div>
					</div>
					<div class="sorting">
						<h6>Showing</h6>
						<select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
							<option value="null">7</option>
							<option value="null">14</option> 
							<option value="null">28</option>					
							<option value="null">35</option>								
						</select>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			
				@if (!empty($limitedProducts))
					@foreach ($limitedProducts as $product)
						<div class="col-md-4 product-men no-pad-men">
							<div class="men-pro-item simpleCart_shelfItem">
								<div class="men-thumb-item">
									<img src="{{ asset($product->image) ?? '' }}" alt="" class="pro-image-front">
									<img src="{{ asset($product->image) ?? '' }}" alt="" class="pro-image-back">
									<div class="men-cart-pro">
										<div class="inner-men-cart-pro">
											<a href="single.html" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
									<span class="product-new-top">{{ $product->category->title ?? '' }}</span>
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html">{{ $product->title ?? '' }}</a></h4>
									<div class="info-product-price">
										<span class="item_price">Rs.{{ $product->price }}</span>
										<del>Rs.{{ $product->discount/100 }}</del>
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
								</div>
							</div>
						</div>
					@endforeach
				@endif
				<div class="clearfix"></div>
			</div> --}}
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
											<a href="single.html" class="link-product-add-cart">Quick View</a>
										</div>
									</div>
									<span class="product-new-top">New</span>
								</div>
								<div class="item-info-product ">
									<h4><a href="single.html">{{ $product->title ?? '' }}</a></h4>
									<div class="info-product-price">
										<span class="item_price">Rs.{{ $product->price }}</span>
										<del>Rs.{{ $product->discount/100 }}</del>
									</div>
									<a href="#" class="item_add single-item hvr-outline-out button2">Add to cart</a>									
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
