<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

$enc = $this->encoder();


?>
<br>
<br>
<br>
<br>
<br>
<br>
<section class="aimeos checkout-confirm" data-jsonurl="<?= $enc->attr( $this->link( 'client/jsonapi/url' ) ) ?>">
	<div class="container-xxl">

		<h1>Thank You</h1>

		<div class="checkout-confirm-intro">
			<?php switch( $this->confirmOrderItem->getStatusPayment() ) : case \Aimeos\MShop\Order\Item\Base::PAY_CANCELED: ?>
				<p class="note"><?= nl2br( $enc->html( $this->translate( 'client', "The order was canceled.
Do you wish to retry your order?" ), $enc::TRUST ) ); break ?></p>
			<?php case \Aimeos\MShop\Order\Item\Base::PAY_REFUSED: ?>
				<p class="note"><?= nl2br( $enc->html( $this->translate( 'client', "Unfortunately, the payment for your order was refused.
Do you wish to retry?" ), $enc::TRUST ) ); break ?></p>
			<?php case \Aimeos\MShop\Order\Item\Base::PAY_PENDING: ?>
				<p class="note"><?= nl2br( $enc->html( $this->translate( 'client', "The payment confirmation for your order is still pending.
You will get an e-mail as soon as the payment is authorized." ), $enc::TRUST ) ); break ?></p>
			<?php case \Aimeos\MShop\Order\Item\Base::PAY_AUTHORIZED: ?>
				<p class="note"><?= nl2br( $enc->html( $this->translate( 'client', "Thank you for your order and authorizing the payment.
An e-mail with the order details will be sent to you within the next few minutes." ), $enc::TRUST ) ); break ?></p>
			<?php case \Aimeos\MShop\Order\Item\Base::PAY_RECEIVED: ?>
				<p class="note"><?= nl2br( $enc->html( $this->translate( 'client', "Thank you for your order.
We received your payment and an e-mail with the order details will be sent to you within the next few minutes." ), $enc::TRUST ) ); break ?></p>
			<?php endswitch ?>
		</div>

		<div class="checkout-confirm-basic">
			<h2><?= $enc->html( $this->translate( 'client', 'Order status' ), $enc::TRUST ) ?></h2>

			<?php if( isset( $this->confirmOrderItem ) ) : ?>
				<ul class="attr-list">
					<li class="form-item">
						<span class="name">
							<?= $enc->html( $this->translate( 'client', 'Order ID' ), $enc::TRUST ) ?>
						</span>
						<span class="value">
							<?= $enc->html( $this->confirmOrderItem->getOrderNumber() ) ?>
						</span>
					</li>
					<li class="form-item">
						<span class="name">
							<?= $enc->html( $this->translate( 'client', 'Payment status' ), $enc::TRUST ) ?>
						</span>
						<span class="value">
							<?php $code = 'pay:' . $this->confirmOrderItem->getStatusPayment() ?>
							<?= $enc->html( $this->translate( 'mshop/code', $code ) ) ?>
						</span>
					</li>
				</ul>
			<?php endif ?>

		</div>

		<div class="checkout-confirm-retry">

			<?php if( isset( $this->confirmOrderItem ) && $this->confirmOrderItem->getStatusPayment() < \Aimeos\MShop\Order\Item\Base::PAY_REFUND ) : ?>
				<div class="button-group">
					<a class="btn btn-default btn-lg" href="<?= $enc->attr( $this->link( 'client/html/checkout/standard/url', ['c_step' => 'payment'] ) ) ?>">
						<?= $enc->html( $this->translate( 'client', 'Change payment' ), $enc::TRUST ) ?>
					</a>
					<a class="btn btn-primary btn-lg" href="<?= $enc->attr( $this->link( 'client/html/checkout/standard/url', ['c_step' => 'process', 'cs_option_terms' => 1, 'cs_option_terms_value' => 1, 'cs_order' => 1] ) ) ?>">
						<?= $enc->html( $this->translate( 'client', 'Try again' ), $enc::TRUST ) ?>
					</a>
				</div>
			<?php endif ?>

		</div>
	</div>
</section>
