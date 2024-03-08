

    <?php wp_footer (); ?>

</div>

<div class="grid-x footer">

    <div class="large-6 cell">

        <?php

            _e ( wp_unslash ( get_option ( 'left_footer' ) ) );

        ?>

    </div>

    <div class="large-6 cell">

        <?php

            _e ( wp_unslash ( get_option ( 'youtube_url' ) ) );

            _e ( wp_unslash ( get_option ( 'twitter_url' ) ) );

            _e ( wp_unslash ( get_option ( 'instagram_url' ) ) );


        ?>

    </div>

</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri () . '/js/vendor/jquery.js' ?>"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri () . '/js/vendor/what-input.js' ?>"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri () . '/js/vendor/foundation.js' ?>"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri () . '/js/app.js' ?>"></script>

</body>

</html>
