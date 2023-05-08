<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2020
 */

$enc = $this->encoder();


/** client/html/basket/standard/url/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * @param string Destination of the URL
 * @since 2014.03
 * @see client/html/basket/standard/url/controller
 * @see client/html/basket/standard/url/action
 * @see client/html/basket/standard/url/config
 */

/** client/html/basket/standard/url/controller
 * Name of the controller whose action should be called
 *
 * In Model-View-Controller (MVC) applications, the controller contains the methods
 * that create parts of the output displayed in the generated HTML page. Controller
 * names are usually alpha-numeric.
 *
 * @param string Name of the controller
 * @since 2014.03
 * @see client/html/basket/standard/url/target
 * @see client/html/basket/standard/url/action
 * @see client/html/basket/standard/url/config
 */

/** client/html/basket/standard/url/action
 * Name of the action that should create the output
 *
 * In Model-View-Controller (MVC) applications, actions are the methods of a
 * controller that create parts of the output displayed in the generated HTML page.
 * Action names are usually alpha-numeric.
 *
 * @param string Name of the action
 * @since 2014.03
 * @see client/html/basket/standard/url/target
 * @see client/html/basket/standard/url/controller
 * @see client/html/basket/standard/url/config
 */

/** client/html/basket/standard/url/config
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
 * @since 2014.03
 * @see client/html/basket/standard/url/target
 * @see client/html/basket/standard/url/controller
 * @see client/html/basket/standard/url/action
 * @see client/html/url/config
 */

$pricefmt = $this->translate( 'client/code', 'price:default' );
/// Price format with price value (%1$s) and currency (%2$s)
$priceFormat = $pricefmt !== 'price:default' ? $pricefmt : $this->translate( 'client', '%1$s %2$s' );

?>

<?php if( ( $errors = $this->get( 'miniErrorList', [] ) ) !== [] ) : ?>
    <ul class="error-list">
        <?php foreach( $errors as $error ) : ?>
            <li class="error-item"><?= $enc->html( $error ) ?></li>
        <?php endforeach ?>
    </ul>
<?php endif ?>

<?php if( isset( $this->miniBasket ) ) : ?>
<?php
$priceItem = $this->miniBasket->getPrice();
$priceCurrency = 'JD';//$this->translate( 'currency', $priceItem->getCurrencyId() );
$quantity = $this->miniBasket->getProducts()->sum( 'order.base.product.quantity' );
?>

<div class="nav-item mx-3 dropdown">
    <a
        class="nav-link hover-no-underline"
        href="#"
        role="button"
        data-bs-toggle="dropdown"
        aria-expanded="false"
    >
                  <span class="position-relative">
                    <img src="/assets/img/cartIcon.png" class="img-fluid" alt=""/>
                    <span
                        class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-darkblue"
                    >
                      <?= $enc->html( $quantity ) ?>
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
        <p class="ms-2">Total Quantity:(<?= $enc->html( $quantity ) ?>)</p>

        <?php foreach( $this->miniBasket->getProducts() as $pos => $product ) : ?>
            <?php
            $param = ['resource' => 'basket', 'id' => 'default', 'related' => 'product', 'relatedid' => $pos];
            $param[$this->csrf()->name()] = $this->csrf()->value();
            ?>
            <div class="d-flex my-3">
                <div class="d-flex align-items-center" data-url="<?= $enc->attr( $this->link( 'client/jsonapi/url', $param ) ) ?>">
                    <?php if( ( $url = $product->getMediaUrl() ) != '' ) : ?>
                        <img class="img-fluid product-nav-cart-img" src="<?= $enc->attr( $this->content( $url ) ) ?>">
                    <?php endif ?>
                    <!--<img
                        src="/assets/img/prodcut2.png"
                        class="img-fluid product-nav-cart-img"
                        alt=""
                    />-->
                    <div style="width: 10rem;">
                        <div class="d-flex align-items-center">
                            <h6 class="m-0"><?= $enc->html( $product->getName() ) ?></h6>
                            <p class="m-0 fw-semibold text-darkblue">220 g</p>
                        </div>
                        <h4><?= $enc->html( sprintf( $priceFormat, $this->number( $product->getPrice()->getValue() * $product->getQuantity(), $product->getPrice()->getPrecision() ), $priceCurrency ) ) ?></h4>
                    </div>
                    <div class="d-flex align-items-center">
                        <?php if( $product->getQuantity() > 1 ) : ?>
                            <?php $basketParams = array( 'b_action' => 'edit', 'b_position' => $pos, 'b_quantity' => $product->getQuantity() - 1 ) ?>
                            <a class="minibutton change down" href="<?= $enc->attr( $this->link( 'client/html/basket/standard/url', $basketParams ) ) ?>"><span class="decrease-item-icon">
                          <i class="fa-solid fa-minus"></i>
                        </span></a>
                        <?php else : ?>
                            &nbsp;<span class="decrease-item-icon">
                          <i class="fa-solid fa-minus"></i>
                            </span>
                        <?php endif ?>

                        <h4 class="m-0 mx-2"><?= $enc->html( $product->getQuantity() ) ?></h4>
                        <?php $basketParams = array( 'b_action' => 'edit', 'b_position' => $pos, 'b_quantity' => $product->getQuantity() + 1 ) ?>
                        <a class="minibutton change up" href="<?= $enc->attr( $this->link( 'client/html/basket/standard/url', $basketParams ) ) ?>"><span class="increase-item-icon">
                          <i class="fa-solid fa-plus"></i>
                        </span></a>



                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <p class="ms-2">Total Price : <span class="text-darkblue fw-bold"><?= $enc->html( sprintf( $priceFormat, $this->number( $priceItem->getValue() + $priceItem->getCosts(), $priceItem->getPrecision() ), $priceCurrency ) ) ?></span></p>
        <a href="<?= $enc->attr( $this->link( 'client/html/basket/standard/url' ) ) ?>" class="btn viewcart">View the Cart</a>
    </ul>
</div>
<?php endif ?>
