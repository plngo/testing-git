<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      dir="{{ in_array(app()->getLocale(), ['ar', 'az', 'dv', 'fa', 'he', 'ku', 'ur']) ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<meta http-equiv="Content-Security-Policy" content="base-uri 'self'; default-src 'self' 'nonce-{{ app( 'aimeos.context' )->get()->nonce() }}'; style-src 'unsafe-inline' 'self'; img-src 'self' data: https://aimeos.org https://www.w3schools.com; frame-src https://www.youtube.com https://player.vimeo.com">--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if( in_array(app()->getLocale(), ['ar', 'az', 'dv', 'fa', 'he', 'ku', 'ur']) )
        <link type="text/css" rel="stylesheet"
              href="{{ asset('vendor/shop/themes/tea-theme/app.rtl.css?v=' . config( 'shop.version', 1 ) ) }}">
    @else
        <link type="text/css" rel="stylesheet"
              href="{{ asset('vendor/shop/themes/tea-theme/app.css?v=' . config( 'shop.version', 1 ) ) }}">
    @endif

    @yield('aimeos_header')

    <link rel="icon"
          href="{{ asset( 'aimeos/' . ( app( 'aimeos.context' )->get()->locale()->getSiteItem()->getIcon() ?: '../vendor/shop/themes/tea-theme/assets/icon.png' ) ) }}"/>

    <link rel="preload" href="/vendor/shop/themes/tea-theme/assets/roboto-condensed-v19-latin-regular.woff2" as="font"
          type="font/woff2" crossorigin>
    <link rel="preload" href="/vendor/shop/themes/tea-theme/assets/roboto-condensed-v19-latin-700.woff2" as="font"
          type="font/woff2" crossorigin>
    <link rel="preload" href="/vendor/shop/themes/tea-theme/assets/bootstrap-icons.woff2" as="font" type="font/woff2"
          crossorigin>
    {{--<link type="text/css" rel="stylesheet" href="{{ asset('vendor/shop/themes/tea-theme/aimeos.css?v=' . config( 'shop.version', 1 ) ) }}" />--}}
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}"/>

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
    />
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
</head>
<body class="{{ $page ?? '' }}">

