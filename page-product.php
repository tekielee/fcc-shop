<?php get_header (); ?>

<?php

    $product_id = $_REQUEST [ 'product_id' ];

    $product = wc_get_product ( $product_id );

    $attachment_ids = get_product_attachment_ids ( $product );

    $images_gallery_thumbnail = get_images_gallery ( $attachment_ids, $image_size = array ( '80', '80') );

    $images_gallery_full = get_images_gallery ( $attachment_ids, $image_size = array ( '500', '500') );

    $product_related_ids = wc_get_related_products ( $product_id );

    $data = $product->get_data ();

    $sizes = $product->get_attribute( 'size' );

    $sizes = explode ( ',', $sizes );

    $average = 3;//$product->get_average_rating();

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

        <table class="product-attribute-table">

            <tr>

                <td>

                    <p>Sizes:</p>

                    <select name="sizes" class="sizes">

                        <?php

                            foreach ( $sizes as $size ) {

                        ?>

                        <option value="<?php _e ( $size ); ?>"><?php _e ( $size ); ?></option>

                        <?php

                            }

                        ?>

                    </select>

                </td>

                <td>

                    <p>Quantity:</p>

                    <select name="quantity" class="quantity">

                        <?php

                            for ( $i = 1; $i <= 10; $i++ ) {

                        ?>

                        <option value="<?php _e ( $i ); ?>"><?php _e ( $i ); ?></option>

                        <?php

                            }

                        ?>

                    </select>
                </td>

            </tr>

        </table>

        <div class="d-flex justify-content-between mt-5">

            <button type="button" class="btn btn-warning px-4">Buy Now</button>

            <button type="button" class="btn btn-primary px-4">Add To Cart</button>

            <button type="button" class="btn btn-light px-5">Save</button>

        </div>

        </div>

        <div class="col-md-5 order-md-1">

            <div>

                <ul class="full-image">

                    <li>

                        <img src="<?php _e ( get_woocommerce_image ( $product_id ) ); ?>" width="500" height="500" />

                    </li>

                    <?php

                        foreach ( $images_gallery_full as $key => $image_gallery_full ) {

                    ?>

                    <li>

                    <?php

                            _e ( $image_gallery_full );

                        }

                    ?>

                    </li>

            </ul>

            <div class="d-flex justify-content-center pt-1">

                <div class="p-2 bd-highlight">

                    <a href="javascript:void(0)" class="thumbnail_1">
                        <img src="<?php _e ( get_woocommerce_image ( $product_id ) ); ?>"
                            width="80" height="80"
                        />
                    </a>

                </div>

                <?php $i = 2; foreach ( $images_gallery_thumbnail as $key => $image_gallery_thumbnail ) { ?>

                <div class="p-2 bd-highlight">

                    <a href="javascript:void(0)" class="<?php _e ( 'thumbnail_' . $i )?>">

                        <?php _e ( $image_gallery_thumbnail ); ?>

                    </a>

                </div>

                <?php $i++; } ?>

            </div>

        </div>

    </div>

</div>

<div class="container">

    <table class="product-related-table">

        <tr>

            <td>

                <div class="d-flex justify-content-between pb-4" style="padding-right:60px;">

                    <div class="p-2 px-4 bg-light">

                        <a id="spec" class="nav-link fw-bold" href="javascript:void(0)">SPECIFICATION</a>

                    </div>

                    <div class="p-2 px-4 bg-light">

                        <a id="warranty" class="nav-link fw-bold" href="javascript:void(0)">WARRANTY INFO</a>

                    </div>

                    <div class="p-2 px-4 bg-light">

                        <a id="shipping" class="nav-link fw-bold" href="javascript:void(0)">SHIPPING INFO</a>
                    </div>

                    <div class="p-2 px-4 bg-light">

                        <a id="seller" class="nav-link fw-bold" href="javascript:void(0)">SELLER PROFILE</a>

                    </div>

                </div>

                <div class="container" id="spec-content">Specs content</div>

                <div class="container" id="warranty-content">Warranty content</div>

                <div class="container" id="shipping-content">Shipping content</div>

                <div class="container" id="seller-content">Seller content</div>

            </td>

            <td>

                <h5 class="text-center">Similar Products</h5>

                <div class="list-group">

                    <?php foreach ( $product_related_ids as $product_related_id ) {

                              $product_related = wc_get_product ( $product_related_id );

                              $data_related = $product_related->get_data ();

                    ?>

                    <a href="<?php _e ( get_site_url () . '/product/?product_id=' . $product_related_id ); ?>" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">

                    <img src="<?php _e ( get_woocommerce_image ( $product_related_id, $image_size = 'thumbnail' ) ); ?>" alt="twbs" width="40" height="40" class="rounded-circle flex-shrink-0">

                        <div class="d-flex gap-2 w-100 justify-content-between">

                            <div>

                                <h6 class="mb-0"><?php _e ( $data_related [ 'name' ] ); ?></h6>

                                <p class="mb-0 opacity-75"><?php _e ( $data_related [ 'short_description' ] ); ?></p>

                            </div>

                        </div>

                    </a>

                    <?php } ?>

                </div>

            </td>

        </tr>

    </table>

</div>

<?php get_footer (); ?>
