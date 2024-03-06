<div class="grid-container">

            <ul class="dropdown menu" data-dropdown-menu>
                
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

