<?php
function add_custom_sizes() {
	add_image_size( 'full-width-hero', 3000, 2019, false );
	add_image_size( 'overlapping-text-image', 1756, 1040, false );
	add_image_size( 'personnel', 720, 714, true );
}
add_action('after_setup_theme','add_custom_sizes');