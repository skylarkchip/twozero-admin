<?php

/**
 * Two Zero functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Two Zero
 * @since Two Zero 1.0
 */


add_action('acf/init', 'acf_init_block_types');

function acf_init_block_types()
{
	if (function_exists('register_block_type')) {
		register_block_type(get_template_directory() . "/template-parts/blocks/services/block.json");
		register_block_type(get_template_directory() . "/template-parts/blocks/solutions/block.json");
		register_block_type(get_template_directory() . "/template-parts/blocks/team/block.json");
		register_block_type(get_template_directory() . "/template-parts/blocks/formspreeForm/block.json");
	}
}


if (!function_exists('twozero_support')) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twozero_support()
	{

		// Add support for block styles.
		add_theme_support('wp-block-styles');

		// Enqueue editor styles.
		add_editor_style('style.css');
	}

endif;

add_action('after_setup_theme', 'twozero_support');

if (!function_exists('twozero_styles')) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twozero_styles()
	{
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get('Version');

		$version_string = is_string($theme_version) ? $theme_version : false;
		wp_register_style(
			'twozero-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style('twozero-style');
	}

endif;

add_action('wp_enqueue_scripts', 'twozero_styles');

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
