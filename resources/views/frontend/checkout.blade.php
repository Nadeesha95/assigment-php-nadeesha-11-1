@extends('frontend.partials.main')
@section('titel') {{'Checkout Page'}} @endsection
@section('content')

			<!-- hero area start -->
            <div class="page-wrapper">
			<div class="page-content">
				<!--start breadcrumb-->
				<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
							<h3 class="breadcrumb-title pe-3">Checkout</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="javascript:;">Shop</a>
										</li>
										<li class="breadcrumb-item active" aria-current="page">Checkout</li>
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
									<div class="checkout-details">
										<div class="card bg-transparent rounded-0 shadow-none">
											<div class="card-body">
												<div class="steps steps-light">
													<a class="step-item active" href="/cart">
														<div class="step-progress"><span class="step-count">1</span>
														</div>
														<div class="step-label"><i class='bx bx-cart'></i>Cart</div>
													</a>
													<a class="step-item active current" href="/checkout">
														<div class="step-progress"><span class="step-count">2</span>
														</div>
														<div class="step-label"><i class='bx bx-user-circle'></i>Payment</div>
													</a>

												</div>
											</div>
										</div>
										<div class="card rounded-0">
											<div class="card-body">

												<div class="border p-3">
													<h2 class="h5 mb-0">Shipping Address</h2>
													<div class="my-3 border-bottom"></div>
													<div class="form-body">

                                                        <form id="submitform" class="row g-3" method="post" action="/submit-checkout">
                                                         @csrf


														 @auth

														 <div class="col-md-6">
																<label class="form-label">First Name</label>
																<input type="text" value="{{ Auth::user()->name}}" name="firstname" id="firstname" class="form-control rounded-0">
															</div>
															<div class="col-md-6">
																<label class="form-label">Last Name</label>
																<input type="text" value="{{ Auth::user()->last_name}}" name="lastname" id="lastname" class="form-control rounded-0">
															</div>
															<div class="col-md-6">
																<label class="form-label">E-mail </label>
																<input type="text" value="{{ Auth::user()->email}}" name="email" id="email" class="form-control rounded-0">
															</div>
															<div class="col-md-6">
																<label class="form-label">Phone Number</label>
																<input type="text" value="{{ Auth::user()->phone}}" name="phone"  id="phone" class="form-control rounded-0">
															</div>


															<div class="col-md-6">
																<label class="form-label">Zip/Postal Code</label>
																<input type="text" value="{{ Auth::user()->postal}}" name="postal" id="postal" class="form-control rounded-0">
															</div>
															<div class="col-md-6">
																<label class="form-label">Country</label>
																<select name="country" class="form-select rounded-0">
                                                                <option value="sri lanka" data-display="Sri Lanka">Sri Lanka</option>
                                                <option value="uk">London</option>
                                                <option value="rou">Romania</option>
                                                <option value="fr">French</option>
                                                <option value="de">Germany</option>
                                                <option value="aus">Australia</option>
																</select>
															</div>
															<div class="col-md-6">
																<label class="form-label">Address 1</label>
																<textarea name="adress1"  name="adress2" class="form-control rounded-0">{{ Auth::user()->adress1}}</textarea>
															</div>
															<div class="col-md-6">
																<label class="form-label">Address 2</label>
																<textarea name="adress2"   id="adress2" class="form-control rounded-0">{{ Auth::user()->adress2}}</textarea>
															</div>







														 @else


															<div class="col-md-6">
																<label class="form-label">First Name</label>
																<input type="text" name="firstname" id="firstname" class="form-control rounded-0">
															</div>
															<div class="col-md-6">
																<label class="form-label">Last Name</label>
																<input type="text" name="lastname" id="lastname" class="form-control rounded-0">
															</div>
															<div class="col-md-6">
																<label class="form-label">E-mail </label>
																<input type="text" name="email" id="email" class="form-control rounded-0">
															</div>
															<div class="col-md-6">
																<label class="form-label">Phone Number</label>
																<input type="text" name="phone"  id="phone" class="form-control rounded-0">
															</div>


															<div class="col-md-6">
																<label class="form-label">Zip/Postal Code</label>
																<input type="text" name="postal" id="postal" class="form-control rounded-0">
															</div>
															<div class="col-md-6">
																<label class="form-label">Country</label>
																<select name="country" class="form-select rounded-0">
                                                                <option value="sri lanka" data-display="Sri Lanka">Sri Lanka</option>
                                                <option value="uk">London</option>
                                                <option value="rou">Romania</option>
                                                <option value="fr">French</option>
                                                <option value="de">Germany</option>
                                                <option value="aus">Australia</option>
																</select>
															</div>
															<div class="col-md-6">
																<label class="form-label">Address 1</label>
																<textarea name="adress1" name="adress2" class="form-control rounded-0"></textarea>
															</div>
															<div class="col-md-6">
																<label class="form-label">Address 2</label>
																<textarea name="adress2" id="adress2" class="form-control rounded-0"></textarea>
															</div>

															@endauth
                        <input type="hidden" value="card" class="form-control"  name="payment_type" id="payment_type" required>
                        <!-- <input type="hidden" class="form-control"  name="sippingcosts" id="sippingcosts" required> -->


						                     
