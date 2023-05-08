<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2016-2022
 */

$enc = $this->encoder();

$selectfcn = function( $list, $key, $value ) {
	return ( isset( $list[$key] ) && $list[$key] == $value ? 'selected="selected"' : '' );
};

/** client/html/account/profile/url/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * @param string Destination of the URL
 * @since 2019.10
 * @see client/html/account/profile/url/controller
 * @see client/html/account/profile/url/action
 * @see client/html/account/profile/url/config
 */

/** client/html/account/profile/url/controller
 * Name of the controller whose action should be called
 *
 * In Model-View-Controller (MVC) applications, the controller contains the methods
 * that create parts of the output displayed in the generated HTML page. Controller
 * names are usually alpha-numeric.
 *
 * @param string Name of the controller
 * @since 2019.10
 * @see client/html/account/profile/url/target
 * @see client/html/account/profile/url/action
 * @see client/html/account/profile/url/config
 */

/** client/html/account/profile/url/action
 * Name of the action that should create the output
 *
 * In Model-View-Controller (MVC) applications, actions are the methods of a
 * controller that create parts of the output displayed in the generated HTML page.
 * Action names are usually alpha-numeric.
 *
 * @param string Name of the action
 * @since 2019.10
 * @see client/html/account/profile/url/target
 * @see client/html/account/profile/url/controller
 * @see client/html/account/profile/url/config
 */

/** client/html/account/profile/url/config
 * Associative list of configuration options used for generating the URL
 *
 * You can specify additional options as key/value pairs used when generating
 * the URLs, like
 *
 *  client/html/<clientname>/url/config = array( 'absoluteUri' => true )
 *
 * The available key/value pairs depend on the application that embeds the e-commerce
 * framework. This is because the infrastructure of the application is used for
 * generating the URLs. The full list of available config options is referenced
 * in the "see also" section of this page.
 *
 * @param string Associative list of configuration options
 * @since 2019.10
 * @see client/html/account/profile/url/target
 * @see client/html/account/profile/url/controller
 * @see client/html/account/profile/url/action
 * @see client/html/url/config
 */

/** client/html/account/profile/url/filter
 * Removes parameters for the detail page before generating the URL
 *
 * For SEO, it's nice to have URLs which contains only required parameters.
 * This setting removes the listed parameters from the URLs. Keep care to
 * remove no required parameters!
 *
 * @param array List of parameter names to remove
 * @since 2019.10
 * @see client/html/account/profile/url/target
 * @see client/html/account/profile/url/controller
 * @see client/html/account/profile/url/action
 * @see client/html/account/profile/url/config
 */

$addr = $this->get( 'addressBilling', [] );
$pos = 0;


