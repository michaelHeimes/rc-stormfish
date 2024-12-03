<?php
if(!defined('ABSPATH')) {
	exit;
}
$remove_bottom_border = get_sub_field('remove_bottom_border') ?? null;
$global_cta_heading = get_field('global_cta_heading', 'option') ?? null;
$global_cta_text = get_field('global_cta_text', 'option') ?? null;
$global_cta_button_link = get_field('global_cta_button_link', 'option') ?? null;
?>
<?php if( !empty( $global_cta_heading ) || !empty( $global_cta_text ) || !empty( $global_cta_button_link ) ):?>
<section class="global-centered-cta module position-relative bg-ultra-blue
<?php if( !$remove_bottom_border ) { echo ' bottom-border'; };?>
">
	<?php $index = get_row_index(); if( $index == 1 ):?>
		<div class="header-spacer"></div>
	<?php endif;?>
	<div class="grid-container">
		<div class="grid-x grid-padding-x align-middle align-center text-center">
			<div class="cell small-12 medium-10 tablet-9 large-8 xlarge-7 has-bg">
				<div class="bg" style="background-image: url('<?=get_template_directory_uri(); ?>/assets/images/cta-fish.svg'); background-size: contain; 	background-position: center;"></div>
				<div class="position-relative module-spacing">
					<?php if( !empty( $global_cta_heading ) ):?>
						<h2>
							<?=esc_html( $global_cta_heading );?>
						</h2>
					<?php endif;?>
					<?php if( !empty( $global_cta_text ) ):?>
						<p class="p24">
							<?=esc_html( $global_cta_text );?>
						</p>
					<?php endif;?>
					<?php 
					$link = $global_cta_button_link;
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
						?>
						<div class="btn-wrap">
							<a class="button no-margin" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
								<span><?php echo esc_html( $link_title ); ?></span>
								<svg width="11" height="11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M.9 0v1.527h7.493L0 9.92 1.08 11l8.393-8.393v7.492H11V0H.9Z" fill="#FF8E2E"/></svg>
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>