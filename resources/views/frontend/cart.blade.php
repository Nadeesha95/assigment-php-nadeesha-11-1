@extends('partials.main')
@section('titel') {{'Cart'}} @endsection
@section('content')

<div class="page-wrapper">
			<div class="page-content">
				<!--start breadcrumb-->
				<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
							<h3 class="breadcrumb-title pe-3">Shop Cart</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="/home"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="/shop">Shop</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Shop Cart</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<!--end breadcrumb-->
				<!--start shop cart-->
				<section class="py-4">
					<div class="container">
						<div class="shop-cart">
							<div class="row">
								<div class="col-12 col-xl-8">
									<div class="shop-cart-list mb-3 p-3">

									@if(isset($cart_data))

@php $total="0" @endphp

@foreach ($cart_data as $data)
									<div class="row align-items-center g-3">
											<div class="col-12 col-lg-6">
												<div class="d-lg-flex align-items-center gap-2">
													<div class="cart-img text-center text-lg-start">
														<img src="{{asset('images/product/')}}/{{ $data->image }}" width="130" alt="">
													</div>
													<div class="cart-detail text-center text-lg-start">
														<h6 class="mb-2">{{ $data->product }}</h6>

														<!-- <p class="mb-2">Color: <span>White & Blue</span>
														</p> -->
														<h5 class="mb-0">RS .{{ $data->price }}</h5>
													</div>
												</div>
											</div>
											<div class="col-12 col-lg-3 cartpage">
											<input type="hidden" class="product_id" value="{{ $data->product_id }}" >
												<div class="cart-action text-center">
													<input type="number" class="form-control rounded-0 qty-input changeQuantity" value="{{ $data->quntity }}" min="1">
												</div>
											</div>
											<div class="col-12 col-lg-3">
												<div class="text-center">
													<div class="d-flex gap-2 justify-content-center justify-content-lg-end"> <a style="cursor: pointer;" data-id="{{ $data->id }}" class="btn btn-dark rounded-0 btn-ecomm delete_cart_data"><i class='bx bx-x-circle'></i> Remove</a>
														<a style="cursor: pointer;" data-id="{{ $data->id }}" class="btn btn-light rounded-0 btn-ecomm addtowishlist"><i class='bx bx-heart me-0'></i></a>
													</div>
												</div>
											</div>
										</div>
										<div class="my-4 border-top"></div>
										@php $total = $total + ($data->quntity * $data->price) @endphp
                                @endforeach

                                @else
                    <div class="row">
                        <div class="col-md-12 mycard py-5 text-center">
                            <div class="mycards">
                                <h4>Your cart is currently empty.</h4>
                                <a href="/" class="btn btn-upper btn-primary outer-left-xs mt-5">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                @endif


										<div class="my-4 border-top"></div>
										<div class="d-lg-flex align-items-center gap-2">	<a href="/shop" class="btn btn-dark btn-ecomm"><i class='bx bx-shopping-bag'></i> Continue Shoping</a>
											<!-- <a href="javascript:;" class="btn btn-light btn-ecomm ms-auto"><i class='bx bx-x-circle'></i> Clear Cart</a> -->
											<!-- <a href="javascript:;" class="btn btn-white btn-ecomm"><i class='bx bx-refresh'></i> Update Cart</a> -->
										</div>
									</div>
								</div>
								<div class="col-12 col-xl-4">
									<div class="checkout-form p-3 bg-light">
										<div class="card rounded-0 border bg-transparent shadow-none">
											<div class="card-body">
												<p class="fs-5">Apply Discount Code</p>
												<form   method="post" action="/apply-coupon">
					                           @csrf
												<div class="input-group">

													<input type="text" required name="coupon" class="form-control rounded-0" placeholder="Enter discount code">
													<button class="btn btn-dark btn-ecomm" type="submit">Apply Discount</button>

												</div>
												</form>
											</div>
										</div>
										<div class="card rounded-0 border bg-transparent shadow-none">

										</div>
										<div class="card rounded-0 border bg-transparent mb-0 shadow-none">
											<div class="card-body">
												<p class="mb-2">Subtotal: <span class="float-end">$ {{ number_format($total, 2) }}</span>
												</p>
												<p class="mb-2">Shipping: <span class="float-end">--</span>
												</p>
												<p class="mb-2">Taxes: <span class="float-end">--</span>
												</p>
												<p class="mb-0">Discount: <span class="float-end">--</span>
												</p>
												<div class="my-3 border-top"></div>
												<h5 class="mb-0">Order Total: <span class="float-end">$ {{ number_format($total, 2) }}</span></h5>
												<div class="my-4"></div>
												<div class="d-grid">
												@if($total >0)
													<a href="/checkout" class="btn btn-dark btn-ecomm">Proceed to Checkout</a>
													@else
													<a href="/shop" class="btn btn-dark btn-ecomm">Continue Shopping</a>

													@endif
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--end row-->
						</div>
					</div>
				</section>
				<!--end shop cart-->
			</div>
		</div>
<!-- #shopcart end -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script>

$( document ).ready(function() {
$('.home').addClass('current-menu-item');



});



$(document).ready(function () {

$('.delete_cart_data').click(function (e) {
	e.preventDefault();

	var product_id = $(this).attr("data-id");
	$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


	// $(this).closest(".cartpage").remove();

	$.ajax({
		url: '/delete-from-user-cart',
		type: 'POST',
		data: {
                'product_id': product_id,
                },
		success: function (response) {
			window.location.reload();
		}
	});
});


$('.increment-btn').click(function (e) {

            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });


		$(document).ready(function () {

$('.changeQuantity').click(function (e) {
	e.preventDefault();

	var quantity = $(this).closest(".cartpage").find('.qty-input').val();
	var product_id = $(this).closest(".cartpage").find('.product_id').val();

	var data = {
		'_token': $('input[name=_token]').val(),
		'quantity':quantity,
		'product_id':product_id,
	};

	$.ajax({
		url: '/update-to-user-cart',
		type: 'POST',
		data: data,
		success: function (response) {
			window.location.reload();
			alertify.set('notifier','position','top-right');
			alertify.success(response.status);
		}
	});
});

});





});


</script>

    @endsection
