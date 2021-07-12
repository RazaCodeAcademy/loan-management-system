<!-- <div class="coupons">
	<div class="container">
		<div class="text-center coupons-grids">
			<div class="col-md-3 coupons-gd">
				<h3>Buy your product in a simple way</h3>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<h4>LOGIN TO YOUR ACCOUNT</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				<h4>SELECT YOUR ITEM</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
				<h4>MAKE PAYMENT</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div> -->

<!-- login -->
	<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-info">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<div class="modal-body modal-spa">
					<div class="login-grids">
						<div class="login">
							<div class="login-bottom">
								<h3>Sign up for free</h3>
								<form >
									<div class="sign-up">
										<h4>Email :</h4>
										<input type="text" name="email" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
									</div>
									<div class="sign-up">
										<h4>Password :</h4>
										<input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
										
									</div>
									<div class="sign-up">
										<h4>Re-type Password :</h4>
										<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
										
									</div>
									<div class="sign-up">
										<input type="submit" value="REGISTER NOW" >
									</div>
									
								</form>
							</div>
							<div class="login-right">
								<h3>Sign in with your account</h3>
								<form action="{{ route('loginCheck') }}" method="POST">
									<div class="sign-in">
										<h4>Email :</h4>
										<input type="text" name="email" value="Type here" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Type here';}" required="">	
									</div>
									<div class="sign-in">
										<h4>Password :</h4>
										<input type="password" name="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
										<a href="#">Forgot password?</a>
									</div>
									<div class="single-bottom">
										<input type="checkbox"  id="brand" value="">
										<label for="brand"><span></span>Remember Me.</label>
									</div>
									<div class="sign-in">
										<input type="submit" value="SIGNIN" >
									</div>
								</form>
							</div>
							<div class="clearfix"></div>
						</div>
						<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //login -->

<!-- footer -->
<div class="footer">
	<div class="container">
		<div class="col-md-3 footer-left">
			<!-- <h2>
			  <a href="index.html">
				<img src="{{ $companyInfo->logo ? asset($companyInfo->logo) : asset('/public/assets/images/logo3.jpg') }}" alt="{{ $companyInfo->name }} " />
			  </a>
			</h2> -->
			<a href="http://localhost/loan-management-system" style="color: #191919; display:inline-block; padding:23px 0;">
					<h3 >Smart Shop</h3>
			</a>
			<p>{{ $companyInfo->description }}</p>
		</div>
		<div class="col-md-9 footer-right">
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h4>Information</h4>
					<ul>
						<li><a href="{{ route('home') }}">Home</a></li>
						@if(!empty($pages))
							@foreach ($pages as $page)
								<li><a href="{{ route('pages', $page->slug) }}">{{ $page->title }}</a></li>
							@endforeach
						@endif
						<li><a href="{{ route('contact') }}">Contact Us</a></li>
						<li><a href="{{ route('shop') }}">Shop</a></li>
					</ul>
				</div>
				
				<div class="col-md-4 sign-gd-two">
					<h4>Store Information</h4>
					<ul>
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Address : {{ $companyInfo->address }}</li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email : <a href="mailto:{{ $companyInfo->email }}">{{ $companyInfo->email }}</a></li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone : {{ $companyInfo->contact1 }}</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
		<p class="copy-right">&copy {{ date('Y') }} {{ $companyInfo->name }}. All rights reserved | Design by <a href="http://sjsolutionz.com/">SJ Solutions</a></p>
	</div>
</div>
<!-- //footer -->