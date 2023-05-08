<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2012
 * @copyright Aimeos (aimeos.org), 2014-2022
 */

/* Available data:
 * - mediaItems : Media items incl. referenced items
 */

$enc = $this->encoder();


?>
<?php if( ( $imgNum = count( $this->get( 'mediaItems', [] ) ) ) > 0 ) : ?>

    <?php $index = 0; foreach( $this->get( 'mediaItems', [] ) as $id => $mediaItem ) : ?>
        <div class="col-md-6">

        <div class="img-fluid mx-auto d-block my-3" data-index="<?= $enc->attr( $index ) ?>">
            <?= $this->image( $mediaItem, $this->config( 'client/html/catalog/detail/imageset-sizes', '(min-width: 2000px) 720px, (min-width: 500px) 460px, 100vw' ), true ) ?>
        </div>
        </div>

        <?php $index++; if ($index > 0) break; endforeach ?>

<?php endif ?>