<nav class="navbar navbar-expand-lg fixed-top" style="background: white">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{asset('assets/img/logo.png')}}" class="navlogo" alt=""/>
        </a>
        <div class="d-flex align-items-center d-block d-lg-none">

            <a class="nav-link hover-no-underline text-secondary " data-toggle="modal" data-target="#exampleModalToggle"
               role="button"><i class="fa-solid fa-magnifying-glass"></i
                ></a>
            <div class="d-flex align-items-center mx-2">
                <!-- <p class="m-0 fw-medium h6 me-2">العربية</p> -->
                <span class="navIcon">
                  <img src="{{asset('assets/img/globalIcon.png')}}" class="img-fluid" alt=""/>
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
                    <img src="{{asset('assets/img/cartIcon.png')}}" class="img-fluid" alt=""/>
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
                        class="nav-link {{request()->path() == '/' ? 'active-nav-items' : '' }} "
                        aria-current="page"
                        href="/"
                    >Home</a
                    >
                </li>
                <li class="nav-item {{request()->path() == 'categories' ? 'active-nav-items' : '' }} mx-lg-2">
                    <a class="nav-link" href="/categories">Categories</a>
                </li>
                <li class="nav-item mx-lg-2 {{request()->path() == 'recipes' ? 'active-nav-items' : '' }}">
                    <a class="nav-link" href="/recipes">Recipies</a>
                </li>
                <li class="nav-item mx-lg-2 {{request()->path() == 'about-us' ? 'active-nav-items' : '' }}">
                    <a class="nav-link" href="/about-us">About Us</a>
                </li>
                <li class="nav-item ms-lg-2 {{request()->path() == 'contact-us' ? 'active-nav-items' : '' }}">
                    <a class="nav-link" href="/contact-us">Contact Us</a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <a
                        class="nav-link hover-no-underline text-secondary"
                        data-toggle="modal"
                        data-target="#exampleModalToggle"
                        role="button"
                    ><i class="fa-solid fa-magnifying-glass"></i
                        ></a>
                </li>
            </ul>
            <div class="d-flex d-none d-lg-inline-flex">
                <div class="d-flex align-items-center">
                    <p class="m-0 fw-medium h6 me-2">العربية</p>
                    <span class="navIcon">
                  <img src="{{asset('assets/img/globalIcon.png')}}" class="img-fluid" alt=""/>
                </span>
                </div>
                &nbsp;
                <!-- <span class="navIcon mx-3"
                  ><img src="./img/cartIcon.png" class="img-fluid" alt=""
                /></span> -->
                @yield('aimeos_head_basket')
                <div class="nav-item dropdown">
                    <a
                        class="nav-link hover-no-underline"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                  <span class="">
                    <img src="{{asset('assets/img/profileIcon.png')}}" class="img-fluid" alt=""/>
                  </span>
                    </a>
                        <ul class="dropdown-menu userDropdown">
                        <span class="triangleIcon position-absolute">
                            <i class="fa-solid fa-x"></i>
                        </span>
                            @if (Auth::guest())
                                <li>
                                    <a id="login-button" class="dropdown-item fw-semibold" href="{{ airoute( 'login' ) }}"
                                    ><img
                                            src="{{asset('assets/img/userIcon.png')}}"
                                            class="img-fluid"
                                            alt=""
                                        /><span class="ms-2">{{ __( 'Login' ) }}</span></a
                                    >
                                </li>

                                {{--<li>
                                    <a class="dropdown-item fw-semibold" href="{{ airoute( 'register' ) }}"
                                    ><img
                                            src="{{asset('assets/img/userIcon.png')}}"
                                            class="img-fluid"
                                            alt=""
                                        /><span class="ms-2">{{ __( 'register' ) }}</span></a
                                    >
                                </li>--}}
                            @else
                            <li>
                                <a class="dropdown-item fw-semibold" href="/profile"
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
                                <a class="dropdown-item fw-semibold" href="/profile/favorites"
                                ><img
                                        src="{{asset('assets/img/heartIcon.png')}}"
                                        class="img-fluid"
                                        alt=""
                                    />
                                    <span class="ms-2">My Favorite</span></a
                                >
                            </li>

                            <li>
                                <form id="logout" action="{{ airoute( 'logout' ) }}" method="POST">{{ csrf_field() }}
                                <a class="dropdown-item fw-semibold" href="#"
                                ><img
                                        src="{{asset('assets/img/heartIconNav.png')}}"
                                        class="img-fluid"
                                        alt=""
                                    /><span class="ms-2"><button style="border: none;background: transparent; font-weight: 600">{{ __( 'Logout' ) }}</button></span></a
                                >
                                </form>
                            </li>
                                @endif
                        </ul>

                </div>
            </div>
        </div>
    </div>
</nav>
<div class="content mt-5">
    @yield('aimeos_stage')
    @yield('aimeos_body')
    @yield('aimeos_head_nav')
    @yield('aimeos_products')
    @yield('content')
    @yield('aimeos_head_search')
