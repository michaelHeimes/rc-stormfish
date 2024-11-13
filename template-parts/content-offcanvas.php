<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: https://jointswp.com/docs/off-canvas-menu/
 */
 $menu_logo = get_field('menu_logo', 'option') ?? null;
?>

<div class="off-canvas position-right position-relative" id="off-canvas" aria-hidden="true">

	<div class="inner h-100">
		<div class="grid-x h-100">
			<div class="logo-wrap small-6 grid-x align-middle align-center  position-relative">
				<?php 
				if( $menu_logo ) :
					$size = 'full';
					$image_id =  $menu_logo['id'] ?? null;?>
					<a class="img-wrap position-relative" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?=wp_get_attachment_image( $image_id, $size, false, array( 'class' => '' ) );?>
					</a>
				<?php endif;?>
			</div>
			<div class="menu-wrap small-6 bg-ultra-blue position-relative" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/menu-pixels-mask.png); background-size: cover;">
				<?php trailhead_top_nav();?>
			</div>
		</div>
	</div>

</div>
