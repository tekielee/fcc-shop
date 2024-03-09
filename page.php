<?php get_header (); ?>

<div class="grid-container fluid">

    <?php

    if ( have_posts () ) :

        while( have_posts ()  ) :

            the_post ();

    ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div><?php the_content (); ?></div>

    </div>

    <?php

        endwhile;

    endif;

    ?>

    <?php wp_link_pages(); ?>

</div>

<?php get_footer (); ?>
