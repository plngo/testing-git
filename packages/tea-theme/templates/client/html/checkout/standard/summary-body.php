<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

$enc = $this->encoder();

$checkoutAddressUrl = $this->link( 'client/html/checkout/standard/url', ['c_step' => 'address'] );
$checkoutDeliveryUrl = $this->link( 'client/html/checkout/standard/url', ['c_step' => 'delivery'] );
$checkoutPaymentUrl = $this->link( 'client/html/checkout/standard/url', ['c_step' => 'payment'] );
$basketUrl = $this->link( 'client/html/basket/standard/url' );


?>
<?php $this->block()->start( 'checkout/standard/summary' ) ?>
<section class="checkout-standard-summary common-summary">
	<input type="hidden" name="<?= $enc->attr( $this->formparam( ['cs_order'] ) ) ?>" value="1">

	<div class="common-summary-detail row">
		<div class="header">
			<a class="modify" href="<?= $enc->attr( $basketUrl ) ?>">
				<?= $enc->html( $this->translate( 'client', 'Change' ), $enc::TRUST ) ?>
			</a>
			<h2><?= $enc->html( $this->translate( 'client', 'Details' ), $enc::TRUST ) ?></h2>
		</div>

		<div class="basket table-responsive">
			<?= $this->partial(
				/** client/html/checkout/standard/summary/detail
				 * Location of the detail partial template for the checkout summary
				 *
				 * To configure an alternative template for the detail partial, you
				 * have to configure its path relative to the template directory
				 * (usually client/html/templates/). It's then used to display the
				 * product detail block on the summary page during the checkout process.
				 *
				 * @param string Relative path to the detail partial
				 * @since 2017.01
				 * @see client/html/checkout/standard/summary/address
				 * @see client/html/checkout/standard/summary/options
				 * @see client/html/checkout/standard/summary/service
				 */
				$this->config( 'client/html/checkout/standard/summary/detail', 'common/summary/detail' ),
				['summaryBasket' => $this->standardBasket]
			) ?>
		</div>
	</div>

</section>
<?php $this->block()->stop() ?>
<?= $this->block()->get( 'checkout/standard/summary' ) ?>
