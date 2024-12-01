<?php
if(!defined('ABSPATH')) {
	exit;
}
$remove_bottom_border = get_sub_field('remove_bottom_border') ?? null;
$title = get_sub_field('title') ?? null;
$personnel_cards = get_sub_field('personnel_cards') ?? null;
?>
<?php if( !empty( $title ) || !empty( $personnel_cards ) ):?>
<section class="key-personnel module module-padding position-relative bg-ultra-blue
<?php if( !$remove_bottom_border ) { echo ' bottom-border'; };?>
">
	<div class="grid-container position-relative">
		<div class="grid-x grid-padding-x align-center">
			<div class="cell small-10 medium-12 large-10 xlarge-9">
				<?php if( !empty( $title ) ):?>
					<h2 class="text-center">
						<?=esc_html( $title );?>
					</h2>
				<?php endif;?>
				<?php if( !empty($personnel_cards) ): 
					foreach($personnel_cards as $post):
					setup_postdata($post);	
				?>
					<div class="person-row">
						<div class="grid-x grid-padding-x align-center">
							<?php 
							$image = get_field('photo') ?? null;
							$title = get_field('title') ?? null;
							
							$size = 'full';
							if( $image ) :?>
								<div class="img-wrap cell small-12 medium-4 large-5">
									<?=wp_get_attachment_image( $image['id'], $size );?>
								</div>
							<?php endif;?>
							<?php if( !empty( $title) ):?>
								<div class="cell small-12  medium-8 large-6">
									<h3>
										<?php the_title();?>
										<div class="pipe"><span></span></div>
									</h3>
									<?php if( !empty( $title ) ):?>
										<div class="p title">
											<i><?=esc_html( $title );?></i>
										</div>
									<?php endif;?>
									<?php the_content();?>
								</div>
							<?php endif;?>
						</div>
					</div>
				<?php endforeach; 
				endif; 
				wp_reset_postdata();?>
			</div>
		</div>
	</div>
</section>
<?php endif;?>