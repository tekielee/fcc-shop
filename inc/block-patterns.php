<?php
/**
 * FCC Shop: Block Patterns
 *
 */

function wc_register_block_patterns() {

	$block_pattern_categories = array(

		'fcc-shop' => array( 'label' => esc_html__( 'FCC Shop', 'fcc-shop' ) ),

	);

	$block_pattern_categories = apply_filters( 'wcg_register_block_patterns', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {

		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {

			register_block_pattern_category( $name, $properties );

		}
	}
}

add_action( 'init', 'wc_register_block_patterns', 9 );
