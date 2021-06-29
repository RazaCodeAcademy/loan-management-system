@extends('layouts.master')

@section('title', 'Checkout')

@section('content')

	<!-- banner -->
	<div class="page-head">
		<div class="container">
			<h3>@yield('title')</h3>
		</div>
	</div>
	<!-- //banner -->

    <!-- checkout -->
    <div class="contact">
        <div class="container">
            <div class="contact-grids">
                <h3 class="tittle">Checkout</h3>
                <form action="{{ route('shop.order.store') }}" method="POST">
                    <div class="contact-form2">
                        <div>
                            <input type="text" name="name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                            <input type="email" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                        </div>
                        <div style="margin-top:15px">
                            <input type="text" name="country" value="Country" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Country';}" required="">
                            <input type="text" name="streetAddress" value="Street Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Street Address';}" required="" style="margin-left: 1.5%">
                        </div>
                        <div style="margin-top:15px">
                            <input type="text" name="city" value="Town/City" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Town/City';}" required="">
                            <input type="text" name="postcode" value="Postcode/Zip" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Postcode/Zip';}" required="" style="margin-left: 1.5%">
                        </div>
                        <div style="margin-top:15px; margin-bottom:15px;">
                            <input type="text" name="phone" value="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}" required="">
                        </div>
                        <input type="submit" value="Submit" >
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- //checkout -->
{{ $grandTotal }}

@endsection

