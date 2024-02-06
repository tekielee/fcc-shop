<?php get_header(); ?>

<?php

 $args = array(

     'category' => array( 'hoodies' ),
     'orderby'  => 'name',
 );
 $products = wc_get_products( $args );

echo '<pre>';
print_r($products);
echo '</pre>';

?>

<?php get_footer(); ?>
