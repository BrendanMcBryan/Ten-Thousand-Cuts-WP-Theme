<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div <?php echo get_block_wrapper_attributes(); ?>>

	<div class="display-container">

		<div class="grid">
			<div class="grid-sizer"></div>


			<?php
			$artwork = new WP_Query(array(
				'post_type' => 'artwork',
				'order' => 'ASC',
				'meta_query' => array(
					array(
						'key' => 'featured',
						'compare' => 'EXISTS',
						'value' => true,
						// 'type' => 'numeric'
					)
				)


			));

			while ($artwork->have_posts()) {
				$artwork->the_post();


				list($width, $height, $type, $attr) = getimagesize(get_field('hero_image'));
				$aspectratio = $width / $height;
				switch ($aspectratio) {

					case ($aspectratio < 1):
						$wideimage = true;

						break;
					case $aspectratio > 1:
						$wideimage = false;

						break;
					default:
						$wideimage = true;
				}





			?>


				<div class="grid-item <?php
															echo ($wideimage) ? '' : 'grid-item--width2'; ?>">
					<a href="<?php echo get_the_permalink() ?>">
						<img src="<?php echo get_field('hero_image') ?>;" alt="<?php echo get_field('title') ?>">
					</a>
				</div>

			<?php




			}

			?>

		</div>
	</div>
</div>