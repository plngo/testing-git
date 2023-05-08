<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2016-2022
 */

/* Expected data:
 * - products : List of products incl. referenced items
 * - basket-add : True to display "add to basket" button, false if not (optional)
 * - require-stock : True if the stock level should be displayed (optional)
 * - itemprop : Schema.org property for the product items (optional)
 * - position : Position is product list to start from (optional)
 */


$enc = $this->encoder();
$position = $this->get( 'position' );


/** client/html/catalog/detail/url/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * @param string Destination of the URL
 * @since 2014.03
 * @see client/html/catalog/detail/url/controller
 * @see client/html/catalog/detail/url/action
 * @see client/html/catalog/detail/url/config
 * @see client/html/catalog/detail/url/filter
 */
$detailTarget = $this->config( 'client/html/catalog/detail/url/target' );

/** client/html/catalog/detail/url/controller
 * Name of the controller whose action should be called
 *
 * In Model-View-Controller (MVC) applications, the controller contains the methods
 * that create parts of the output displayed in the generated HTML page. Controller
 * names are usually alpha-numeric.
 *
 * @param string Name of the controller
 * @since 2014.03
 * @see client/html/catalog/detail/url/target
 * @see client/html/catalog/detail/url/action
 * @see client/html/catalog/detail/url/config
 * @see client/html/catalog/detail/url/filter
 */
$detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );

/** client/html/catalog/detail/url/action
 * Name of the action that should create the output
 *
 * In Model-View-Controller (MVC) applications, actions are the methods of a
 * controller that create parts of the output displayed in the generated HTML page.
 * Action names are usually alpha-numeric.
 *
 * @param string Name of the action
 * @since 2014.03
 * @see client/html/catalog/detail/url/target
 * @see client/html/catalog/detail/url/controller
 * @see client/html/catalog/detail/url/config
 * @see client/html/catalog/detail/url/filter
 */
$detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );

/** client/html/catalog/detail/url/config
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
 * @see client/html/catalog/detail/url/target
 * @see client/html/catalog/detail/url/controller
 * @see client/html/catalog/detail/url/action
 * @see client/html/catalog/detail/url/filter
 * @see client/html/url/config
 */
$detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );

/** client/html/catalog/detail/url/filter
 * Removes parameters for the detail page before generating the URL
 *
 * For SEO, it's nice to have product URLs which contains the product names only.
 * Usually, product names are unique so exactly one product is found when resolving
 * the product by its name. If two or more products share the same name, it's not
 * possible to refer to the correct product and in this case, the product ID is
 * required as unique identifier.
 *
 * This setting removes the listed parameters from the URLs of the detail pages.
 *
 * @param array List of parameter names to remove
 * @since 2019.04
 * @see client/html/catalog/detail/url/target
 * @see client/html/catalog/detail/url/controller
 * @see client/html/catalog/detail/url/action
 * @see client/html/catalog/detail/url/config
 */
$detailFilter = array_flip( $this->config( 'client/html/catalog/detail/url/filter', ['d_prodid'] ) );


/** client/html/common/imageset-sizes
 * Size hints for loading the appropriate catalog home image sizes
 *
 * Modern browsers can load images of different sizes depending on their viewport
 * size. This is also known as serving "responsive images" because on small
 * smartphone screens, only small images are loaded while full width images are
 * loaded on large desktop screens.
 *
 * A responsive image contains additional "srcset" and "sizes" attributes:
 *
 *  <img src="img.jpg"
 *  	srcset="img-small.jpg 240w, img-large.jpg 720w"
 *  	sizes="(max-width: 320px) 240px, 720px"
 *  >
 *
 * The images and their width in the "srcset" attribute are automatically added
 * based on the sizes of the generated preview images. The value of the "sizes"
 * attribute can't be determined by Aimeos because it depends on the used frontend
 * theme and the size of the images defined in the CSS file. This config setting
 * adds the required value for the "sizes" attribute.
 *
 * It's value consists of one or more comma separated rules with
 * - an optional CSS media query for the view port size
 * - the (max) width the image will be displayed within this viewport size
 *
 * Rules without a media query are independent of the view port size and must be
 * always at last because the rules are evaluated from left to right and the first
 * matching rule is used.
 *
 * The above example tells the browser:
 * - Up to 320px view port width use img-small.jpg
 * - Above 320px view port width use img-large.jpg
 *
 * For more information about the "sizes" attribute of the "img" HTML tag read:
 * {@link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/img#attr-sizes}
 *
 * @param string HTML image "sizes" attribute
 * @since 2021.04
 * @see client/html/common/imageset-sizes
 */


