<?php $pageTitle = "Checkout" ?>
@include('public_views.includes.public_header')
<!--================Home Banner Area =================-->
	<section class="banner_area" style="top:-61px bac">
		<div class="banner_inner d-flex align-items-center mt-5" style="background-image:url('../../storage/checkout.jpg'); background-size:100% 100% !important; margin-top: 120px !important;">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Checkout</h2>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Checkout Area =================-->
	<section class="checkout_area section_gap">
		<div class="container">
			
			<div class="billing_details">
				<div class="row">
					<div class="col-lg-8">
						<h3>Billing Details</h3>
						<form class="row contact_form" action="{{route('orders.create')}}" method="post" novalidate="novalidate">
							@csrf
							<div class="col-md-6 form-group">
								<label for="">First Name <span class="text-danger">*</span> :</label>
								<input type="text" class="form-control" id="first" name="fname" placeholder="First Name">
								@error('fname')
									<span class="text-danger">{{$message}}</span>
								@enderror
							</div>
							<div class="col-md-6 form-group">
								<label for="">Last Name <span class="text-danger">*</span> :</label>
								<input type="text" class="form-control" id="last" name="lname" placeholder="Last Name">
								@error('lname')
									<span class="text-danger">{{$message}}</span>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<label for="">Email Address :</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
							</div>
							<div class="col-md-6 form-group">
								<label for="">Phone Number <span class="text-danger">*</span> :</label>
								<input type="text" class="form-control" id="number" name="number" placeholder="Phone number">
								@error('number')
								<span class="text-danger">{{$message}}</span>
								@enderror
							</div>
							<div class="col-md-6 form-group">
								<label for="">City Location <span class="text-danger">*</span> :</label>
								<select class="country_select target" onchange="changeCity()" id="city" name="city">
									<option></option>
									@foreach ($cities as $city)
										<option value="{{$city->delivery_price}}">{{$city->city}}</option>
									@endforeach
								</select>
								@error('city')
								<span class="text-danger">{{$message}}</span>
								@enderror
							</div>
							
							<div class="col-md-12 form-group">
								<label for="">Address Line <span class="text-danger">*</span> :</label>
								<input type="text" class="form-control" id="address" name="address" placeholder="Address">
								@error('address')
								<span class="text-danger">{{$message}}</span>
								@enderror
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<h3>Shipping Details</h3>
								</div>
								<textarea class="form-control" name="notes" id="notes" rows="1" placeholder="Order Notes"></textarea>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" class="main_btn btn-block p-3">CheckOut</button>
							</div>
						</form>
					</div>
					<div class="col-lg-4 mt-5">
						<div class="order_box">
							<h2>Your Order</h2>
							<ul class="list">
								<li>
									<a href="#">Product
										<span>Total</span>
									</a>
                                </li>
                                <?php $total = 0; ?>
                                @foreach ($cart as $cart)
                                <li>
									<a>{{$cart['title']}}
										<strong> X{{$cart['quantity']}}</strong>
										<span class="last">JD{{$cart['unit_price']*$cart['quantity']}}</span>
									</a>
                                </li>    
                                <?php $total+= $cart['unit_price']*$cart['quantity']; ?>
                                @endforeach
                                
								
								<li>
									<a href="#">Total
										<span>JD<span id="totalPrice" data="{{$total}}">{{$total}}</span></span>
									</a>
								</li>
							</ul>
							{{-- <div class="payment_item">
								<div class="radion_btn">
									<input type="radio" id="f-option5" name="selector">
									<label for="f-option5">Check payments</label>
									<div class="check"></div>
								</div>
								<p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
							</div>
							<div class="payment_item active">
								<div class="radion_btn">
									<input type="radio" id="f-option6" name="selector">
									<label for="f-option6">Paypal </label>
									<img src="{{asset('public_libraries/img/product/single-product/card.jpg')}}" alt="">
									<div class="check"></div>
								</div>
								<p>Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
							</div>
							<div class="creat_account">
								<input type="checkbox" id="f-option4" name="selector">
								<label for="f-option4">I’ve read and accept the </label>
								<a href="#">terms & conditions*</a>
							</div> 
							<a class="main_btn mt-5" href="#">Proceed to Paypal</a>--}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Checkout Area =================-->
	@include('public_views.includes.public_footer')
	
	<script>
			
		function changeCity(){
			var city = $('#city').val();
			if(city == ""){
				city = 0;
			}
			var total =  $('#totalPrice').attr('data');
			var totalWithDel = parseFloat(city) + parseFloat(total);
			$("#totalPrice").text(totalWithDel);
		}
	</script>