<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>

        <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

    	<meta charset="<?php bloginfo( 'charset' ); ?>" />

        <meta name="description" content="<?php echo bloginfo('description');?>" />

        <meta name="viewport" content="minimum-scale=1, initial-scale=1, width=device-width" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/bootstrap.min.css'?>" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/bootstrap-icons.min.css'?>">

        <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/css/fontawesome.min.css'?>" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/style.css'?>" />

        <script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/bootstrap.min.js'?>"></script>

        <script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/popper.min.js'?>"></script>

        <script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/fontawesome.min.js'?>"></script>

        <script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/jquery-3.7.1.min.js'?>"></script>

        <script type="text/javascript" src="<?php echo get_template_directory_uri() . '/js/site.js'?>"></script>


    	<?php wp_head(); ?>

    </head>

<body <?php body_class(); ?>>

<div class="container-fluid p-0">

    <?php

        $navbar_option = 'simple'; // later on get_option('navbar_option'); from the admin

        if ( $navbar_option === 'simple' ) {

            get_template_part ( 'template-parts/navbar-simple' );

        } else {

            get_template_part ( 'template-parts/navbar-multilevel' );

        }

    ?>

    <?php

        // get background image from the admin

        // get hero title from the admin

        // get hero text from the admin

        // get the button text from the admin

    ?>

    <div class="bg-white text-secondary px-4 py-5 text-center"

        style="background-image:url( '<?php echo get_template_directory_uri()?>/images/home-hero.jpg' );

        background-repeat: no-repeat; background-position: center;"

    >

        <div class="py-5">

            <h1 class="display-5 fw-bold text-black">Dark color hero</h1>

            <div class="col-lg-6 mx-auto">

                <p class="fs-5 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>

                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

                    <button type="button" class="btn btn-outline-info btn-lg px-4 me-sm-3 fw-bold">Shopping</button>

                </div>

            </div>

        </div>

    </div>
