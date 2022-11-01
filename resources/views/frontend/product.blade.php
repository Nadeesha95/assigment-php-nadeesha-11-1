@extends('frontend.partials.main')
@section('titel') {{$data->title}} @endsection
@section('content')


<div class="page-wrapper">
			<div class="page-content">
				<!--start breadcrumb-->
				<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
							<h3 class="breadcrumb-title pe-3">{{$data->title}}</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="/shop">Shop</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">{{$data->title}}</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<!--end breadcrumb-->
				<!--start product detail-->
				<section class="py-4">
					<div class="container">
						<div class="product-detail-card">
							<div class="product-detail-body">
								<div class="row g-0">
									<div class="col-12 col-lg-5">
										<div class="image-zoom-section">
											<div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">

                                   
                                            <div class="item">
													<img src="{{asset('images/product/')}}/{{$data->files}}" class="img-fluid" alt="">
												</div>
			                            
											</div>
											<div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">

                                      
											</div>
										</div>
									</div>
									<div class="col-12 col-lg-7">
										<div class="product-info-section p-3">
											<h3 class="mt-3 mt-lg-0 mb-0">{{$data->title}}</h3>
											<div class="product-rating d-flex align-items-center mt-2">
												<div class="rates cursor-pointer font-13">
												<?php
												    for ($x = 0; $x <= $data->rate -1; $x++) {?>
                                                      <i class="bx bxs-star text-warning"></i>

                                                       <?php } ?>

												</div>
												<div class="ms-1">
													<p class="mb-0">{{$data->rate}} Ratings</p>
												</div>
											</div>
											<div class="d-flex align-items-center mt-3 gap-2">
												<!-- <h5 class="mb-0 text-decoration-line-through text-light-3">$98.00</h5> -->
												<h4 class="mb-0">Rs. {{ number_format($data->price, 2) }}</h4>
											</div>
											<div class="mt-3">
												<h6> Description :</h6>
												<p class="mb-0">{!!$data->des!!}</p>
											</div>
											<!-- <dl class="row mt-3">	<dt class="col-sm-3">Product id</dt>
												<dd class="col-sm-9">#BHU5879</dd>	<dt class="col-sm-3">Delivery</dt>
												<dd class="col-sm-9">Russia, USA, and Europe</dd>
											</dl> -->
											<div class="row row-cols-auto align-items-center mt-3">
												<div class="col-4">
													<label class="form-label">Quantity</label>
													<select  id="modalqun" class="form-select form-select-sm modalqun">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
												</div>
												<!-- <div class="col">
													<label class="form-label">Size</label>
													<select class="form-select form-select-sm">
														<option>S</option>
														<option>M</option>
														<option>L</option>
														<option>XS</option>
														<option>XL</option>
													</select>
												</div> -->
												<!--<div class="col">-->
												<!--	<label class="form-label">Colors</label>-->
												<!--	<div class="color-indigators d-flex align-items-center gap-2">-->
												<!--		<div class="color-indigator-item bg-primary"></div>-->
												<!--		<div class="color-indigator-item bg-danger"></div>-->
												<!--		<div class="color-indigator-item bg-success"></div>-->
												<!--		<div class="color-indigator-item bg-warning"></div>-->
												<!--	</div>-->
												<!--</div>-->
											</div>
											<!--end row-->
											<div class="d-flex gap-2 mt-3">
												<a data-id="{{$data->id}}" style="cursor: pointer;"  class="btn btn-white btn-ecomm modaladd-to-cart-btn">	<i class="bx bxs-cart-add"></i>Add to Cart</a> <a data-id="{{$data->id}}" style="cursor: pointer;" class="btn btn-light btn-ecomm addtowishlist"><i class="bx bx-heart"></i>Add to Wishlist</a>
											</div>
											<hr/>
											<div class="product-sharing">
												<ul class="list-inline">
													<li class="list-inline-item"> <a href="javascript:;"><i class='bx bxl-facebook'></i></a>
													</li>
													<li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-linkedin'></i></a>
													</li>
													<li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-twitter'></i></a>
													</li>
													<li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-instagram'></i></a>
													</li>
													<li class="list-inline-item">	<a href="javascript:;"><i class='bx bxl-google'></i></a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<!--end row-->
							</div>
						</div>
					</div>
				</section>
				<!--end product detail-->
				<!--start product more info-->
				<section class="py-4">
					<div class="container">
						<div class="product-more-info">
							<ul class="nav nav-tabs mb-0" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" data-bs-toggle="tab" href="#discription" role="tab" aria-selected="true">
										<div class="d-flex align-items-center">
											<div class="tab-title text-uppercase fw-500">Description</div>
										</div>
									</a>
								</li>


								<li class="nav-item" role="presentation">
									<a class="nav-link" data-bs-toggle="tab" href="#reviews" role="tab" aria-selected="false">
										<div class="d-flex align-items-center">
											<div class="tab-title text-uppercase fw-500">0 Reviews</div>
										</div>
									</a>
								</li>
							</ul>
							<div class="tab-content pt-3">
								<div class="tab-pane fade show active" id="discription" role="tabpanel">

                                {!!$data->des!!}
								</div>
								<div class="tab-pane fade" id="more-info" role="tabpanel">
									<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
								</div>
								<div class="tab-pane fade" id="tags" role="tabpanel">
									<div class="tags-box w-50">	<a href="javascript:;" class="tag-link">Cloths</a>
										<a href="javascript:;" class="tag-link">Electronis</a>
										<a href="javascript:;" class="tag-link">Furniture</a>
										<a href="javascript:;" class="tag-link">Sports</a>
										<a href="javascript:;" class="tag-link">Men Wear</a>
										<a href="javascript:;" class="tag-link">Women Wear</a>
										<a href="javascript:;" class="tag-link">Laptops</a>
										<a href="javascript:;" class="tag-link">Formal Shirts</a>
										<a href="javascript:;" class="tag-link">Topwear</a>
										<a href="javascript:;" class="tag-link">Headphones</a>
										<a href="javascript:;" class="tag-link">Bottom Wear</a>
										<a href="javascript:;" class="tag-link">Bags</a>
										<a href="javascript:;" class="tag-link">Sofa</a>
										<a href="javascript:;" class="tag-link">Shoes</a>
									</div>
								</div>
							
							</div>
						</div>
					</div>
				</section>
				<!--end product more info-->
				<!--start similar products-->
				<section class="py-4">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">Similar Products</h5>
							<div class="d-flex align-items-center gap-0 ms-auto">	<a href="javascript:;" class="owl_prev_item fs-2"><i class='bx bx-chevron-left'></i></a>
								<a href="javascript:;" class="owl_next_item fs-2"><i class='bx bx-chevron-right'></i></a>
							</div>
						</div>
						<hr/>
						
					</div>
				</section>
				<!--end similar products-->
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

		<script>

$( ".modalqun" ).change(function() {

$stock = {{$data->stock}}
$qn = $('#modalqun').find(":selected").text();

if($stock < $qn){
	alert('Sorry Stock limit Exceed');

	$('#modalqun').find(":selected").text(1);


}


});


			</script>

        <script src="{{asset('assets/plugins/OwlCarousel/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js')}}"></script>

    @endsection
