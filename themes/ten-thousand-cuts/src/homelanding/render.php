<?php

if (!isset($attributes['imgURL'])) {
  $attributes['imgURL'] = get_theme_file_uri('/assets/images/Museum Window.webp');
}

?>

<section class="landing-page">
  <div class="landing-page__bg-image" style="background-image: url('<?php echo $attributes['imgURL'] ?>')"></div>
  <div class="landing-page__content">
    <?php echo $content; ?>
  </div>

</section>