<?php
if(!defined('ABSPATH')) {
	exit;
}
$background_type = get_sub_field('background_type') ?? null;
$background_video = get_sub_field('background_video') ?? null;
$background_image = get_sub_field('background_image') ?? null;
$logo = get_sub_field('logo') ?? null;
$heading = get_sub_field('heading') ?? null;
$text = get_sub_field('text') ?? null;
$button_link = get_sub_field('button_link') ?? null;
?>
<?php if( !empty( $background_image ) || !empty( $background_video ) || !empty( $background_image ) || !empty( $logo ) || !empty( $heading ) || !empty( $text ) || !empty( $button_link ) ):?>
<section class="video-image-background-logo-copy-cta module has-object-fit-img">
	<?php if( $background_type == 'video' && !empty( $background_video ) ) :?>
		<video class="link-video img-fill" muted loop autoplay playsinline>
			<source src="<?=esc_url($background_video['url']);?>" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	<?php endif;?>
	<?php 
	if( $background_image ) {
		$size = 'full';
		$image_id =  $background_image['id'] ?? null;
		echo wp_get_attachment_image( $image_id, $size, false, array( 'class' => 'img-fill' ) );
	}?>
	<div class="grid-container position-relative">
		<div class="grid-x grid-padding-x align-center">
			<?php if( !empty( $heading ) || !empty( $intro_text ) ):?>
				<div class="cell small-11 medium-10 large-8">
					<div class="grid-x grid-padding-x align-middle">
						<?php 
						$image = $logo;
						$size = 'full';
						if( $image ) :?>
							<div class="cell small-12 medium-4">
								<?=wp_get_attachment_image( $image['id'], $size );?>
							</div>
						<?php endif;?>
						
						<?php if( !empty( $heading ) || !empty( $text ) || !empty( $button_link ) ):?>
							<div class="cell small-12 medium-8">
								<?php if( !empty( $heading ) ):?>
									<h2>
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
									<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
										<span><?php echo esc_html( $link_title ); ?></span>
										<svg width="11" height="11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M.9 0v1.527h7.493L0 9.92 1.08 11l8.393-8.393v7.492H11V0H.9Z" fill="#FF8E2E"/></svg>
									</a>
								<?php endif; ?>
							</div>
						<?php endif;?>
						

						
					</div>

				</div>
			<?php endif;?>
		</div>
	</div>
</section>
<?php endif;?>