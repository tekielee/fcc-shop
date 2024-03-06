<?php

add_action( 'after_setup_theme', 'register_my_menu' );

if ( ! function_exists ( 'register_my_menu' ) ) {

    function register_my_menu () {

        register_nav_menu ( 'primary', __( 'Primary Menu', 'bootstrap-woocommerce' ) );

    }

}

add_action ( 'admin_enqueue_scripts', 'woocommerce_scripts' );


if ( ! function_exists ( 'woocommerce_scripts' ) ) {

    function woocommerce_scripts ( $hook ) {

        if ( $hook != 'toplevel_page_custompage' ) {

            return;

        }

        wp_enqueue_style ( 'woocommerce-foundation', get_template_directory_uri () . '/css/foundation.min.css', array(), '5.0.0' );

        wp_enqueue_style ( 'woocommerce-app-admin', get_template_directory_uri () . '/css/app-admin.css', array(), '5.0.0' );

        wp_enqueue_script ( 'woocommerce-jquery', get_template_directory_uri () . '/js/vendor/jquery.js', array(), '5.0.0', true );

        wp_enqueue_script ( 'woocommerce-what-input', get_template_directory_uri () . '/js/vendor/what-input.js', array(), '5.0.0', true );

        wp_enqueue_script ( 'woocommerce-foundation-js', get_template_directory_uri () . '/js/vendor/foundation.min.js', array(), '5.0.0', true );

        wp_enqueue_script ( 'woocommerce-app-admin', get_template_directory_uri () . '/js/app-admin.js', array(), '5.0.0', true );

    }

}

// Create a bootstrap menu hierarchy from the getMenu function
if ( ! function_exists ( 'createMmenu' ) ) {

    function createMmenu ( $menu ) {

        $html = '';

        foreach ( $menu as $key => $value ) {

            $html .= '<li>';

            $html .= '<a href="' . $value['url'] . '">' . $key . '</a>';

            if ( ! empty ( $value['children'] ) ) {

                $html .= '<ul class="menu">';

                $html .= createMmenu ( $value['children'] );

                $html .= '</ul>';

            }

            $html .= '</li>';

        }

        return $html;

    }

}


if ( ! function_exists ( 'fwct_menu' ) ) {

    function fwct_menu () {

    	add_menu_page (

    		__( 'Foundation WC Theme', 'textdomain' ),

    		'Foundation WC Theme',

    		'manage_options',

    		'custompage',

            'fwct_menu_page',

            get_template_directory_uri () . '/images/fwct_icon.png'

    	);

    }

}

add_action ( 'admin_menu', 'fwct_menu' );

if ( ! function_exists ( 'fwct_menu_page' ) ) {

    function fwct_menu_page () {

    	_e ( 'Foundation' );

    }

}

if ( ! function_exists ( 'get_woocommerce_image' ) ) {

    function get_woocommerce_image ( $product_id, $image_size = 'single-post-thumbnail' ) {

        return wp_get_attachment_image_src (

            get_post_thumbnail_id ( $product_id ),

            $image_size ) [0];

    }

}

if ( ! function_exists ( 'get_images_gallery' )) {

    function get_images_gallery ( $attachment_ids, $image_size = 'thumbnail' ) {

        $attachments = [];

        sort ( $attachment_ids );

        foreach ( $attachment_ids as $attachment_id ) {

            $attachments [ $attachment_id ] = wp_get_attachment_image ( $attachment_id, $image_size );

        }

        return $attachments;

    }

}

if ( ! function_exists ( 'get_product_attachment_ids' ) ) {

    function get_product_attachment_ids ( $product ) {

        return $product->get_gallery_image_ids ();

    }

}


add_action ( 'add_meta_boxes', 'create_product_specs_meta_box' );

if ( ! function_exists ( 'create_product_specs_meta_box' ) ) {

    function create_product_specs_meta_box () {

        add_meta_box (

            'custom_product_specs_meta_box',

            __( 'Specification', 'specs' ),

            'add_specs_meta_box',

            'product',

            'normal',

            'default'

        );

    }

}

if ( ! function_exists ( 'add_specs_meta_box' ) ) {

    function add_specs_meta_box ( $post ) {

        $product = wc_get_product ( $post->ID );

        $content = wp_unslash ( $product->get_meta ( 'specs' ) );

        _e ( '<div class="product_specs">' );

        wp_editor ( $content, 'specs', ['textarea_rows' => 10]);

        _e ( '</div>' );

    }

}

add_action ( 'woocommerce_admin_process_product_object', 'save_product_specs_wysiwyg_field', 10, 1 );


