<link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
<section class="splide" aria-label="Splide Basic HTML Example">
	<div class="splide__track">
		<ul class="splide__list">


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
			?>


				<li class="splide__slide">

					<img src="<?php echo get_field('hero_image') ?>" alt="">

				</li>

			<?php
			}

			?>

		</ul>












	</div>
</section>