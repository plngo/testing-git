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
    <h2 class="text-center fw-semibold text-darkblue my-4">About Us</h2>
    <div class="container-fluid position-relative">
        <img src="/assets/img/aobutus-leaf1.png" class="d-none d-lg-block about-leafs" alt="">
        <img src="/assets/img/aboutus-leaf2.png" class="d-none d-lg-block about-leaf1" alt="">
        <div class="container mt-4 mt-lg-5 pt-lg-5">
            <div class="row">
                <div class="col-md-6">
                    <h2>WHO WE ARE</h2>
                    <p class="text-secondary">
                        Fresh from Our coffee Plantations to Your Cup Al-Kbous coffee comes
                        from the finest natural coffee plantations around the world.
                    </p>

                    <p class="text-secondary">
                        Yemen is among the first countries that have planted and exported
                        coffee. The world famous “Mokha Coffee” is named after the Yemeni
                        port of Mokha. The taste of Ye\meni Coffee is spectacularly unique
                        in comparison with that of other countries due to the geographical
                        climate and soil. And from the Salt Market “Souq Almilh” in the old
                        city of Sana’a, in 1938 Haj Mohammed Hassan Al Kbous began his
                        journey in roasting and selling coffee. Since that time, we, at Al
                        Kbous Group, worked to develop the traditional methods of roasting
                        and grinding coffee by introducing the first coffee factory in Yemen
                        in 1951. Today, Al Kbous Group is considered as one of the largest
                        coffee trading groups in the region.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="aboutus-img position-relative mx-auto d-block">
                        <img src="/assets/img/aboutus1.png" class="img-fluid aboutus-small" alt="">
                        <img src="/assets/img/aboutus.png" class=" aboutus-big mt-4" alt="">
                        <img src="/assets/img/aboutus-leaf3.png" class="aboutus-left d-none d-lg-block" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="d-flex flex-wrap justify-content-center">
            <div class="d-flex flex-column align-items-center m-3 m-lg-5">
                <img src="/assets/img/world.png" class="img-fluid my-image" alt="">
                <h5 class="text-center mt-2">Presence</h5>
                <h6 class="text-darkblue text-center">17</h6>
            </div>
            <div class="d-flex flex-column align-items-center m-3 m-lg-5">
                <img src="/assets/img/factories.png" class="img-fluid my-image" alt="">
                <h5 class="text-center mt-2">Factories</h5>
                <h6 class="text-darkblue text-center">5</h6>
            </div>
            <div class="d-flex flex-column align-items-center m-3 m-lg-5">
                <img src="/assets/img/distributer.png" class="img-fluid my-image" alt="">
                <h5 class="text-center mt-2">Distributer</h5>
                <h6 class="text-darkblue text-center">76</h6>
            </div>
            <div class="d-flex flex-column align-items-center m-3 m-lg-5">
                <img src="/assets/img/productcup.png" class="img-fluid my-image" alt="">
                <h5 class="text-center mt-2">Products</h5>
                <h6 class="text-darkblue text-center">78</h6>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0">
        <div class="position-relative p-0 w-100">
            <video
                controls
                class="teaVideo position-relative"
                id="myVideo"
                onclick="playVideo()"
                poster="/assets/img/4020500 1.png"
            >
                <source src="/assets/img/coffee.mp4" type="video/mp4" />
            </video>
            <div
                onclick="playVideo()"
                class="position-absolute top-50 start-50 translate-middle big-play-btn"
                id="playPauseBtn"
            >
                <i class="fa-sharp fa-solid fa-play"></i>
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



