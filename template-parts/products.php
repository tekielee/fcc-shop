<div class="container pt-4">

    <div class="container text-center p-3"><h3>HOT PRODUCTS</h3></div>

    <div class="row">

<?php

$args = array(

'orderby'  => 'name',

'limit' => 8,

);

$products = wc_get_products( $args );

for ( $i = 0; $i < sizeof ( $products ); $i++ ) {

$data = $products [ $i ]->get_data ();

$image = wp_get_attachment_image_src (

    get_post_thumbnail_id( $products [ $i ]->get_id () ),

    'single-post-thumbnail' );

?>

        <div class="col p-3">

            <div class="card card-desktop card-mobile">

                <img src="<?php echo $image[0] ?>"

                    class="card-img-top"

                    alt="<?php echo $data['name'] ?>"

                >

                <div class="card-body">

                    <h5 class="card-title"><?php echo $data['name'] ?></h5>

                    <p class="card-text"><span class="fw-bold">Price:</span> <?php echo ' $' . $data['price'] ?></p>

                    <a href="<?php echo get_site_url () . '/product/?product_id=' . $data['id'] ?>" class="btn btn-primary">Learn more</a>

                </div>

            </div>

        </div>

<?php

}

?>

    </div>

</div>