</div>
<footer>
    <div class="container-fluid bg-darkblue">
        <div class="container pt-5">
            <div class="row flex-column flex-wrap flex-md-row">
                <div class="col my-3">
                    <img
                        src="{{asset('assets/img/footerLogo.png')}}"
                        class="img-fluid d-block mx-auto"
                        alt=""
                    />
                </div>
                <div
                    class="col my-3 text-light text-center text-lg-start text-center text-lg-start"
                >
                    <h6 class="text-light">PRODUCT CATEGORIES</h6>
                    <ul class="list-unstyled">
                        <li>Yemeni Coffee</li>
                        <li>Turkish Coffee</li>
                        <li>Arabic Coffee</li>
                        <li>American Coffee</li>
                        <li>French Coffee</li>
                        <li>Espresso</li>
                        <li>Instant Coffee</li>
                        <li>Coffee Accessories</li>
                    </ul>
                </div>
                <div
                    class="col my-3 text-light text-center text-lg-start text-center text-lg-start"
                >
                    <h6 class="text-light">PURCHASING POLICY</h6>
                    <ul class="list-unstyled">
                        <li>Refund Policy</li>
                        <li>Cancellation Policy</li>
                        <li>Delivery Policy & Method</li>
                    </ul>
                </div>
                <div class="col my-3 text-light text-center text-lg-start">
                    <p class="text-light h6">LEGAL AND PRIVACY</p>
                    <ul class="list-unstyled text-center text-lg-start">
                        <li>Terms & Conditions</li>
                        <li>Privacy Policy</li>
                    </ul>
                </div>
                <div class="col my-3 text-light text-center text-lg-start">
                    <h6 class="text-light">Take a tour</h6>
                    <ul class="list-unstyled text-center text-lg-start">
                        <li>AL Kbous Group,Alkbous</li>
                        <li>Coffee/Tea.</li>
                    </ul>
                </div>
                <div class="col my-3 text-light">
                    <h6 class="text-light text-center text-lg-start">
                        Payments methods
                    </h6>
                    <div
                        class="d-flex flex-row flex-lg-column justify-content-center align-items-center"
                    >
                        <img
                            src="{{asset('assets/img/paypallogo.png')}}"
                            class="img-fluid paypal-logo"
                            alt=""
                        />
                        <img
                            src="{{asset('assets/img/mastercard.png')}}"
                            class="img-fluid payment-logo mx-2"
                            alt=""
                        />
                        <img
                            src="{{asset('assets/img/visacard.png')}}"
                            class="img-fluid payment-logo"
                            alt=""
                        />
                    </div>
                </div>
                <div class="col my-3 text-light">
                    <h5 class="text-light fw-bold text-center">FOLLOW US</h5>
                    <div
                        class="d-flex justify-content-center align-items-center social_icons"
                    >
                <span class="social_icons-hover">
                  <i class="fa-brands fa-twitter"></i>
                </span>
                        <span class="mx-3 social_icons-hover">
                  <i class="fa-brands fa-facebook-f"></i>
                </span>
                        <span class="social_icons-hover">
                  <i class="fa-brands fa-instagram"></i>
                </span>
                    </div>
                </div>

                <hr class="text-light"/>
                <div
                    class="d-flex flex-wrap justify-content-center justify-content-lg-between text-light"
                >
                    <p>Powered by Rumman Tech</p>
                    <p>Alkbous Group © 2021 All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<a id="toTop" class="back-to-top" href="#" title="{{ __( 'Back to top' ) }}">
    <div class="top-icon"></div>
</a>

<!--======= LOGIN MODAL START =======-->
<div
    class="modal fade"
    id="login_modal"
    data-backdrop="static"
    data-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body position-relative p-0">
                <button
                    type="button"
                    class="btn-close position-absolute end-0 top-0 m-3"
                    data-dismiss="modal"
                    aria-label="Close"
                ></button>
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="/assets/img/modalImage.png" class="img-fluid" alt="" />
                    </div>
                    <div class="col-lg-6 p-0 pt-4 pe-lg-3">
                        <form method="POST" action="{{ airoute('login') }}">
                            @csrf
                        <h3 class="text-darkblue text-darkblue text-center">Login</h3>
                        <div
                            class="d-flex justify-content-center phone-input-wrapper position-relative mt-5"
                        >
                            <p class="m-0 phone-labels">Phone Number</p>
                            <select name="" id="" class="country-code">
                                <option value="+978">+978</option>
                                <option value="+974">+974</option>
                                <option value="+977">+977</option>
                                <option value="+970">+970</option>
                                <option value="+971">+971</option>
                                <option value="+900">+900</option>
                            </select>
                            {{--<input type="number" class="phone-input" />--}}
                            <input id="email" type="email" name="email" class="phone-input" />
                        </div>
                        <div
                            class="d-flex mb-2 phone-input-wrapper position-relative mt-5"
                        >
                            <p class="m-0 phone-labels">Password</p>
                            <span
                                class="position-absolute top-0 end-0 mt-2 pe-2 text-secondary"
                            ><i class="fa-solid fa-eye"></i
                                ></span>
                            <input id="password" type="password" name="password" class="phone-input" />
                            <p id="forget-password-button"
                                class="m-0 password-forgot-labels text-secondary hc hu"
                                data-toggle="modal"
                                data-target="#forgot_password_modal"
                            >
                                Forget Password ?
                            </p>
                        </div>
                        <button class="sendbtn mt-5 d-block mx-auto">Login</button>
                        </form>
                        <div
                            class="border-top d-block w-75 mx-auto mt-4 mb-4 position-relative"
                        >
                            <p
                                class="bg-light position-absolute top-0 start-50 translate-middle px-2"
                            >
                                Or Login With
                            </p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <img
                                src="/assets/img/google.png"
                                class="img-fluid mx-2 hc"
                                alt=""
                            />
                            <img
                                src="/assets/img/facebook.png"
                                class="img-fluid mx-2 hc"
                                alt=""
                            />
                        </div>
                        <p class="text-secondary text-center mt-3">
                            Don't have an account?
                            <span id="signup-button"
                                class="fw-bold text-darkblue hc hu"
                                data-bs-toggle="modal"
                                data-bs-target="#signup_modal"
                            >Sign up Now</span
                            >
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-4 bg-darkblue"></div>
        </div>
    </div>
