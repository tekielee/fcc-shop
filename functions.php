<?php

if ( ! function_exists ( 'register_my_menu' ) ) {

    function register_my_menu () {

        register_nav_menu ( 'primary', __( 'Primary Menu', 'bootstrap-woocommerce' ) );

    }

}

add_action( 'after_setup_theme', 'register_my_menu' );


if ( ! function_exists ( 'getMenu' ) ) {

    function getMenu ( ) {

        if ( has_nav_menu ( 'primary' ) ) {

            $theme_location = wp_get_nav_menu_name( 'primary' );

            $menu_items = wp_get_nav_menu_items( $theme_location );

      	         function buildMenu( $ID, $menu_items ) {

    	             $menu = array();

    	             foreach ( $menu_items as $menu_item ) {

                         if ( (int)$menu_item->menu_item_parent === $ID )  {

                             $menu[ $menu_item->title ] = array(

    		                      'url'      => $menu_item->url,

    		                      'children' => buildMenu( $menu_item->ID, $menu_items )

                              );

                         }

    	             }

    	             return $menu;
                 }

            return buildMenu( 0, $menu_items );

        }

    }

}

if ( ! function_exists ( 'generateMenuHiarchy' ) ) {

  function generateMenuHiarchy () {

      $menus = getMenu ();

      function buildMenuChildren ( $menus ) {

          $menu_hiarchy = '';

          foreach( $menus as $key => $menu ) {

              if( is_array($menu['children'] ) && ! empty($menu['children'] ) ) {

                  $menu_hiarchy .= '

                      <li class="nav-item dropdown">

                          <a class="nav-link dropdown-toggle"

                            href="' . $menu['url'] . '" role="button"

                            data-bs-hover="dropdown"

                            aria-expanded="false"

                          >
                            ' . $key . '
                          </a>

                              <ul class="dropdown-menu">';

                                  foreach($menu['children'] as $key => $menu) {

                                      $menu_hiarchy .= '<li><a class="dropdown-item" href="' . $menu['url'] . '">' . $key . '</a></li>';

                                  }

                                  $menu_hiarchy .=

                              '</ul>

                        </li>';

               } else {

                   $menu_hiarchy .= '

                        <li class="nav-item">

                          <a class="nav-link" href="' . $menu['url'] . '">' . $key . '</a>

                        </li>

                      ';

               }
           }

           return $menu_hiarchy;

    }

    return buildMenuChildren($menus);

  }

}

if ( ! function_exists ( 'bwct_menu' ) ) {

    function bwct_menu () {

    	add_menu_page(

    		__( 'Bootstrap WC Theme', 'textdomain' ),

    		'Bootstrap WC Theme',

    		'manage_options',

    		'custompage',

            'bwct_menu_page',

            get_template_directory_uri () . '/images/bwct_icon.png'

    	);

    }

}

add_action( 'admin_menu', 'bwct_menu' );

if ( ! function_exists ( 'bwct_menu_page' ) ) {

    function bwct_menu_page () {

    	_e ( 'hi' );

    }

}

if ( ! function_exists ( 'get_woocommerce_image' ) ) {

    function get_woocommerce_image ( $product_id, $image_size = 'single-post-thumbnail' ) {

        return wp_get_attachment_image_src (

            get_post_thumbnail_id( $product_id ),

            $image_size )[0];

    }

}

if ( ! function_exists ( 'get_images_gallery' )) {

    function get_images_gallery ( $attachment_ids, $image_size = 'thumbnail' ) {

        $attachments = [];

        foreach ( $attachment_ids as $attachment_id ) {

            array_push ($attachments, wp_get_attachment_image ( $attachment_id, $image_size ) );

        }

        return $attachments;

    }

}

if ( ! function_exists ( 'get_product_attachment_ids' )) {

    function get_product_attachment_ids ( $product ) {

        return $product->get_gallery_image_ids ();

    }

}
?>
