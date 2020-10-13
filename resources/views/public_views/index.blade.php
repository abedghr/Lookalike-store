<?php $pageTitle = 'home' ?>
@include('public_views.includes.public_header')

	<!--================Home Banner Area =================-->
	<section class="banner_area" style="top:-61px bac">
		<div class="banner_inner d-flex align-items-center" style="background-size:100% 100% !important;">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Welcome To Look-Alike Store</h2>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Hot Deals Area =================-->
    
    
    <section class="hot_deals_area section_gap">
		<div class="container-fluid">
			<div class="row">
                
                @foreach ($categories as $cat)
               
                        <div class="col-lg-6 mb-5">
                            <a href="{{route('categories.show',['id'=>$cat->id])}}"> 
                                <div class="hot_deal_box" style="height: 300px;">
                                    <img class="img-fluid" src="../storage/Category_images/{{$cat->cat_image}}" style="width:100%; height:300px !important;" alt="">
                                    <div class="content">
                                        <h2><strong>{{$cat->cat_name}}</strong></h2>
                                        <p>shop now</p>
                                    </div>
                                </div>
                            </a>
                    </div>
                
                @endforeach
			</div>
		</div>
	</section>
    
    <!--================End Hot Deals Area =================-->

{{-- 	<!--================Clients Logo Area =================-->
	<section class="clients_logo_area">
		<div class="container-fluid">
			<div class="clients_slider owl-carousel">
				<div class="item">
					<img src="{{asset('public_libraries/img/clients-logo/c-logo-1.png')}}" alt="">
				</div>
				<div class="item">
					<img src="{{asset('public_libraries/img/clients-logo/c-logo-2.png')}}" alt="">
				</div>
				<div class="item">
					<img src="{{asset('public_libraries/img/clients-logo/c-logo-3.png')}}" alt="">
				</div>
				<div class="item">
					<img src="{{asset('public_libraries/img/clients-logo/c-logo-4.png')}}" alt="">
				</div>
				<div class="item">
					<img src="{{asset('public_libraries/img/clients-logo/c-logo-5.png')}}" alt="">
				</div>
			</div>
		</div>
	</section>
	<!--================End Clients Logo Area =================-->
 --}}
	<!--================Feature Product Area =================-->
	<section class="feature_product_area section_gap">
		<div class="main_box">
			<div class="container-fluid">
				<div class="row">
					<div class="main_title">
						<h2>Featured Products</h2>
						<p>Who are in extremely love with eco friendly system.</p>
					</div>
				</div>
				<div class="row">
					@foreach ($products as $prod)
                <div class="col-sm-3">
						<div class="f_p_item">
							<div class="f_p_img">
                            <img class="" src="../storage/Product_images/{{$prod->prod_image}}" width="250" height="280" alt="">
								<div class="p_icon">
									<a href="{{route('products.show',['id'=>$prod->id])}}">
										<i class="lnr lnr-eye"></i>
									</a>
									@if ($prod->availability == 1)
									<a class="js-addcart-detail" style="cursor: pointer" onclick="addca({{$prod->id}})">
										<i class="lnr lnr-cart"></i>
									</a>
                                    @endif
									
								</div>
							</div>
							<a href="{{route('products.show',['id'=>$prod->id])}}">
								<h4 class="js-name-detail">{{$prod->prod_name}}</h4>
							</a>
							@if ($prod->availability == 1)
								<span class="text-success">Available</span>
							@else
								<span class="text-danger">Un-available</span>
							@endif
							<br>
                            <strong>
                                <span><del class="text-danger">JD{{number_format($prod->prod_old_price, 2)}}</del></span>
                                <h4 style="display: inline" class="ml-5">JD{{number_format($prod->prod_new_price, 2)}}</h4>
                            </strong>
                        </div>
					</div>
                    @endforeach
					
				</div>

				{{-- <div class="row">
					<nav class="cat_page mx-auto" aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#">
									<i class="fa fa-chevron-left" aria-hidden="true"></i>
								</a>
							</li>
							<li class="page-item active">
								<a class="page-link" href="#">01</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">02</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">03</a>
							</li>
							<li class="page-item blank">
								<a class="page-link" href="#">...</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">09</a>
							</li>
							<li class="page-item">
								<a class="page-link" href="#">
									<i class="fa fa-chevron-right" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</nav>
				</div> --}}
			</div>
		</div>
	</section>
	<!--================End Feature Product Area =================-->


	@include('public_views.includes.public_footer')
	<script>
		function addca(id){
					$.ajax({
						type: "post",
						url : "{{route('addtocart')}}",
						data: {
							'_token' : "{{csrf_token()}}",
							'product_id': id,
							'quantity': 1
						},
						success:function(data){
							console.log(data);
							$('#cart_count').html(data.counter);
							
						}
					
					});
		}
	</script>