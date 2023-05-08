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
                    <button class="selected-menu mt-4 d-flex align-items-center justify-content-start"><img src="/assets/img/userIcon.png" class="img-fluid new_icons ms-2" alt=""><a href="/profile" class="ms-3 ms-3 button-menu-left">My Account</a></button>
                    <button class="not-selected-menu d-flex m-0 accounts-head my-2 align-items-center justify-content-start"><img src="/assets/img/bagIcon.png" class="img-fluid new_icons ms-2" alt=""><a href="/profile/orders" class="ms-3 ms-3 button-menu-left"> My Orders</a></button>
                    <button class="not-selected-menu d-flex m-0 accounts-head my-2 align-items-center justify-content-start"><img src="/assets/img/heartIcon.png" class="img-fluid new_icons ms-2" alt=""><a href="/profile/favorites" class="ms-3 ms-3 button-menu-left"> My Favorites</a></button>
                    <button class="not-selected-menu d-flex m-0 accounts-head my-2 align-items-center justify-content-start" data-toggle="modal" data-target="#logout_modal"><img src="/assets/img/heartIconNav.png" class="img-fluid new_icons ms-2" alt=""><a href="#" class="ms-3 ms-3 button-menu-left"> Log Out</a></button>
                </div>
            </div>
            <div class="col-lg-9 my-4">
                <h5 class="text-center text-md-start">Password</h5>
                <div class="underliness d-none d-lg-block"></div>
                <div class="row">
                    <div class="col-md-8 col-lg-6">
                        <div class="my-3">
                            <p class="m-0">Current Password</p>
                            <input type="text" placeholder="********" class="phone-input px-2" />
                            <div class="p text-end text-secondary hu hc">Forgot Password ?</div>
                        </div>
                        <div class="my-3 mt-4">
                            <p class="m-0">New Password</p>
                            <input type="text" placeholder="********" class="phone-input px-2" />
                        </div>
                        <div class="my-3 mt-4">
                            <p class="m-0">Confirm New Password</p>
                            <input type="text" placeholder="********" class="phone-input px-2" />
                        </div>
                        <div class="d-flex justify-content-between">
                            <button class="btn sendbtn bg-light text-dark">Cancel</button>
                            <button class="btn bg-darkblue sendbtn">Save</button>
                        </div>
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



