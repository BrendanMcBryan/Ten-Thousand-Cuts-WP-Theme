<?php

$logo = get_template_directory_uri() . '/assets/images/Eris-Icon.svg'

?>

<div <?php echo get_block_wrapper_attributes(); ?> data-wp-interactive="tenthousandcuts">
	<div class="title_block">
		<div class="title_block__logoGroup">

			<div class="title_block__logo">
				<a href="<?php echo get_home_url(); ?>"> <img src="<?php echo $logo ?>" id="logo" /> </a>
			</div>

			<div class="title_block__headlines">
				<a href="<?php echo get_home_url(); ?>">
					<h1 class="mb0 mt0"><?php echo get_bloginfo('name'); ?></h1>
				</a>
				<!-- <h2 class="mt0 mb5">echo get_bloginfo('description');</h2> -->
			</div>

		</div>
		<!-- menu -->
		<div class="title_block__menu">

			<a href="/about" class="menu_item menu_item_about">about</a>
			<a href="/shop" class="menu_item menu_item_shop">shop</a>

		</div>

	</div>

</div>