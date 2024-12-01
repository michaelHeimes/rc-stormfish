<?php 
$half = $args['half'] ?? null;
if( !empty( $half ) ):
	$content_type = $half['content_type'] ?? null;
	$media_type = $half['media_type'] ?? null;  
	$video_source = $half['video_source'] ?? null;
	$copy = $half['copy'] ?? null;  
	$image = $half['image'] ?? null;  
	$video = $half['video'] ?? null;  
?>
	<div class="cell small-12 tablet-6<?php if($content_type == 'copy') { echo ' large-5'; };?>">
		<?php if( $content_type == 'copy' ):?>
			<div class="copy parallax-2">
				<?=$copy;?>
			</div>
		<?php endif;?>
		<?php if( $content_type == 'media' && $media_type == 'image' && !empty($image) ):
			$size = 'full';?>
				<div class="img-wrap parallax-1">
					<?=wp_get_attachment_image( $image['id'], $size );?>
				</div>
		<?php endif;?>
		<?php if( $content_type == 'media' && $media_type == 'video' && !empty($video) ):
			$size = 'full';?>
				<div class="img-wrap responsive-embed widescreen parallax-1">
					<?php if( $video_source == 'youtube' ):						
						// Load value.
						$iframe =$half['video_url'] ?? null;
						
						// Use preg_match to find iframe src.
						preg_match('/src="(.+?)"/', $iframe, $matches);
						$src = $matches[1];
						
						// Add extra parameters to src and replace HTML.
						$params = array(
							'controls'  => 1,
							'hd'        => 1,
							'autohide'  => 1
						);
						$new_src = add_query_arg($params, $src);
						$iframe = str_replace($src, $new_src, $iframe);
						
						// Add extra attributes to iframe HTML.
						$attributes = 'frameborder="0"';
						$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
						
						// Display customized HTML.
						echo $iframe;
						
						
					else:?>
						<video muted loop playsinline controls>
							<source src="<?=esc_url($video['url']);?>" type="video/mp4">
							Your browser does not support the video tag.
						</video>
					<?php endif;?>
				</div>
		<?php endif;?>
	</div>
<?php endif;?>