<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: https://jointswp.com/docs/off-canvas-menu/
 */
 $header_logo = get_field('header_logo', 'option') ?? null;
?>

<div class="top-bar-wrap grid-container fluid">
		
	<div class="top-bar" id="top-bar-menu">
	
		<div class="top-bar-left float-left">
			
			<div class="site-branding show-for-sr">
				<?php
				if ( is_front_page() && is_home() ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" tabindex="1"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" tabindex="1"><?php bloginfo( 'name' ); ?></a></p>
					<?php
				endif;
				$trailhead_description = get_bloginfo( 'description', 'display' );
				if ( $trailhead_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $trailhead_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->
		
			<ul class="menu">
				<li class="logo"><a href="<?php echo home_url(); ?>">
					<?php 
					if( $header_logo ) :
						$size = 'full';
						$image_id =  $header_logo['id'] ?? null;?>
						<div class="img-wrap">
							<?=wp_get_attachment_image( $image_id, $size, false, array( 'class' => '' ) );?>
						</div>
					<?php endif;?>
				</a></li>
			</ul>
		</div>
		<div class="menu-toggle-wrap top-bar-right float-right">
			<ul class="menu">
				<!-- <li><button class="menu-icon" type="button" data-toggle="off-canvas"></button></li> -->
				<li>
					<a id="menu-toggle" aria-expanded="false" tabindex="2">
						<span></span><span></span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	
</div>