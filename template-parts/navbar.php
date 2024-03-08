<div class="grid-x">

    <div class="large-12 cell">

        <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">

            <button class="menu-icon" type="button" data-toggle="example-menu"></button>

            <div class="title-bar-title">Menu</div>

        </div>

        <div class="top-bar" id="example-menu">
    
            <div class="top-bar-left">  

                <div class="grid-x">

                    <div class="large-2 cell">
                    
                        <span class="site-logo">
                            
                            <a href="<?php _e ( get_site_url () ); ?>">

                                <img src="
                                
                                <?php 
                                    
                                    $logo_url = get_template_directory_uri () . '/images/logo.png';

                                    if ( get_option ( 'logo_url' ) ) {

                                        $logo_url = get_option ( 'logo_url' );

                                    }

                                    _e ( $logo_url );
                                    
                                ?>" 
                                
                                alt="Logo"
                                
                                width="50" height="50" /
                                
                                >
                            
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

                                            <a class="nav-link" href=" <?php _e ( get_page_link( $page->ID ) ); ?>">

                                                <?php _e ( $page->post_title ); ?>

                                            </a>

                                        </li>

                                <?php
                                
                                    }

                                } else {

                                _e ( createMmenu ( getMenu () ) );

                                }

                            ?>
                
                        </ul>

                    </div>

                </div>
        
            </div>

            <div class="top-bar-right">

                <ul class="menu">
                
                    <li><input type="search" placeholder="Search"></li>

                    <li><button type="button" class="button">Search</button></li>

                </ul>
            
            </div>

        </div>  

    </div>

</div>

