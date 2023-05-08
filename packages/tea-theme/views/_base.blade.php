<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ in_array(app()->getLocale(), ['ar', 'az', 'dv', 'fa', 'he', 'ku', 'ur']) ? 'rtl' : 'ltr' }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		{{--<meta http-equiv="Content-Security-Policy" content="base-uri 'self'; default-src 'self' 'nonce-{{ app( 'aimeos.context' )->get()->nonce() }}'; style-src 'unsafe-inline' 'self'; img-src 'self' data: https://aimeos.org https://www.w3schools.com; frame-src https://www.youtube.com https://player.vimeo.com">--}}
		<meta name="csrf-token" content="{{ csrf_token() }}">
		@if( in_array(app()->getLocale(), ['ar', 'az', 'dv', 'fa', 'he', 'ku', 'ur']) )
			<link type="text/css" rel="stylesheet" href="{{ asset('vendor/shop/themes/tea-theme/app.rtl.css?v=' . config( 'shop.version', 1 ) ) }}">
		@else
			<link type="text/css" rel="stylesheet" href="{{ asset('vendor/shop/themes/tea-theme/app.css?v=' . config( 'shop.version', 1 ) ) }}">
		@endif

		@yield('aimeos_header')

		<link rel="icon" href="{{ asset( 'aimeos/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getIcon() ?: '../vendor/shop/themes/tea-theme/assets/icon.png' ) ) }}"/>

		<link rel="preload" href="/vendor/shop/themes/tea-theme/assets/roboto-condensed-v19-latin-regular.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/vendor/shop/themes/tea-theme/assets/roboto-condensed-v19-latin-700.woff2" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="/vendor/shop/themes/tea-theme/assets/bootstrap-icons.woff2" as="font" type="font/woff2" crossorigin>
        <link type="text/css" rel="stylesheet" href="{{ asset('vendor/shop/themes/tea-theme/aimeos.css?v=' . config( 'shop.version', 1 ) ) }}" />
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}" />

        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="{{asset('css/style.css')}}" />
	</head>
	<body class="{{ $page ?? '' }}">
    {{--<div class="container-fluid">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('assets/img/logo.png')}}" class="navlogo" alt="" />
                </a>
                <div class="d-flex align-items-center d-block d-lg-none">

                    <a class="nav-link hover-no-underline text-secondary " data-bs-toggle="modal" href="#exampleModalToggle" role="button"><i class="fa-solid fa-magnifying-glass"></i
                        ></a>
                    <div class="d-flex align-items-center mx-2">
                        <!-- <p class="m-0 fw-medium h6 me-2">العربية</p> -->
                        <span class="navIcon">
                  <img src="{{asset('assets/img/globalIcon.png')}}" class="img-fluid" alt="" />
                </span>
                    </div>

                    <div class="nav-item mx-2  dropdown cartdop">
                        <a
                            class="nav-link hover-no-underline"
                            href="#"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false"
                        >
                  <span class="position-relative">
                    <img src="{{asset('assets/img/cartIcon.png')}}" class="img-fluid" alt="" />
                    <span
                        class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-darkblue"
                    >
                      2
                    </span>
                  </span>
                        </a>
                        <ul class="dropdown-menu cartdropdown px-2">
                  <span
                      class="triangleIcon position-absolute"
                      id="close-dropdown-btn123"
                  >
                    <i class="fa-solid fa-x"></i>
                  </span>
                            <h5 class="text-darkblue text-center">Cart</h5>
                            <p>Total Quantity:(4)</p>

                            <!-- ====== PRODUCT 1   -->
                            <div class="d-flex my-3">
                                <div class="d-flex align-items-center">
                                    <img
                                        src="{{asset('assets/img/prodcut2.png')}}"
                                        class="img-fluid product-nav-cart-img"
                                        alt=""
                                    />
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <h6 class="m-0">MORINGA APPLE CINNAMON</h6>
                                            <p class="m-0 fw-semibold text-darkblue">220 g</p>
                                        </div>
                                        <h4>3.50 JD</h4>
                                    </div>
                                    <div class="d-flex align-items-center">
                        <span class="decrease-item-icon">
                          <i class="fa-solid fa-minus"></i>
                        </span>
                                        <h4 class="m-0 mx-2">2</h4>
                                        <span class="increase-item-icon">
                          <i class="fa-solid fa-plus"></i>
                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- ====== PRODUCT 2   -->
                            <div class="d-flex my-3">
                                <div class="d-flex align-items-center">
                                    <img
                                        src="{{asset('assets/img/product3.png')}}"
                                        class="img-fluid product-nav-cart-img"
                                        alt=""
                                    />
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <h6 class="m-0">MORINGA APPLE CINNAMON</h6>
                                            <p class="m-0 fw-semibold text-darkblue">220 g</p>
                                        </div>
                                        <h4>3.50 JD</h4>
                                    </div>
                                    <div class="d-flex align-items-center">
                        <span class="decrease-item-icon">
                          <i class="fa-solid fa-minus"></i>
                        </span>
                                        <h4 class="m-0 mx-2">2</h4>
                                        <span class="increase-item-icon">
                          <i class="fa-solid fa-plus"></i>
                        </span>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>



                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">
                        <li class="nav-item mx-lg-2">
                            <a
                                class="nav-link active-nav-items"
                                aria-current="page"
                                href="#"
                            >Home</a
                            >
                        </li>
                        <li class="nav-item mx-lg-2">
                            <a class="nav-link" href="#">Categories</a>
                        </li>
                        <li class="nav-item mx-lg-2">
                            <a class="nav-link" href="#">Recipies</a>
                        </li>
                        <li class="nav-item mx-lg-2">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item ms-lg-2">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a
                                class="nav-link hover-no-underline text-secondary"
                                data-bs-toggle="modal"
                                href="#exampleModalToggle"
                                role="button"
                            ><i class="fa-solid fa-magnifying-glass"></i
                                ></a>

                            <!-- <a class="nav-link hover-no-underline text-secondary" href="#"
                              ></a> -->
                        </li>
                    </ul>
                    <div class="d-flex d-none d-lg-inline-flex">
                        <div class="d-flex align-items-center">
                            <p class="m-0 fw-medium h6 me-2">العربية</p>
                            <span class="navIcon">
                  <img src="{{asset('assets/img/globalIcon.png')}}" class="img-fluid" alt="" />
                </span>
                        </div>
                        <!-- <span class="navIcon mx-3"
                          ><img src="./img/cartIcon.png" class="img-fluid" alt=""
                        /></span> -->

                        <div class="nav-item mx-3 dropdown">
                            <a
                                class="nav-link hover-no-underline"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                  <span class="position-relative">
                    <img src="{{asset('assets/img/cartIcon.png')}}" class="img-fluid" alt="" />
                    <span
                        class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-darkblue"
                    >
                      2
                    </span>
                  </span>
                            </a>
                            <ul class="dropdown-menu cartdropdown px-2" aria-labelledby="dropdownMenuButton2">
                                <!-- <button class="btn btn-primary close-dropdown-btn" data-target="#dropdownMenuButton2">Close Dropdown 2</button> -->
                                <span
                                    class="triangleIcon position-absolute close-dropdown-btn"
                                    id=""
                                >
                    <i class="fa-solid fa-x"></i>
                  </span>
                                <h5 class="text-darkblue text-center">Cart</h5>
                                <p class="ms-2">Total Quantity:(4)</p>

                                <!-- ====== PRODUCT 1   -->
                                <div class="d-flex my-3">
                                    <div class="d-flex align-items-center">
                                        <img
                                            src="{{asset('assets/img/prodcut2.png')}}"
                                            class="img-fluid product-nav-cart-img"
                                            alt=""
                                        />
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <h6 class="m-0">MORINGA APPLE CINNAMON</h6>
                                                <p class="m-0 fw-semibold text-darkblue">220 g</p>
                                            </div>
                                            <h4>3.50 JD</h4>
                                        </div>
                                        <div class="d-flex align-items-center">
                        <span class="decrease-item-icon">
                          <i class="fa-solid fa-minus"></i>
                        </span>
                                            <h4 class="m-0 mx-2">2</h4>
                                            <span class="increase-item-icon">
                          <i class="fa-solid fa-plus"></i>
                        </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- ====== PRODUCT 2   -->
                                <div class="d-flex my-3">
                                    <div class="d-flex align-items-center">
                                        <img
                                            src="{{asset('assets/img/prodcut2.png')}}"
                                            class="img-fluid product-nav-cart-img"
                                            alt=""
                                        />
                                        <div>
                                            <div class="d-flex align-items-center">
                                                <h6 class="m-0">MORINGA APPLE CINNAMON</h6>
                                                <p class="m-0 fw-semibold text-darkblue">220 g</p>
                                            </div>
                                            <h4>3.50 JD</h4>
                                        </div>
                                        <div class="d-flex align-items-center">
                        <span class="decrease-item-icon">
                          <i class="fa-solid fa-minus"></i>
                        </span>
                                            <h4 class="m-0 mx-2">2</h4>
                                            <span class="increase-item-icon">
                          <i class="fa-solid fa-plus"></i>
                        </span>
                                        </div>
                                    </div>
                                </div>
                                <p class="ms-2">Total Price : <span class="text-darkblue fw-bold">11.55 JD</span></p>
                                <button class="btn viewcart">View the Cart</button>
                            </ul>
                        </div>

                        <div class="nav-item dropdown">
                            <a
                                class="nav-link hover-no-underline"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                  <span class="">
                    <img src="{{asset('assets/img/profileIcon.png')}}" class="img-fluid" alt="" />
                  </span>
                            </a>
                            <ul class="dropdown-menu userDropdown">
                  <span class="triangleIcon position-absolute">
                    <i class="fa-solid fa-x"></i>
                  </span>
                                <li>
                                    <a class="dropdown-item fw-semibold" href="#"
                                    ><img
                                            src="{{asset('assets/img/userIcon.png')}}"
                                            class="img-fluid"
                                            alt=""
                                        /><span class="ms-2"> My Account</span></a
                                    >
                                </li>
                                <li>
                                    <a class="dropdown-item fw-semibold" href="#"
                                    ><img
                                            src="{{asset('assets/img/bagIcon.png')}}"
                                            class="img-fluid"
                                            alt=""
                                        /><span class="ms-2"> My Orders</span></a
                                    >
                                </li>
                                <li>
                                    <a class="dropdown-item fw-semibold" href="#"
                                    ><img
                                            src="{{asset('assets/img/heartIcon.png')}}"
                                            class="img-fluid"
                                            alt=""
                                        />
                                        <span class="ms-2">My Favorite</span></a
                                    >
                                </li>

                                <li>
                                    <a class="dropdown-item fw-semibold" href="#"
                                    ><img
                                            src="{{asset('assets/img/heartIconNav.png')}}"
                                            class="img-fluid"
                                            alt=""
                                        />
                                        <span class="ms-2">LogOut</span></a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>--}}
		<nav class="navbar navbar-expand-md navbar-top">
			<a class="navbar-brand" href="{{ airoute('aimeos_home') }}" title="Logo">
				<img src="{{ asset( '/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getLogo() ?: 'tea-assets/logo.png' ) ) }}" height="106" title="Logo">
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-top" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar-top">
				@yield('aimeos_head_nav')
                @yield('aimeos_head_search')
			</div>
            @yield('aimeos_head_locale')


			<ul class="navbar-nav">
				@if (Auth::guest() && config('app.shop_registration'))
					<li class="nav-item register"><a class="nav-link" href="{{ airoute( 'register' ) }}" title="{{ __( 'Register' ) }}"><span class="name">{{ __('Register') }}</span></a></li>
				@endif
				@if (Auth::guest())
					<li class="nav-item login"><a class="nav-link" href="{{ airoute( 'login' ) }}" title="{{ __( 'Login' ) }}"><span class="name">{{ __( 'Login' ) }}</span></a></li>
				@else
					<li class="nav-item login profile dropdown">
						<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false" title="{{ __( 'Account' ) }}"><span class="name">{{ __( 'Account' ) }}</span> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li class="dropdown-item"><a class="nav-link" href="{{ airoute( 'aimeos_shop_account' ) }}"><span class="name">{{ __( 'Profile' ) }}</span></a></li>
							<li class="dropdown-item"><form id="logout" action="{{ airoute( 'logout' ) }}" method="POST">{{ csrf_field() }}<button class="nav-link"><span class="name">{{ __( 'Logout' ) }}</span></button></form></li>
						</ul>
					</li>
				@endif
			</ul>

			@yield('aimeos_head_basket')
		</nav>

		<div class="content">
			@yield('aimeos_stage')
			@yield('aimeos_body')
			@yield('content')
		</div>


		<footer>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-sm-6 footer-left">
								<div class="footer-block">
									<h2 class="pb-3">{{ __( 'LEGAL' ) }}</h2>
									<p><a href="#">{{ __( 'Terms & Conditions' ) }}</a></p>
									<p><a href="#">{{ __( 'Privacy Notice' ) }}</a></p>
									<p><a href="#">{{ __( 'Imprint' ) }}</a></p>
								</div>
							</div>
							<div class="col-sm-6 footer-center">
								<div class="footer-block">
									<h2 class="pb-3">{{ __( 'ABOUT US' ) }}</h2>
									<p><a href="#">{{ __( 'Contact us' ) }}</a></p>
									<p><a href="#">{{ __( 'Company' ) }}</a></p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 footer-right">
						<div class="footer-block">
							<a class="logo" href="/" title="Logo">
							    <img src="{{ asset( 'aimeos/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getLogo() ?: '../vendor/shop/themes/tea-theme/assets/logo.png' ) ) }}" height="40" title="Logo">
							</a>
							<div class="social">
								<p><a href="#" class="sm facebook" title="Facebook" rel="noopener">Facebook</a></p>
								<p><a href="#" class="sm twitter" title="Twitter" rel="noopener">Twitter</a></p>
								<p><a href="#" class="sm instagram" title="Instagram" rel="noopener">Instagram</a></p>
								<p><a href="#" class="sm youtube" title="Youtube" rel="noopener">Youtube</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>



		<a id="toTop" class="back-to-top" href="#" title="{{ __( 'Back to top' ) }}">
			<div class="top-icon"></div>
		</a>

		<!-- Scripts -->
		<script src="{{ asset('vendor/shop/themes/tea-theme/app.js?v=' . config( 'shop.version', 1 ) ) }}"></script>
		<script src="{{ asset('vendor/shop/themes/tea-theme/aimeos.js?v=' . config( 'shop.version', 1 ) ) }}"></script>
		@yield('aimeos_scripts')
	</body>
</html>