</div>
<!-- ========= LOGIN MODAL END ======== -->

<!--======= SIGNUP MODAL START =======-->
<div
    class="modal fade"
    id="signup_modal"
    data-backdrop="static"
    data-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body position-relative p-0">
                <button
                    type="button"
                    class="btn-close position-absolute end-0 top-0 m-3"
                    data-dismiss="modal"
                    aria-label="Close"
                ></button>
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <img
                            src="/assets/img/modalImage.png"
                            class="img-fluid modalimages"
                            alt=""
                        />
                    </div>
                    <div class="col-lg-6 p-0 pt-2 pe-lg-3">
                        <h3 class="text-darkblue text-darkblue text-center">Sign Up</h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-10 mx-auto">
                                    <div class="d-flex flex-column flex-md-column">
                                        <div>
                                            <p class="m-0">First Name</p>
                                            <input type="text" class="phone-input" />
                                        </div>
                                        <div class="ms-md-1">
                                            <p class="m-0">Last Name</p>
                                            <input type="text" class="phone-input" />
                                        </div>
                                    </div>

                                    <p class="m-0 mt-2">Phone Number</p>
                                    <div
                                        class="d-flex justify-content-center phone-input-wrapper-signup position-relative mt-0"
                                    >
                                        <select name="" id="" class="country-code">
                                            <option value="+978">+978</option>
                                            <option value="+974">+974</option>
                                            <option value="+977">+977</option>
                                            <option value="+970">+970</option>
                                            <option value="+971">+971</option>
                                            <option value="+900">+900</option>
                                        </select>
                                        <input type="number" class="phone-input-signup" />
                                    </div>
                                    <p class="m-0 mt-2">Email</p>
                                    <input type="Email" class="phone-input-signup" />
                                    <p class="m-0 mt-2">Date Of Birth</p>
                                    <input type="date" class="phone-input-signup" />
                                    <p class="m-0 mt-2">Nationality</p>
                                    <select name="" id="" class="phone-input-signup">
                                        <option value="Jordan">Jordan</option>
                                        <option value="Saudi">Saudi Arabia</option>
                                    </select>
                                    <p class="m-0 mt-2">Delivery City</p>
                                    <select name="" id="" class="phone-input-signup">
                                        <option value="Jeddah">Jeddah</option>
                                        <option value="ny">New York</option>
                                    </select>
                                    <p class="m-0 mt-2">Password</p>
                                    <input type="password" class="phone-input-signup" />
                                    <div class="d-flex align-items-baseline mt-2">
                                        <input type="checkbox" />
                                        <p class="m-0 ms-1">
                                            By continuing, you confirm that you have read and
                                            agreed to all purchasing policies, Terms and
                                            Conditions, and Privacy Policy on the website.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button id="signup-done-button" class="sendbtn mt-3 d-block mx-auto"
                                data-toggle="modal"
                                data-target="#signup_done_modal"
                        >Sign Up</button>

                        <p class="text-secondary text-center mt-2">
                            You already have an account?
                            <span id="login-button-modal"
                                class="fw-bold text-darkblue hc hu"
                                data-toggle="modal"
                                data-target="#login_modal"
                            >Login</span
                            >
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-4 bg-darkblue"></div>
        </div>
    </div>
</div>
<!-- ========= SIGNUP MODAL END ======== -->

