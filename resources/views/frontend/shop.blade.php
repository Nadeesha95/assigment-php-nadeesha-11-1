@extends('frontend.partials.main')
@section('titel') {{'Shop'}} @endsection
@section('content')

    <style>
        .product-wishlist:hover{
            cursor: pointer;
        }
    </style>
    <link href="{{asset('assets/plugins/nouislider/nouislider.min.css')}}" rel="stylesheet"/>

    <div class="page-wrapper">
        <div class="page-content">
            <!--start breadcrumb-->
            <section class="py-3 border-bottom border-top d-none d-md-flex bg-light">
                <div class="container">
                    <div class="page-breadcrumb d-flex align-items-center">
                        <h3 class="breadcrumb-title pe-3">Shop </h3>
                        <div class="ms-auto">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="/home"><i class="bx bx-home-alt"></i> Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="/shop">Shop</a>
                                    </li>

                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!--end breadcrumb-->
            <!--start shop area-->
            <section class="py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-xl-3 order-2">
                            <div class="btn-mobile-filter d-xl-none"><i class='bx bx-slider-alt'></i>
                            </div>
                            <div class="filter-sidebar d-none d-xl-flex">
                                <div class="card rounded-0 w-100">
                                    <div class="card-body">
                                        <div class="align-items-center d-flex d-xl-none">
                                            <h6 class="text-uppercase mb-0">Filter</h6>
                                            <div class="btn-mobile-filter-close btn-close ms-auto cursor-pointer"></div>
                                        </div>
                                        <hr class="d-flex d-xl-none"/>
                                        <div class="product-categories">
                                            <h6 class="text-uppercase mb-3">Categories</h6>
                                            <ul class="list-unstyled mb-0 categories-list">
                                                @foreach($cat as $cats)
                                                    <li><a href="/category/{{$cats->slug}}">{{$cats->category}} </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <hr>
                                       


                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-9 order-1">
                            <div class="product-wrapper">
                                <div class="toolbox d-flex align-items-center mb-3 gap-2">
                                    <div class="d-flex flex-wrap flex-grow-1 gap-1">
                                        <!-- <div class="d-flex align-items-center flex-nowrap">
                                            <p class="mb-0 font-13 text-nowrap">Sort By:</p>
                                            <select class="form-select ms-3 rounded-0">
                                                <option value="menu_order" selected="selected">Default sorting</option>
                                                <option value="popularity">Sort by popularity</option>
                                                <option value="rating">Sort by average rating</option>
                                                <option value="date">Sort by newness</option>
                                                <option value="price">Sort by price: low to high</option>
                                                <option value="price-desc">Sort by price: high to low</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        <!-- <div class="d-flex align-items-center flex-nowrap">
                                            <p class="mb-0 font-13 text-nowrap">Show:</p>
                                            <select class="form-select ms-3 rounded-0">
                                                <option>9</option>
                                                <option>12</option>
                                                <option>16</option>
                                                <option>20</option>
                                                <option>50</option>
                                                <option>100</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <!-- <div>	<a href="shop-grid-right-sidebar.html" class="btn btn-white rounded-0"><i class='bx bxs-grid me-0'></i></a>
                                    </div>
                                    <div>	<a href="shop-list-right-sidebar.html" class="btn btn-light rounded-0"><i class='bx bx-list-ul me-0'></i></a>
                                    </div> -->
                                </div>
                                <div class="product-grid">
                                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
                                        @foreach($data as $datas)
                                            <div class="col">
                                                <div style="border: 1px solid #ccc" class="card rounded-0 product-card">
                                                    <div class="card-header bg-transparent border-bottom-0">
                                                        <div
                                                            class="d-flex align-items-center justify-content-end gap-3">

                                                            <a>
                                                                <div class="product-wishlist addtowishlist"
                                                                     data-id="{{$datas->id}}"><i
                                                                        class="bx bx-heart"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <a href="/products/{{$datas->slug}}">
                                                        <img src="{{asset('images/product/')}}/{{$datas->files}}"
                                                             class="card-img-top" alt="...">
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
                                                                    <span
                                                                        class="fs-5">$ {{ number_format($datas->price, 2) }}</span>
                                                                </div>
                                                                <div class="cursor-pointer ms-auto">
                                                                    <?php
                                                                    for ($x = 0; $x <= $datas->rate - 1; $x++) {?>
                                                                    <i class="bx bxs-star text-warning"></i>

                                                                    <?php } ?>


                                                                </div>
                                                            </div>
                                                            <div  style="visibility: inherit;opacity: 1" class="product-action mt-2">
                                                                <div class="d-grid gap-2">
                                                                    <a data-id="{{$datas->id}}"
                                                                       class="btn btn-dark btn-ecomm add-to-cart-btn">
                                                                        <i class='bx bxs-cart-add add-to-cart-btn'></i>Add
                                                                        to Cart</a>

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
                                <hr>
                                <nav class="d-flex justify-content-between" aria-label="Page navigation">

                                    <ul class="pagination">
                                        {{ $data->links() }}
                                    </ul>

                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </section>
            <!--end shop area-->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/price-slider.js')}}"></script>
    <script src="{{asset('assets/plugins/nouislider/nouislider.min.js')}}"></script>

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

                var product_id = $(this).attr("data-id");
                var quantity = $(this).attr("data-id2");


                $.ajax({
                    url: "/authquickcart/" + product_id + "",
                    method: "GET",

                    success: function (response) {


                        cartload2();


                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'success',
                            text: response.status,
                            showConfirmButton: false,
                            timer: 1500
                        })


                    },
                });
            });


        });


    </script>

@endsection
