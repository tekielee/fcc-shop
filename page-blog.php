<?php get_header(); ?>

<?php

$args = array(
  'numberposts' => 10
);

$latest_posts = get_posts( $args );

echo '<pre>';
print_r($latest_posts);
echo '</pre>';

?>

<?php get_footer(); ?>
