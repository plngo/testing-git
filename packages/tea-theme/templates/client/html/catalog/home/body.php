<?php

$enc = $this->encoder();
$pos = 0;

$lazy = false;
?>
<br>
<br>
<br>
<div class="container-fluid p-0">
    <div class="myslider owl-carousel owl-theme w-100">
        <div class="item w-100 position-relative">
            <div
                class="d-flex ps-lg-5 align-items-center h-100 position-absolute"
            >
                <div
                    class="container d-flex flex-column justify-content-center align-items-start"
                >
                    <h1 class="m- text-light header-heading fw-bold">TEA AS IT</h1>
                    <h1 class="m- text-light header-heading fw-bold">SHOULD BE !</h1>
                    <h3 class="m- text-light">Since 1948</h3>
                    <a href="/categories" class="btn p-2 px-3 order-now-btn my-3 fw-semibold">
                        Order Now
                    </a>
                </div>
            </div>

            <img src="/assets/img/4020500 1.png" class="img-fluid img-slide" alt=""/>
        </div>
        <div class="item w-100">
            <img src="/assets/img/slide2.jpg" class="img-fluid img-slide" alt=""/>
        </div>
        <div class="item w-100">
            <img src="/assets/img/slide3.jpg" class="img-fluid img-slide" alt=""/>
        </div>
        <div class="item w-100">
            <img src="/assets/img/slide4.jpg" class="img-fluid img-slide" alt=""/>
        </div>
    </div>
</div>
<div class="container-fluid position-relative d-none d-lg-block">
    <div class="d-flex position-absolute top-0 end-0">
        <img src="/assets/img/leaf1.png" class="img-fluid leaf-img1" alt=""/>
        <img src="/assets/img/leaf2.png" class="img-fluid leaf-img" alt=""/>
    </div>
</div>


<!--<div class="container-fluid my-5 position-relative">

    <div class="d-flex d-none d-lg-block position-absolute start-0 top-0 align-items-end">
        <img src="/assets/img/leaf3.png" class="" height="200px" alt="">
        <img src="/assets/img/leaf4.png" class="ms-5 ps-5 mt-5 pt-5" width="200px" height="150px" alt="">
    </div>
    <img src="/assets/img/leaf5.png" class="position-absolute d-none d-lg-block end-0 top-0" width="160px"
         alt="">


    <div class="container">
        <h1 class="fw-semibold my-4 text-center text-darkblue mb-lg-5 pb-lg-3">
            Some of Our tea products
        </h1>
        <div class="d-flex my-5 mx-auto toggle-btn">
            <div class="">
                <input
                    type="radio"
                    class="btn-check"
                    name="options"
                    id="option1"
                    autocomplete="off"
                    checked
                />
                <label class="btn leafbtn px-3" for="option1">Most Selling</label>
            </div>
            <div class="">
                <input
                    type="radio"
                    class="btn-check"
                    name="options"
                    id="option2"
                    autocomplete="off"
                />
                <label class="btn leafbtn px-3" for="option2">Offers</label>
            </div>

        </div>
        <div class="mt-lg-5 pt-lg-5"></div>
        <div class="mt-lg-5 pt-lg-2"></div>

        <div class="newslider owl-carousel owl-theme position-relative">
            <div class="product-card p-2 pb-3 position-relative">

            <span class="heartIcon"
            ><i class="fa-sharp fa-regular fa-heart"></i
                ></span>
                <img
                    src="/assets/img/product1.png"
                    class="img-fluid product-image"
                    alt=""
                />
                <div class="d-flex my-2 justify-content-between">
                    <p class="h6 m-0 text-dark">MORINGA APPLE CINNAMON</p>
                    <p class="h6 m-0 text-darkblue">200 g</p>
                </div>
                <p class="text-secondary m-0 fw-normal my-2 product-description">
                    is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been
                </p>
                <div class="d-flex mt-3 justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <h4 class="m-0">3.50 JD</h4>
                        <h6 class="m-0 ms-1 text-secondary">
                            <del>3.50 JD</del>
                        </h6>
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
            <div class="product-card p-2 pb-3">
                <img
                    src="/assets/img/prodcut2.png"
                    class="img-fluid product-image"
                    alt=""
                />
                <div class="d-flex my-2 justify-content-between">
                    <p class="h6 m-0 text-dark">MORINGA APPLE CINNAMON</p>
                    <p class="h6 m-0 text-darkblue">200 g</p>
                </div>
                <p class="text-secondary m-0 fw-normal my-2 product-description">
                    is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been
                </p>
                <div class="d-flex mt-3 justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <h4 class="m-0">3.50 JD</h4>
                        <h6 class="m-0 ms-1 text-secondary">
                            <del>3.50 JD</del>
                        </h6>
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
            <div class="product-card p-2 pb-3 position-relative">
                <div class="ribbon ribbon-top-left"><span class="text-center pe-3">OFFER 30%</span></div>

                <img
                    src="/assets/img/product3.png"
                    class="img-fluid product-image"
                    alt=""
                />
                <div class="d-flex my-2 justify-content-between">
                    <p class="h6 m-0 text-dark">MORINGA APPLE CINNAMON</p>
                    <p class="h6 m-0 text-darkblue">200 g</p>
                </div>
                <p class="text-secondary m-0 fw-normal my-2 product-description">
                    is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been
                </p>
                <div class="d-flex mt-3 justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <h4 class="m-0">3.50 JD</h4>
                        <h6 class="m-0 ms-1 text-secondary">
                            <del>3.50 JD</del>
                        </h6>
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
            <div class="product-card p-2 pb-3">
                <img
                    src="/assets/img/product1.png"
                    class="img-fluid product-image"
                    alt=""
                />
                <div class="d-flex my-2 justify-content-between">
                    <p class="h6 m-0 text-dark">MORINGA APPLE CINNAMON</p>
                    <p class="h6 m-0 text-darkblue">200 g</p>
                </div>
                <p class="text-secondary m-0 fw-normal my-2 product-description">
                    is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been
                </p>
                <div class="d-flex mt-3 justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <h4 class="m-0">3.50 JD</h4>
                        <h6 class="m-0 ms-1 text-secondary">
                            <del>3.50 JD</del>
                        </h6>
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
            <div class="product-card p-2 pb-3">
                <img
                    src="/assets/img/product1.png"
                    class="img-fluid product-image"
                    alt=""
                />
                <div class="d-flex my-2 justify-content-between">
                    <p class="h6 m-0 text-dark">MORINGA APPLE CINNAMON</p>
                    <p class="h6 m-0 text-darkblue">200 g</p>
                </div>
                <p class="text-secondary m-0 fw-normal my-2 product-description">
                    is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been
                </p>
                <div class="d-flex mt-3 justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <h4 class="m-0">3.50 JD</h4>
                        <h6 class="m-0 ms-1 text-secondary">
                            <del>3.50 JD</del>
                        </h6>
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
    </div>
    <button class="mt-3 mt-lg-5 see-more-btn">
        See More <i class="fa-solid fa-angles-right"></i>
    </button>
</div>-->


