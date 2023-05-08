<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

/* Available data:
 * - orderItem : Order item (optional, only available after checkout)
 * - summaryBasket : Order base item (basket) including products, addresses, services, etc.
 * - summaryEnableModify : True if users are allowed to change the basket content, false if not (optional)
 * - summaryErrorCodes : List of error codes including those for the products (optional)
 */


$totalQuantity = 0;
$enc = $this->encoder();

$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );
$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );
$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );
$detailConfig = $this->config( 'client/html/catalog/detail/url/config', array( 'absoluteUri' => 1 ) );


/** client/html/account/download/url/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * @param string Destination of the URL
 * @since 2016.02
 * @see client/html/account/download/url/controller
 * @see client/html/account/download/url/action
 * @see client/html/account/download/url/config
 */

/** client/html/account/download/url/controller
 * Name of the controller whose action should be called
 *
 * In Model-View-Controller (MVC) applications, the controller contains the methods
 * that create parts of the output displayed in the generated HTML page. Controller
 * names are usually alpha-numeric.
 *
 * @param string Name of the controller
 * @since 2016.02
 * @see client/html/account/download/url/target
 * @see client/html/account/download/url/action
 * @see client/html/account/download/url/config
 */

/** client/html/account/download/url/action
 * Name of the action that should create the output
 *
 * In Model-View-Controller (MVC) applications, actions are the methods of a
 * controller that create parts of the output displayed in the generated HTML page.
 * Action names are usually alpha-numeric.
 *
 * @param string Name of the action
 * @since 2016.02
 * @see client/html/account/download/url/target
 * @see client/html/account/download/url/controller
 * @see client/html/account/download/url/config
 */

/** client/html/account/download/url/config
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
 * @since 2016.02
 * @see client/html/account/download/url/target
 * @see client/html/account/download/url/controller
 * @see client/html/account/download/url/action
 */

/** client/html/common/summary/detail/product/attribute/types
 * List of attribute type codes that should be displayed in the basket along with their product
 *
 * The products in the basket can store attributes that exactly define an ordered
 * product or which are important for the back office. By default, the product
 * variant attributes are always displayed and the configurable product attributes
 * are displayed separately.
 *
 * Additional attributes for each ordered product can be added by basket plugins.
 * Depending on the attribute types and if they should be shown to the customers,
 * you need to extend the list of displayed attribute types ab adding their codes
 * to the configurable list.
 *
 * @param array List of attribute type codes
 * @since 2014.09
 */
$attrTypes = $this->config( 'client/html/common/summary/detail/product/attribute/types', ['variant', 'config', 'custom'] );


$price = $this->summaryBasket->getPrice();
$precision = $price->getPrecision();
$priceTaxflag = $price->getTaxFlag();
$priceCurrency = 'JD'; //$this->translate( 'currency', $price->getCurrencyId() );


/// Price format with price value (%1$s) and currency (%2$s)
$priceFormat = $this->translate( 'client/code', 'price:default', null, 0, false ) ?: $this->translate( 'client', '%1$s %2$s' );
/// Tax format with tax rate (%1$s) and tax name (%2$s)
$taxFormatIncl = $this->translate( 'client', 'Incl. %1$s%% %2$s' );
/// Tax format with tax rate (%1$s) and tax name (%2$s)
$taxFormatExcl = $this->translate( 'client', '+ %1$s%% %2$s' );

$modify = $this->get( 'summaryEnableModify', false );
$errors = $this->get( 'summaryErrorCodes', [] );
//strpos($_SERVER['REQUEST_URI'], 'shop/basket')
?>
<?php if (strpos($_SERVER['REQUEST_URI'], 'shop/basket')) : ?>
    <br>
    <br>
