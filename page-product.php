<?php get_header(); ?>

<?php

    $product_id = $_REQUEST['product_id'];

    $product = wc_get_product ( $product_id );

    $data = $product->get_data ();

    $attachment_ids = $product->get_gallery_image_ids ();

    $attachment_thumbnails = get_images_gallery ( $attachment_ids, array ( '80', '80' ) );

    echo '<pre>';
    print_r($product);
    echo '</pre>';

?>

<div class="container">

    <div class="row featurette pb-3 mb-5 mt-5">

        <div class="col-md-7 order-md-2">

        <h2 class="featurette-heading fw-normal lh-1">

            <?php _e ( $data[ 'name' ] ); ?>

        </h2>

        <p class="lead">

            <?php _e ( $data [ 'description' ] ); ?>

        </p>

        </div>

        <div class="col-md-5 order-md-1">

            <img src="<?php _e ( get_woocommerce_image ( $product_id ) ); ?>" width="500" height="600" />

            <div class="d-flex justify-content-center pt-1">

                <?php foreach ( $attachment_thumbnails as $attachment_thumbnail ) {?>

                    <div class="p-2 bd-highlight">

                        <?php _e ( $attachment_thumbnail ); ?>

                    </div>

                <?php } ?>

            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>
