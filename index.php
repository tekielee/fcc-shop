<?php get_header (); ?>

<div class="grid-container fluid">

    <?php

    if ( have_posts () ) :

        while( have_posts ()  ) :

            the_post ();

    ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <div><?php the_content (); ?></div>
            <div><?php the_post_thumbnail(); ?></div>
            <div><?php the_tags(); ?></div>
    
        </div>

    <?php

        endwhile;

    endif;

    ?>

    <?php posts_nav_link(); ?>
    <?php wp_link_pages(); ?>
    <?php paginate_comments_links(); ?>

</div>

<?php get_footer () ?>
