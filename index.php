<?php get_header(); ?>

<div class="container-fluid">

  <?php

    do_action( 'woocommerce_register_form' );

    do_action( 'woocommerce_before_checkout_form');

    do_action( 'woocommerce_account_navigation' );

  ?>

</div>

<?php get_footer() ?>
