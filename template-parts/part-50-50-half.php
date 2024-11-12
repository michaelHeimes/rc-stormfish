<?php 
$half = $args['half'] ?? null;
if( !empty( $half ) ):
	$content_type = $half['content_type'] ?? null;
	$media_type = $half['media_type'] ?? null;  
	$copy = $half['copy'] ?? null;  
	$image = $half['image'] ?? null;  
	$video = $half['video'] ?? null;  
?>
	<div class="cell small-12 tablet-6">
		<?php if( $content_type == 'copy' ):?>
			<div class="copy">
				<?=$copy;?>
			</div>
		<?php endif;?>
		<?php if( $content_type == 'media' && $media_type == 'image' && !empty($image) ):
			$size = 'full';?>
				<div class="img-wrap">
					<?=wp_get_attachment_image( $image['id'], $size );?>
				</div>
		<?php endif;?>
		<?php if( $content_type == 'media' && $media_type == 'video' && !empty($video) ):
			$size = 'full';?>
				<div class="img-wrap">
					<video muted loop playsinline controls>
						<source src="<?=esc_url($video['url']);?>" type="video/mp4">
						Your browser does not support the video tag.
					</video>
				</div>
		<?php endif;?>
	</div>
<?php endif;?>