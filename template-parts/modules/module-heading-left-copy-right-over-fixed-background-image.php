<?php
if(!defined('ABSPATH')) {
	exit;
}
$remove_bottom_border = get_sub_field('remove_bottom_border') ?? null;
$background_image = get_sub_field('background_image') ?? null;
$rows = get_sub_field('rows') ?? null;
?>
<?php if( !empty( $background_image ) || !empty( $heading ) || !empty( $copy ) ):?>
<section class="heading-left-copy-right-over-fixed-background-image sticky-bg-group has-object-fit-img module has-bg">
	<?php 
	if( $background_image ) {
		$size = 'full-width-hero';
		$image_id =  $background_image['id'] ?? null;
		echo '<div class="bg">';
		echo '<div class="sticky-bg has-object-fit">';
		echo wp_get_attachment_image( $image_id, $size, false, array( 'class' => 'img-fill' ) );
		echo '</div>';
		echo '</div>';
	}?>
	<?php 
	$count = count($rows); 
	$i = 1;	
	foreach($rows as $row):
		$heading = $row['heading'] ?? null;
		$copy = $row['copy'] ?? null;
	?>
		<?php $index = get_row_index(); if( $index == 1 ):?>
			<div class="header-spacer"></div>
		<?php endif;?>
		<div class="section-row module module-padding position-relative
		<?php if( $i == $count && !$remove_bottom_border ) { echo ' bottom-border'; };?>
		">
			<div class="grid-container position-relative">
				<div class="grid-x grid-padding-x">
					<?php if( !empty( $heading ) ):?>
						<div class="cell small-12 tablet-5">
							<h2>
								<?=esc_html( $heading );?>
								<span class="pipe mobile hide-for-tablet"><span></span></span>
							</h2>
						</div>
					<?php endif;?>
					<?php if( !empty( $copy ) ):?>
						<div class="cell small-12 tablet-7">
							<div class="pipe desktop show-for-tablet"><span></span></div>
							<div class="copy-wrap">
								<?=wp_kses_post($copy);?>
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	<?php $i++; endforeach;?>
</section>
<?php endif;?>