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

				<footer id="colophon" class="site-footer">
					<div class="grid-container">
						<div class="grid-x grid-padding-x">
							<?php if( !empty( $footer_logo ) || !empty( $footer_text ) ):?>
								<div class="cell small-12 medium-4">
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
							<div class="cell small-12 medium-4">
								<?php trailhead_footer_links();?>
								<?php trailhead_social_links();?>
							</div>
						</div>
					</div>
					<div class="site-info">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<?php if( !empty( $subfooter_links ) ):?>
									<div class="cell small-12 medium-shrink">
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
								<div class="cell small-12 medium-auto">
									Copyright &copy;<?php echo date('Y'); ?>
									<?php if( !empty( $copyright_text ) ) {
										echo esc_html( $copyright_text );
									};?>
								</div>
							</div>
						</div>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->
					
			</div><!-- #page -->
			
		</div>  <!-- end .off-canvas-content -->
							
	</div> <!-- end .off-canvas-wrapper -->
					
<?php wp_footer(); ?>

</body>
</html>
