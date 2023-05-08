<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

/* Available data:
 * - detailProductItem : Product item incl. referenced items
 */
$enc = $this->encoder();

/** client/html/basket/require-stock
 * Customers can order products only if there are enough products in stock
 *
 * Checks that the requested product quantity is in stock before
 * the customer can add them to his basket and order them. If there
 * are not enough products available, the customer will get a notice.
 *
 * @param boolean True if products must be in stock, false if products can be sold without stock
 * @since 2014.03
 */
$reqstock = (int) $this->config( 'client/html/basket/require-stock', true );

/** client/html/catalog/detail/basket-add
 * Display the "add to basket" button for each suggested/bought-together product item
 *
 * Enables the button for adding products to the basket for the related products
 * in the basket. This works for all type of products, even for selection products
 * with product variants and product bundles. By default, also optional attributes
 * are displayed if they have been associated to a product.
 *
 * To fetch the variant articles of selection products too, add this setting to
 * your configuration:
 *
 * mshop/common/manager/maxdepth = 3
 *
 * @param boolean True to display the button, false to hide it
 * @since 2021.04
 * @see client/html/catalog/home/basket-add
 * @see client/html/catalog/lists/basket-add
 * @see client/html/catalog/product/basket-add
 * @see client/html/basket/related/basket-add
 */


?>
<?php if( isset( $this->detailProductItem ) ) : ?>
    <?= $this->partial( $this->config( 'client/html/common/partials/badges', 'common/partials/badges' ) ) ?>
    <h2 class="text-center text-darkblue my-4"><?= $enc->html( $this->detailProductItem->getName(), $enc::TRUST ) ?></h2>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>Home > Category</h5>
                <h4 class="fw-bold my-3"><?= $enc->html( $this->detailProductItem->getName(), $enc::TRUST ) ?></h4>
                <p class="text-secondary">
                    <?php if( !( $textItems = $this->detailProductItem->getRefItems( 'text', 'long' ) )->isEmpty() ) : ?>

                <div class="block description">

                    <?php foreach( $textItems as $textItem ) : ?>
                        <div class="long item"><?= $enc->html( $textItem->getContent(), $enc::TRUST ) ?></div>
                    <?php endforeach ?>

                </div>

                <?php endif ?>
                </p>
                <h5>Weight</h5>
                <div class="d-flex my-3 toggle-btn">
                    <div class="">
                        <input
                            type="radio"
                            class="btn-check"
                            name="options"
                            id="option1"
                            autocomplete="off"
                            checked
                        />
                        <label class="btn leafbtn-weight px-3" for="option1">200 g</label>
                    </div>
                    <div class="">
                        <input
                            type="radio"
                            class="btn-check"
                            name="options"
                            id="option2"
                            autocomplete="off"
                        />
                        <label class="btn leafbtn-weight px-3" for="option2">250 g</label>
                    </div>
                    <div class="">
                        <input
                            type="radio"
                            class="btn-check"
                            name="options"
                            id="option3"
                            autocomplete="off"
                        />
                        <label class="btn leafbtn-weight px-3" for="option3">300 g</label>
                    </div>
                </div>
                <h5 class="mt-4">Price</h5>
                <div class="price-box d-flex align-items-center">
                    <h3 class="fw-bold m-0"><?= $this->partial(
                            $this->config( 'client/html/common/partials/price', 'common/partials/price' ),
                            ['prices' => $this->detailProductItem->getRefItems( 'price', null, 'default' )]
                        ) ?></h3>
                    <div class="vertical-lines"></div>
                    <span class="text-secondary h5 m-0 ms-2"><del>2.50</del></span>
                </div>
                <div class="d-flex align-items-center my-3">

                    <form class="basket" method="POST" action="<?= $enc->attr( $this->link( 'client/html/basket/standard/url' ) ) ?>">
                        <?= $this->csrf()->formfield() ?>
                        <?php if( !$this->detailProductItem->getRefItems( 'price', 'default', 'default' )->empty() ) : ?>
                            <div class="addbasket">
                                <input type="hidden" value="add"
                                       name="<?= $enc->attr( $this->formparam( 'b_action' ) ) ?>"
                                >
                                <input type="hidden" value="<?= $this->detailProductItem->getId() ?>"
                                       name="<?= $enc->attr( $this->formparam( array( 'b_prod', 0, 'prodid' ) ) ) ?>"
                                >

                                <div class="number">
                                    <!--<span class="minus">-</span>-->
                                    <span class="minus decrease-item-icon">
                                        <i class="fa-solid fa-minus"></i>
                                    </span>
                                    <input style="width: 110px;" type="text" value="<?= $enc->attr( $this->detailProductItem->getScale() ) ?>"
                                           min="<?= $enc->attr( $this->detailProductItem->getScale() ) ?>"
                                           step="<?= $enc->attr( $this->detailProductItem->getScale() ) ?>"
                                           required="required" <?= !$this->detailProductItem->isAvailable() ? 'disabled' : '' ?>
                                           name="<?= $enc->attr( $this->formparam( array( 'b_prod', 0, 'quantity' ) ) ) ?>"
                                           title="<?= $enc->attr( $this->translate( 'client', 'Quantity' ), $enc::TRUST ) ?>"/>
                                    <span class="plus increase-item-icon">
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-3" style="text-align-last: center;">
                                        <button style="width: 50%" class="btn btn-success btn-sm btn-action" type="submit"
                                                title="<?= $enc->attr( $this->translate( 'client', 'Add to basket' ), $enc::TRUST ) ?>"
                                            <?= !$this->detailProductItem->isAvailable() ? 'disabled' : '' ?> >
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <!--<img src="/assets/img/product1.png" class="img-fluid mx-auto d-block my-3 " alt="">-->


                <?= $this->partial(
                /** client/html/catalog/detail/partials/image
                 * Relative path to the detail image partial template file
                 *
                 * Partials are templates which are reused in other templates and generate
                 * reoccuring blocks filled with data from the assigned values. The image
                 * partial creates an HTML block for the catalog detail images.
                 *
                 * @param string Relative path to the template file
                 * @since 2017.01
                 */
                    $this->config( 'client/html/catalog/detail/partials/image', 'catalog/detail/image' ),
                    ['mediaItems' => $this->get( 'detailMediaItems', map() ), 'params' => $this->param()]
                ) ?>
            </div>
        </div>


        <h3 class=" mt-3 mt-lg-5">Related Products</h3>
        <div class="row my-4">
            <div class="col-md-6 col-lg-3 my-3">
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
            <div class="col-md-6 col-lg-3 my-3">
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
            <div class="col-md-6 col-lg-3 my-3">
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
            <div class="col-md-6 col-lg-3 my-3">
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
        </div>
        <div class="d-flex my-4 my-lg-5 align-items-center justify-content-center">
            <span class="pagination"><i class="fa-solid fa-angle-left"></i></span>
            <h5 class="m-0 mx-3">1/3</h5>
            <span class="pagination"><i class="fa-solid fa-angle-right"></i></span>
        </div>
    </div>
<?php endif ?>
