<?php
function add_custom_sizes() {
	// Team Photos
	add_image_size( 'overlapping-text-image', 1822, 1060, false );
}
add_action('after_setup_theme','add_custom_sizes');