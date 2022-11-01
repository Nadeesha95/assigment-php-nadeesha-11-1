<style>
    @media only screen and (max-width: 440px) {
        .cartMobile {
            left: -178px !important;
        }
    }
    @media screen and (min-width: 1366px) {
        .navText {
            color: white !important;
            font-family: fantasy;
            font-size: 18px !important;
        }
    }



    .navText:hover, .categoryText:hover {
        color: #EB1B23 !important;
    }

    .activeLink {
        color: #EB1B23 !important;
    }
</style>

<div class="header-wrapper">
    <div class="top-menu border-bottom"
         style="background: #3a3f43; color: white; border-bottom: 1px solid #3a3f43!important;">
        <div class="container">
            <nav class="navbar navbar-expand">
                <div class="shiping-title text-uppercase font-13 d-none d-sm-flex" style="font-family: fantasy;">Welcome
                    to our store!
                </div>
                <ul class="navbar-nav ms-auto d-none d-lg-flex">
                    <!--<li class="nav-item" > <a class="nav-link"  style=" color: white;" href="order-tracking.html">Track Order</a>-->
                    <!--</li>-->
                    @foreach($cat as $cats)
                        <li class="nav-item"><a class="nav-link categoryText"
                                                style=" color: white; font-family: fantasy;"
                                                href="/category/{{$cats->slug}}">{{$cats->category}}</a>
                        </li>
                    @endforeach

                </ul>
                <ul class="navbar-nav">

                </ul>
                <ul class="navbar-nav social-link ms-lg-2 ms-auto">
                    <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/"><i
                                class='bx bxl-facebook'></i></a>
                    </li>
                  
                </ul>
            </nav>
        </div>
    </div>
    <div class="header-content pb-3 pb-md-0" style="background: #292e32; ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-4 col-md-auto">
                    <div class="d-flex align-items-center">
                        <div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i
                                style="color:#fff" class='bx bx-menu'></i>
                        </div>
                        <div class="logo d-none d-lg-flex">
                            <a href="/">
                                <img src="{{asset('img/logo.png')}}" class="logo-icon" alt=""/>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col col-md order-4 order-md-2">
                    <form method="post" id="serchform" action="/search">
                        @csrf
                        <div class="input-group flex-nowrap px-xl-4">

                            <input type="text" name="keyword" class="form-control w-100"
                                   placeholder="Search for Products">
                            <select name="cat" class="form-select flex-shrink-0" aria-label="Default select example"
                                    style="width: 150px;font-family: fantasy;font-size:12px">
                                <option selected>All Categories</option>
                                @foreach($cat as $cats)
                                    <option value="{{$cats->slug}}">{{$cats->cat_name}}</option>
                                @endforeach
                            </select>
                            <button style="background: aliceblue !important;" type="submit"
                                    class="input-group-text cursor-pointer bg-transparent"><i class='bx bx-search'></i>
                            </button>

                        </div>
                    </form>
                </div>
                <div class="col-4 col-md-auto order-3 d-none d-xl-flex align-items-center">
                    <div class="fs-1 text-white"><i class='bx bx-headphone'></i>
                    </div>
                    <div class="ms-2">
                        <p style="color: white; font-family: fantasy;" class="mb-0 font-13">CALL US NOW</p>
                        <h5 class="mb-0"><a style=" color: white;" href="tel:+94724424933">+94 724424933</a></h5>
                    </div>
                </div>
                <div class="col-4 col-md-auto order-2 order-md-4">
                    <div class="top-cart-icons float-end">
                        <nav class="navbar navbar-expand">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"><a style=" color: white;" href="/login"
                                                        class="nav-link cart-link"><i class='bx bx-user'></i></a>
                                </li>
                                <li class="nav-item"><a style=" color: white;" href="/wishlist"
                                                        class="nav-link cart-link"><i class='bx bx-heart'></i></a>
                                </li>
                                <li class="nav-item dropdown dropdown-large">
                                    <a href="#"
                                       class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative cart-link"
                                       data-bs-toggle="dropdown"> <span class="alert-count addcount"></span>
                                        <i style=" color: white;" class='bx bx-shopping-bag'></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end cartMobile">
                                        <a href="/cart">
                                            <div class="cart-header">
                                                <p class="cart-header-title mb-0 itmscount"></p>
                                                <p class="cart-header-clear ms-auto mb-0">VIEW CART</p>
                                            </div>
                                        </a>
                                        <div class="cart-list">


                                        </div>
                                        <a href="javascript:;">
                                            <div class="text-center cart-footer d-flex align-items-center">
                                                <h5 class="mb-0">TOTAL</h5>
                                                <h5 class="mb-0 ms-auto ttlp"></h5>
                                            </div>
                                        </a>
                                        <div class="d-grid p-3 border-top"><a href="/checkout"
                                                                              class="btn btn-dark btn-ecomm">CHECKOUT</a>
                                            </br>
                                            <a href="/cart" class="btn btn-dark btn-ecomm">VIEW CART</a>
                                        </div>
                                    </div>
                                </li>
                                @auth
                                <li class="nav-item">
                                <form method="POST" name="logout" action="{{ route('logout') }}">
      @csrf
      <a style=" color: white;"class="nav-link cart-link" href="javascript:document.logout.submit()"><i class='bx bx-log-out'></i></a>
</form>
                                
                               
                                </li>
                                @endauth
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>


    <div class="primary-menu border-top" style="background: #1e2123;      border-top: 1px solid #1e2123!important;">
        <div class="container">
            <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">
                <div class="offcanvas-header">
                    <button class="btn-close float-end"></button>
                    <h5 class="py-2">Navigation</h5>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item"><a
                            class="nav-link nlk navText @if(Route::current()->uri == '/') activeLink @endif"
                            href="/">Home </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a style="margin-top: -5px;"  class="nav-link navText @if(Route::current()->uri == 'category') activeLink @endif dropdown-toggle dropdown-toggle-nocaret nlk" href="#" data-bs-toggle="dropdown">Categories <i
                                class='bx bx-chevron-down'></i></a>
                        <ul class="dropdown-menu">
                            @foreach($cat as $cats)
                                <li><a class="dropdown-item" href="/categories/{{$cats->id}}">{{$cats->cat_name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item"><a
                            class="nav-link nlk navText @if(Route::current()->uri == 'shop') activeLink @endif"
                            href="/shop">Shop</a>
                    </li>


                    @auth
                        <li class="nav-item dropdown"><a  style="margin-top: -5px;"

                                class="nav-link dropdown-toggle dropdown-toggle-nocaret navText" href="#"
                                data-bs-toggle="dropdown">My Account <i class='bx bx-chevron-down'></i></>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/my-account">Dashboard</a>
                                </li>

                                <li><a class="dropdown-item" href="/my-orders">Orders</a>
                                </li>

                            </ul>
                        </li>
                    @endauth

                </ul>
            </nav>
        </div>
    </div>
</div>
