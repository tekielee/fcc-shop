<!DOCTYPE html>
<html <?php language_attributes (); ?>>

    <head>

        <title><?php bloginfo ( 'name' ); ?><?php wp_title (); ?></title>

    	<meta charset="<?php bloginfo ( 'charset' ); ?>" />

        <meta name="description" content="<?php echo bloginfo('description');?>" />

        <meta name="viewport" content="minimum-scale=1, initial-scale=1, width=device-width" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri () . '/css/bootstrap.min.css' ?>" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri () . '/style.css' ?>" />

        <script type="text/javascript" src="<?php echo get_template_directory_uri () . '/js/bootstrap.min.js' ?>"></script>

        <script type="text/javascript" src="<?php echo get_template_directory_uri () . '/js/popper.min.js' ?>"></script>

        <script type="text/javascript" src="<?php echo get_template_directory_uri () . '/js/jquery-3.7.1.min.js' ?>"></script>

        <script type="text/javascript" src="<?php echo get_template_directory_uri () . '/js/site.js' ?>"></script>


    	<?php wp_head (); ?>

    </head>

<body <?php body_class (); ?>>

<div class="container-fluid p-0">

    <?php

        get_template_part ( 'template-parts/navbar' );

    ?>