<?php if (count($this->summaryBasket->getProducts()) > 0) : ?>
<div class="container">
    <h4 class="mt-5 mb-3 fw-normal">Home > Cart</h4>
    <div class="row">
        <div class="col-lg-8 my-3">
            <h5>All Products</h5>
            <div class="cart-products w-100">
                <?php foreach( $this->summaryBasket->getProducts()->groupBy( 'order.base.product.vendor' )->ksort() as $vendor => $list ) : ?>
                    <?php foreach( $list as $position => $product ) : $totalQuantity += $product->getQuantity() ?>
                        <div class="row g-0 product-item <?= ( isset( $errors['product'][$position] ) ? 'error' : '' ) ?>">
                            <div class="col-4 col-md-6">
                                <div class="row g-0">
                                    <div class="status col-1">
                                        <?php if( ( $status = $product->getStatusDelivery() ) >= 0 ) : $key = 'stat:' . $status ?>
                                            <?= $enc->html( $this->translate( 'mshop/code', $key ) ) ?>
                                        <?php endif ?>
                                    </div>
                                    <div class="image col-11 col-lg-3">
                                        <?php if( ( $url = $product->getMediaUrl() ) != '' ) : ?>
                                            <img class="detail" src="<?= $enc->attr( $this->content( $url ) ) ?>">
                                        <?php endif ?>
                                    </div>
                                    <div class="details col-12 col-lg-8">
                                        <?php
                                        $url = '#';

                                        if( ( $product->getFlags() & \Aimeos\MShop\Order\Item\Base\Product\Base::FLAG_IMMUTABLE ) == 0 )
                                        {
                                            $params = ['d_name' => $product->getName( 'url' ), 'd_prodid' => $product->getParentProductId() ?: $product->getProductId(), 'd_pos' => ''];
                                            $url = $this->url( ( $product->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );
                                        }
                                        ?>
                                        <a class="product-name" href="<?= $enc->attr( $url ) ?>"><?= $enc->html( $product->getName(), $enc::TRUST ) ?></a>
                                        <p class="code">
                                            <span class="name"><?= $enc->html( $this->translate( 'client', 'Article no.' ), $enc::TRUST ) ?></span>
                                            <span class="value"><?= $product->getProductCode() ?></span>
                                        </p>
                                        <?php if( ( $desc = $product->getDescription() ) !== '' ) : ?>
                                            <p class="product-description"><?= $enc->html( $desc ) ?></p>
                                        <?php endif ?>
                                        <?php foreach( $attrTypes as $attrType ) : ?>
                                            <?php if( !( $attributes = $product->getAttributeItems( $attrType ) )->isEmpty() ) : ?>
                                                <ul class="attr-list attr-type-<?= $enc->attr( $attrType ) ?>">
                                                    <?php foreach( $product->getAttributeItems( $attrType ) as $attribute ) : ?>
                                                        <li class="attr-item attr-code-<?= $enc->attr( $attribute->getCode() ) ?>">
                                                            <span class="name"><?= $enc->html( $this->translate( 'client/code', $attribute->getCode() ) ) ?></span>
                                                            <span class="value">
													<?php if( $attribute->getQuantity() > 1 ) : ?>
                                                        <?= $enc->html( $attribute->getQuantity() ) ?>×
                                                    <?php endif ?>
                                                                <?= $enc->html( $attrType !== 'custom' && $attribute->getName() ? $attribute->getName() : $attribute->getValue() ) ?>
												</span>
                                                        </li>
                                                    <?php endforeach ?>
                                                </ul>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                        <?php if( isset( $this->orderItem ) && $this->orderItem->getStatusPayment() >= \Aimeos\MShop\Order\Item\Base::PAY_RECEIVED
                                            && ( $product->getStatusPayment() < 0 || $product->getStatusPayment() >= \Aimeos\MShop\Order\Item\Base::PAY_RECEIVED )
                                            && ( $attribute = $product->getAttributeItem( 'download', 'hidden' ) ) ) : ?>
                                            <ul class="attr-list attr-list-hidden">
                                                <li class="attr-item attr-code-<?= $enc->attr( $attribute->getCode() ) ?>">
                                                    <span class="name"><?= $enc->html( $this->translate( 'client/code', $attribute->getCode() ) ) ?></span>
                                                    <span class="value">
											<a href="<?= $enc->attr( $this->link( 'client/html/account/download/url', ['dl_id' => $attribute->getId()] ) ) ?>">
												<?= $enc->html( $attribute->getName() ) ?>
											</a>
										</span>
                                                </li>
                                            </ul>
                                        <?php endif ?>
                                        <?php if( ( $timeframe = $product->getTimeframe() ) !== '' ) : ?>
                                            <p class="timeframe">
                                                <span class="name"><?= $enc->html( $this->translate( 'client', 'Delivery within' ) ) ?></span>
                                                <span class="value"><?= $enc->html( $timeframe ) ?></span>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8 col-md-6">
                                <div class="row g-0">
                                    <div class="quantity col-4 quantity col-4">

                                        <?php if( $modify && ( $product->getFlags() & \Aimeos\MShop\Order\Item\Base\Product\Base::FLAG_IMMUTABLE ) == 0 ) : ?>

                                            <?php if( $product->getQuantity() > 1 ) : ?>
                                                <?php $basketParams = array( 'b_action' => 'edit', 'b_position' => $position, 'b_quantity' => $product->getQuantity() - 1 ) ?>
                                                <span class="decrease-item-icon"> <a class="minibutton change down" href="<?= $enc->attr( $this->link( 'client/html/basket/standard/url', $basketParams ) ) ?>"><i class="fa-solid fa-minus"></i></a></span>
                                            <?php else : ?>
                                                &nbsp;
                                            <?php endif ?>

                                            <input class="value" type="number" required="required"
                                                   name="<?= $enc->attr( $this->formparam( array( 'b_prod', $position, 'quantity' ) ) ) ?>"
                                                   value="<?= $enc->attr( $product->getQuantity() ) ?>"
                                                   step="<?= $enc->attr( $product->getScale() ) ?>"
                                                   min="<?= $enc->attr( $product->getScale() ) ?>"
                                                   max="2147483647"
                                            >
                                            <input type="hidden" type="text"
                                                   name="<?= $enc->attr( $this->formparam( array( 'b_prod', $position, 'position' ) ) ) ?>"
                                                   value="<?= $enc->attr( $position ) ?>"
                                            >

                                            <?php $basketParams = array( 'b_action' => 'edit', 'b_position' => $position, 'b_quantity' => $product->getQuantity() + 1 ) ?>
                                            <span class="increase-item-icon"><a class="minibutton change up" href="<?= $enc->attr( $this->link( 'client/html/basket/standard/url', $basketParams ) ) ?>"><i class="fa-solid fa-plus"></i></a></span>

                                        <?php else : ?>
                                            <?= $enc->html( $product->getQuantity() ) ?>
                                        <?php endif ?>
                                    </div>
                                    <div class="unitprice col-4"><?= $enc->html( sprintf( $priceFormat, $this->number( $product->getPrice()->getValue(), $precision ), $priceCurrency ) ) ?></div>
                                    <div class="price col-3"><?= $enc->html( sprintf( $priceFormat, $this->number( $product->getPrice()->getValue() * $product->getQuantity(), $precision ), $priceCurrency ) ) ?></div>
                                    <?php if( $modify ) : ?>
                                        <div class="action col-1">
                                            <?php if( ( $product->getFlags() & \Aimeos\MShop\Order\Item\Base\Product\Base::FLAG_IMMUTABLE ) == 0 ) : ?>
                                                <?php $basketParams = array( 'b_action' => 'delete', 'b_position' => $position ) ?>
                                                <a class="minibutton delete" href="<?= $enc->attr( $this->link( 'client/html/basket/standard/url', $basketParams ) ) ?>"><i class="fa fa-trash text-danger"></i></a>
                                            <?php endif ?>
                                        </div>
                                    <?php endif ?>

                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-lg-4 my-3">
            <h5>Payment Details</h5>
            <div class="payment-card">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="m-0">Total Quantity: (<?php  echo $totalQuantity ?>)</h5>
                    <h4 class="m-0"><?= $enc->html( sprintf( $priceFormat, $this->number( $this->summaryBasket->getPrice()->getValue() + $this->summaryBasket->getPrice()->getCosts(), $precision ), $priceCurrency ) ) ?></h4>
                </div>
                <hr class="mx-auto my-4 w-75">
                <div class="d-flex align-items-center justify-content-between">
                    <h5 class="m-0">Total Price</h5>
                    <h4 class="m-0 text-darkblue"><?= $enc->html( sprintf( $priceFormat, $this->number( $this->summaryBasket->getPrice()->getValue() + $this->summaryBasket->getPrice()->getCosts(), $precision ), $priceCurrency ) ) ?></h4>
                </div>

            </div>
            <button class="sendbtn btn-action my-3 my-lg-5 mx-auto d-block"><a href="/shop/checkout" style="text-decoration: none;color: white;">Go to Pay</a></button>
        </div>
    </div>
</div>

<?php else: ?>
    <div class="container">
        <h4 class="mt-5 mb-3 fw-normal">Home > Cart</h4>
        <div class="d-flex align-items-center justify-content-center">
            <div class="d-flex flex-column">
                <img src="/assets/img/cartEmpty.png" class="img-fluid d-block mx-auto cartImage" alt="">
                <p class="text-secondary m-0 my-4 my-lg-5 h5 fw-normal">There are no products in the shopping cart</p>
                <button class="sendbtn mx-auto mb-3"><a href="/" style="text-decoration: none; color: white">SHOP NOW</a></button>
            </div>

        </div>
    </div>
<?php endif ?>

<?php else: ?>

    <div class="container">
        <h4 class="mt-5 mb-3 fw-normal">Home > Cart > Checkout</h4>
        <div class="row">
            <div class="col-lg-7">
                <div class="row flex-wrap">
                    <div class="col-lg-8 border mt-5 position-relative">
                        <h5
                            class="address text-center text-lg-start ms-lg-4 d-block w-100"
                        >
                            Address
                        </h5>
                        <div class="row p-2 justify-content-center">
                            <div class="col p-2 mx-1 border">
                                <div class="d-flex justify-content-center align-items-center">
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
                    <div class="col ms-lg-2 pt-1 border mt-5 position-relative">
                        <h5
                            class="delivery text-center text-lg-start ms-lg-4 d-block w-100"
                        >
                            Delivery Date
                        </h5>
                        <div class="d-flex my-2 border p-3">
                            <div class="form-check">
                                <input
                                    class="form-check-input select-days"
                                    type="radio"
                                    name="days"
                                    id="1-days"
                                />
                                <label class="form-check-label" for="1-days"> 1 days </label>
                            </div>
                        </div>
                        <div class="d-flex my-2 border p-3 selected-address">
                            <div class="form-check">
                                <input
                                    checked
                                    class="form-check-input select-days"
                                    type="radio"
                                    name="days"
                                    id="2-days"
                                />
                                <label class="form-check-label" for="2-days"> 2 days </label>
                            </div>
                        </div>
                    </div>
                    <h5
                        class="m-0 mt-4 text-center text-lg-start ms-lg-4 d-block w-100"
                    >
                        Payment Options
                    </h5>
                    <div class="col-12 p-2 my-2 border">
                        <div
                            class="d-flex border selected-address payment-h p-3 align-items-center justify-content-between"
                        >
                            <div class="form-check">
                                <input
                                    checked
                                    class="form-check-input select-days"
                                    type="radio"
                                    name="payment"
                                    id="cash"
                                />
                                <label class="form-check-label" for="cash">
                                    Cash on deilvery
                                </label>
                            </div>
                            <img
                                src="/assets/img/money.png"
                                class="img-fluid payment-logos"
                                alt=""
                            />
                        </div>
                        <div
                            class="d-flex border payment-h p-3 my-2 align-items-center justify-content-between"
                        >
                            <div class="form-check">
                                <input
                                    class="form-check-input select-days"
                                    type="radio"
                                    name="payment"
                                    id="credit-card"
                                />
                                <label class="form-check-label" for="credit-card">
                                    Credit Card
                                </label>
                            </div>
                            <img
                                src="/assets/img/visacard.png"
                                class="img-fluid payment-logos"
                                alt=""
                            />
                        </div>
                        <div
                            class="d-flex border payment-h p-3 align-items-center justify-content-between"
                        >
                            <div class="form-check">
                                <input
                                    class="form-check-input select-days"
                                    type="radio"
                                    name="payment"
                                    id="paypal"
                                />
                                <label class="form-check-label" for="paypal"> Paypal </label>
                            </div>
                            <img
                                src="/assets/img/paypallogo.png"
                                class="img-fluid payment-logos"
                                alt=""
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mx-auto ms-lg-2 mt-5 mb-2 position-relative">
                <h5 class="delivery text-center text-lg-start ms-lg-4 d-block w-100">
                    Request Review
                </h5>
                <div class="border w-100 mx-lg-2 p-md-2">
                    <div class="cart-products max-height-200 border-0 w-100">
                        <?php foreach( $this->summaryBasket->getProducts()->groupBy( 'order.base.product.vendor' )->ksort() as $vendor => $list ) : ?>
                            <?php foreach( $list as $position => $product ) : $totalQuantity += $product->getQuantity() ?>

                                <div class="d-flex justify-content-around my-3">
                                    <div class="d-flex w-100">
                                        <?php if( ( $url = $product->getMediaUrl() ) != '' ) : ?>
                                            <img class="img-fluid cartproductimg" src="<?= $enc->attr( $this->content( $url ) ) ?>">
                                        <?php endif ?>
                                        <div class="d-flex justify-content-between">
                                            <h6 class="m-0 fw-semibold"><?= $enc->html( $product->getName(), $enc::TRUST ) ?></h6>

                                        </div>
                                    </div>
                                    <h6 class="m-0 fw-semibold text-darkblue productPrice">
                                        <?= $enc->attr( $product->getQuantity() ) ?>
                                    </h6>
                                    <div
                                        class="d-flex flex-column mt-3 mt-md-0 flex-md-row justify-content-center justify-content-lg-end align-items-center w-100"
                                    >

                                        <div class="d-flex my-2 my-md-0 ms-2 align-items-center">
                                            <h4 class="m-0 fw-bold my-2 my-md-0"><?= $enc->html( sprintf( $priceFormat, $this->number( $product->getPrice()->getValue() * $product->getQuantity(), $precision ), $priceCurrency ) ) ?></h4>
                                        </div>
                                    </div>
                                </div>

                                <hr class="w-75 mx-auto" />
                            <?php endforeach ?>
                        <?php endforeach ?>

                    </div>
                    <div
                        class="d-flex p-2 my-2 justify-content-between align-items-center"
                    >
                        <h5 class="m-0">Total Quantity: (<?php  echo $totalQuantity ?>)</h5>
                        <h5 class="m-0 fw-bold"><?= $enc->html( sprintf( $priceFormat, $this->number( $this->summaryBasket->getPrice()->getValue() + $this->summaryBasket->getPrice()->getCosts(), $precision ), $priceCurrency ) ) ?></h5>
                    </div>
                    <div
                        class="d-flex p-2 my-2 justify-content-between align-items-center"
                    >
                        <h5 class="m-0">Delivery Fees</h5>
                        <h5 class="m-0 fw-bold">0.00 JD</h5>
                    </div>
                    <div
                        class="d-flex p-2 my-2 justify-content-between align-items-center"
                    >
                        <h5 class="m-0">Sales Tax</h5>
                        <h5 class="m-0 fw-bold"><?= $enc->html( sprintf( $priceFormat, $this->number( $this->summaryBasket->getPrice()->getValue() + $this->summaryBasket->getPrice()->getCosts(), $precision ), $priceCurrency ) ) ?></h5>
                    </div>
                    <hr class="w-75 mx-auto" />
                    <div
                        class="d-flex p-2 my-2 justify-content-between align-items-center"
                    >
                        <h5 class="m-0">Total Price</h5>
                        <h5 class="m-0 text-darkblue fw-bold"><?= $enc->html( sprintf( $priceFormat, $this->number( $this->summaryBasket->getPrice()->getValue() + $this->summaryBasket->getPrice()->getCosts(), $precision ), $priceCurrency ) ) ?></h5>
                    </div>
                </div>
                <button
                    id="checkout-button-final"
                    class="sendbtn my-3 mx-auto d-block"
                    data-toggle="modal"
                    data-target="#card-payment-modal"
                >
                    Checkout
                </button>
            </div>
        </div>
    </div>

    <!-- ====  PAYMENT MODAL ======= -->
    <div
        class="modal fade"
        id="card-payment-modal"
        data-backdrop="static"
        data-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content payment-modal">
                <div class="modal-body position-relative">
                    <button
                        type="button"
                        class="btn-close m-2 position-absolute top-0 end-0"
                        data-dismiss="modal"
                        aria-label="Close"
                    ></button>
                    <h3 class="text-center text-darkblue my-5 fw-semibold">
                        Payment Method
                    </h3>
                    <div class="d-flex flex-column align-items-center">
                        <div class="card-input-wrapper position-relative">
                            <img src="/assets/img/mastercard.png" class="card-icon" alt="" />
                            <input
                                type="number"
                                placeholder="xxxx-xxxx-4567-4561"
                                class="card-input"
                            />
                        </div>
                        <div
                            class="d-flex my-2 add-new-payment justify-content-center align-items-center p-2 border"
                        >
                <span class="increase-item-icon">
                  <i class="fa-solid fa-plus"></i>
                </span>
                            <p class="m-0 ms-2">Add new payment method</p>
                        </div>
                        <button class="sendbtn my-5 mx-auto d-block"
                                id="final-continue-process-button"
                                data-toggle="modal"
                                data-target="#final-modal"
                        >Continue</button>
                    </div>
                </div>
                <div class="modal-footer bg-darkblue py-4"></div>
            </div>
        </div>
    </div>

    <!-- ==== FINAL MODAL ===== -->
    <div
        class="modal fade"
        id="final-modal"
        data-backdrop="static"
        data-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content payment-modal">
                <div class="modal-body position-relative">
                    <button
                        type="button"
                        class="btn-close m-2 position-absolute top-0 end-0"
                        data-dismiss="modal"
                        aria-label="Close"
                    ></button>
                    <h3 class="text-center text-darkblue my-5 mb-3 fw-semibold">
                        THANK YOU
                    </h3>

                    <span class="big-check">
     <i class="fa-regular fa-circle-check"></i>
</span>


                    <p class="text-secondary text-center">Your order has been placed successfully!</p>



                    <button class="sendbtn my-5 mx-auto d-block" data-dismiss="modal">DONE</button>
                </div>
                <div class="modal-footer bg-darkblue py-4"></div>
            </div>
        </div>
    </div>
<?php endif ?>

