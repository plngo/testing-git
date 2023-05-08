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
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-6 my-2"><p class="m-0 fw-semibold">First Name</p>
                            <input type="text" class="contact-input shadow-sm" placeholder="First Name" />
                        </div>
                        <div class="col-md-6 my-2"><p class="m-0 fw-semibold">Last Name</p>
                            <input type="text" class="contact-input shadow-sm" placeholder="Last Name" />
                        </div>
                        <div class="col-md-6 my-2"><p class="m-0 fw-semibold">Email</p>
                            <input type="text" class="contact-input shadow-sm" placeholder="Email" />
                        </div>
                        <div class="col-md-6 my-2"><p class="m-0 fw-semibold">Phone Number</p>
                            <input type="text" class="contact-input shadow-sm" placeholder="Phone" />
                        </div>
                        <div class="col-md-12 my-2"><p class="m-0 fw-semibold">Your Message</p>
                            <!-- <input type="text" class="contact-input" placeholder="Phone" /> -->
                            <textarea name="" id="" rows="5" class="contact-textarea shadow-sm" placeholder="Write Your Message">

     </textarea>
                        </div>
                        <button class="sendbtn my-3 mx-auto mx-lg-0 ms-lg-3">Send</button>

                    </div>

                </div>
                <div class="col-lg-6 my-3">
                    <div class="d-flex align-items-center">
          <span class="contact-icons">
            <i class="fa-sharp fa-solid fa-location-dot"></i>
          </span>
                        <p class="m-0 fw-medium ms-2 ms-md-3">Amman- 7th circle - Al Rawabi - Abd Ar Rahman Khalifah St. -Building 25 first floor</p>
                    </div>
                    <div class="d-flex align-items-center mt-1">
          <span class="contact-icons">
            <i class="fa-solid fa-envelope"></i>
          </span>
                        <p class="m-0 fw-medium ms-2 ms-md-3">Ahmad.rumaneh@rumman.tech</p>
                    </div>
                    <div class="d-flex align-items-center mt-1">
          <span class="contact-icons">
            <i class="fa-solid fa-mobile-button"></i>
          </span>
                        <p class="m-0 fw-medium ms-2 ms-md-3">+962 782191585</p>
                    </div>
                    <div class="d-flex align-items-center mt-1">
          <span class="contact-icons">
            <i class="fa-solid fa-fax"></i>
          </span>
                        <p class="m-0 fw-medium ms-2 ms-md-3">+4134687</p>
                    </div>
                    <h4 class="text-darkblue fw-bold text-center my-3">FOLLOW US</h4>
                    <div
                        class="d-flex justify-content-center align-items-center social_icons"
                    >
                <span class="social_icons-hover text-darkblue">
                  <i class="fa-brands fa-twitter"></i>
                </span>
                        <span class="mx-4 social_icons-hover text-darkblue">
                  <i class="fa-brands fa-facebook-f"></i>
                </span>
                        <span class="social_icons-hover text-darkblue">
                  <i class="fa-brands fa-instagram"></i>
                </span>
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



