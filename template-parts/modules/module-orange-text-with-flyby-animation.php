<?php
if(!defined('ABSPATH')) {
	exit;
}
$large_text = get_sub_field('large_text') ?? null;
$medium_text = get_sub_field('medium_text') ?? null;
?>
<?php if( !empty( $large_text ) || !empty( $medium_text ) ):?>
<section class="orange-text-with-flyby-animation module-padding position-relative bg-ultra-blue">
	<div class="grid-container position-relative">
		<div class="grid-x grid-padding-x">
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
</section>
<?php endif;?>