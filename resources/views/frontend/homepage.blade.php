@extends('frontend.partials.main')
@section('titel') {{'Home Page'}} @endsection
@section('content')
<style>
    @media screen and (max-width: 1280px){
.page-wrapper {
    margin-top: 0px !important; 
}
}
</style>

		<!--end slider section-->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--start information-->
				<section class="py-3 border-top border-bottom">
					<div class="container">
						<div class="row row-cols-1 row-cols-lg-3 row-group align-items-center">
							<div class="col">
								<div class="d-flex align-items-center p-3 bg-white">
									<div class="fs-1"><i class='bx bx-taxi'></i>
									</div>
									<div class="info-box-content ps-3">
										<h6 class="mb-0">FREE SHIPPING &amp; RETURN</h6>
										<p class="mb-0">Free shipping on all orders over $49</p>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="d-flex align-items-center p-3 bg-white">
									<div class="fs-1"><i class='bx bx-dollar-circle'></i>
									</div>
									<div class="info-box-content ps-3">
										<h6 class="mb-0">MONEY BACK GUARANTEE</h6>
										<p class="mb-0">100% money back guarantee</p>
									</div>
								</div>
							</div>
							<div class="col">
								<div class="d-flex align-items-center p-3 bg-white">
									<div class="fs-1"><i class='bx bx-support'></i>
									</div>
									<div class="info-box-content ps-3">
										<h6 class="mb-0">ONLINE SUPPORT 24/7</h6>
										<p class="mb-0">Awesome Support for 24/7 Days</p>
									</div>
								</div>
							</div>
						</div>
						<!--end row-->
					</div>
				</section>
				<!--end information-->
				<!--start pramotion-->
			
				<!--end pramotion-->
				<!--start Featured product-->
				<section class="py-4">
					<div class="container">
						<div class="d-flex align-items-center">
							<h5 class="text-uppercase mb-0">FEATURED PRODUCTS</h5>
							<a href="/shop" class="btn btn-dark btn-ecomm ms-auto rounded-0">More Products<i class='bx bx-chevron-right'></i></a>
						</div>
						<hr/>
						<div class="product-grid">
							<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
							@foreach($data as $datas)

								<div class="col">
									<div  style="border: 1px solid #ccc" class="card rounded-0 product-card">
										<div class="card-header bg-transparent border-bottom-0" style="background: #f0f1f2 !important;">
											<div class="d-flex align-items-center justify-content-end gap-3">
												<a href="javascript:;">
													<div class="product-compare">
													</div>
												</a>
												<a style="cursor: pointer;" data-id="{{$datas->id}}" class="addtowishlist">
													<div class="product-wishlist"> <i class='bx bx-heart'></i>
													</div>
												</a>
											</div>
										</div>
										<a style="background: #f0f1f2 !important;" href="/products/{{$datas->slug}}">
											<img src="{{asset('images/product/')}}/{{$datas->files}}" height="180" class="card-img-top" alt="...">
										</a>
										<div class="card-body">
											<div class="product-info">
												<a href="javascript:;">
													<p class="product-catergory font-13 mb-1">{{$datas->cat}}</p>
												</a>
												<a href="javascript:;">
													<h6 class="product-name mb-2">{{$datas->title}}</h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price">
														<span class="fs-5"> Rs. {{ number_format($datas->price, 2) }}</span>
													</div>
													<div class="cursor-pointer ms-auto">
												
													</div>
												</div>
												<div  style="visibility: inherit;opacity: 1" class="product-action mt-2">
													<div class="d-grid gap-2">
														<a data-id="{{$datas->id}}"  data-stock="{{$datas->stock}}"  class="btn btn-dark btn-ecomm add-to-cart-btn">	<i class='bx bxs-cart-add'></i>Add to Cart</a>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							@endforeach



							</div>
							<!--end row-->
						</div>
					</div>
				</section>
				<!--end Featured product-->
				<!--start New Arrivals-->
			
				<!--end New Arrivals-->
				<!--start Advertise banners-->

				<!--end Advertise banners-->
				<!--start categories-->

				<!--end categories-->
				<!--start support info-->
				<section class="py-4 bg-light">
					<div class="container">
						<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group">
							<div class="col">
								<div class="text-center">
									<div class="font-50">	<i class='bx bx-cart'></i>
									</div>
									<h2 class="fs-5 text-uppercase mb-0">Free delivery</h2>
									<p class="text-capitalize">Free delivery over $199</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
								</div>
							</div>
							<div class="col">
								<div class="text-center">
									<div class="font-50">	<i class='bx bx-credit-card'></i>
									</div>
									<h2 class="fs-5 text-uppercase mb-0">Secure payment</h2>
									<p class="text-capitalize">We possess SSL / Secure сertificate</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
								</div>
							</div>
							<div class="col">
								<div class="text-center">
									<div class="font-50">	<i class='bx bx-dollar-circle'></i>
									</div>
									<h2 class="fs-5 text-uppercase mb-0">Free returns</h2>
									<p class="text-capitalize">We return money within 30 days</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
								</div>
							</div>
							<div class="col">
								<div class="text-center">
									<div class="font-50">	<i class='bx bx-support'></i>
									</div>
									<h2 class="fs-5 text-uppercase mb-0">Customer Support</h2>
									<p class="text-capitalize">Friendly 24/7 customer support</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>
								</div>
							</div>
						</div>
						<!--end row-->
					</div>
				</section>
				<!--end support info-->
				<!--start News-->

				<!--end News-->
				<!--start brands-->
				<!-- <section class="py-4">
					<div class="container">
						<h3 class="d-none">Brands</h3>
						<div class="brand-grid">
							<div class="brands-shops owl-carousel owl-theme border">
								<div class="item border-end">
									<div class="p-4">
										<a href="javascript:;">
											<img src="assets/images/brands/01.png" class="img-fluid" alt="...">
										</a>
									</div>
								</div>
								<div class="item border-end">
									<div class="p-4">
										<a href="javascript:;">
											<img src="assets/images/brands/02.png" class="img-fluid" alt="...">
										</a>
									</div>
								</div>
								<div class="item border-end">
									<div class="p-4">
										<a href="javascript:;">
											<img src="assets/images/brands/03.png" class="img-fluid" alt="...">
										</a>
									</div>
								</div>
								<div class="item border-end">
									<div class="p-4">
										<a href="javascript:;">
											<img src="assets/images/brands/04.png" class="img-fluid" alt="...">
										</a>
									</div>
								</div>
								<div class="item border-end">
									<div class="p-4">
										<a href="javascript:;">
											<img src="assets/images/brands/05.png" class="img-fluid" alt="...">
										</a>
									</div>
								</div>
								<div class="item border-end">
									<div class="p-4">
										<a href="javascript:;">
											<img src="assets/images/brands/06.png" class="img-fluid" alt="...">
										</a>
									</div>
								</div>
								<div class="item border-end">
									<div class="p-4">
										<a href="javascript:;">
											<img src="assets/images/brands/07.png" class="img-fluid" alt="...">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section> -->
				<!--end brands-->
				<!--start bottom products section-->

				<!--end bottom products section-->
			</div>
		</div>




