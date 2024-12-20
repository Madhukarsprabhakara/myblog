<?php

/**
 * mediator: Block Patterns
 *
 * @since mediator 1.0.0
 */

/**
 * Registers pattern categories for mediator
 *
 * @since mediator 1.0.0
 *
 * @return void
 */
function mediator_register_pattern_category()
{
	$block_pattern_categories = array(
		'mediator' => array('label' => __('Mediator Patterns', 'mediator'))
	);

	$block_pattern_categories = apply_filters('mediator_block_pattern_categories', $block_pattern_categories);

	foreach ($block_pattern_categories as $name => $properties) {
		if (!WP_Block_Pattern_Categories_Registry::get_instance()->is_registered($name)) {
			register_block_pattern_category($name, $properties); // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_pattern_category
		}
	}
}
add_action('init', 'mediator_register_pattern_category', 9);
