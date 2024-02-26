<?php get_header (); ?>

<?php

    if ( isset ( $_REQUEST [ 'product_id' ] ) && $_REQUEST [ 'product_id' ] !== '') {

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

        <p class="fw-bold"><?php _e ( '$' . number_format ( ( float ) $data [ 'price' ], 2 ) ); ?></p>

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

                    <span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-dash-square-dotted" viewBox="0 0 16 16">

                            <path d="M2.5 0q-.25 0-.487.048l.194.98A1.5 1.5 0 0 1 2.5 1h.458V0zm2.292 0h-.917v1h.917zm1.833 0h-.917v1h.917zm1.833 0h-.916v1h.916zm1.834 0h-.917v1h.917zm1.833 0h-.917v1h.917zM13.5 0h-.458v1h.458q.151 0 .293.029l.194-.981A2.5 2.5 0 0 0 13.5 0m2.079 1.11a2.5 2.5 0 0 0-.69-.689l-.556.831q.248.167.415.415l.83-.556zM1.11.421a2.5 2.5 0 0 0-.689.69l.831.556c.11-.164.251-.305.415-.415zM16 2.5q0-.25-.048-.487l-.98.194q.027.141.028.293v.458h1zM.048 2.013A2.5 2.5 0 0 0 0 2.5v.458h1V2.5q0-.151.029-.293zM0 3.875v.917h1v-.917zm16 .917v-.917h-1v.917zM0 5.708v.917h1v-.917zm16 .917v-.917h-1v.917zM0 7.542v.916h1v-.916zm15 .916h1v-.916h-1zM0 9.375v.917h1v-.917zm16 .917v-.917h-1v.917zm-16 .916v.917h1v-.917zm16 .917v-.917h-1v.917zm-16 .917v.458q0 .25.048.487l.98-.194A1.5 1.5 0 0 1 1 13.5v-.458zm16 .458v-.458h-1v.458q0 .151-.029.293l.981.194Q16 13.75 16 13.5M.421 14.89c.183.272.417.506.69.689l.556-.831a1.5 1.5 0 0 1-.415-.415zm14.469.689c.272-.183.506-.417.689-.69l-.831-.556c-.11.164-.251.305-.415.415l.556.83zm-12.877.373Q2.25 16 2.5 16h.458v-1H2.5q-.151 0-.293-.029zM13.5 16q.25 0 .487-.048l-.194-.98A1.5 1.5 0 0 1 13.5 15h-.458v1zm-9.625 0h.917v-1h-.917zm1.833 0h.917v-1h-.917zm1.834 0h.916v-1h-.916zm1.833 0h.917v-1h-.917zm1.833 0h.917v-1h-.917zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1z"/>

                        </svg>

                    </span>


                    <input class="quantity" type="text" name="quantity" value="1" />

                    <span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-plus-square-dotted" viewBox="0 0 16 16">

                            <path d="M2.5 0q-.25 0-.487.048l.194.98A1.5 1.5 0 0 1 2.5 1h.458V0zm2.292 0h-.917v1h.917zm1.833 0h-.917v1h.917zm1.833 0h-.916v1h.916zm1.834 0h-.917v1h.917zm1.833 0h-.917v1h.917zM13.5 0h-.458v1h.458q.151 0 .293.029l.194-.981A2.5 2.5 0 0 0 13.5 0m2.079 1.11a2.5 2.5 0 0 0-.69-.689l-.556.831q.248.167.415.415l.83-.556zM1.11.421a2.5 2.5 0 0 0-.689.69l.831.556c.11-.164.251-.305.415-.415zM16 2.5q0-.25-.048-.487l-.98.194q.027.141.028.293v.458h1zM.048 2.013A2.5 2.5 0 0 0 0 2.5v.458h1V2.5q0-.151.029-.293zM0 3.875v.917h1v-.917zm16 .917v-.917h-1v.917zM0 5.708v.917h1v-.917zm16 .917v-.917h-1v.917zM0 7.542v.916h1v-.916zm15 .916h1v-.916h-1zM0 9.375v.917h1v-.917zm16 .917v-.917h-1v.917zm-16 .916v.917h1v-.917zm16 .917v-.917h-1v.917zm-16 .917v.458q0 .25.048.487l.98-.194A1.5 1.5 0 0 1 1 13.5v-.458zm16 .458v-.458h-1v.458q0 .151-.029.293l.981.194Q16 13.75 16 13.5M.421 14.89c.183.272.417.506.69.689l.556-.831a1.5 1.5 0 0 1-.415-.415zm14.469.689c.272-.183.506-.417.689-.69l-.831-.556c-.11.164-.251.305-.415.415l.556.83zm-12.877.373Q2.25 16 2.5 16h.458v-1H2.5q-.151 0-.293-.029zM13.5 16q.25 0 .487-.048l-.194-.98A1.5 1.5 0 0 1 13.5 15h-.458v1zm-9.625 0h.917v-1h-.917zm1.833 0h.917v-1h-.917zm1.834-1v1h.916v-1zm1.833 1h.917v-1h-.917zm1.833 0h.917v-1h-.917zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>

                        </svg>

                    </span>

                </td>

            </tr>

        </table>

        <div class="d-flex justify-content-between product-detail-buton">

            <button type="button" class="btn btn-warning px-4">

                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">

                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1M8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>

                </svg>

                Buy Now

            </button>

            <button type="button" class="btn btn-primary px-4">

                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">

                    <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>

                </svg>

                Add To Cart

            </button>

            <button type="button" class="btn btn-light px-5">

                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">

                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1M8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                </svg>

                Save

            </button>

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

                <div class="container" id="spec-content">

                    <?php

                        _e ( wp_unslash ( $product->get_meta ( 'specs' ) ) );

                    ?>

                </div>

                <div class="container" id="warranty-content">

                    <?php

                        _e ( wp_unslash ( $product->get_meta ( 'warranty' ) ) );

                    ?>

                </div>

                <div class="container" id="shipping-content">

                    <?php

                        _e ( wp_unslash ( $product->get_meta ( 'shipping' ) ) );

                    ?>


                </div>

                <div class="container" id="seller-content">

                    <?php

                        _e ( wp_unslash ( $product->get_meta ( 'seller' ) ) );

                    ?>


                </div>

            </td>

            <td>

                <h5 class="text-center">Similar Products</h5>

                <div class="list-group">

                    <?php foreach ( $product_related_ids as $product_related_id ) {

                              $product_related = wc_get_product ( $product_related_id );

                              $data_related = $product_related->get_data ();

                    ?>

                    <a href="<?php _e ( get_site_url () . '/product/?product_id=' . $product_related_id ); ?>" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">

                    <img src="<?php _e ( get_woocommerce_image ( $product_related_id, $image_size = 'thumbnail' ) ); ?>" alt="twbs" width="60" height="60" class="rounded-circle flex-shrink-0">

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

    <?php

        } else {

            get_template_part ( 'template-parts/products' );

        }

    ?>

</div>

<?php get_footer (); ?>
