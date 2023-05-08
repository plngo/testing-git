<?php if ($_SERVER['REQUEST_URI'] == '/') : ?>
<?php
/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

$enc = $this->encoder();


/** client/html/common/partials/products
 * Relative path to the products partial template file
 *
 * Partials are templates which are reused in other templates and generate
 * reoccuring blocks filled with data from the assigned values. The products
 * partial creates an HTML block for a product listing.
 *
 * @param string Relative path to the template file
 * @since 2017.01
 */


?>
<div class="catalog-list-items product-list"
	data-infiniteurl="<?= $enc->attr( $this->get( 'infinite-url' ) ) ?>"
	data-pinned="<?= $enc->attr( $this->session( 'aimeos/catalog/session/pinned/list', [] ) ) ?>">

	<?= $this->partial(
		$this->config( 'client/html/common/partials/products', 'common/partials/products' ),
		array(
			'require-stock' => (int) $this->config( 'client/html/basket/require-stock', true ),
			'basket-add' => $this->config( 'client/html/catalog/lists/basket-add', false ),
			'products' => $this->get( 'products', map() ),
			'position' => $this->get( 'position' ),
		)
	) ?>

</div>

<?php elseif(strpos($_SERVER['REQUEST_URI'], 'f_search')): ?>

    <?php
    $enc = $this->encoder();
    $position = $this->get( 'position' );
    $detailTarget = $this->config( 'client/html/catalog/detail/url/target' );
    $detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );
    $detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );
    $detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );
    $detailFilter = array_flip( $this->config( 'client/html/catalog/detail/url/filter', ['d_prodid'] ) );
    ?>
    <h2 class="text-center fw-semibold text-darkblue my-4">Search</h2>
    <div class="search-wrapper position-relative">
          <span class="searchIconInput">
            <i class="fa-solid fa-magnifying-glass"></i>
          </span>
        <input type="text" class="searchInput fw-semibold" placeholder="Search" />
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-5 col-lg-3">
                <h5>Home > Search</h5>
                <p class="text-secondary">Showing 1-378 of 378 products</p>

            </div>
            <div class="col-md-12 col-lg-9  pt-4">
                <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                    <p class="text-darkblue h6 m-0">Sort by</p>
                    <div class="vertical-lines"></div>
                    <select name="" title="price" id="" class="price-select mx-3">
                        <option value="">10 - 15</option>
                        <option value="">20 - 50</option>
                        <option value="">80 - 150</option>
                    </select>
                    <select name="" title="condition" id="" class="condition-select">
                        <option value="">Newest</option>
                        <option value="">Oldest</option>
                        <option value="">New</option>
                    </select>
                </div>


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
                <div class="row mt-4">


                    <?php foreach( $this->get( 'products', [] ) as $id => $productItem ) : ?>
                        <?php
                        $params = array_diff_key( ['d_name' => $productItem->getName( 'url' ), 'd_prodid' => $productItem->getId(), 'd_pos' => $position !== null ? $position++ : ''], $detailFilter );
                        $url = $this->url( ( $productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );

                        $mediaItems = $productItem->getRefItems( 'media', 'default', 'default' );
                        ?>
                        <div class="col-md-6 col-lg-4 my-3">

                            <div class="product-card p-2 pb-3 position-relative" data-prodid="<?= $enc->attr( $id ) ?>" data-reqstock="<?= (int) $this->get( 'require-stock', true ) ?>"
                                 itemprop="<?= $this->get( 'itemprop' ) ?>" itemscope itemtype="http://schema.org/Product">
                                <?php if( $mediaItem = $mediaItems->first() ) : ?>
                                    <span class="heartIcon"><i class="fa-sharp fa-regular fa-heart"></i></span>
                                    <a href="<?= $enc->attr( $url ) ?>">
                                        <?php if( $mediaItem = $mediaItems->first() ) : ?>
                                            <img loading="lazy" itemprop="image" class="img-fluid product-image" style="width: 100%;"
                                                 src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>"
                                                 srcset="<?= $enc->attr( $this->imageset( $mediaItem->getPreviews( true ), $mediaItem->getFileSystem() ) ) ?>"
                                                 sizes="<?= $enc->attr( $this->config( 'client/html/common/imageset-sizes', '(min-width: 260px) 240px, 100vw' ) ) ?>"
                                                 alt="<?= $enc->attr( $mediaItem->getProperties( 'title' )->first() ?: $productItem->getName() ) ?>"
                                            >
                                        <?php endif ?>
                                    </a>
                                <?php endif ?>
                                <div class="d-flex my-2 justify-content-between">
                                    <p class="h6 m-0 text-dark"><?= $enc->html( $productItem->getName(), $enc::TRUST ) ?></p>
                                    <p class="h6 m-0 text-darkblue">200 g</p>
                                </div>
                                <p
                                    class="text-secondary m-0 fw-normal my-2 product-description"
                                >
                                    <?php foreach( $productItem->getRefItems( 'text', 'short', 'default' ) as $textItem ) : ?>
                                        <?= $enc->html( $textItem->getContent(), $enc::TRUST ) ?>
                                    <?php endforeach ?>
                                </p>
                                <div
                                    class="d-flex mt-3 justify-content-between align-items-center"
                                >
                                    <div class="d-flex align-items-center">
                                        <?=  $this->partial(
                                            $this->config( 'client/html/common/partials/price', 'common/partials/price' ),
                                            ['prices' => $productItem->getRefItems( 'price', null, 'default' )]
                                        ) ?>
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
                                        <h6 class="m-0 ms-1 text-secondary"><del>3.50 JD</del></h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <?php if( $this->get( 'basket-add', false ) ) : ?>

                                            <form class="basket" method="POST" action="<?= $enc->attr( $this->link( 'client/html/basket/standard/url' ) ) ?>">
                                                <!-- catalog.lists.items.csrf -->
                                                <?= $this->csrf()->formfield() ?>
                                                <!-- catalog.lists.items.csrf -->

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
                        </div>

                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="d-flex my-4 align-items-center justify-content-center">
            <span class="pagination"><i class="fa-solid fa-angle-left"></i></span>
            <h5 class="m-0 mx-3">1/3</h5>
            <span class="pagination"><i class="fa-solid fa-angle-right"></i></span>
        </div>
    </div>

<?php else: ?>

<?php
    $enc = $this->encoder();
    $position = $this->get( 'position' );
    $detailTarget = $this->config( 'client/html/catalog/detail/url/target' );
    $detailController = $this->config( 'client/html/catalog/detail/url/controller', 'catalog' );
    $detailAction = $this->config( 'client/html/catalog/detail/url/action', 'detail' );
    $detailConfig = $this->config( 'client/html/catalog/detail/url/config', [] );
    $detailFilter = array_flip( $this->config( 'client/html/catalog/detail/url/filter', ['d_prodid'] ) );
    ?>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-5 col-lg-3">
                <h5>Home > Category</h5>
                <p class="text-secondary">Showing 1-378 of 378 products</p>
                <select
                    name="category"
                    title="category"
                    id=""
                    class="category-select"
                >
                    <option value="">Tea 1</option>
                    <option value="">Tea 2</option>
                    <option value="">Tea 3</option>
                    <option value="">Tea 4</option>
                </select>
            </div>
            <div class="col-md-12 col-lg-9  pt-4">
                <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                    <p class="text-darkblue h6 m-0">Sort by</p>
                    <div class="vertical-lines"></div>
                    <select name="" title="price" id="" class="price-select mx-3">
                        <option value="">10 - 15</option>
                        <option value="">20 - 50</option>
                        <option value="">80 - 150</option>
                    </select>
                    <select name="" title="condition" id="" class="condition-select">
                        <option value="">Newest</option>
                        <option value="">Oldest</option>
                        <option value="">New</option>
                    </select>
                </div>


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
                <div class="row mt-4">


                    <?php foreach( $this->get( 'products', [] ) as $id => $productItem ) : ?>
                        <?php
                        $params = array_diff_key( ['d_name' => $productItem->getName( 'url' ), 'd_prodid' => $productItem->getId(), 'd_pos' => $position !== null ? $position++ : ''], $detailFilter );
                        $url = $this->url( ( $productItem->getTarget() ?: $detailTarget ), $detailController, $detailAction, $params, [], $detailConfig );

                        $mediaItems = $productItem->getRefItems( 'media', 'default', 'default' );
                        ?>
                    <div class="col-md-6 col-lg-4 my-3">

                        <div class="product-card p-2 pb-3 position-relative" data-prodid="<?= $enc->attr( $id ) ?>" data-reqstock="<?= (int) $this->get( 'require-stock', true ) ?>"
                             itemprop="<?= $this->get( 'itemprop' ) ?>" itemscope itemtype="http://schema.org/Product">
                            <?php if( $mediaItem = $mediaItems->first() ) : ?>
                                <span class="heartIcon"><i class="fa-sharp fa-regular fa-heart"></i></span>
                            <a href="<?= $enc->attr( $url ) ?>">
                                <?php if( $mediaItem = $mediaItems->first() ) : ?>
                                    <img loading="lazy" itemprop="image" class="img-fluid product-image" style="width: 100%;"
                                         src="<?= $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) ) ?>"
                                         srcset="<?= $enc->attr( $this->imageset( $mediaItem->getPreviews( true ), $mediaItem->getFileSystem() ) ) ?>"
                                         sizes="<?= $enc->attr( $this->config( 'client/html/common/imageset-sizes', '(min-width: 260px) 240px, 100vw' ) ) ?>"
                                         alt="<?= $enc->attr( $mediaItem->getProperties( 'title' )->first() ?: $productItem->getName() ) ?>"
                                    >
                                <?php endif ?>
                            </a>
                            <?php endif ?>
                            <div class="d-flex my-2 justify-content-between">
                                <p class="h6 m-0 text-dark"><?= $enc->html( $productItem->getName(), $enc::TRUST ) ?></p>
                                <p class="h6 m-0 text-darkblue">200 g</p>
                            </div>
                            <p
                                class="text-secondary m-0 fw-normal my-2 product-description"
                            >
                                <?php foreach( $productItem->getRefItems( 'text', 'short', 'default' ) as $textItem ) : ?>
                                    <?= $enc->html( $textItem->getContent(), $enc::TRUST ) ?>
                                <?php endforeach ?>
                            </p>
                            <div
                                class="d-flex mt-3 justify-content-between align-items-center"
                            >
                                <div class="d-flex align-items-center">
                                    <?=  $this->partial(
                                        $this->config( 'client/html/common/partials/price', 'common/partials/price' ),
                                        ['prices' => $productItem->getRefItems( 'price', null, 'default' )]
                                    ) ?>
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
                                    <h6 class="m-0 ms-1 text-secondary"><del>3.50 JD</del></h6>
                                </div>
                                <div class="d-flex align-items-center">
                                    <?php if( $this->get( 'basket-add', false ) ) : ?>

                                        <form class="basket" method="POST" action="<?= $enc->attr( $this->link( 'client/html/basket/standard/url' ) ) ?>">
                                            <!-- catalog.lists.items.csrf -->
                                            <?= $this->csrf()->formfield() ?>
                                            <!-- catalog.lists.items.csrf -->

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
                    </div>

                    <?php endforeach ?>
                </div>
            </div>
        </div>

        <div class="d-flex my-4 align-items-center justify-content-center">
            <span class="pagination"><i class="fa-solid fa-angle-left"></i></span>
            <h5 class="m-0 mx-3">1/3</h5>
            <span class="pagination"><i class="fa-solid fa-angle-right"></i></span>
        </div>
    </div>

<?php endif ?>



