<?php

/**
 * Ten Thousand Cuts functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ten Thousand Cuts
 * @since Ten Thousand Cuts 1.0
 */

/**
 * Register block styles.
 */

if (! function_exists('ten_thousand_cuts_block_styles')) :
	/**
	 * Register custom block styles
	 *
	 * @since Ten Thousand Cuts 1.0
	 * @return void
	 */
	function ten_thousand_cuts_block_styles()
	{

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __('Arrow icon', 'ten-thousand-cuts'),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __('Pill', 'ten-thousand-cuts'),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __('Checkmark', 'ten-thousand-cuts'),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __('With arrow', 'ten-thousand-cuts'),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __('With asterisk', 'ten-thousand-cuts'),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action('init', 'ten_thousand_cuts_block_styles');

/**
 * Enqueue block stylesheets.
 */

if (! function_exists('ten_thousand_cuts_block_stylesheets')) :
	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since Ten Thousand Cuts 1.0
	 * @return void
	 */
	function ten_thousand_cuts_block_stylesheets()
	{
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'ten-thousand-cuts-button-style-outline',
				'src'    => get_parent_theme_file_uri('assets/css/button-outline.css'),
				'ver'    => wp_get_theme(get_template())->get('Version'),
				'path'   => get_parent_theme_file_path('assets/css/button-outline.css'),
			)
		);
	}
endif;

add_action('init', 'ten_thousand_cuts_block_stylesheets');

/**
 * Register pattern categories.
 */

if (! function_exists('ten_thousand_cuts_pattern_categories')) :
	/**
	 * Register pattern categories
	 *
	 * @since Ten Thousand Cuts 1.0
	 * @return void
	 */
	function ten_thousand_cuts_pattern_categories()
	{

		register_block_pattern_category(
			'ten_thousand_cuts_page',
			array(
				'label'       => _x('Pages', 'Block pattern category', 'ten-thousand-cuts'),
				'description' => __('A collection of full page layouts.', 'ten-thousand-cuts'),
			)
		);
	}
endif;

add_action('init', 'ten_thousand_cuts_pattern_categories');


// Load Custom Style Sheets

function ten_thousand_cuts_files()
{
	wp_enqueue_style('ten_thousand_cuts_main_styles', get_theme_file_uri('/build/style-index.css'));
	wp_enqueue_style('ten_thousand_cuts_extra_styles', get_theme_file_uri('/build/index.css'));
	wp_enqueue_style('Font_Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');

	// wp_enqueue_style('custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Cormorant:ital,wght@0,300..700;1,300..700&display=swap');
	wp_localize_script('main-ten_thousand_cuts-js', 'tenThousandCutsData', array(
		'root_url' => get_site_url(),
		'nonce' => wp_create_nonce('wp_rest')
	));
}
add_action('wp_enqueue_scripts', 'ten_thousand_cuts_files');

function ten_thousand_cuts_features()
{
	// add_theme_support('title-tag');
	// add_theme_support('post-thumbnails');
	// add_image_size('professorLandscape', 400, 260, true);
	// add_image_size('professorPortrait', 480, 650, true);
	// add_image_size('pageBanner', 1500, 350, true);
	add_theme_support('appearance-tools');
	add_theme_support('editor-styles');
	add_editor_style(array('build/style-index.css', 'build/index.css'));
}

add_action('after_setup_theme', 'ten_thousand_cuts_features');


// Register Ten Tousand Custs blocks
function ten_thousand_cuts_blocks()
{
	wp_localize_script('wp-editor', 'ourThemeData', array('themePath' => get_stylesheet_directory_uri()));

	register_block_type_from_metadata(__DIR__ . '/build/banner');
	register_block_type_from_metadata(__DIR__ . '/build/floorplangallery');
	register_block_type_from_metadata(__DIR__ . '/build/homelanding');
	register_block_type_from_metadata(__DIR__ . '/build/artworkdisplaycontainer');
	register_block_type_from_metadata(__DIR__ . '/build/titleblock');

	register_block_type_from_metadata(__DIR__ . '/build/singleartwork');
}

add_action('init', 'ten_thousand_cuts_blocks');

// Disable uneeded blocks. 
function my_theme_deny_list_blocks()
{
	wp_enqueue_script(
		'deny-list-blocks',
		get_template_directory_uri() . '/assets/js/deny-list-blocks.js',
		array('wp-blocks', 'wp-dom-ready', 'wp-edit-post')
	);
}
add_action('enqueue_block_editor_assets', 'my_theme_deny_list_blocks');
