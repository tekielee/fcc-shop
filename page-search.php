<?php get_header (); ?>

<div class="grid-container fluid search-padding">

    <table>
    
        <thead>

            <tr>
      
                <th>Search Results for: <?php echo  esc_html ( esc_js ( $_POST['search'] ) ); ?></th>
    
            </tr>
  
        </thead>

        <tbody>

    <?php 

        $searches = search ( $_POST['search'] );

        foreach ( $searches as $key => $search ) {

    ?>

        <tr>

            <td><a href="<?php echo get_the_permalink ( $search->ID ); ?>">

                <?php echo $search->post_title; ?>

            </a></td>

        </tr>

    <?php

            

        }

    ?>

        </tbody>

    </table>

</div>

<?php get_footer (); ?>
