@extends('tea-theme::base')
{{--@section('aimeos_body')
    <?= $aibody['catalog/home'] ?? '' ?>
@endsection--}}
@section('aimeos_body')

    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 my-4 d-flex justify-content-center">
                <div class="menu-btns w-100">
                    <h3>Home > Menu</h3>
                    <button class="not-selected-menu mt-4 d-flex align-items-center justify-content-start"><img src="/assets/img/userIcon.png" class="img-fluid new_icons ms-2" alt=""><a href="/profile" class="ms-3 ms-3 button-menu-left">My Account</a></button>
                    <button class="not-selected-menu d-flex m-0 accounts-head my-2 align-items-center justify-content-start"><img src="/assets/img/bagIcon.png" class="img-fluid new_icons ms-2" alt=""><a href="/profile/orders" class="ms-3 ms-3 button-menu-left"> My Orders</a></button>
                    <button class=" selected-menu d-flex m-0 accounts-head my-2 align-items-center justify-content-start"><img src="/assets/img/heartIcon.png" class="img-fluid new_icons ms-2" alt=""><a href="/profile/favorites" class="ms-3 ms-3 button-menu-left"> My Favorites</a></button>
                    <button class="not-selected-menu d-flex m-0 accounts-head my-2 align-items-center justify-content-start"><img src="/assets/img/heartIconNav.png" class="img-fluid new_icons ms-2" alt=""><a href="#" class="ms-3 ms-3 button-menu-left"> Log Out</a></button>
                </div>
            </div>
            <div class="col-lg-9 my-4">
                <h5 class="text-center text-md-start">Favorites</h5>
                <div class="underliness d-none d-lg-block"></div>
                <div class="row">
                    <div class="col-lg-4 my-3">
                        <div class="product-card p-2 pb-3 position-relative">
                            <div class="ribbon ribbon-top-left"><span class="text-center pe-3">OFFER 30%</span></div>

                            <img
                                src="/assets/img/product3.png"
                                class="img-fluid product-image"
                                alt=""
                            />
                            <div class="d-flex my-2 justify-content-between">
                                <p class="h6 m-0 text-dark">MORINGA APPLE CINNAMON</p>
                                <p class="h6 m-0 text-darkblue weights">200 g</p>
                            </div>
                            <p class="text-secondary m-0 fw-normal my-2 product-description">
                                is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been
                            </p>
                            <div class="d-flex mt-3 justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <h4 class="m-0">3.50 JD</h4>
                                    <h6 class="m-0 ms-1 text-secondary"><del>3.50 JD</del></h6>
                                </div>
                                <div class="d-flex align-items-center">
                      <span class="increase-item-icon">
                        <i class="fa-solid fa-plus"></i>
                      </span>
                                    <h4 class="m-0 mx-2">0</h4>
                                    <span class="decrease-item-icon">
                        <i class="fa-solid fa-minus"></i>
                      </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        <div class="product-card p-2 pb-3">
                            <img
                                src="/assets/img/product1.png"
                                class="img-fluid product-image"
                                alt=""
                            />
                            <div class="d-flex my-2 justify-content-between">
                                <p class="h6 m-0 text-dark">MORINGA APPLE CINNAMON</p>
                                <p class="h6 m-0 text-darkblue weights">200 g</p>
                            </div>
                            <p
                                class="text-secondary m-0 fw-normal my-2 product-description"
                            >
                                is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been
                            </p>
                            <div
                                class="d-flex mt-3 justify-content-between align-items-center"
                            >
                                <div class="d-flex align-items-center">
                                    <h4 class="m-0">3.50 JD</h4>
                                    <h6 class="m-0 ms-1 text-secondary"><del>3.50 JD</del></h6>
                                </div>
                                <div class="d-flex align-items-center">
                      <span class="increase-item-icon">
                        <i class="fa-solid fa-plus"></i>
                      </span>
                                    <h4 class="m-0 mx-2">0</h4>
                                    <span class="decrease-item-icon">
                        <i class="fa-solid fa-minus"></i>
                      </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        <div class="product-card p-2 pb-3">
                            <img
                                src="/assets/img/product1.png"
                                class="img-fluid product-image"
                                alt=""
                            />
                            <div class="d-flex my-2 justify-content-between">
                                <p class="h6 m-0 text-dark">MORINGA APPLE CINNAMON</p>
                                <p class="h6 m-0 text-darkblue weights">200 g</p>
                            </div>
                            <p
                                class="text-secondary m-0 fw-normal my-2 product-description"
                            >
                                is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been
                            </p>
                            <div
                                class="d-flex mt-3 justify-content-between align-items-center"
                            >
                                <div class="d-flex align-items-center">
                                    <h4 class="m-0">3.50 JD</h4>
                                    <h6 class="m-0 ms-1 text-secondary"><del>3.50 JD</del></h6>
                                </div>
                                <div class="d-flex align-items-center">
                      <span class="increase-item-icon">
                        <i class="fa-solid fa-plus"></i>
                      </span>
                                    <h4 class="m-0 mx-2">0</h4>
                                    <span class="decrease-item-icon">
                        <i class="fa-solid fa-minus"></i>
                      </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        <div class="product-card p-2 pb-3">
                            <img
                                src="/assets/img/product1.png"
                                class="img-fluid product-image"
                                alt=""
                            />
                            <div class="d-flex my-2 justify-content-between">
                                <p class="h6 m-0 text-dark">MORINGA APPLE CINNAMON</p>
                                <p class="h6 m-0 text-darkblue weights">200 g</p>
                            </div>
                            <p
                                class="text-secondary m-0 fw-normal my-2 product-description"
                            >
                                is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been
                            </p>
                            <div
                                class="d-flex mt-3 justify-content-between align-items-center"
                            >
                                <div class="d-flex align-items-center">
                                    <h4 class="m-0">3.50 JD</h4>
                                    <h6 class="m-0 ms-1 text-secondary"><del>3.50 JD</del></h6>
                                </div>
                                <div class="d-flex align-items-center">
                      <span class="increase-item-icon">
                        <i class="fa-solid fa-plus"></i>
                      </span>
                                    <h4 class="m-0 mx-2">0</h4>
                                    <span class="decrease-item-icon">
                        <i class="fa-solid fa-minus"></i>
                      </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        <div class="product-card p-2 pb-3">
                            <img
                                src="/assets/img/product1.png"
                                class="img-fluid product-image"
                                alt=""
                            />
                            <div class="d-flex my-2 justify-content-between">
                                <p class="h6 m-0 text-dark">MORINGA APPLE CINNAMON</p>
                                <p class="h6 m-0 text-darkblue weights">200 g</p>
                            </div>
                            <p
                                class="text-secondary m-0 fw-normal my-2 product-description"
                            >
                                is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been
                            </p>
                            <div
                                class="d-flex mt-3 justify-content-between align-items-center"
                            >
                                <div class="d-flex align-items-center">
                                    <h4 class="m-0">3.50 JD</h4>
                                    <h6 class="m-0 ms-1 text-secondary"><del>3.50 JD</del></h6>
                                </div>
                                <div class="d-flex align-items-center">
                      <span class="increase-item-icon">
                        <i class="fa-solid fa-plus"></i>
                      </span>
                                    <h4 class="m-0 mx-2">0</h4>
                                    <span class="decrease-item-icon">
                        <i class="fa-solid fa-minus"></i>
                      </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 my-3">
                        <div class="product-card p-2 pb-3">
                            <img
                                src="/assets/img/product1.png"
                                class="img-fluid product-image"
                                alt=""
                            />
                            <div class="d-flex my-2 justify-content-between">
                                <p class="h6 m-0 text-dark">MORINGA APPLE CINNAMON</p>
                                <p class="h6 m-0 text-darkblue weights">200 g</p>
                            </div>
                            <p
                                class="text-secondary m-0 fw-normal my-2 product-description"
                            >
                                is simply dummy text of the printing and typesetting industry.
                                Lorem Ipsum has been
                            </p>
                            <div
                                class="d-flex mt-3 justify-content-between align-items-center"
                            >
                                <div class="d-flex align-items-center">
                                    <h4 class="m-0">3.50 JD</h4>
                                    <h6 class="m-0 ms-1 text-secondary"><del>3.50 JD</del></h6>
                                </div>
                                <div class="d-flex align-items-center">
                      <span class="increase-item-icon">
                        <i class="fa-solid fa-plus"></i>
                      </span>
                                    <h4 class="m-0 mx-2">0</h4>
                                    <span class="decrease-item-icon">
                        <i class="fa-solid fa-minus"></i>
                      </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex my-4 my-lg-5 align-items-center justify-content-center">
                        <span class="pagination"><i class="fa-solid fa-angle-left"></i></span>
                        <h5 class="m-0 mx-3">1/3</h5>
                        <span class="pagination"><i class="fa-solid fa-angle-right"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('aimeos_header')
    <?= $aiheader['locale/select'] ?? '' ?>
    <?= $aiheader['basket/mini'] ?? '' ?>
    <?= $aiheader['catalog/search'] ?? '' ?>
    <?= $aiheader['catalog/tree'] ?? '' ?>
@stop

@section('aimeos_head_basket')
    <?= $aibody['basket/mini'] ?? '' ?>
@stop

@section('aimeos_head_nav')
@stop

@section('aimeos_head_locale')
    <?= $aibody['locale/select'] ?? '' ?>
@stop

@section('aimeos_head_search')
    <?= $aibody['catalog/search'] ?? '' ?>
@stop



