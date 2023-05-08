<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

$enc = $this->encoder();


?>
<section class="aimeos checkout-standard" data-jsonurl="<?= $enc->attr( $this->link( 'client/jsonapi/url' ) ) ?>">
	<form class="container-xxl" method="<?= $enc->attr( $this->get( 'standardMethod', 'POST' ) ) ?>" action="<?= $enc->attr( $this->get( 'standardUrlNext' ) ) ?>">
		<?= $this->csrf()->formfield() ?>
		<?= $this->get( 'body' ) ?>
	</form>
</section>
