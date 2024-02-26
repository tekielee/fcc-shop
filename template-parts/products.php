<div class="container pt-4">

    <div class="container text-center p-3"><h3>PRODUCTS</h3></div>

    <div class="row justify-content-start">

<?php

$args = array(

'orderby'  => 'name',

//'limit' => 8,

);

$products = wc_get_products( $args );

for ( $i = 0; $i < sizeof ( $products ); $i++ ) {

    $data = $products [ $i ]->get_data ();

    $image = get_woocommerce_image ( $products [ $i ]->get_id (), 'single-post-thumbnail' );

    $short_description = $products [ $i ]->get_short_description ();

?>

        <div class="col-3 p-3">

            <div class="card card-desktop card-mobile">

                <img src="<?php echo $image ?>"

                    class="card-img-top"

                    alt="<?php echo $data['name'] ?>"

                >

                <div class="card-body">

                    <h5 class="card-title"><?php echo $data['name'] ?></h5>

                    <p><span class="fw-bold">Description:</span><?php echo ' ' . $short_description ?></p>

                    <p class="card-text"><span class="fw-bold">Price:</span> <?php echo ' $' . $data['price'] ?></p>

                    <a href="<?php echo get_site_url () . '/product-detail/?product_id=' . $data['id'] ?>" class="btn btn-primary">Learn more</a>

                </div>

            </div>

        </div>

<?php

}

?>

    </div>

</div>
