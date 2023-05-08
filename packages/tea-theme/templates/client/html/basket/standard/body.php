<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2015-2022
 */

$enc = $this->encoder();


?>
<?php if( isset( $this->standardBasket ) ) : ?>

	<section class="aimeos basket-standard" data-jsonurl="<?= $enc->attr( $this->link( 'client/jsonapi/url' ) ) ?>">
		<div class="container-xxl">

			<form method="POST" action="<?= $enc->attr( $this->link( 'client/html/basket/standard/url' ) ) ?>">
				<?= $this->csrf()->formfield() ?>

				<!--<div class="row header">
					<h1 class="col-12 col-sm-6"><?/*= $enc->html( $this->translate( 'client', 'Basket' ), $enc::TRUST ) */?></h1>

					<?php /*if( $this->get( 'contextUserId' ) ) : */?>
						<div class="col-12 col-sm-6">
							<div class="input-group basket-save">
								<input class="form-control basket-name" type="text" maxlength="255"
									placeholder="<?/*= $enc->attr( $this->translate( 'client', 'Basket name' ) ) */?>"
									name="<?/*= $enc->attr( $this->formparam( 'b_name' ) ) */?>"
								>
								<button class="btn" type="submit"
									formaction="<?/*= $enc->attr( $this->link( 'client/html/basket/standard/url', ['b_action' => 'save'] ) ) */?>">
									<?/*= $enc->attr( $this->translate( 'client', 'Save' ) ) */?>
								</button>
							</div>
						</div>
					<?php /*endif */?>
				</div>-->

				<div class="common-summary-detail">
					<div class="basket">
						<?= $this->partial(
							$this->config( 'client/html/basket/standard/summary/detail', 'common/summary/detail' ),
							[
								'summaryEnableModify' => true,
								'summaryBasket' => $this->standardBasket,
								'summaryErrorCodes' => $this->get( 'standardErrorCodes', [] )
							]
						) ?>
					</div>
				</div>

			</form>
		</div>
	</section>

<?php endif ?>