?>

<div class="container-fluid my-5 position-relative">

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

<?php foreach( $this->get( 'products', [] ) as $id => $productItem ) : ?>
	<?php
		$params = array_diff_key( ['d_name' => $productItem->getName( 'url' ), 'd_prodid' => $productItem->getId(), 'd_pos' => $position !== null ? $position++ : ''], $detailFilter );
		$url = $this->url( ( $productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );

		$mediaItems = $productItem->getRefItems( 'media', 'default', 'default' );
	?>

    <div class="product-card p-2 pb-3 position-relative <?= $enc->attr( $productItem->getConfigValue( 'css-class' ) ) ?>"
         data-prodid="<?= $enc->attr( $id ) ?>" data-reqstock="<?= (int) $this->get( 'require-stock', true ) ?>"
         itemprop="<?= $this->get( 'itemprop' ) ?>" itemscope itemtype="http://schema.org/Product">

            <span class="heartIcon"
            ><i class="fa-sharp fa-regular fa-heart"></i
                ></span>
        <a href="<?= $enc->attr( $url ) ?>">
        <?php if( $mediaItem = $mediaItems->first() ) : ?>
            <img loading="lazy" itemprop="image" class="img-fluid product-image"
                 src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>"
                 srcset="<?= $enc->attr( $this->imageset( $mediaItem->getPreviews( true ), $mediaItem->getFileSystem() ) ) ?>"
                 sizes="<?= $enc->attr( $this->config( 'client/html/common/imageset-sizes', '(min-width: 260px) 240px, 100vw' ) ) ?>"
                 alt="<?= $enc->attr( $mediaItem->getProperties( 'title' )->first() ?: $productItem->getName() ) ?>"
            >
        <?php endif ?>




            <div class="d-flex my-2 justify-content-between">
            <p class="h6 m-0 text-dark"><?= $enc->html( $productItem->getName(), $enc::TRUST ) ?></p>
            <p class="h6 m-0 text-darkblue">200 g</p>
        </div>
        <p class="text-secondary m-0 fw-normal my-2 product-description">
            <?php foreach( $productItem->getRefItems( 'text', 'short', 'default' ) as $textItem ) : ?>
                <?= $enc->html( $textItem->getContent(), $enc::TRUST ) ?>
            <?php endforeach ?>
        </p>
        </a>
        <div class="d-flex mt-3 justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <h4 class="m-0">
                    <div class="price-list">
                        <div class="articleitem price price-actual" data-prodid="<?= $enc->attr( $productItem->getId() ) ?>">

                            <?= $this->partial(
                            /** client/html/common/partials/price
                             * Relative path to the price partial template file
                             *
                             * Partials are templates which are reused in other templates and generate
                             * reoccuring blocks filled with data from the assigned values. The price
                             * partial creates an HTML block for a list of price items.
                             *
                             * The partial template files are usually stored in the templates/partials/ folder
                             * of the core or the extensions. The configured path to the partial file must
                             * be relative to the templates/ folder, e.g. "partials/price.php".
                             *
                             * @param string Relative path to the template file
                             * @since 2015.04
                             */
                                $this->config( 'client/html/common/partials/price', 'common/partials/price' ),
                                ['prices' => $productItem->getRefItems( 'price', null, 'default' )]
                            ) ?>

                        </div>

                        <?php if( $this->get( 'basket-add', false ) && $productItem->getType() === 'select' ) : ?>
                            <?php foreach( $productItem->getRefItems( 'product', 'default', 'default' ) as $prodid => $product ) : ?>
                                <?php if( !( $prices = $product->getRefItems( 'price', null, 'default' ) )->isEmpty() ) : ?>

                                    <div class="articleitem price" data-prodid="<?= $enc->attr( $prodid ) ?>">
                                        <?= $this->partial(
                                            $this->config( 'client/html/common/partials/price', 'common/partials/price' ),
                                            array( 'prices' => $prices )
                                        ) ?>
                                    </div>

                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endif ?>
                    </div>
                </h4>
                <h6 class="m-0 ms-1 text-secondary">
                    <del>3.50 JD</del>
                </h6>
            </div>
            <div class="d-flex align-items-center">
                <?php if( $this->get( 'basket-add', false ) ) : ?>

                    <form class="basket" method="POST" action="<?= $enc->attr( $this->link( 'client/html/basket/standard/url' ) ) ?>">
                        <!-- catalog.lists.items.csrf -->
                        <?= $this->csrf()->formfield() ?>
                        <!-- catalog.lists.items.csrf -->

                        <?php if( $productItem->getType() === 'select' ) : ?>

                            <div class="items-selection">
                                <?= $this->partial( $this->config( 'client/html/common/partials/selection', 'common/partials/selection' ), [
                                    'productItems' => $productItem->getRefItems( 'product', 'default', 'default' ),
                                    'productItem' => $productItem
                                ] ) ?>
                            </div>

                        <?php endif ?>

                        <div class="items-attribute">

                            <?= $this->partial(
                                $this->config( 'client/html/common/partials/attribute', 'common/partials/attribute' ),
                                ['productItem' => $productItem]
                            ) ?>

                        </div>

                        <?php if( !$productItem->getRefItems( 'price', 'default', 'default' )->empty() ) : ?>
                            <div class="addbasket">
                                <input type="hidden" value="add"
                                       name="<?= $enc->attr( $this->formparam( 'b_action' ) ) ?>"
                                >
                                <input type="hidden" value="<?= $id ?>"
                                       name="<?= $enc->attr( $this->formparam( array( 'b_prod', 0, 'prodid' ) ) ) ?>"
                                >

                                <div class="number">
                                    <!--<span class="minus">-</span>-->
                                    <span class="minus decrease-item-icon">
                                        <i class="fa-solid fa-minus"></i>
                                    </span>
                                    <input type="text" value="<?= $enc->attr( $productItem->getScale() ) ?>"
                                           min="<?= $enc->attr( $productItem->getScale() ) ?>"
                                           step="<?= $enc->attr( $productItem->getScale() ) ?>"
                                           required="required" <?= !$productItem->isAvailable() ? 'disabled' : '' ?>
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
                                            <?= !$productItem->isAvailable() ? 'disabled' : '' ?> >
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>

                    </form>

                <?php endif ?>

            </div>


        </div>
    </div>


<?php endforeach ?>
            <style>
                span {cursor:pointer; }
                .number{
                    margin:1px;
                }
                input {
                    height: 34px;
                    width: 56px;
                    text-align: center;
                    font-size: 26px;
                    border: 1px solid #ddd;
                    border-radius: 4px;
                    display: inline-block;
                    vertical-align: middle;
                }
            </style>

        </div>
    </div>
    <a href="/shop" class="mt-3 mt-lg-5 see-more-btn">
        See More <i class="fa-solid fa-angles-right"></i>
    </a>
</div>

<?php if ($_SERVER['REQUEST_URI'] == '/') : ?>
<div class="container-fluid p-0">
    <img src="/assets/img/slider1.png" class="img-fluid perfect-tea" alt=""/>
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
            <source src="/assets/img/coffee.mp4" type="video/mp4"/>
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

<?php endif ?>
