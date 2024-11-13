<?php
if( have_rows('content_modules') ):
	while ( have_rows('content_modules') ) : the_row();
		$row_index = get_row_index();
		if( get_row_layout() == 'home_hero' ):
			get_template_part('template-parts/modules/module', 'home-hero' );
		elseif( get_row_layout() == 'overlapping_text_and_image' ):
			get_template_part('template-parts/modules/module', 'overlapping-text-image');
		elseif( get_row_layout() == 'video_image_background_logo_copy_cta' ):
			get_template_part('template-parts/modules/module', 'video-image-background-logo-copy-cta');
		elseif( get_row_layout() == 'services' ):
			get_template_part('template-parts/modules/module', 'services',
				array(
					'row_index' => $row_index,
				),
			);
		elseif( get_row_layout() == 'logos' ):
			get_template_part('template-parts/modules/module', 'logos');
		elseif( get_row_layout() == 'text_with_small_title' ):
			get_template_part('template-parts/modules/module', 'text-with-small-title');
		elseif( get_row_layout() == 'testimonials' ):
			get_template_part('template-parts/modules/module', 'testimonials');
		elseif( get_row_layout() == 'global_centered_cta' ):
			get_template_part('template-parts/modules/module', 'global-centered-cta');
		elseif( get_row_layout() == '5050_contentmedia' ):
			get_template_part('template-parts/modules/module', '5050-contentmedia');
		elseif( get_row_layout() == 'heading_left_copy_right_over_fixed_background_image' ):
			get_template_part('template-parts/modules/module', 'heading-left-copy-right-over-fixed-background-image');
		elseif( get_row_layout() == 'key_personnel' ):
			get_template_part('template-parts/modules/module', 'key-personnel');
		elseif( get_row_layout() == 'contact_hero' ):
			get_template_part('template-parts/modules/module', 'contact-hero');
		elseif( get_row_layout() == 'orange_text_with_flyby_animation' ):
			get_template_part('template-parts/modules/module', 'orange-text-with-flyby-animation');
		endif;

	endwhile;
endif;
?>
