<?php

$logo = get_template_directory_uri() . '/assets/images/Eris-Icon.svg'

?>

<div <?php echo get_block_wrapper_attributes(); ?> data-wp-interactive="tenthousandcuts">
	<div class="title_block">
		<div class="title_block__logo">
			<a href="<?php echo get_home_url(); ?>"> <img src="<?php echo $logo ?>" id="logo" /> </a>
		</div>
		<div class="title_block__headlines">
			<a href="<?php echo get_home_url(); ?>">
				<h1 class="mb0 mt0"><?php echo get_bloginfo('name'); ?></h1>
			</a>
			<!-- <h2 class="mt0 mb5">< ?php echo get_bloginfo('description'); ?></h2> -->
		</div>
		<!-- <div class="title_block__menu">

			<div class="title_block__menu--dropdown--container">
				<div class="title_block__menu--dropdown">
					<div class="menu_item menu_item_shop">shop</div>
					<a href="/artwork" class="menu_item menu_item_archives">archives</a>
					<div class="menu_item menu_item_close" id="CloseMenu"><i class="fa-solid fa-circle-half-stroke"></i></div>
				</div>


		</div>

		<div class="title_block__menu--burger" id="menuBurger">
			<i class="fa-solid fa-circle-notch" data-wp-on--click="actions.toggleMenu"></i>
		</div> -->

	</div>
</div>