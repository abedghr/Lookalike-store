<?php $pageTitle = "Shop Page" ?>
@include('public_views.includes.public_header')

<!--================Home Banner Area =================-->
<section class="banner_area" style="top:-61px bac">
	<div class="banner_inner d-flex align-items-center" style="background-size:100% 100% !important;">
		<div class="overlay"></div>
		<div class="container">
			<div class="banner_content text-center">
				<h2>Shop Page</h2>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

	<!--================Category Product Area =================-->
	<section class="cat_product_area section_gap">
		<div class="container-fluid">
			<div class="row flex-row-reverse">
				<div class="col-lg-12">
					<div class="product_top_bar">
						<div class="left_dorp">
							<h3>All Products</h3>
							{{-- <select class="sorting">
								<option value="1">Default sorting</option>
								<option value="2">Default sorting 01</option>
								<option value="4">Default sorting 02</option>
							</select>
							<select class="show">
								<option value="1">Show 12</option>
								<option value="2">Show 14</option>
								<option value="4">Show 16</option>
							</select> --}}

						</div>
						<div class="right_page ml-auto">
							{{-- <nav class="cat_page" aria-label="Page navigation example">
								<ul class="pagination">
									<li class="page-item">
										<a class="page-link" href="#">
											<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
										</a>
									</li>
									<li class="page-item active">
										<a class="page-link" href="#">1</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">2</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">3</a>
									</li>
									<li class="page-item blank">
										<a class="page-link" href="#">...</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">6</a>
									</li>
									<li class="page-item">
										<a class="page-link" href="#">
											<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
										</a>
									</li>
								</ul>
							</nav> --}}
							{!! $products->links() !!}
						</div>
					</div>
					<div class="latest_product_inner row">
						
							@foreach ($products as $prod)
							<div class="col-lg-3 col-md-3 col-sm-6">
								<div class="f_p_item">
									<div class="f_p_img">
									<img class="img-fluid" src="../storage/Product_images/{{$prod->prod_image}}" alt="">
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
										<span class="text-success ">Available</span>	
									@else
										<span class="text-danger">Not Available</span>	
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
				</div>
				
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
	</section>
	<!--================End Category Product Area =================-->
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
	
	