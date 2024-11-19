<?php
// get image aspect ratio, set image column width based on that aspect ration
list($width, $height, $type, $attr) = getimagesize(get_field('hero_image'));
$aspectratio = $width / $height;
switch ($aspectratio) {

		// * very tall images
	case $aspectratio < .33:
		$imagewidth = "20%";

		break;

		// * tall images

	case $aspectratio > .33 && $aspectratio < .8:
		$imagewidth = "33%";

		break;
		// * portrait images
	case ($aspectratio > .8 && $aspectratio < 1):
		$imagewidth = "40%";


		break;
		// * landscape images
	case ($aspectratio > 1 && $aspectratio < 3):
		$imagewidth = "60%";

		break;
		// * wide images
	case $aspectratio > 3:
		$imagewidth = "100%";

		break;

	default:
		$imagewidth = "100%";
}

// get date
$date = date_create(get_field('date_completed'));

// get materials array

$materials = implode(", ", get_field('materials'));


?>
<div class="single-artwork__container" <?php echo get_block_wrapper_attributes(); ?>>


	<div class="single-artwork__inner">
		<div class="single-artwork__image" style="width: <?php echo $imagewidth ?>;">
			<img src="<?php echo get_field('hero_image') ?>" alt="<?php echo get_field('title') ?>">
		</div>

		<div class="single-artwork__info">
			<div class="artworkinfo-block">
				<h5><?php echo date_format($date, "Y") ?> </h5>


				<h1><?php echo get_field('title') ?></h1>
				<?php
				if (get_field('subtitle')) {

				?> <h2><?php echo get_field('subtitle') ?> </h2>
				<?php }

				?>


				<p class="info"><?php echo get_field('width') ?>" &times; <?php echo get_field('height') ?>" <span class="seperator">|</span> <?php echo $materials ?></p>

				<?php
				if (get_field('description')) {

				?> <p class="description"><?php echo get_field('description') ?> </p>
				<?php }

				?>
			</div>
			<div class="pagination">
				<small class="page-item">
					<?php previous_post_link('%link', ' <i class="fas fa-arrow-left"></i> %title'); ?>
				</small>
				<small class="page-item">
					<?php next_post_link('%link', ' %title <i class="fas fa-arrow-right"></i>'); ?>
				</small>

			</div>


			<?php
			$taxonomy = get_field('artwork_type');
			if ($taxonomy) {
			?>

				<!-- <div class="links">
					<h5>see more: </h5>
					<a href="/artwork-type/< ?php echo $taxonomy[0]->name ?>">
						<h5> < ?php echo $taxonomy[0]->name ?></h5>
					</a>
				</div> -->
			<?php } else {
			}
			?>




		</div>
	</div>









</div>