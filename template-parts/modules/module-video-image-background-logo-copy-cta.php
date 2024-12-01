<?php
if(!defined('ABSPATH')) {
	exit;
}
$remove_bottom_border = get_sub_field('remove_bottom_border') ?? null;
$background_type = get_sub_field('background_type') ?? null;
$background_video = get_sub_field('background_video') ?? null;
$background_image = get_sub_field('background_image') ?? null;
$logo = get_sub_field('logo') ?? null;
$heading = get_sub_field('heading') ?? null;
$text = get_sub_field('text') ?? null;
$button_link = get_sub_field('button_link') ?? null;
?>
<?php if( !empty( $background_image ) || !empty( $background_video ) || !empty( $background_image ) || !empty( $logo ) || !empty( $heading ) || !empty( $text ) || !empty( $button_link ) ):?>
<section class="video-image-background-logo-copy-cta module parallax-section has-object-fit-img position-relative bg-ultra-blue
<?php if( !$remove_bottom_border ) { echo ' bottom-border'; };?>
">
	<?php if( $background_type == 'video' && !empty( $background_video ) ) :?>
		<video class="play-in-view img-fill" muted loop playsinline>
			<source src="<?=esc_url($background_video['url']);?>" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	<?php endif;?>
	<?php 
	if( $background_image && $background_type !== 'video' ) {
		$size = 'full';
		$image_id =  $background_image['id'] ?? null;
		echo wp_get_attachment_image( $image_id, $size, false, array( 'class' => 'img-fill' ) );
	}?>
	<div class="grid-container position-relative">
		<div class="grid-x grid-padding-x align-center">
			<?php if( !empty( $logo ) || !empty( $heading ) || !empty( $intro_text ) ):?>
				<div class="cell small-11">
					<div class="inner color-ultra-blue parallax-2">
						<div class="grid-x grid-padding-x align-middle">
							<?php 
							$image = $logo;
							$size = 'full';
							if( $image ) :?>
								<div class="cell small-12 medium-5 text-center">
									<?=wp_get_attachment_image( $image['id'], $size );?>
								</div>
							<?php endif;?>
							
							<?php if( !empty( $heading ) || !empty( $text ) || !empty( $button_link ) ):?>
								<div class="cell small-12 medium-7">
									<?php if( !empty( $heading ) ):?>
										<h2 class="color-ultra-blue">
											<?=esc_html( $heading );?>
										</h2>
									<?php endif;?>
									<?php if( !empty( $text ) ):?>
										<div>
											<?=wp_kses_post( $text );?>
										</div>
									<?php endif;?>
									<?php 
									$link = $button_link;
									if( $link ): 
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
										?>
										<a class="button no-margin" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
											<span class="color-ultra-blue"><?php echo esc_html( $link_title ); ?></span>
											<svg width="11" height="11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M.9 0v1.527h7.493L0 9.92 1.08 11l8.393-8.393v7.492H11V0H.9Z" fill="#FF8E2E"/></svg>
										</a>
									<?php endif; ?>
								</div>
							<?php endif;?>
						</div>
					</div>
				</div>
			<?php endif;?>
		</div>
	</div>
</section>
<?php endif;?>