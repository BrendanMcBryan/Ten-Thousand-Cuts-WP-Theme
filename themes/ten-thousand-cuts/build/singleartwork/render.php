<?php
// * get image aspect ratio, set image column width based on that aspect ration
list($width, $height, $type, $attr) = getimagesize(get_field('hero_image'));

$aspectratio = $width / $height;
switch ($aspectratio) {

    // * very tall images
    case $aspectratio < .33:
        $imageclass = "verytall";
        break;

    // * tall images
    case $aspectratio > .33 && $aspectratio < .8:
        $imageclass = "tall";
        break;

    // * portrait images (default)
    case ($aspectratio > .8 && $aspectratio < 1):
        $imageclass = "portrait";
        break;

    // * landscape images
    case ($aspectratio > 1 && $aspectratio < 3):
        $imageclass = "landscape";
        break;

    // * wide images
    case $aspectratio > 3:
        $imageclass = "wide";
        break;

    default:
        $imageclass = "portrait";
}

// * get date
$date = date_create(get_field('date_completed'));

// * get materials array
$materials = implode(", ", get_field('materials'));
/**
 * Get product price by product ID.
 */
function wc_get_product_price($product_id)
{
    return ($product = wc_get_product($product_id)) ? $product->get_price() : false;
}

$productPrice = wc_get_product_price(291);

?>
<div class="single-artwork__container alignwide" <?php echo get_block_wrapper_attributes(); ?>>

    <div class="single-artwork__inner">
        <div class="single-artwork__image single-artwork__image--<?php echo $imageclass ?>">
            <img src="<?php echo get_field('hero_image') ?>" alt="<?php echo get_field('title') ?>">
        </div>

        <div class="single-artwork__info single-artwork__info--<?php echo $imageclass ?>">
            <div class="artworkinfo-block">
                <h5><?php echo date_format($date, "Y") ?> </h5>

                <div class="artworkinfo-titleblock">

                    <div class="artworkinfo-titleblock-title">
                        <h1><?php echo get_field('title') ?></h1>
                        <?php
                        if (get_field('subtitle')) {
                        ?> <h2><?php echo get_field('subtitle') ?> </h2>
                        <?php }
                        ?>
                    </div>

                    <div class="artworkinfo-titleblock-button">
                        <?php
                        if (get_field('available_for_purchase')) { ?>
                            <div class="avaiableBTN">

                                <a class=" avaiableBTN wp-block-button__link wp-element-button " href="<?php echo
                                                                                                        '/?s=' . get_field('title') . '&post_type=product' ?>">Prints</a>
                            </div>
                        <?php    } ?>
                    </div>

                </div>




                <p class="info"><?php echo get_field('width') ?>" &times;<?php echo get_field('height') ?>"
                    <?php if ($materials) { ?>
                        <span class="seperator"> | </span><?php echo $materials ?>
                    <?php    } ?>
                </p>
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