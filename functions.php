<?php

add_action( 'after_setup_theme', 'register_my_menu' );

if ( ! function_exists ( 'register_my_menu' ) ) {

    function register_my_menu () {

        register_nav_menu ( 'primary', __( 'Primary Menu', 'theme-slug' ) );

    }

}


if ( ! function_exists ( 'getMenu' ) ) {

    function getMenu( ) {

        $menu_items = wp_get_nav_menu_items( 'main_nav' );

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

    	echo 'hi';

    }

}

?>
