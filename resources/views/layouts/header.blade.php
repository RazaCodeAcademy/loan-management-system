@php
	$title = app()->view->getSections()['title'];
@endphp

{{-- Floating WhatsApp --}}
<a href="{{ route('chat', $companyInfo->contact1) }}" style="position: fixed; bottom: 50px; right:50px; z-index: 100; display: inline-block;padding: 10px; border-radius: 50%; background: #f6f6f6;  box-shadow: 0 0 8px rgb(0,0,0,0.2);">
	<i class="la la-whatsapp text-success la-4x " style="font-size: 50px"></i>
</a>

<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1><a href="{{ route('home') }}"><img src="{{ !empty($companyInfo->logo) ? asset($companyInfo->logo) : asset('/public/assets/images/logo3.jpg') }}"></a></h1>
		</div>
		{{-- <div class="col-md-6 header-middle">
			<form>
				<div class="search">
					<input type="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
				</div>
				<div class="sear-sub">
					<input type="submit" value=" ">
				</div>
				<div class="clearfix"></div>
			</form>
		</div> --}}
		<div class="col header-right footer-bottom">
			<ul>
				<li style="position: relative;"><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a></li>
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->

<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav menu__list">
					<li class="menu__item {{ $title == 'Home' ? 'active menu__item--current' : '' }}"><a class="menu__link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a></li>
					@if(!empty($pages))
						@foreach ($pages as $page)
							<li class=" menu__item {{ $title == $page->title ? 'active menu__item--current' : '' }}"><a class="menu__link" href="{{ route('pages', $page->slug) }}">{{ $page->title }}</a></li>
						@endforeach
					@endif
					<li class=" menu__item {{ $title == 'Contact Us' ? 'active menu__item--current' : '' }}"><a class="menu__link" href="{{ route('contact') }}">contact Us</a></li>
					<li class=" menu__item {{ $title == 'Shop' ? 'active menu__item--current' : '' }}"><a class="menu__link" href="{{ route('shop') }}">Shop</a></li>
				</ul>
				</div>
			</div>
			</nav>	
		</div>
		@if ($title == 'Shop')
			<div class="top_nav_right">
				<div class="cart box_1">
					<a href="{{ route('shop.cart') }}">
						<h3> <div class="total">
							<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
							<span class="">Rs.{{ Session()->has('cart') ? Session::get('cart')->totalPrice : '' }}</span> (<span class="">{{ Session()->has('cart') ? Session::get('cart')->totalQty : '' }}</span> items)</div>
						</h3>
					</a>
					<p><a href="{{ route('shop.emptyCart') }}" class="simpleCart_empty">Empty Cart</a></p>
				</div>	
			</div>
		@endif
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->