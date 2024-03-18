<!DOCTYPE html>
<html <?php language_attributes (); ?>>

    <head>

    	<meta charset="<?php bloginfo ( 'charset' ); ?>" />

        <meta name="description" content="<?php echo bloginfo('description');?>" />

        <meta name="viewport" content="minimum-scale=1, initial-scale=1, width=device-width" />

    	<?php wp_head (); ?>

    </head>

<body <?php body_class (); ?>>

<?php wp_body_open(); ?>

<?php

get_template_part ( 'template-parts/navbar' );

?>

<div class="grid-container fluid">
