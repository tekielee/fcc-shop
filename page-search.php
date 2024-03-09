<?php get_header (); ?>

<div class="grid-container fluid search-padding">

    <table>
    
        <thead>

            <tr>
      
                <th>Search Results for: <?php _e ( $_POST['search'], 'foundation-woocommerce' ); ?></th>
    
            </tr>
  
        </thead>

        <tbody>

    <?php 

        $searches = search ( $_POST['search'] );

        foreach ( $searches as $key => $search ) {

    ?>

        <tr>

            <td><a href="<?php _e ( get_the_permalink ( $search->ID ), 'foundation-woocommerce' ); ?>">

                <?php _e ( $search->post_title, 'foundation-woocommerce' ); ?>

            </a></td>

        </tr>

    <?php

            

        }

    ?>

        </tbody>

    </table>

</div>

<?php get_footer (); ?>