<div id="cookiePopups" class="cookiebanner">
    <div class="cookiebanner-content">
  
      <center><p style="margin-top: 11px;">By clicking "Allow All" you agree to the storing of cookies on your device to enhance site</p>
	  <p> navigation, analyze site usage, and assist in our marketing efforts.
    </p></center></div>
    <div class="cookiebanner-actions">
      <div>
        <!--<a href="#" class="btn btn-secondary cookiebanner-deny" data-consent="denied">Deny</a>-->
        <a style="margin-right: 57px; margin-left: 89px; margin-bottom: 4px;" href="#"  id="acceptCookie" class="btn cookiebanner-allow" data-consent="granted">Accept All Cookies</a>
      </div>
    </div>
  </div>

		<script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>



$(document).ready(function () {

		$('#nvmenu').addClass('active');


        $('.add-to-cart-btn').click(function (e) {

            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id =  $(this).attr("data-id");
            var quantity =  1;



            $.ajax({
                url: "/quick-add-to-cart/"+product_id+"",
                method: "GET",

                success: function (response) {

					if(response.status==200){

					Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'success',
					text: response.message,
					showConfirmButton: false,
					timer: 1500
					})


					}
					else if (response.status==409) {

					Swal.fire({
					position: 'top-end',
					icon: 'warning',
					title: 'warning',
					text: response.message,
					showConfirmButton: false,
					timer: 1500
					})
  
					}
					
					else{


					Swal.fire({
					position: 'top-end',
					icon: 'warning',
					title: 'warning',
					text: response.message,
					showConfirmButton: false,
					timer: 1500
					})
					window.location.href = "{{ route('login')}}";

					}


                    cartload2();


				


					},
				});
			});


    });



         </script>

         <script type="text/javascript">
// set cookie according to you
var cookieName= "CodingStatus";
var cookieValue="Coding Tutorials";
var cookieExpireDays= 30;

// when users click accept button
let acceptCookie= document.getElementById("acceptCookie");
acceptCookie.onclick= function(){
    createCookie(cookieName, cookieValue, cookieExpireDays);
}

// function to set cookie in web browser
 let createCookie= function(cookieName, cookieValue, cookieExpireDays){
  let currentDate = new Date();
  currentDate.setTime(currentDate.getTime() + (cookieExpireDays*24*60*60*1000));
  let expires = "expires=" + currentDate.toGMTString();
  document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
  if(document.cookie){
    document.getElementById("cookiePopups").style.display = "none";
  }else{
    alert("Unable to set cookie. Please allow all cookies site from cookie setting of your browser");
  }

 }

// get cookie from the web browser
let getCookie= function(cookieName){
  let name = cookieName + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
// check cookie is set or not
let checkCookie= function(){
    let check=getCookie(cookieName);
    if(check==""){
        document.getElementById("cookiePopups").style.display = "block";
    }else{

        document.getElementById("cookiePopups").style.display = "none";
    }
}
checkCookie();
</script>
    @endsection
