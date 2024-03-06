<div class="grid-container fluid">

    <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">

        <button class="menu-icon" type="button" data-toggle="example-menu"></button>

        <div class="title-bar-title">Menu</div>

    </div>

    <div class="top-bar" id="example-menu">
  
        <div class="top-bar-left">

            <ul class="dropdown menu" data-dropdown-menu>
      
                <li class="menu-text">Site Title</li>

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

        <div class="top-bar-right">

            <ul class="menu">
            
                <li><input type="search" placeholder="Search"></li>

                <li><button type="button" class="button">Search</button></li>

            </ul>
        
        </div>

    </div>  

</div>