if ( ! function_exists ( 'save_product_specs_wysiwyg_field' ) ) {

    function save_product_specs_wysiwyg_field ( $product ) {

        if (  isset( $_POST['specs'] ) )

             $product->update_meta_data ( 'specs', wp_kses_post ( $_POST['specs'] ) );

    }

}

add_filter ( 'woocommerce_product_tabs', 'add_specs_product_tab', 10, 1 );

if ( ! function_exists ( 'add_specs_product_tab' ) ) {

    function add_specs_product_tab ( $tabs ) {

        $tabs ['specs_tab'] = array (

            'title'         => __( 'Specification', 'specs' ),

            'priority'      => 50,

            'callback'      => 'display_specs_product_tab_content'

        );

        return $tabs;

    }

}

if ( ! function_exists ( 'display_specs_product_tab_content' ) ) {

    function display_specs_product_tab_content () {

        global $product;

        _e ( wp_unslash ( $product->get_meta ( 'specs' ) ) );

    }

}

add_action ( 'add_meta_boxes', 'create_product_warranty_meta_box' );

if ( ! function_exists ( 'create_product_warranty_meta_box' ) ) {

    function create_product_warranty_meta_box () {

        add_meta_box (

            'custom_product_warranty_meta_box',

            __( 'Warranty Info', 'warranty' ),

            'add_warranty_meta_box',

            'product',

            'normal',

            'default'

        );

    }

}

if ( ! function_exists ( 'add_warranty_meta_box' ) ) {

    function add_warranty_meta_box ( $post ) {

        $product = wc_get_product ( $post->ID );

        $content = wp_unslash ( $product->get_meta ( 'warranty' ) );

        _e ( '<div class="product_warranty">' );

        wp_editor ( $content, 'warranty', ['textarea_rows' => 10]);

        _e ( '</div>' );

    }

}

add_action ( 'woocommerce_admin_process_product_object', 'save_product_warranty_wysiwyg_field', 10, 1 );

if ( !function_exists ( 'save_product_warranty_wysiwyg_field' ) ) {

    function save_product_warranty_wysiwyg_field ( $product ) {

        if (  isset( $_POST['warranty'] ) )

             $product->update_meta_data ( 'warranty', wp_kses_post ( $_POST['warranty'] ) );

    }

}

add_filter ( 'woocommerce_product_tabs', 'add_warranty_product_tab', 10, 1 );

if ( ! function_exists ( 'add_warranty_product_tab' ) ) {

    function add_warranty_product_tab ( $tabs ) {

        $tabs ['warranty_tab'] = array (

            'title'         => __( 'Warranty Info', 'warranty' ),

            'priority'      => 50,

            'callback'      => 'display_warranty_product_tab_content'

        );

        return $tabs;
    }

}

if ( ! function_exists ( 'display_warranty_product_tab_content' ) ) {

    function display_warranty_product_tab_content () {

        global $product;

        _e ( wp_unslash ( $product->get_meta ( 'warranty' ) ) );

    }

}

add_action ( 'add_meta_boxes', 'create_product_shipping_meta_box' );

if ( ! function_exists ( 'create_product_shipping_meta_box' ) ) {

    function create_product_shipping_meta_box () {

        add_meta_box (

            'custom_product_shipping_meta_box',

            __( 'Shipping Info', 'shipping' ),

            'add_shipping_meta_box',

            'product',

            'normal',

            'default'

        );

    }

}

if ( ! function_exists ( 'add_shipping_meta_box' ) ) {

    function add_shipping_meta_box ( $post ) {

        $product = wc_get_product ( $post->ID );

        $content = wp_unslash ( $product->get_meta ( 'shipping' ) );

        _e ( '<div class="product_shipping">' );

        wp_editor ( $content, 'shipping', ['textarea_rows' => 10]);

        _e ( '</div>' );
    }

}

add_action( 'woocommerce_admin_process_product_object', 'save_product_shipping_wysiwyg_field', 10, 1 );

if ( ! function_exists ( 'save_product_shipping_wysiwyg_field' ) ) {

    function save_product_shipping_wysiwyg_field ( $product ) {

        if (  isset( $_POST['shipping'] ) )

             $product->update_meta_data ( 'shipping', wp_kses_post ( $_POST['shipping'] ) );

    }

}

add_filter ( 'woocommerce_product_tabs', 'add_shipping_product_tab', 10, 1 );

if ( ! function_exists ( 'add_shipping_product_tab' ) ) {

    function add_shipping_product_tab ( $tabs ) {

        $tabs ['shipping_tab'] = array (

            'title'         => __( 'Shipping Info', 'shipping' ),

            'priority'      => 50,

            'callback'      => 'display_shipping_product_tab_content'

        );

        return $tabs;
    }

}

