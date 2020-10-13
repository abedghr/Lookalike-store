<?php $pageTitle = "Cart Shopping" ?>
@include('public_views.includes.public_header')

<!--================Home Banner Area =================-->
<section class="banner_area" style="top:-61px bac">
	<div class="banner_inner d-flex align-items-center mt-5" style="background-image:url('../../storage/cart.png'); background-size:100% 100% !important; margin-top: 120px !important;">
		<div class="overlay"></div>
		<div class="container">
			<div class="banner_content">
				<h2>Shopping Cart</h2>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

	<!--================Cart Area =================-->
	<section class="cart_area">
		<div class="container">
			<div class="cart_inner">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
								<th scope="col">Remove</th>
							</tr>
						</thead>
						<tbody>
                            <?php $total = 0 ;?>
                            @foreach ($cart as $cart)
							
							<tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="storage/Product_images/{{$cart['image']}}" width="80" height="80" alt="">
                                            </div>
                                            <div class="media-body">
												<a href="{{route('products.show',['id'=>$cart['id']])}}">
												<p>{{$cart['title']}}</p>
												</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>JD{{$cart['unit_price']}}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <h5>X{{$cart['quantity']}}</h5>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>JD{{$cart['unit_price']*$cart['quantity']}}</h5>
									</td>
									<td>
										<a href="{{route('cart.remove',['id'=>$cart['id']])}}" onclick="return confirm('Are you sure?')"><i class="btn btn-danger rounded-circle fa fa-remove"></i></a>
									</td>
                                </tr>
                                <?php $total += $cart['unit_price']*$cart['quantity']; ?>
                            @endforeach
							
							<tr class="bottom_button">
								<td>
									<div class="checkout_btn_inner">
										<a class="btn btn-secondary p-2" href="{{route('products.all')}}">Continue Shopping</a>
										<a class="main_btn" href="{{route('checkout')}}">Proceed to checkout</a>
									</div>
								</td>
								<td>

								</td>
								
								<td>
                                    <h5><strong>SubTotal:</strong></h5>
								</td>
								<td>
									<h5><strong>JD{{$total}}</strong></h5>
								</td>
								<td></td>
							</tr>
						</tbody>
					</table>
                </div>
                
			</div>
		</div>
	</section>
	<!--================End Cart Area =================-->
@include('public_views.includes.public_footer')