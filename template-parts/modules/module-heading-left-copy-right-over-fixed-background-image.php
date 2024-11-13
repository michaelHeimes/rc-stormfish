<?php
if(!defined('ABSPATH')) {
	exit;
}
$background_image = get_sub_field('background_image') ?? null;
$rows = get_sub_field('rows') ?? null;
?>
<?php if( !empty( $background_image ) || !empty( $heading ) || !empty( $copy ) ):?>
<section class="heading-left-copy-right-over-fixed-background-image sticky-bg-group has-object-fit-img has-bg">
	<?php 
	if( $background_image ) {
		$size = 'full';
		$image_id =  $background_image['id'] ?? null;
		echo '<div class="bg">';
		echo '<div class="sticky-bg has-object-fit">';
		echo wp_get_attachment_image( $image_id, $size, false, array( 'class' => 'img-fill' ) );
		echo '</div>';
		echo '</div>';
	}?>
	<?php foreach($rows as $row):
		$heading = $row['heading'] ?? null;
		$copy = $row['copy'] ?? null;
	?>
		<div class="section-row module-padding">
			<div class="grid-container position-relative">
				<div class="grid-x grid-padding-x">
					<?php if( !empty( $heading ) ):?>
						<div class="cell small-12 tablet-5">
							<h2>
								<?=esc_html( $heading );?>
							</h2>
						</div>
					<?php endif;?>
					<?php if( !empty( $copy ) ):?>
						<div class="cell small-12 tablet-7">
							<?=wp_kses_post($copy);?>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	<?php endforeach;?>
</section>
<?php endif;?>