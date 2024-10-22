<div class="glide" id="homeSlide">
	<button id="prev" class="glide__arrow slider__arrow glide__arrow--left" data-glide-dir="&lt;">&#8880;</button>

	<div class="glide__track" data-glide-el="track">

		<ul class="glide__slides">




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
			?>


				<li class="glide__slide" style="background-image: url(<?php echo get_field('hero_image') ?>);">
					<a href="<?php echo get_the_permalink() ?>"></a>
				</li>

			<?php
			}

			?>

		</ul>
	</div>
	<button id="next" class="slider__arrow slider__arrow--next glide__arrow glide__arrow--next" data-glide-dir="&gt;">
		&#8881;

	</button>


</div>