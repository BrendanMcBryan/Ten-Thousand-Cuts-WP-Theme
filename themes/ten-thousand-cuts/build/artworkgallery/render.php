<section id="artgrid" class="artgrid alignwide">

	<div class="artgrid__strip">

		<?php
		$artwork = new WP_Query(array(
			'post_type' => 'artwork',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'rand',
			'meta_query' => array(
				array(
					'key' => 'featured',
					'compare' => 'EXISTS',
					'value' => true,
					// 'orderby' => 'DESC'
					// 'type' => 'numeric'
				)
			)
		));

		while ($artwork->have_posts()) {
			$artwork->the_post();
			list($width, $height, $type, $attr) = getimagesize(get_field('hero_image'));
			$aspectratio = $width / $height;
			switch ($aspectratio) {
					// * tall images
				case $aspectratio < .5:
					$frameclass = "art__tall";
					break;
					// * portrait images
				case ($aspectratio > .5 && $aspectratio < 1):
					$frameclass = "art__portrait";

					break;
					// * landscape images
				case ($aspectratio > 1 && $aspectratio < 3):
					$frameclass = "art__landscape";
					break;
					// * wide images
				case $aspectratio > 3:
					$frameclass = "art__wide";
					break;

				default:
					$frameclass = "art__portrait";
			}

		?>

			<div class="artgrid__art art <?php echo $frameclass ?>" style="background-image: url(<?php echo get_field('hero_image') ?>);">
				<h2 class="artgrid__art__title"><?php echo get_field('title') ?></h2>
				<a href="<?php echo get_the_permalink() ?>">
			</div>

		<?php
		}
		// echo paginate_links();
		wp_reset_postdata();
		?>

	</div>
</section>