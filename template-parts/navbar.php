<div class="grid-x">

    <div class="large-12 cell">

        <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">

            <button class="menu-icon" type="button" data-toggle="main-menu"></button>

            <div class="title-bar-title">Menu</div>

        </div>

        <div class="top-bar" id="main-menu">
    
            <div class="top-bar-left">  

                <div class="grid-x">

                    <div class="large-2 cell">
                    
                        <span class="site-logo">
                            
                            <a href="<?php echo esc_url ( home_url () ); ?>">

                                <img src="
                                
                                <?php 

                                    $logo_height = ( get_option ( 'logo_height' ) > 0 )? get_option ( 'logo_height' ) : 50;

                                    $logo_width = ( get_option ( 'logo_width' ) > 0 )? get_option ( 'logo_width' ) : 50;
                                    
                                    $logo_url = get_template_directory_uri () . '/images/logo.png';

                                    if ( get_option ( 'logo_url' ) ) {

                                        $logo_url = wp_unslash ( get_option ( 'logo_url' ) );

                                    }

                                    echo $logo_url;
                                    
                                ?>" 
                                
                                alt="Logo"
                                
                                width="<?php echo $logo_width; ?>" height="<?php echo $logo_height ?>" 
                                
                                />
                            
                            </a>
                        
                        </span>

                    </div>

                    <div class="large-9 cell">
                        <ul class="dropdown menu align-center" data-dropdown-menu>

                            <?php

                                if ( ! has_nav_menu ( 'primary' ) ) {

                                    $pages = get_pages ();

                                    foreach ( $pages as $page ) {

                                ?>
                                        <li class="nav-item">

                                            <a class="nav-link" href=" <?php echo get_page_link( $page->ID ); ?>">

                                                <?php echo $page->post_title; ?>

                                            </a>

                                        </li>

                                <?php
                                
                                    }

                                } else {

                                echo createMmenu ( getMenu () );

                                }

                            ?>
                
                        </ul>

                    </div>

                </div>
        
            </div>

            <div class="top-bar-right">

                <div class="grid-x fluid">

                    <div class="large-12 cell">

                        <div class="large-6 cell">

                            <form action="<?php echo esc_url ( home_url () ) . '/search'; ?>" method="POST">

                                <ul class="menu">

                                    <li><input type="text" name="search" placeholder="Search"></li>

                                    <li><button type="submit" class="button">Search</button></li>

                                    

                                </ul>

                            </form>

                        </div>

                        <div class="large-6 cell">

                            <ul class="menu">

                                <li><a href="<?php echo esc_url ( home_url () ) . '/cart'; ?>">
                                    
                                    <i class="fi-shopping-cart cart-icon"></i></a>
                                
                                </li>

                                <li class="cart-count">
                                        
                                    <?php 
                                        if ( function_exists ( 'WC' ) ) {
                                    
                                            echo WC()->cart->get_cart_contents_count();
                                        
                                        } else {

                                            echo 0;

                                        }

                                        
                                    ?>
                                
                                </li>

                            </ul>

                        </div>

                    </div>

                </div>
            
            </div>

        </div>  

    </div>

</div>

