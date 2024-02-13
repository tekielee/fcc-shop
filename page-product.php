<?php get_header(); ?>

<?php

    $product_id = $_REQUEST [ 'product_id' ];

    $product = wc_get_product ( $product_id );

    $product_related_ids = wc_get_related_products ( $product_id );

    $data = $product->get_data ();

    $average = 3;//$product->get_average_rating();

    $attachment_thumbnails = [];

    foreach ( $product_related_ids as $product_related_id ) {

        $attachment_thumbnails[$product_related_id] = get_woocommerce_image ( $product_related_id, $image_size = 'thumbnail' );

    }

    // echo '<pre>';
    // print_r($product_related_id);
    // echo '</pre>';
    // echo '<pre>';
    // print_r($product);
    // echo '</pre>';

?>

<div class="container">

    <div class="row featurette pb-3 mb-5 mt-5">

        <div class="col-md-7 order-md-2">

        <h2 class="featurette-heading fw-normal lh-1">

            <span id="name"><?php _e ( $data[ 'name' ] ); ?></span>

        </h2>

        <p>
        <?php
            if ( $average > 0 ) {

                $width = 'width:' . ( ( $average / 5 ) * 100 ) . '%;';
        ?>

            <div class="star-rating "><div
                style="height:15px;<?php _e ($width); ?>background-color:yellow;"
            ></div></div>

        <?php } ?>

        </p>

        <p class="fw-bold"><?php _e ( '$' . number_format ( $data [ 'price' ], 2 ) ); ?></p>

        <p>

            <span id="description"><?php _e ( $data [ 'description' ] ); ?></span>

        </p>

        <table class="product-table">

            <tr>

                <td class="fw-bold">Type:</td>

                <td>Mark</td>

            </tr>

            <tr>

                <td class="fw-bold">Color:</td>

                <td>Jacob</td>

            </tr>

            <tr>

                <td class="fw-bold">Material:</td>

                <td>Larry</td>

            </tr>

            <tr>

                <td class="fw-bold">Brand:</td>

                <td>Larry</td>

            </tr>

        </table>

        <hr/>

        </div>

        <div class="col-md-5 order-md-1">

            <img id="image-full" src="<?php _e ( get_woocommerce_image ( $product_id ) ); ?>" width="530" height="600" />

            <div class="d-flex justify-content-center pt-1">

                <div class="p-2 bd-highlight">

                    <a href="javascript:void(0)" class="<?php _e ( 'product_' . $product_id ); ?>">
                        <img src="<?php _e ( get_woocommerce_image ( $product_id ) ); ?>"
                            width="80" height="80"
                        />
                    </a>

                </div>

                <?php foreach ( $attachment_thumbnails as $product_related_id => $attachment_thumbnail ) { ?>

                <div class="p-2 bd-highlight">

                    <a href="javascript:void(0)" class="<?php _e ( 'product_' . $product_related_id ); ?>">
                        <img src="<?php _e ( $attachment_thumbnail ); ?>"
                            width="80" height="80"
                        />
                    </a>

                </div>

                <?php } ?>

            </div>

        </div>

    </div>

</div>

<?php get_footer(); ?>