<!--======= PASSWORD FORGET MODAL START =======-->
<div
    class="modal fade"
    id="forgot_password_modal"
    data-backdrop="static"
    data-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body position-relative p-0">
                <button
                    type="button"
                    class="btn-close position-absolute end-0 top-0 m-3"
                    data-dismiss="modal"
                    aria-label="Close"
                ></button>
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="/assets/img/modalImage.png" class="img-fluid" alt="" />
                    </div>
                    <div class="col-lg-6 p-0 pt-4 pe-lg-3">
                        <h3 class="text-darkblue text-darkblue text-center">
                            Forget Password
                        </h3>

                        <span class="keyIcon"
                        ><i class="fa-sharp fa-solid fa-key"></i
                            ></span>

                        <p class="text-secondary text-center mt-3">
                            Please enter your email address to send you a verification
                            link to reset your password
                        </p>

                        <div
                            class="d-flex justify-content-center phone-input-wrapper position-relative mt-5"
                        >
                            <p class="m-0 phone-labels">Email</p>

                            <input type="email" class="phone-input" />
                        </div>

                        <button id="new-password-button"
                            class="sendbtn mt-3 d-block mx-auto"
                            data-toggle="modal"
                            data-target="#new_password_modal"
                        >
                            Continue
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-4 bg-darkblue"></div>
        </div>
    </div>
</div>
<!-- ========= PASSWORD FORGET MODAL END ======== -->

<!--======= NEW PASSWORD MODAL START =======-->
<div
    class="modal fade"
    id="new_password_modal"
    data-backdrop="static"
    data-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body position-relative p-0">
                <button
                    type="button"
                    class="btn-close position-absolute end-0 top-0 m-3"
                    data-dismiss="modal"
                    aria-label="Close"
                ></button>
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="/assets/img/modalImage.png" class="img-fluid" alt="" />
                    </div>
                    <div class="col-lg-6 p-0 pt-4 pe-lg-3">
                        <h3 class="text-darkblue text-darkblue text-center">
                            New Password
                        </h3>

                        <span class="keyIcon"
                        ><i class="fa-sharp fa-solid fa-key"></i
                            ></span>

                        <div
                            class="d-flex justify-content-center phone-input-wrapper position-relative mt-4"
                        >
                            <p class="m-0 phone-labels">New Password</p>

                            <input type="text" class="phone-input" />
                        </div>
                        <div
                            class="d-flex justify-content-center phone-input-wrapper position-relative mt-5"
                        >
                            <p class="m-0 phone-labels">Confirm Password</p>

                            <input type="text" class="phone-input" />
                        </div>

                        <button id="new-password-done-button"
                            class="sendbtn mt-3 d-block mx-auto"
                            data-toggle="modal"
                            data-target="#new_password_done_modal"
                        >
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-4 bg-darkblue"></div>
        </div>
    </div>
</div>
<!-- ========= NEW PASSWORD MODAL END ======== -->

<!--======= NEW PASSWORD DONE MODAL START =======-->
<div
    class="modal fade"
    id="new_password_done_modal"
    data-backdrop="static"
    data-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body position-relative p-0">
                <button
                    type="button"
                    class="btn-close position-absolute end-0 top-0 m-3"
                    data-dismiss="modal"
                    aria-label="Close"
                ></button>
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="/assets/img/modalImage.png" class="img-fluid" alt="" />
                    </div>
                    <div class="col-lg-6 p-0 pt-4 pe-lg-3">
                        <h3 class="text-darkblue text-darkblue text-center">
                            New Password
                        </h3>

                        <span class="checkIcon"><i class="fa-solid fa-check"></i></span>

                        <p class="text-secondary text-center my-5">
                            Your password has been changed successfully!
                        </p>

                        <button
                            class="sendbtn mt-4 mb-3 d-block mx-auto"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            Done
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-4 bg-darkblue"></div>
        </div>
    </div>
</div>
<!-- ========= NEW PASSWORD DONE MODAL END ======== -->

<!--======= SIGN-UP DONE MODAL START =======-->
<div
    class="modal fade"
    id="signup_done_modal"
    data-backdrop="static"
    data-keyboard="false"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body position-relative p-0">
                <button
                    type="button"
                    class="btn-close position-absolute end-0 top-0 m-3"
                    data-dismiss="modal"
                    aria-label="Close"
                ></button>
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="/assets/img/modalImage.png" class="img-fluid" alt="" />
                    </div>
                    <div class="col-lg-6 p-0 pt-4 pe-lg-3">
                        <h3 class="text-darkblue text-darkblue text-center">Sign Up</h3>

                        <span class="checkIcon"><i class="fa-solid fa-check"></i></span>
                        <h6 class="text-darkblue fw-bold mt-3 text-center">
                            A Verification link has been sent to your email
                        </h6>
                        <p class="text-secondary text-center my-3">
                            Please click on the link that has just been sent to your email
                            account to verify your email and continue the registration
                            process.
                        </p>

                        <button
                            class="sendbtn mt-4 mb-3 d-block mx-auto"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            Done
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer py-4 bg-darkblue"></div>
        </div>
    </div>
