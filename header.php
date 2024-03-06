<!DOCTYPE html>
<html <?php language_attributes (); ?>>

    <head>

        <title><?php bloginfo ( 'name' ); ?><?php wp_title (); ?></title>

    	<meta charset="<?php bloginfo ( 'charset' ); ?>" />

        <meta name="description" content="<?php echo bloginfo('description');?>" />

        <meta name="viewport" content="minimum-scale=1, initial-scale=1, width=device-width" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri () . '/css/foundation.min.css' ?>" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri () . '/css/app.css' ?>" />

    	<?php wp_head (); ?>

    </head>

<body <?php body_class (); ?>>

<div class="grid-container fluid">

    <?php

        get_template_part ( 'template-parts/navbar' );

    ?>
