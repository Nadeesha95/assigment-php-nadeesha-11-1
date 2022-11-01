<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    <link rel="icon" href="{{asset('img/logo.png')}}" type="image/png"/>
    <!--plugins-->
    <link href="{{asset('frontend/plugins/OwlCarousel/css/owl.carousel.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('frontend/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
    <link href="{{asset('frontend/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet"/>
    <link href="{{asset('frontend/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet"/>
    <!-- loader-->
    <link href="{{asset('frontend/css/pace.min.css')}}" rel="stylesheet"/>
    <script src="{{asset('frontend/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('frontend/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/icons.css')}}" rel="stylesheet">
    <title>@yield('titel') - ABC</title>
</head>

<body>

<b class="screen-overlay"></b>
<!--wrapper-->
<div class="wrapper">


    @include('frontend.partials.header')


    @yield('content')


    @include('frontend.partials.footer')


</div>
<!--end wrapper-->


<!-- Bootstrap JS -->
<script src="{{asset('frontend/js/bootstrap.bundle.min.js')}}"></script>
<!--plugins-->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('frontend/plugins/OwlCarousel/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js')}}"></script>
<script src="{{asset('frontend/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('frontend/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<!--app JS-->
<script src="{{asset('frontend/js/app.js')}}"></script>
<script src="{{asset('frontend/js/index.js')}}"></script>
<script src="{{asset('frontend/js/show-hide-password.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

</body>
<style>


    @media only screen and (max-width: 700px) {
        /* styles for browsers larger than 960px; */
        .nlk {

            color: black !important;
        }


    }


</style>


<script>
    function cartload2() {
        var assetBaseUrl = "{{ asset('images/product/') }}";


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/cart-data',
            method: "GET",
            success: function (response) {

                var jsonarr = JSON.parse(response);
                console.log(jsonarr['cart_data']);
                $('.cart-list').html('');

                var total = 0;
                for (var i = 0; i < jsonarr['cart_data'].length; i++) {
                    // alert(jsonarr['cart_data'][i]['product']);


                    // $('.list-unstyled').append( '<li>  <li class="minicart-product"><a class="product-item_remove delete_cart_data" ><i class="ion-android-close"></i></a><div class="product-item_img"><img src="'+assetBaseUrl+'/'+jsonarr['cart_data'][i]['image']+'" alt=""></div><div class="product-item_content"><a class="product-item_title" href="shop-left-sidebar.html">'+jsonarr['cart_data'][i]['product']+'</a><span class="product-item_quantity">'+jsonarr['cart_data'][i]['quntity']+' x $ '+jsonarr['cart_data'][i]['price']+'</span></div> </li>');

                    $('.cart-list').append('<a class="dropdown-item" > <div class="d-flex align-items-center"> <div class="flex-grow-1"> <h6 class="cart-product-title">' + jsonarr['cart_data'][i]['product'] + '</h6> <p class="cart-product-price">' + jsonarr['cart_data'][i]['quntity'] + ' x Rs ' + jsonarr['cart_data'][i]['price'] + '</p> </div> <div class="position-relative"> <div data-id="' + jsonarr['cart_data'][i]['id'] + '" class="cart-product-cancel position-absolute delete_cart_data"><i style="z-index: 100;cursor: pointer" onclick="deleteCart('+jsonarr['cart_data'][i]['id']+')" class="bx bx-x"></i> </div> <div class="cart-product"> <img src="' + assetBaseUrl + '/' + jsonarr['cart_data'][i]['image'] + '" class="" alt="product image"> </div> </div> </div> </a>');


                    total += jsonarr['cart_data'][i]['price'] * jsonarr['cart_data'][i]['quntity'];
                }


                $('.ttlp').html('Rs ' + total);
                $('.basket-item-count').html('');
                var parsed = jQuery.parseJSON(response)
                var value = parsed; //Single Data Viewing
                $('.addcount').text(value['totalcart']);
                $('.itmscount').text(value['totalcart'] + ' ITEMS');


            }
        });
    }

    function deleteCart(product_id){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/delete-from-user-cart',
            type: 'POST',
            data: {
                'product_id': product_id,
            },
            success: function (response) {
                Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'success',
					text: response.message,
					showConfirmButton: false,
					timer: 1500
					})
                cartload2();
            }
        });
    }

    $(document).ready(function () {


        cartload2();


        $('.delete_cart_data').click(function (e) {

            e.preventDefault();

            var product_id = $(this).attr("data-id");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });



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


        $('.qmodal').click(function (e) {


            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).attr("data-id");


            $.ajax({
                url: "/qmodal",
                method: "POST",
                data: {

                    'product_id': product_id,
                },
                success: function (data2) {

                    var data = jQuery.parseJSON(data2);


                    $("#myimage").attr("src", "{{asset('images/product/')}}/" + data.files + "");
                    $('#exampleModalCenter').modal('toggle');

                    $("#mytitle").text(data.title);
                    $("#myprice").text('$' + data.price);
                    // $("#mydes").text(data.des);
                    $("#mydes").html(data.des).fadeIn();
                    $("#p_id").val(data.id);
                    $('#dataval').attr("data-id", data.id);
                    $("#authbtn").attr("href", "/authquickcart/" + data.id + "");


                },
            });
        });


        $('.modaladd-to-cart-btn').click(function (e) {

            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).attr("data-id");
            var quantity = $("#modalqun").val();


            var data = {
                'quantity': quantity,
                'product_id': product_id,
            };

            $.ajax({
                url: "/addtocart",
                type: 'POST',
                data: data,

                success: function (response) {


                    cartload2();

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

                },
            });
        });


        $('.addtowishlist').click(function (e) {

            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).attr("data-id");


            $.ajax({
                url: "/add_wishlist2/" + product_id + "",
                method: 'GET',


                success: function (response) {


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


<script>

    $(document).ready(function () {


        $('.increment-btn').click(function (e) {

            e.preventDefault();
            var incre_value = $(this).parents('.quantity2').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                $(this).parents('.quantity2').find('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity2').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $(this).parents('.quantity2').find('.qty-input').val(value);
            }
        });


        $('.changeQuantity').click(function (e) {

            e.preventDefault();

            var quantity = $(this).closest(".cartpage").find('.qty-input').val();
            var product_id = $(this).closest(".cartpage").find('.product_id').val();


            var data = {
                'quantity': quantity,
                'product_id': product_id,
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '/update-to-user-cart',
                type: 'POST',
                data: data,
                success: function (response) {
                    window.location.reload();
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(response.status);
                }
            });
        });


        $("#btnfilter").click(function () {


            var max = $('.irs-to').text().replace(/[^0-9]/gi, '');
            var min = $('.irs-from').text().replace(/[^0-9]/gi, '');

            $("#minpp").val(min);
            $("#maxpp").val(max);


            $("#pricefilterform").submit();


        });


    });


    $("#btnserchform").click(function () {

        $("#serchform").submit();
    });


    $(document).ready(function () {

        $('.counter-link__next').click(function () {

            let stock = $("#stockc").val();
            let cnt = $("#modalqun").val();


            if (parseInt(stock) < parseInt(cnt)) {

                $("#modalqun").val(1);
                alert('Sorry out of stock');
            }


        });
    });
</script>


@foreach (['success','danger'] as $msg)
    @if(Session::has('alert-' . $msg))



        <script>


            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'success',
                text: " {{ Session::get('alert-' . $msg) }}",
                showConfirmButton: false,
                timer: 1500
            })

        </script>





    @endif
@endforeach
</html>
