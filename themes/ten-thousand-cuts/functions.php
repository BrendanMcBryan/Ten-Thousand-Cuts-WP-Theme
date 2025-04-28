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
 * * Enqueue block stylesheets.
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
 * *Register pattern categories.
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
	wp_enqueue_style('ten_thousand_cuts_main_styles',  get_theme_file_uri('/build/style-index.css'), array(), rand(111, 9999), 'all');
	wp_enqueue_style('ten_thousand_cuts_extra_styles', get_theme_file_uri('/build/index.css'), array(), rand(111, 9999), 'all');
	wp_enqueue_style('Font_Awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');

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

	$args = array(
		'default-color' => '0000ff',
		'default-image' => get_template_directory_uri() . '/assets/images/Museum Window.webp',
		'default-repeat'     => 'no-repeat',
		'default-size' => 'cover',
		'default-position-x' => 'center',
		'default-position-y' => 'center',
	);
	add_theme_support('custom-background', $args);
	add_theme_support('appearance-tools');
	add_theme_support('post-thumbnails');
	add_theme_support('editor-styles');
	add_editor_style(array('build/style-index.css', 'build/index.css'));
}

add_action('after_setup_theme', 'ten_thousand_cuts_features');


// Register Ten Tousand Custs blocks
function ten_thousand_cuts_blocks()
{
	wp_localize_script('wp-editor', 'ourThemeData', array('themePath' => get_stylesheet_directory_uri()));
	register_block_type_from_metadata(__DIR__ . '/build/artworkdisplaycontainer');
	register_block_type_from_metadata(__DIR__ . '/build/titleblock');
	register_block_type_from_metadata(__DIR__ . '/build/singleartwork');
	register_block_type_from_metadata(__DIR__ . '/build/artworkgallery');

}

add_action('init', 'ten_thousand_cuts_blocks');

// Disable uneeded blocks. 

function disallow_block_types($allowed_block_types, $block_editor_context)
{
	$disallowed_blocks = array(
		'core/quote',
		'core/freeform',
		'core/media-text',
		'core/missing',
		'core/more',
		'core/preformatted',
		'core/tag-cloud',
		'core/verse',
		'core/embed',
	);

	// Get all registered blocks if $allowed_block_types is not already set.
	if (! is_array($allowed_block_types) || empty($allowed_block_types)) {
		$registered_blocks   = WP_Block_Type_Registry::get_instance()->get_all_registered();
		$allowed_block_types = array_keys($registered_blocks);
	}

	// Create a new array for the allowed blocks.
	$filtered_blocks = array();

	// Loop through each block in the allowed blocks list.
	foreach ($allowed_block_types as $block) {

		// Check if the block is not in the disallowed blocks list.
		if (! in_array($block, $disallowed_blocks, true)) {

			// If it's not disallowed, add it to the filtered list.
			$filtered_blocks[] = $block;
		}
	}

	// Return the filtered list of allowed blocks
	return $filtered_blocks;


	return $allowed_block_types;
}
add_filter('allowed_block_types_all', 'disallow_block_types', 10, 2);


/*
*
* Add Featured Image Column to Admin Area and Quick Edit menu
* Source: https://rudrastyh.com/wordpress/quick-edit-featured-image.html
*
*/

/*
 * This action hook allows to add a new empty column
 */
add_filter('manage_artwork_posts_columns', 'misha_featured_image_column');
function misha_featured_image_column($column_array)
{

	// I want to add my column at the beginning, so I use array_slice()
	// in other cases $column_array['featured_image'] = 'Featured Image' will be enough
	$column_array = array_slice($column_array, 0, 1, true)
		+ array('featured_image' => 'Featured Image') // our new column for featured images
		+ array_slice($column_array, 1, NULL, true);

	return $column_array;
}

/*
 * This hook will fill our column with data
 */
