@extends('layouts.master')

@section('title', 'Shopping Cart')

@section('content')

	@php
		$tax = '';
		$discount = '';
		$grandTotal = '';
	@endphp

	<!-- banner -->
	<div class="page-head">
		<div class="container">
			<h3>@yield('title')</h3>
		</div>
	</div>
	<!-- //banner -->
	<!-- check out -->
	<div class="checkout">
		<div class="container">
			<h3>My Shopping Bag</h3>
			<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>Remove</th>
							<th>Product</th>
							<th>Quantity</th>
							<th>Product Name</th>
							<th>Price</th>
						</tr>
					</thead>
						@if (!empty($products))
							@foreach ($products as $product)
								<tr class="rem1">
									<td class="invert-closeb">
										<div class="rem">
											<a class="close1" href="{{ route('shop.removeItem', ['id' => $product['item']['id']]) }}"></a>
										</div>
									</td>
									<td class="invert-image"><a href="single.html"><img src="{{ asset($product['item']->image) ?? '' }}" alt=" " class="img-responsive" /></a></td>
									<td class="invert">
										<div class="quantity"> 
											<div class="quantity-select">                           
												<a class="entry value-minus" href="{{ route('shop.reduceByOne', ['id' => $product['item']['id']]) }}"></a>
												<div class="entry value"><span>{{ $product['qty'] ?? '' }}</span></div>
												<a class="entry value-plus active" href="{{ route('shop.addToCart', ['id' => $product['item']['id']]) }}"></a>
											</div>
										</div>
									</td>
									{{-- @dd($product) --}}
									<td class="invert">{{ $product['item']->title ?? '' }}</td>
									<td class="invert">Rs.{{ $product['price'] ?? '' }}</td>
								</tr>
							@endforeach
						@endif		
						<!--quantity-->
							<script>
							$('.value-plus').on('click', function(){
								var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
								divUpd.text(newVal);
							});

							$('.value-minus').on('click', function(){
								var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
								if(newVal>=1) divUpd.text(newVal);
							});
							</script>
						<!--quantity-->
				</table>
			</div>
			<div class="checkout-left">	
					
					<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
						<a href="mens.html"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
					</div>
					<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
						<h4>Shopping basket</h4>
						<ul>
							@if (!empty($products))
								@foreach ($products as $product)
									<li>{{ $product['item']->title ?? '' }} <i>-</i> <span>Rs.{{ $product['price'] ?? '' }}</span></li>
								@endforeach
							@endif
							<li>Total <i>-</i> <span>Rs.{{ Session()->has('cart') ? Session::get('cart')->totalPrice : '' }}</span></li>
						</ul>
					</div>
					<div class="clearfix"> </div>
				</div>
		</div>
	</div>	
	<!-- //check out -->

@endsection
