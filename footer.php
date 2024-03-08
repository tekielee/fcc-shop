

    <?php wp_footer (); ?>

</div>

<div class="grid-x footer">

    <div class="large-3 cell">

        <?php

            _e ( wp_unslash ( get_option ( 'left_footer' ) ) );

        ?>

    </div>

    <div class="large-7 cell">

        <div class="grid-x">

            <div class="large-12 cell">

                <div class="grid-x">

                    <div class="large-2 cell"></div>

                    <div class="large-6 cell">

                        <div class="grid-x">
                        
                            <div class="large-10 cell">

                                <input type="text" placeholder="Subscriber Email Address" id="subscriber" />

                            </div>

                            <div class="large-2 cell">

                                <button id="save-subscriber" class="submit success button">Subscribe</button>

                            </div>

                        </div>

                    </div>

                    <div class="large-4 cell"></div>

                </div>

            </div>

        </div>

    </div>

    <div class="large-2 cell">

        <div class="grid-x social-icons-margin">

            <div class="large-4 cell">

                <a href="<?php _e ( wp_unslash ( get_option ( 'youtube_url' ) ) ); ?>" target="_blank">
                
                    <i class="fi-social-youtube social-icon"></i>

                </a>

            </div>

            <div class="large-4 cell">

                <a href="<?php _e ( wp_unslash ( get_option ( 'twitter_url' ) ) ); ?>" target="_blank">
                
                    <i class="fi-social-twitter social-icon"></i>

                </a>

            </div>

            <div class="large-4 cell">

                <a href="<?php _e ( wp_unslash ( get_option ( 'instagram_url' ) ) ); ?>" target="_blank">
                
                    <i class="fi-social-instagram social-icon"></i>

                </a>

            </div>

        </div>

    </div>

</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri () . '/js/vendor/jquery.js' ?>"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri () . '/js/vendor/what-input.js' ?>"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri () . '/js/vendor/foundation.js' ?>"></script>

<script type="text/javascript" src="<?php echo get_template_directory_uri () . '/js/app.js' ?>"></script>

</body>

</html>