add_action('manage_posts_custom_column', 'misha_render_the_column', 10, 2);
function misha_render_the_column($column_name, $post_id)
{

	if ($column_name == 'featured_image') {

		// if there is no featured image for this post, print the placeholder
		if (has_post_thumbnail($post_id)) {

			// I know about get_the_post_thumbnail() function but we need data-id attribute here
			$thumb_id = get_post_thumbnail_id($post_id);
			echo '<img data-id="' . $thumb_id . '" src="' . wp_get_attachment_url($thumb_id) . '" />';
		} else {

			// data-id should be "-1" I will explain below
			echo '<img data-id="-1" src="' . get_stylesheet_directory_uri() . '/placeholder.png" />';
		}
	}
}

add_action('admin_head', 'misha_custom_css');
function misha_custom_css()
{

	echo '<style>
        #featured_image{
            width:120px;
        }
        td.featured_image.column-featured_image img{
            max-width: 100%;
            height: auto;
        }

        /* some styles to make Quick Edit meny beautiful */
        #misha_featured_image .title{margin-top:10px;display:block;}
        #misha_featured_image a.misha_upload_featured_image{
            display:inline-block;
            margin:10px 0 0;
        }
        #misha_featured_image img{
            display:block;
            max-width:200px !important;
            height:auto;
        }
        #misha_featured_image .misha_remove_featured_image{
            display:none;
        }
    </style>';
}

add_action('admin_enqueue_scripts', 'misha_include_myuploadscript');
function misha_include_myuploadscript()
{
	if (! did_action('wp_enqueue_media')) {
		wp_enqueue_media();
	}
}

add_action('quick_edit_custom_box',  'misha_add_featured_image_quick_edit', 10, 2);
function misha_add_featured_image_quick_edit($column_name, $post_type)
{

	// add it only if we have featured image column
	if ($column_name != 'featured_image') return;

	// we add #misha_featured_image to use it in JavaScript in CSS
	echo '<fieldset id="misha_featured_image" class="inline-edit-col-left">
        <div class="inline-edit-col">
            <span class="title">Featured Image</span>
            <div>
                <a href="#" class="misha_upload_featured_image">Set featured image</a>
                <input type="hidden" name="_thumbnail_id" value="" />
                <a href="#" class="misha_remove_featured_image">Remove Featured Image</a>
            </div>
        </div></fieldset>';

	// please look at _thumbnail_id as a name attribute - I use it to skip save_post action

}

add_action('admin_footer', 'misha_quick_edit_js_update');
function misha_quick_edit_js_update()
{

	global $current_screen;

	// add this JS function only if we are on all posts page
	if (($current_screen->id != 'edit-post') || ($current_screen->post_type != 'post'))
		return;

?><script>
		jQuery(function($) {

			$('body').on('click', '.misha_upload_featured_image', function(e) {
				e.preventDefault();
				var button = $(this),
					custom_uploader = wp.media({
						title: 'Set featured image',
						library: {
							type: 'image'
						},
						button: {
							text: 'Set featured image'
						},
					}).on('select', function() {
						var attachment = custom_uploader.state().get('selection').first().toJSON();
						$(button).html('<img src="' + attachment.url + '" />').next().val(attachment.id).parent().next().show();
					}).open();
			});

			$('body').on('click', '.misha_remove_featured_image', function() {
				$(this).hide().prev().val('-1').prev().html('Set featured Image');
				return false;
			});

			var $wp_inline_edit = inlineEditPost.edit;
			inlineEditPost.edit = function(id) {
				$wp_inline_edit.apply(this, arguments);
				var $post_id = 0;
				if (typeof(id) == 'object') {
					$post_id = parseInt(this.getId(id));
				}

				if ($post_id > 0) {
					var $edit_row = $('#edit-' + $post_id),
						$post_row = $('#post-' + $post_id),
						$featured_image = $('.column-featured_image', $post_row).html(),
						$featured_image_id = $('.column-featured_image', $post_row).find('img').attr('data-id');


					if ($featured_image_id != -1) {

						$(':input[name="_thumbnail_id"]', $edit_row).val($featured_image_id); // ID
						$('.misha_upload_featured_image', $edit_row).html($featured_image); // image HTML
						$('.misha_remove_featured_image', $edit_row).show(); // the remove link

					}
				}
			}
		});
	</script>
<?php
}
