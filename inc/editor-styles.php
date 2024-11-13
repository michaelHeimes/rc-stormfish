<?php
// Adds your styles to the WordPress editor
add_action( 'init', 'add_editor_styles' );
function add_editor_styles() {
    add_editor_style( '/assets/styles/css/editor-style.css' );
}

// Adds your styles to the Gutenberg editor
add_action( 'after_setup_theme', 'trailhead_gutenberg_css' );

function trailhead_gutenberg_css(){
	//add_theme_support( 'editor-styles' );
	//add_editor_style( '/assets/styles/css/editor-style.css' );
}