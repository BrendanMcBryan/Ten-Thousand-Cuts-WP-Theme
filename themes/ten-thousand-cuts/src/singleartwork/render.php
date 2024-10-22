<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div class="single-artwork__container" <?php echo get_block_wrapper_attributes(); ?>>


	<div class="single-artwork__bg-image" style="background-image: url(<?php echo get_field('frameless_image') ?>">
	</div>

	<div class="single-artwork__inner">
		<img src="<?php echo get_field('hero_image') ?>" alt="<?php echo get_field('title') ?>">
		<div class="single-artwork__info">
			<h6 class="aiaid scaleOnHoverSmall "><?php echo get_field('aia-id') ?></h6>
			<h1><?php echo get_field('title') ?></h1>
			<h2><span class="small">by: </span><?php echo get_field('artist') ?></h2>
			<p class="info"> <?php echo get_field('width') ?> x <?php echo get_field('height') ?>, <?php echo get_field('medium') ?></p>
			<p class="description"> <?php echo get_field('description') ?> </p>


			<?php
			$taxonomy = get_field('artwork_type');
			if ($taxonomy) {
				echo '<h5>' . $taxonomy[0]->name . '</h5>';
			} else {
			}
			?>




		</div>
	</div>









</div>