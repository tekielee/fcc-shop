<?php get_header (); ?>

<div class="container-fluid pt-3">

    <?php

    if ( have_posts () ) :

        while( have_posts ()  ) :

            the_post ();

    ?>

        <div><?php the_content (); ?></div>

    <?php

        endwhile;

    endif;

    ?>

</div>

<?php get_footer (); ?>
