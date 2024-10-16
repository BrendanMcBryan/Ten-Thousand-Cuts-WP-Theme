<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<section class="floorplanGallery " <?php echo get_block_wrapper_attributes(); ?>>

	<div class="floorplanGallery__filter">
		<div class="filter-buttons">
			<button class="filter-button active" data-filter="all">All</button>
			<button class="filter-button" data-filter="OneBed">1 ed</button>
			<button class="filter-button" data-filter="OneBedDen">1 Bed + Den</button>
			<button class="filter-button" data-filter="TwoBed">2 Bed</button>
			<button class="filter-button" data-filter="TwoBedDen">2 Bed + Den</button>
		</div>
	</div>
	<div class="floorplanGallery__grid grid">

		<?php
		$residence = new WP_Query(array(
			'posts_per_page' => -1,
			'post_type' => 'residence',
			'order' => 'ASC',

		));

		while ($residence->have_posts()) {
			$residence->the_post();
			$residenceInfoText = get_field('residence_bedrooms');
			$residenceName = "Residence " . "<br>" . get_field('residence_number');
			$hasDen = get_field('residence_extra');
			$hasName = get_field('residence_name');

			if ($hasName) {
				$residenceName = "Penthouse " . "<br>" . get_field('residence_number');
			}

			if ($hasDen) {
				$residenceInfoText .=  ' + Den';
			}

			$residenceInfoText .= " | " . get_field('residence_bathrooms') . " | " . number_format(get_field('residence_sf')) . ' SF';
			// print_r($residenceInfoText)
		?>

			<?php
			if (get_field('residence_availability')) {
			?>
				<div class="grid-item floorplan" data-filtertype='<?php echo get_field('residence_type') ?>'>


					<img src="<?php echo get_field('residence_floorplan_image') ?>" alt="<?php echo get_field('residence_number') ?>">
					<div class="floorplan__info">


						<h2><?php echo $residenceName ?></h2>
						<hr />
						<h3><?php echo $residenceInfoText ?></h3>

						<a href="<?php echo get_field('residence_pdf') ?>">view</a>
					</div>


				</div>

		<?php }
		}


		?>
	</div>


</section>