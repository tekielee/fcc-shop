<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>

        <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

    	<meta charset="<?php bloginfo( 'charset' ); ?>" />

        <meta name="description" content="<?php echo bloginfo('description');?>" />

        <meta name="viewport" content="minimum-scale=1, initial-scale=1, width=device-width" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/style.css'?>" />

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <script src="<?php echo get_template_directory_uri() . '/assets/js/site.js'?>"></script>

    	<?php wp_head(); ?>

    </head>

<body <?php body_class(); ?>>

<div class="container-fluid">

    <?php

        $navbar_option = 'simple'; // later on get_option('navbar_option'); from the admin

        if ( $navbar_option === 'simple' ) {

            get_template_part ( 'template-parts/navbar-simple' );

        } else {

            get_template_part ( 'template-parts/navbar-multilevel' );

        }


    ?>
