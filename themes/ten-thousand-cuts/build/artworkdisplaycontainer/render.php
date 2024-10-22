<!-- CSS -->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<!-- JavaScript -->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>



<div class="carousel">

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

		<a href="<?php echo get_permalink() ?>" class="carousel-cell" style="background-image: url('<?php echo get_field('hero_image') ?>');">
		</a>

	<?php
	}

	?>



</div>


















</div>