</div>
<!-- ========= SIGN-UP DONE MODAL END ======== -->

<!-- Scripts -->
<script src="{{ asset('vendor/shop/themes/tea-theme/app.js?v=' . config( 'shop.version', 1 ) ) }}"></script>
<script src="{{ asset('vendor/shop/themes/tea-theme/aimeos.js?v=' . config( 'shop.version', 1 ) ) }}"></script>
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
@yield('aimeos_scripts')
<script>
    $(document).ready(function () {
        var video = $("#myVideo").get(0);
        var playPauseBtn = $("#playPauseBtn");
        // toggle play/pause on button click
        playPauseBtn.on("click", function () {
            if (video.paused) {
                video.play();
                playPauseBtn.hide();
            } else {
                video.pause();
                playPauseBtn.show();
            }
        });

        // show play button on video end
        video.onended = function () {
            playPauseBtn.show();
        };

        // show/hide play button on video play/pause
        video.onplay = function () {
            playPauseBtn.hide();
        };

        video.onpause = function () {
            playPauseBtn.show();
        };
    });

    // $(".dropdown-menu").click(function (event) {
    //   event.stopPropagation();
    // });

    // $(".dropdown").click(function () {
    //   $(this).find(".cartdropdown").toggle();
    // });

    // $("#close-dropdown-btn").click(function (event) {
    //   event.stopPropagation();
    // });

    $(".dropdown-menu").on("click.bs.dropdown", function (e) {
        e.stopPropagation();
    });

    // Close dropdown on click of specific button
    $(".close-dropdown-btn").click(function (event) {
        event.stopPropagation();
        var dropdownMenuId = $(this).data("target");
        $(dropdownMenuId).dropdown("hide");
    });


    $(".close-dropdown-btn").click(function (event) {
        event.stopPropagation();
        var dropdownMenuId = $(this).data("target");
        $(dropdownMenuId).dropdown("hide");
    });

    // Close other dropdowns when one is opened
    $(".dropdown-toggle").on("click", function () {
        var dropdownMenuId = $(this).attr("id");
        $(".dropdown-menu").not("#" + dropdownMenuId + "-menu").dropdown("hide");
    });

</script>

<script>
    $(function () {
        // Owl Carousel
        $(".autoplay").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    });
</script>
<script>
    $(document).ready(function () {
        console.log("sd"),
            // var owl = $(".owl-carousel");
            $(".myslider").owlCarousel({
                items: 1,
                navigation: false,
                loop: true,
                nav: false,
                dots: true,
            });
        $(".newslider").owlCarousel({
            loop: true,
            margin: 10,
            responsiveClass: true,
            dots: false,
            navText: [
                "<i class='fa fa-chevron-left'></i>",
                "<i class='fa fa-chevron-right'></i>",
            ],
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                    dots: true,
                },
                600: {
                    items: 2,
                    nav: false,
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: false,
                },
                1200: {
                    items: 4,
                    nav: true,
                    loop: false,
                },
            },
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $('#login-button').on('click', function (e){
        e.preventDefault();
        $('#login_modal').modal('toggle')
    })

    $('#signup-button').on('click', function (e){
        e.preventDefault();
        $('#login_modal').modal('hide')
        $('#signup_modal').modal('show')
    });

    $('#login-button-modal').on('click', function (e){
        e.preventDefault();
        $('#signup_modal').modal('hide')
        $('#login_modal').modal('show')
    });

    $("#signup-done-button").on('click', function (e) {
        $('#signup_modal').modal('hide')
    });

    $("#forget-password-button").on('click', function (e) {
        $('#login_modal').modal('hide')
    });

    $("#new-password-button").on('click', function (e) {
        $('#forgot_password_modal').modal('hide')
    });

    $("#new-password-done-button").on('click', function (e) {
        $('#new_password_modal').modal('hide')
    });

    $('#checkout-button-final').on('click', function (e) {
        e.preventDefault();
        var processForm = $(this).closest('form');
        $('#final-continue-process-button').off().on('click', function (e) {
            e.preventDefault();
            processForm.submit();
        })
    })

</script>
</body>
</html>
