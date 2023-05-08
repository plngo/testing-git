<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

$enc = $this->encoder();
$key = $this->param( 'f_catid' ) ? 'client/html/catalog/tree/url' : 'client/html/catalog/lists/url';


/** client/html/catalog/lists/pagination
 * Enables or disables pagination in list views
 *
 * Pagination is automatically hidden if there are not enough products in the
 * category or search result. But sometimes you don't want to show the pagination
 * at all, e.g. if you implement infinite scrolling by loading more results
 * dynamically using AJAX.
 *
 * @param boolean True for enabling, false for disabling pagination
 * @since 2019.04
 */

/** client/html/catalog/lists/basket-add
 * Display the "add to basket" button for each product item
 *
 * Enables the button for adding products to the basket from the list view.
 * This works for all type of products, even for selection products with product
 * variants and product bundles. By default, also optional attributes are
 * displayed if they have been associated to a product.
 *
 * **Note:** To fetch the necessary product variants, you have to extend the
 * list of domains for "client/html/catalog/lists/domains", e.g.
 *
 *  client/html/catalog/lists/domains = array( 'attribute', 'media', 'price', 'product', 'text' )
 *
 * @param boolean True to display the button, false to hide it
 * @since 2016.01
 * @see client/html/catalog/home/basket-add
 * @see client/html/catalog/detail/basket-add
 * @see client/html/catalog/product/basket-add
 * @see client/html/basket/related/basket-add
 * @see client/html/catalog/domains
 */

/** client/html/catalog/lists/infinite-scroll
 * Enables infinite scrolling in product catalog list
 *
 * If set to true, products from the next page are loaded via XHR request
 * and added to the product list when the user reaches the list bottom.
 *
 * @param boolean True to use infinite scrolling, false to disable it
 * @since 2019.10
 */
$infiniteScroll = $this->config( 'client/html/catalog/lists/infinite-scroll', false );

$url = '';
if( $infiniteScroll && $this->get( 'listPageNext', 0 ) > $this->get( 'listPageCurr', 0 ) ) {
	$url = $this->link( 'client/html/catalog/lists/url', ['l_page' => $this->get( 'listPageNext' )] + $this->get( 'listParams', [] ) );
}


?>
<?= $this->partial(
    $this->get( 'listPartial', 'catalog/lists/items' ),
    array(
        'require-stock' => (int) $this->config( 'client/html/basket/require-stock', true ),
        'basket-add' => $this->config( 'client/html/catalog/lists/basket-add', false ),
        'products' => $this->get( 'listProductItems', map() ),
        'position' => $this->get( 'listPosition' ),
        'infinite-url' => $url,
    )
) ?>
