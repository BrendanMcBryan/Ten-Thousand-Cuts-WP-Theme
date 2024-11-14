<div class="glide alignwide" id="artworkSlideshow">
	<!-- <button id="prev" class="glide__arrow slider__arrow glide__arrow--left" data-glide-dir="&lt;">&#8880;</button> -->

	<div class="glide__track" data-glide-el="track">

		<ul class="glide__slides">




			<?php
			$artwork = new WP_Query(array(
				'post_type' => 'artwork',
				'order' => 'rand',
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
						// * tall images
					case $aspectratio < .8:
						$frameclass = "art__tall";
						break;
						// * portrait images
					case ($aspectratio > .8 && $aspectratio < 1):
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


				<li class="glide__slide art <?php echo $frameclass ?>" style="background-image: url(<?php echo get_field('hero_image') ?>);">
					<a href="<?php echo get_the_permalink() ?>">
						<!-- <img src="<?php echo get_field('hero_image') ?>" alt=""> -->

					</a>
				</li>

			<?php
			}

			?>

		</ul>
		<!-- </div> -->
		<!-- <button id="next" class="slider__arrow slider__arrow--next glide__arrow glide__arrow--next" data-glide-dir="&gt;">
		&#8881;

	</button> -->


	</div>