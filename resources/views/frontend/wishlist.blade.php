@extends('partials.main')
@section('titel') {{'Wishlist'}} @endsection
@section('content')




<div class="page-wrapper">
			<div class="page-content">
				<!--start breadcrumb-->
				<section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
					<div class="container">
						<div class="page-breadcrumb d-flex align-items-center">
							<h3 class="breadcrumb-title pe-3">Wishlist Grid</h3>
							<div class="ms-auto">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb mb-0 p-0">
										<li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i> Home</a>
										</li>
										<li class="breadcrumb-item"><a href="/wishlist">Wishlist</a>
										</li>

									</ol>
								</nav>
							</div>
						</div>
					</div>
				</section>
				<!--end breadcrumb-->
				<!--start Featured product-->
				<section class="py-4">
					<div class="container">
						<div class="product-grid">
							<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-3">

                            @foreach($data as $datas)
                            <div class="col">
									<div class="card rounded-0 product-card">
										<a href="/product/{{$datas->id}}">
											<img src="{{asset('images/product')}}/{{ (substr(preg_replace('/[^a-zA-Z^0-9.]/', '', $datas->files),0,16))}}" src="{{asset('images/product')}}/{{ (substr(preg_replace('/[^a-zA-Z^0-9.]/', '', $datas->files),0,19))}}" class="card-img-top" alt="...">
										</a>
										<div class="card-body">
											<div class="product-info">
												<a href="javascript:;">
													<p class="product-catergory font-13 mb-1">{{$datas->cat}}</p>
												</a>
												<a href="/product/{{$datas->id}}">
													<h6 class="product-name mb-2">{{$datas->title}}</h6>
												</a>
												<div class="d-flex align-items-center">
													<div class="mb-1 product-price">
														<span class="fs-5">Rs. {{$datas->price}}</span>
													</div>
													<div class="cursor-pointer ms-auto">
                                                    <?php
                                   for ($x = 0; $x <= $datas->rate -1; $x++) {?>
                                                      <i class="bx bxs-star text-warning"></i>

                                                       <?php } ?>

													</div>
												</div>
												<div class="product-action mt-2">
													<div class="d-grid gap-2">
                                                    <a data-id="{{$datas->id}}"  class="btn btn-dark btn-ecomm add-to-cart-btn">	<i class='bx bxs-cart-add'></i>Add to Cart</a>

													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
                                @endforeach

</br></br></br></br></br></br></br></br></br></br></br></br>

							</div>
							<!--end row-->
						</div>
					</div>
				</section>
				<!--end Featured product-->
			</div>
		</div>






<script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>



$(document).ready(function () {
        $('.add-to-cart-btn').click(function (e) {

            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id =  $(this).attr("data-id");
            var quantity =  $(this).attr("data-id2");



            $.ajax({
                url: "/authquickcart/"+product_id+"",
                method: "GET",

                success: function (response) {


                    cartload2();

                    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'success',
  text: 'Successfully Add to Cart',
  showConfirmButton: false,
  timer: 1500
})
                },
            });
        });


    });
        </script>

@endsection
