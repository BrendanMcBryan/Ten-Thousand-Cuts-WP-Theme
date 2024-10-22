<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div <?php echo get_block_wrapper_attributes(); ?> data-wp-interactive="tenthousandcuts">
	<div class="title_block">
		<div class="title_block__headlines">
			<h1 class="mb0 mt0"><?php echo get_bloginfo('name'); ?></h1>
			<h2 class="mt0 mb5"><?php echo get_bloginfo('description'); ?></h2>
		</div>
		<div class="title_block__menu">

			<div class="title_block__menu--dropdown--container">
				<div class="title_block__menu--dropdown">
					<div class="menu_item menu_item_shop">shop</div>
					<a href="/artwork" class="menu_item menu_item_archives">archives</a>
					<div class="menu_item menu_item_close" id="CloseMenu"><i class="fa-solid fa-circle-half-stroke"></i></div>
				</div>


			</div>

			<div class="title_block__menu--burger" id="menuBurger">
				<i class="fa-solid fa-circle-notch" data-wp-on--click="actions.toggleMenu"></i>
			</div>




			<!-- <svg id="a" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 195.02 209.5">
				<path d="M.14,147.24c31.06,15.32,71.07,8.92,94.88-16.5,32.68-35.81,22.66-93.7-18.05-118.82C67.23,5.87,56.24,1.9,44.84.3c0,0,.03-.3.03-.3,11.6.62,23.08,4.12,33.3,9.9,31.42,17.38,46.71,57.57,34.99,91.45-9.98,30.54-38.44,55.29-71.18,56.55C27.39,158.6,12.45,155,0,147.5c0,0,.14-.26.14-.26H.14Z" />
				<path d="M195.02,45.93s-6.71-.1-6.71-.1c0,0-6.68.41-6.68.41,0,0-6.6.98-6.6.98,0,0-6.48,1.54-6.48,1.54-25.59,6.89-46.99,27.43-54.44,52.89-8.78,27.51-.33,59.05,20.29,79.13,0,0,4.94,4.49,4.94,4.49l5.32,4.06s5.63,3.65,5.63,3.65l-.09.18c-7.92-4.25-15.09-9.88-21.11-16.55-32.03-35.22-25.09-91.73,14.68-117.98,14.76-9.84,33.95-15.12,51.26-12.68h0Z" />
				<path d="M142.96.6c-7.38,30.04-21.88,74.69-30.82,104.74-9.34,30.06-22.1,74.93-32.73,104.16,7.4-30.03,21.87-74.69,30.82-104.74,9.36-30.06,22.08-74.94,32.73-104.16h0Z" />
			</svg> -->

		</div>
	</div>
</div>