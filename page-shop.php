<?php get_header (); ?>

<div class="container-fluid">

<?php

    get_template_part ( 'template-parts/slider-products' );

    get_template_part ( 'template-parts/products' );

    get_template_part ( 'template-parts/jumbotron' );

    get_template_part ( 'template-parts/carousel-products' );

    get_template_part ( 'template-parts/feature-products' );

    get_template_part ( 'template-parts/feature-left' );

    get_template_part ( 'template-parts/feature-right' );

?>

</div>

<?php get_footer (); ?>
