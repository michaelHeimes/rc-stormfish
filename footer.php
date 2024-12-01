<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trailhead
 */
$footer_logo = get_field('footer_logo', 'option') ?? null;
$footer_text = get_field('footer_text', 'option') ?? null;
$subfooter_links = get_field('subfooter_links', 'option') ?? null;
$copyright_text = get_field('copyright_text', 'option') ?? null;
?>

				<footer id="colophon" class="site-footer bg-ocean-blue">
					<div class="top grid-container">
						<div class="grid-x grid-padding-x align-middle">
							<?php if( !empty( $footer_logo ) || !empty( $footer_text ) ):?>
								<div class="left cell small-12 tablet-5">
									<?php 
									if( $footer_logo ) :
										$size = 'full';
										$image_id =  $footer_logo['id'] ?? null;?>
										<div class="img-wrap">
											<?=wp_get_attachment_image( $image_id, $size, false, array( 'class' => '' ) );?>
										</div>
									<?php endif;?>
									<?php if( !empty( $footer_text ) ):?>
										<p>
											<?=esc_html( $footer_text  );?>
										</p>
									<?php endif;?>
								</div>
							<?php endif;?>
							<div class="right cell small-12 tablet-7">
								<?php trailhead_footer_links();?>
								<?php trailhead_social_links();?>
							</div>
						</div>
					</div>
					<div class="site-info">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<?php if( !empty( $subfooter_links ) ):?>
									<div class="left cell small-12 tablet-5 grid-x">
										<ul class="menu horizontal">
											<?php foreach($subfooter_links as $subfooter_link):
												$link = $subfooter_link['link'];	
											?>
												<li>
													<?php 
													if( $link ): 
														$link_url = $link['url'];
														$link_title = $link['title'];
														$link_target = $link['target'] ? $link['target'] : '_self';
														?>
														<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
													<?php endif; ?>
												</li>
											<?php endforeach;?>
										</ul>
									</div>
								<?php endif;?>
								<div class="right cell small-12 tablet-7 p grid-x">
									Copyright &copy;<?php echo date('Y'); ?>
									<?php if( !empty( $copyright_text ) ) {
										echo wp_kses_post( $copyright_text );
									};?>
								</div>
							</div>
						</div>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->
					
			</div><!-- #page -->
			
		</div>  <!-- end .off-canvas-content -->
							
	</div> <!-- end .off-canvas-wrapper -->
	<?php if( is_front_page() ):
		$loading_screen_text = get_field('loading_screen_text', 'option') ?? null;	
	?>
	<div id="loading-screen" class="bg-ultra-blue">
		<div class="fish-wrap grid-x align-middle">
			<img src="<?=get_template_directory_uri();?>/assets/images/fish-white.png"/>
		</div>
		<div class="grid-container h-100">
			<div class="grid-x align-middle h-100">
				<div class="cell small-12 message h1 display" style="opacity: 0;">
					<?=wp_kses_post($loading_screen_text);?>
				</div>
			</div>
		</div>
	</div>
	<?php endif;?>
<?php wp_footer(); ?>

</body>
</html>