</br>
                                                        <div id="warningid">

														 </div>


																</div> 







															<div class="col-md-12">
																<h6 class="mb-0 h5">Payment Methods</h6>
																<div class="my-3 border-bottom"></div>
																<div class="form-check">
                                                                <input name="payment_method" type="radio"  value="cod" id="methodcod" > <label for="methodcod"> Cash On Delivery</label><br>

																</div>
                                                                <div class="form-check">
                                                                <input  name="payment_method" checked=""  id="methodcard" type="radio" value="paypal"> <label for="methodcard"> Card Payment</label>
																</div>
															</div>
															<div class="col-md-6">
																<div class="d-grid">	<a href="/cart" class="btn btn-light btn-ecomm"><i class='bx bx-chevron-left'></i>Back to Cart</a>
																</div>
															</div>
															<div class="col-md-6">
																<div class="d-grid">

                                                                @if($total >0)
                                                                <a id="btnsubmit"  class="btn btn-dark btn-ecomm">Proceed to Checkout<i class='bx bx-chevron-right'></i></a>
																@endif
                                                            </div>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								
								
								<div class="col-12 col-xl-4">
									<div class="order-summary">
										<div class="card rounded-0">
											<div class="card-body">
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
													<div class="card-body">
														<p class="fs-5">Order summary</p>
														<div class="my-3 border-top"></div>

                                                        @foreach($cart as $cart_datas)
                                                        <div class="d-flex align-items-center">
															<a class="d-block flex-shrink-0" href="javascript:;">
																<img src="{{asset('images/product/')}}/{{$cart_datas->image}}" width="75" alt="Product">
															</a>
															<div class="ps-2">
																<h6 class="mb-1"><a href="javascript:;" class="text-dark">{{$cart_datas->product}} </a></h6>
																<div class="widget-product-meta"><span class="me-2">$ {{$cart_datas->price}}</span><span class="">x  {{$cart_datas->quntity}}</span>
																</div>
															</div>
														</div>
														<div class="my-3 border-top"></div>
                                                        @endforeach
													</div>
												</div>
												<div class="card rounded-0 border bg-transparent mb-0 shadow-none">
													<div class="card-body">
														<p class="mb-2">Subtotal: <span class="float-end">${{number_format($total)}}</span>
														</p>
												
														</p>
														<p class="mb-2">Taxes: <span class="float-end">--</span>
														</p>
														<p class="mb-0">Discount: <span class="float-end">--</span>
														</p>
														<div class="my-3 border-top"></div>
														 @if($total >0)
														<h5 class="mb-0">Order Total: <span class="float-end"  id="ttlprice"></span></h5>
														@endif
													</div>
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
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

$( document ).ready(function() {









$( "#btnsubmit" ).click(function() {

	var firstname = $( "#firstname" ).val();
	var lastname = $( "#lastname" ).val();
	var email = $( "#email" ).val();
	var phone = $( "#phone" ).val();
	var country = $( "#postal" ).val();
	var adress1 = $( "#adress1" ).val();
	var adress2 = $( "#adress2" ).val();



if(firstname=='' || lastname=='' || email=='' || phone=='' || country=='' || adress1=='' ||adress2=='' ){

	Swal.fire({
  position: 'top-end',
  icon: 'warning',
  title: 'warning',
  text: 'Please fill the required fields',
  showConfirmButton: false,
  timer: 1500
})


}else{
    $( "#submitform" ).submit();
}


});


</script>










    @endsection
