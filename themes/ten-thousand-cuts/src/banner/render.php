<?php

if (!isset($attributes['imgURL'])) {
  $attributes['imgURL'] = get_theme_file_uri('/assets/images/ClaretDC-defualtRendering.webp');
}

?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url('<?php echo $attributes['imgURL'] ?>')"></div>
  <div class="page-banner__content container t-center c-white">
    <?php echo $content; ?>
  </div>
  <?php
  if ($attributes['hasDownArrow']) { ?>

    <div class="downarrow">
      <a href="#blackbox"><i class="fa-solid fa-chevron-down"></i></a>
    </div>

  <?php } ?>
</div>