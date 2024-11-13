<?php
if(!defined('ABSPATH')) {
	exit;
}
$title = get_sub_field('title') ?? null;
$personnel_cards = get_sub_field('personnel_cards') ?? null;
?>
<?php if( !empty( $title ) || !empty( $personnel_cards ) ):?>
<section class="key-personnel module-padding position-relative bg-ultra-blue">
	<div class="grid-container position-relative">
		<div class="grid-x grid-padding-x align-center">
			<div class="cell small-12 medium-10 large-8">
				<?php if( !empty( $title ) ):?>
					<h2 class="text-center">
						<?=esc_html( $title );?>
					</h2>
				<?php endif;?>
				<?php if( !empty($personnel_cards) ): 
					foreach($personnel_cards as $post):
					setup_postdata($post);	
				?>
					<div class="person-row grid-x grid-padding-x align-center">
						<?php 
						$image = get_field('photo') ?? null;
						$title = get_field('title') ?? null;
						
						$size = 'full';
						if( $image ) :?>
							<div class="cell small-12 medium-4 large-5">
								<?=wp_get_attachment_image( $image['id'], $size );?>
							</div>
						<?php endif;?>
						<?php if( !empty( $title) ):?>
							<div class="cell small-12  medium-8 large-7">
								<h3>
									<?php the_title();?>
								</h3>
								<?php if( !empty( $title ) ):?>
									<div class="p">
										<i><?=esc_html( $title );?></i>
									</div>
								<?php endif;?>
								<?php the_content();?>
							</div>
						<?php endif;?>
					</div>
				<?php endforeach; 
				endif; 
				wp_reset_postdata();?>
			</div>
		</div>
	</div>
</section>
<?php endif;?>