<?php
if(!defined('ABSPATH')) {
	exit;
}
$remove_bottom_border = get_sub_field('remove_bottom_border') ?? null;
$large_text = get_sub_field('large_text') ?? null;
$medium_text = get_sub_field('medium_text') ?? null;
?>
<?php if( !empty( $large_text ) || !empty( $medium_text ) ):?>
<section class="orange-text-with-flyby-animation module has-animated-pipe module-padding position-relative bg-ultra-blue overflow-hidden
<?php if( !$remove_bottom_border ) { echo ' bottom-border'; };?>
">
	<div class="fish-wrap grid-x align-middle">
		<img src="<?=get_template_directory_uri();?>/assets/images/fish-white.png"/>
	</div>
	<div class="grid-container position-relative">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<?php if( !empty( $large_text ) ):?>
					<div class="large-text">
						<?=wp_kses_post($large_text);?>
					</div>	
				<?php endif;?>
				<?php if( !empty( $medium_text ) ):?>
					<div class="medium-text">
						<?=wp_kses_post($medium_text);?>
					</div>	
				<?php endif;?>
			</div>
		</div>
	</div>
</section>
<?php endif;?>