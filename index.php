<?php get_header (); ?>

<div class="grid-container fluid">

    <?php

    if ( have_posts () ) :

        while( have_posts ()  ) :

            the_post ();

    ?>

        <div>
            
        <div><?php the_content (); ?></div>
    
        </div>

    <?php

        endwhile;

    endif;

    ?>

</div>

<?php get_footer () ?>
