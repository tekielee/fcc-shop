<!DOCTYPE html>
<html <?php language_attributes (); ?>>

    <head>

        <title><?php bloginfo ( 'name' ); ?><?php wp_title (); ?></title>

    	<meta charset="<?php bloginfo ( 'charset' ); ?>" />

        <meta name="description" content="<?php echo bloginfo('description');?>" />

        <meta name="viewport" content="minimum-scale=1, initial-scale=1, width=device-width" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri () . '/css/foundation.min.css' ?>" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri () . '/css/foundation-icons.css' ?>" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri () . '/css/foundation-icons.eot' ?>" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri () . '/css/foundation-icons.ttf' ?>" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri () . '/css/foundation-icons.woff' ?>" />

        <link rel="stylesheet" href="<?php echo get_template_directory_uri () . '/css/app.css' ?>" />

        '<script type="text/javascript">

           let ajaxurl = '<?php _e ( admin_url ( 'admin-ajax.php' ) ); ?>';
           
         </script>';

    	<?php wp_head (); ?>

    </head>

<body <?php body_class (); ?>>

<?php

get_template_part ( 'template-parts/navbar' );

?>

<div class="grid-container fluid">