?>
<?php if( isset( $this->profileItem ) ) : ?>
    <br><br><br><br><br>
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
            <div class="col-lg-9">
                <div class="col-lg-12 my-4">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom border-dark w-100 pb-1">
                                <div
                                    class="d-flex align-items-center justify-content-between"
                                >
                                    <h6 class="text-center text-md-start m-0">My Account</h6>
                                    <span class="hc text-secondary"
                                    ><i class="fa-solid fa-pen me-1"></i><a class="hc text-secondary" href="/profile/my-account">Edit</a></span
                                    >
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-6">
                                    <p class="m-0 fw-semibold">First Name</p>
                                    <p class="m-0 mt-0 text-secondary">Junaid</p>
                                </div>
                                <div class="col-6">
                                    <p class="m-0 fw-semibold">Last Name</p>
                                    <p class="m-0 mt-0 text-secondary">Ali</p>
                                </div>
                            </div>
                            <div class="my-3">
                                <p class="m-0 fw-semibold">Phone Number</p>
                                <p class="m-0 mt-0 text-secondary">+123456789</p>
                            </div>
                            <div class="my-3">
                                <p class="m-0 fw-semibold">Email</p>
                                <p class="m-0 mt-0 text-secondary"><?= $enc->attr( $this->value( $addr, 'customer.email' ) ) ?></p>
                            </div>
                            <div class="my-3">
                                <p class="m-0 fw-semibold">Date of Birth</p>
                                <p class="m-0 mt-0 text-secondary">01/01/2000</p>
                            </div>
                            <div class="my-3">
                                <p class="m-0 fw-semibold">Nationality</p>
                                <p class="m-0 mt-0 text-secondary">Jordanian</p>
                            </div>
                            <div class="my-3">
                                <p class="m-0 fw-semibold">Delivery City</p>
                                <p class="m-0 mt-0 text-secondary">Dubai</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="border-bottom border-dark w-100 pb-1">
                                <div
                                    class="d-flex align-items-center justify-content-between"
                                >
                                    <h6 class="text-center text-md-start m-0">Password</h6>
                                    <span class="hc text-secondary"
                                    ><i class="fa-solid fa-pen me-1"></i><a class="hc text-secondary" href="/profile/password">Edit</a></span
                                    >
                                </div>
                            </div>
                            <div class="my-3">
                                <p class="m-0 fw-semibold">Password</p>
                                <p class="m-0 mt-0 text-secondary">******************</p>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="border-bottom border-dark w-100 pb-2">
                                <div
                                    class="d-flex align-items-center justify-content-between"
                                >
                                    <h6 class="text-center text-md-start m-0">Addresses</h6>
                                </div>
                            </div>
                            <div class="border p-1 px-2 my-3">
                                <div class="row p-2 justify-content-center">
                                    <div
                                        class="col p-2 mx-1 border hc"
                                        data-toggle="modal"
                                        data-target="#new_address_modal"
                                    >
                                        <div
                                            class="d-flex justify-content-center align-items-center"
                                        >
                                            <div>
                          <span
                              class="increase-item-icon text-center mx-auto d-block"
                          >
                            <i class="fa-solid fa-plus"></i>
                          </span>
                                                <p class="text-secondary m-0 mt-3">New Address</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mx-1 p-2 border position-relative">
                                        <span class="xbtn"><i class="fa-solid fa-x"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="text-secondary">
                                                <p class="m-0">Ahmed Rumaneh</p>
                                                <p class="m-0">123456789</p>
                                                <p class="m-0">Amman JOrdan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-2 pt-0">
                                    <div
                                        class="col mx-1 p-2 border position-relative d-flex align-items-center"
                                    >
                                        <span class="xbtn"><i class="fa-solid fa-x"></i></span>
                                        <div class="d-flex align-items-center">
                                            <div class="text-secondary">
                                                <p class="m-0">Ahmed Rumaneh</p>
                                                <p class="m-0">123456789</p>
                                                <p class="m-0">Amman JOrdan</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col mx-1 p-2 border selected-address position-relative"
                                    >
                                        <span class="xbtn"><i class="fa-solid fa-x"></i></span>
                                        <span class="checkbtn"
                                        ><i class="fa-solid fa-circle-check"></i
                                            ></span>
                                        <div class="d-flex align-items-center">
                                            <div class="text-secondary mt-2 px-2">
                                                <p class="m-0">Ahmed Rumaneh</p>
                                                <p class="m-0">123456789</p>
                                                <p class="m-0">Amman JOrdan</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="border-bottom border-dark w-100 pb-2">
                                <div
                                    class="d-flex align-items-center justify-content-between"
                                >
                                    <h6 class="text-center text-md-start m-0">
                                        Payment Method
                                    </h6>
                                </div>
                            </div>

                            <div
                                class="border my-3 hc p-2 d-flex justify-content-center"
                                data-toggle="modal"
                                data-target="#new_payment_modal"
                            >
                  <span class="increase-item-icon text-center mx-auto d-block">
                    <i class="fa-solid fa-plus"></i>
                    Add New Payment
                  </span>
                            </div>

                            <div
                                class="border p-2 fz-large my-3 d-flex align-items-center position-relative text-secondary"
                            >
                                <i class="fa-solid fa-circle-check text-darkblue"></i>
                                <span class="text-secondary mx-2">XXXXXX-12345-789456</span>
                                <img src="/assets/img/mastercard.png" class="mastercards" alt="" />
                                <span
                                    class="position-absolute top-50 end-0 translate-middle-y me-2 hc"
                                ><i class="fa-solid fa-x"></i
                                    ></span>
                            </div>
                            <div
                                class="border p-2 fz-large my-3 d-flex align-items-center position-relative text-secondary"
                            >
                                <span class="text-secondary mx-2">XXXXXX-12345-789456</span>
                                <img src="/assets/img/mastercard.png" class="mastercards" alt="" />
                                <span
                                    class="position-absolute top-50 end-0 translate-middle-y me-2 hc"
                                ><i class="fa-solid fa-x"></i
                                    ></span>
                            </div>
                            <div
                                class="border p-2 fz-large my-3 d-flex align-items-center position-relative text-secondary"
                            >
                                <span class="text-secondary mx-2">XXXXXX-12345-789456</span>
                                <img src="/assets/img/mastercard.png" class="mastercards" alt="" />
                                <span
                                    class="position-absolute top-50 end-0 translate-middle-y me-2 hc"
                                ><i class="fa-solid fa-x"></i
                                    ></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--======= ADD ADDRESS MODAL START =======-->
    <div
        class="modal fade"
        id="new_address_modal"
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

                    <div class="row justify-content-center">
                        <div class="col-lg-10 mx-auto p-0 pt-4 pe-lg-3">
                            <h3 class="text-darkblue text-darkblue text-center">
                                Add New Address
                            </h3>
                            <div
                                class="container d-flex justify-content-center justify-content-lg-start"
                            >
                                <div class="form-check form-switch my-3">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        id="NEW_ADDRESS"
                                    />
                                    <label class="form-check-label h5" for="NEW_ADDRESS"
                                    >Set the default location</label
                                    >
                                </div>
                            </div>
                            <div class="container">
                                <div class="row mx-auto justify-content-center">
                                    <div class="col-sm-6 mx-auto">
                                        <div class="w-100 mx-auto my-2">
                                            <p class="m-0 text-secondary">City</p>
                                            <select name="" id="" class="phone-input-a">
                                                <option value="Dubai">Dubai</option>
                                                <option value="Jeddah">Jeddah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mx-auto">
                                        <div class="w-100 mx-auto my-2">
                                            <p class="m-0 text-secondary">Neighborhood</p>
                                            <input type="text" class="phone-input-a" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="w-100 my-2">
                                            <p class="m-0 text-secondary">Street Name</p>
                                            <input type="text" class="phone-input-a" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="w-100 my-2">
                                            <p class="m-0 text-secondary">Building Number</p>
                                            <input type="text" class="phone-input-a" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center mb-3">
                                <button
                                    class="sendbtn my-2 d-block"
                                    data-dismiss="modal"
                                    aria-label="Close"
                                >
                                    ADD
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer py-4 bg-darkblue"></div>
            </div>
        </div>
    </div>
    <!-- ========= ADD address MODAL END ======== -->

    <!--======= ADD PAYMENT MODAL START =======-->
    <div
        class="modal fade"
        id="new_payment_modal"
        data-backdrop="static"
        data-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body position-relative p-0">
                    <button
                        type="button"
                        class="btn-close position-absolute end-0 top-0 m-3"
                        data-dismiss="modal"
                        aria-label="Close"
                    ></button>
                    <div class="row">
                        <div class="col-lg-10 mx-auto p-0 pt-4 pe-lg-3">
                            <div class="container">
                                <h3 class="text-darkblue text-darkblue text-center">
                                    Add New Payment Method
                                </h3>
                                <div class="container">
                                    <div class="w-100 my-3">
                                        <p class="m-0 text-secondary">Card Holder Name</p>
                                        <input type="text" class="phone-input" />
                                    </div>
                                    <div class="w-100 my-3">
                                        <p class="m-0 text-secondary">Card Number</p>
                                        <div class="d-flex align-items-center position-relative">
                                            <input type="number" min="0" class="phone-input" />
                                            <span
                                                class="ms-1 ms-md-3 position-absolute text-darkblue top-50 start-100 translate-middle"
                                            >
                          <i class="fa-solid fa-circle-check"></i>
                        </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="w-100">
                                                <p class="m-0 text-secondary">Expiration Date</p>
                                                <input type="date" class="phone-input" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="w-100">
                                                <p class="m-0 text-secondary">
                                                    Security Code
                                                    <i class="fa-solid fa-circle-info"></i>
                                                </p>
                                                <input type="number" min="0" class="phone-input" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-11 mx-auto">
                                    <div class="d-flex justify-content-around">
                                        <button
                                            class="sendbtn mt-4 mb-3 bg-secondary mx-1 d-block"
                                            data-dismiss="modal"
                                            aria-label="Close"
                                        >
                                            Cancel
                                        </button>
                                        <button
                                            class="sendbtn mt-4 mb-3 d-block mx-1"
                                            data-dismiss="modal"
                                            aria-label="Close"
                                        >
                                            Done
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer py-4 bg-darkblue"></div>
            </div>
        </div>
    </div>
    <!-- ========= ADD PAYMENT MODAL END ======== -->

    <!--======= LOGOUT MODAL START =======-->
    <div
        class="modal fade"
        id="logout_modal"
        data-backdrop="static"
        data-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body position-relative p-0">
                    <button
                        type="button"
                        class="btn-close position-absolute end-0 top-0 m-3"
                        data-dismiss="modal"
                        aria-label="Close"
                    ></button>
                    <div class="row">
                        <div class="col-lg-10 mx-auto p-0 pt-4 pe-lg-3">
                            <h3 class="text-darkblue text-darkblue text-center">Sign Up</h3>

                            <span class="logoutIcon"
                            ><i class="fa-solid fa-arrow-right-from-bracket"></i
                                ></span>
                            <h5 class="text-darkblue fw-semibold mt-3 text-center">
                                Are you sure you want to logout ?
                            </h5>
                            <div class="row">
                                <div class="col-11 mx-auto">
                                    <div class="d-flex justify-content-around">
                                        <button
                                            class="sendbtn mt-4 mb-3 bg-secondary mx-1 d-block"
                                            data-dismiss="modal"
                                            aria-label="Close"
                                        >
                                            Cancel
                                        </button>
                                        <form id="logout" action="/logout" method="POST">
                                            <?= $this->csrf()->formfield() ?>
                                        <button type="submit" class="sendbtn mt-4 mb-3 d-block mx-1">Done</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer py-4 bg-darkblue"></div>
            </div>
        </div>
    </div>
    <!-- ========= LOGOUT MODAL END ======== -->
<?php endif ?>
