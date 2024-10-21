<?php

if (!isset($attributes['imgURL'])) {
  $attributes['imgURL'] = get_theme_file_uri('/assets/images/Museum Window.webp');
}

?>

<section class="landing-page" style="background-image: url('<?php echo $attributes['imgURL'] ?>')">

  <div class="landing-page__content">
    <?php echo $content; ?>

  </div>

</section>