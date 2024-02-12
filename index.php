<?php get_header(); ?>

<div class="container-fluid">

    <div class="container">

        <div class="container text-center p-3"><h3>FEATURE PRODUCTS</h3></div>

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

                        <a href="<?php echo $data['product_url'] ?>" class="btn btn-primary">Learn more</a>

                    </div>

                </div>

            </div>

<?php

}


// echo '<pre>';
// print_r($products);
// echo '</pre>';


?>

        </div>

    </div>

</div>

<?php get_footer() ?>
