<div class="grid-container fluid">

	<?php

	if ( have_comments() ) {
		?>
		<h2 class="comments-title">
			<?php
			$count = get_comments_number();
			if ( '1' === $count ) {
				echo '<span>' . wp_kses_post( get_the_title() ) . '</span>';
			} else {
				echo '<span>' . wp_kses_post( get_the_title() ) . '</span>';
			}
			?>
		</h2>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol>

		<?php
		the_comments_navigation();

		if ( ! comments_open() ) {
			?>
			<p class="no-comments"><?php echo 'Comments are closed'; ?></p>
			<?php
        } else {
            comments_template();
        }

    }

	comment_form();
	?>

</div>
