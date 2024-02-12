<?php get_header(); ?>

<div class="container-fluid">

<?php

$args = array(

 'orderby'  => 'name',

 'limit' => 10,

);

$products = wc_get_products( $args );

for ( $i = 0; $i < sizeof ( $products ); $i++ ) {

    $data = $products [ $i ]->get_data ();

    $image = wp_get_attachment_image_src (

        get_post_thumbnail_id( $products [ $i ]->get_id () ),

        'single-post-thumbnail' );

?>

    <div class="card" style="width: 18rem;">

        <img src="<?php echo $image[0] ?>" class="card-img-top" alt="<?php echo $data['name'] ?>">

        <div class="card-body">

            <h5 class="card-title"><?php echo $data['name'] ?></h5>

            <p class="card-text"><?php echo $data['description'] ?></p>

            <p class="card-text"><span class="fw-bold">Price:</span> <?php echo ' $' . $data['price'] ?></p>

            <a href="#" class="btn btn-primary">Add to Cart</a>

        </div>

    </div>

<?php

}


// echo '<pre>';
// print_r($products);
// echo '</pre>';


?>

</div>

<?php get_footer() ?>