if ( ! function_exists ( 'display_shipping_product_tab_content' ) ) {
    function display_shipping_product_tab_content () {

        global $product;

        _e ( wp_unslash ( $product->get_meta ( 'shipping' ) ) );

    }
}


add_action ( 'add_meta_boxes', 'create_product_seller_meta_box' );

if ( ! function_exists ( 'create_product_seller_meta_box' ) ) {
    function create_product_seller_meta_box () {

        add_meta_box (

            'custom_product_seller_meta_box',

            __( 'Seller Profile', 'seller' ),

            'add_seller_meta_box',

            'product',

            'normal',

            'default'

        );
    }
}

if ( ! function_exists ( 'add_seller_meta_box' ) ) {
    function add_seller_meta_box ( $post ) {

        $product = wc_get_product ( $post->ID );

        $content = wp_unslash ( $product->get_meta ( 'seller' ) );

        _e ( '<div class="product_seller">' );

        wp_editor ( $content, 'seller', ['textarea_rows' => 10]);

        _e ( '</div>' );
    }
}

add_action( 'woocommerce_admin_process_product_object', 'save_product_seller_wysiwyg_field', 10, 1 );

if ( ! function_exists ( 'save_product_seller_wysiwyg_field' ) ) {

    function save_product_seller_wysiwyg_field ( $product ) {

        if (  isset( $_POST['seller'] ) )

            $product->update_meta_data ( 'seller', wp_kses_post ( $_POST['seller'] ) );
    }

}


add_filter ( 'woocommerce_product_tabs', 'add_seller_product_tab', 10, 1 );

if ( ! function_exists ( 'add_seller_product_tab' ) ) {

    function add_seller_product_tab ( $tabs ) {

        $tabs ['seller_tab'] = array (

            'title'         => __( 'Seller Profile', 'seller' ),

            'priority'      => 50,

            'callback'      => 'display_seller_product_tab_content'

        );

        return $tabs;
    }

}


if ( ! function_exists ( 'display_seller_product_tab_content' ) ) {

    function display_seller_product_tab_content () {

        global $product;

        _e ( wp_unslash ( $product->get_meta ( 'seller' ) ) );

    }

}

// create hubspot function to save subscriber to the list
if ( ! function_exists ( 'hubspot_subscriber' ) ) {

    function hubspot_subscriber ( $email ) {

        $hubspot_api_key = 'YOUR API KEY HERE';  // replace with your hubspot api key

        $hubspot_list_id = 'YOUR LIST ID HERE';  // replace with your hubspot list id

        $hubspot_form_id = 'YOUR FORM ID HERE';  // replace with your hubspot form id

        $hubspot_api_url = 'https://api.hubapi.com/contacts/v1/contact/createOrUpdate/email/' . $email . '/';

        $hubspot_api_url .= '?hapikey=' . $hubspot_api_key;

        $hubspot_api_url .= '&listId=' . $hubspot_list_id;

        $hubspot_api_url .= '&formId=' . $hubspot_form_id;

        $response = wp_remote_post ( $hubspot_api_url );

        return $response;

    }
}

if ( ! function_exists ( 'getMenu' ) ) {

    function getMenu ( ) {

        if ( has_nav_menu ( 'primary' ) ) {

            $theme_location = wp_get_nav_menu_name ( 'primary' );

            $menu_items = wp_get_nav_menu_items ( $theme_location );

      	         function buildMenu ( $ID, $menu_items ) {

    	             $menu = array ();

    	             foreach ( $menu_items as $menu_item ) {

                         if ( ( int ) $menu_item->menu_item_parent === $ID )  {

                             $menu[ $menu_item->title ] = array (

    		                      'url'      => $menu_item->url,

    		                      'children' => buildMenu ( $menu_item->ID, $menu_items )

                              );

                         }

    	             }

    	             return $menu;
                 }

            return buildMenu ( 0, $menu_items );

        }

    }

}

if ( ! function_exists ( 'generateMenuHiarchy' ) ) {

  function generateMenuHiarchy () {

      $menus = getMenu ();

      function buildMenuChildren ( $menus ) {

          $menu_hiarchy = '';

          foreach ( $menus as $key => $menu ) {

              if( is_array ( $menu['children'] ) && ! empty ( $menu['children'] ) ) {

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

                                  foreach ( $menu['children'] as $key => $menu ) {

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

    return buildMenuChildren ( $menus );

  }

}

?>
