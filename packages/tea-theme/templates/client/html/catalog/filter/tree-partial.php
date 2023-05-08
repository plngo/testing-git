<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2015-2020
 */

$enc = $this->encoder();


/** client/html/catalog/tree/url/target
 * Destination of the URL where the controller specified in the URL is known
 *
 * The destination can be a page ID like in a content management system or the
 * module of a software development framework. This "target" must contain or know
 * the controller that should be called by the generated URL.
 *
 * @param string Destination of the URL
 * @since 2019.01
 * @see client/html/catalog/tree/url/controller
 * @see client/html/catalog/tree/url/action
 * @see client/html/catalog/tree/url/config
 */
$target = $this->config( 'client/html/catalog/tree/url/target' );

/** client/html/catalog/tree/url/controller
 * Name of the controller whose action should be called
 *
 * In Model-View-Controller (MVC) applications, the controller contains the methods
 * that create parts of the output displayed in the generated HTML page. Controller
 * names are usually alpha-numeric.
 *
 * @param string Name of the controller
 * @since 2019.01
 * @see client/html/catalog/tree/url/target
 * @see client/html/catalog/tree/url/action
 * @see client/html/catalog/tree/url/config
 */
$controller = $this->config( 'client/html/catalog/tree/url/controller', 'catalog' );

/** client/html/catalog/tree/url/action
 * Name of the action that should create the output
 *
 * In Model-View-Controller (MVC) applications, actions are the methods of a
 * controller that create parts of the output displayed in the generated HTML page.
 * Action names are usually alpha-numeric.
 *
 * @param string Name of the action
 * @since 2019.01
 * @see client/html/catalog/tree/url/target
 * @see client/html/catalog/tree/url/controller
 * @see client/html/catalog/tree/url/config
 */
$action = $this->config( 'client/html/catalog/tree/url/action', 'list' );

/** client/html/catalog/tree/url/config
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
 * @since 2019.01
 * @see client/html/catalog/tree/url/target
 * @see client/html/catalog/tree/url/controller
 * @see client/html/catalog/tree/url/action
 * @see client/html/url/config
 */
$config = $this->config( 'client/html/catalog/tree/url/config', [] );


/** client/html/common/partials/media
 * Relative path to the media partial template file
 *
 * Partials are templates which are reused in other templates and generate
 * reoccuring blocks filled with data from the assigned values. The media
 * partial creates an HTML block of for images, video, audio or other documents.
 *
 * The partial template files are usually stored in the templates/partials/ folder
 * of the core or the extensions. The configured path to the partial file must
 * be relative to the templates/ folder, e.g. "common/partials/media.php".
 *
 * @param string Relative path to the template file
 * @since 2015.08
 */


?>

<div class="container py-3 py-lg-5">
    <h2 class="text-center mt-5 my-lg-5 pb-lg-2 text-darkblue fw-semibold">
        Categories
    </h2>
    <div class="row">

        <?php foreach( $this->get( 'nodes', [] ) as $item ) : ?>
            <?php if( $item->getStatus() > 0 ) : ?>
                <?php $params = array_merge( $this->get( 'params', [] ), ['f_name' => $item->getName( 'url' ), 'f_catid' => $item->getId()] ) ?>

                <?php $src = "/assets/img/tea1.png"; ?>
                <?php foreach( $item->getRefItems( 'media' ) as $mediaItem ) : ?>
                    <?php $src = $enc->attr( $this->content( $mediaItem->getPreview(), $mediaItem->getFileSystem() ) );
                    break;
                    ?>
                <?php endforeach ?>

                <div class="col-6 col-md-6 col-md-4 col-lg-3 d-flex flex-column">
                    <a href="<?= ($enc->html( $item->getName(), $enc::TRUST ) == 'Home') ? '/' : $enc->attr( $this->url( $item->getTarget() ?: $target, $controller, $action, $params, [], $config ) ) ?>"> <img src="<?php echo $src; ?>" class="img-fluid tea-img" alt=""/></a>
                    <h4 class="fw-semibold text-center mt-3"><?= $enc->html( $item->getName(), $enc::TRUST ) ?></h4>
                </div>

            <?php endif ?>
        <?php endforeach ?>

        <!--<div class="col-6 col-md-6 col-md-4 col-lg-3 d-flex flex-column">
            <img src="/assets/img/tea5.png" class="img-fluid tea-img" alt=""/>
            <h4 class="fw-semibold text-center mt-3">Fine Black Tea</h4>
        </div>
        <div class="col-6 col-md-6 col-md-4 col-lg-3 d-flex flex-column">
            <img src="/assets/img/tea6.png" class="img-fluid tea-img" alt=""/>
            <h4 class="fw-semibold text-center mt-3">Fine Black Tea</h4>
        </div>
        <div class="col-6 col-md-6 col-md-4 col-lg-3 d-flex flex-column">
            <img src="/assets/img/tea3.png" class="img-fluid tea-img" alt=""/>
            <h4 class="fw-semibold text-center mt-3">Fine Black Tea</h4>
        </div>
        <div class="col-6 col-md-6 col-md-4 col-lg-3 d-flex flex-column">
            <img src="/assets/img/tea4.png" class="img-fluid tea-img" alt=""/>
            <h4 class="fw-semibold text-center mt-3">Fine Black Tea</h4>
        </div>-->
    </div>
</div>

