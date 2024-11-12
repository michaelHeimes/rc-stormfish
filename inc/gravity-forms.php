<?php
// Make Scripts Load In Footer
add_filter('gform_init_scripts_footer', '__return_true');

// Load all form for BarbaJS (SPA) compatablity
function dg_load_all_gf_footer_code() {
	if (class_exists('GFFormsModel')) {
		$forms = GFFormsModel::get_forms( null, 'title' );
		foreach ($forms as $form) {
			do_shortcode('[gravityform id="'.$form->id.'" ajax="true"]');
		}
	}
}
add_action('wp_footer', 'dg_load_all_gf_footer_code');


/** * Formatting
 */

// Confirmation Anchor
function theme_gform_confirmation_anchor($enabled) {
  return false;
}
add_filter('gform_confirmation_anchor','theme_gform_confirmation_anchor');

// enable hide/show labels in Gravity Forms
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

// filter the Gravity Forms button type
/**
* Filters the next, previous and submit buttons.
* Replaces the form's <input> buttons with <button> while maintaining attributes from original <input>.
*
* @param string $button Contains the <input> tag to be filtered.
* @param array  $form    Contains all the properties of the current form.
*
* @return string The filtered button.
*/
add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
	$fragment = WP_HTML_Processor::create_fragment( $button );
	$fragment->next_token();
 
	$attributes = array( 'id', 'type', 'class', 'onclick' );
	$new_attributes = array();
	foreach ( $attributes as $attribute ) {
		$value = $fragment->get_attribute( $attribute );
		if ( ! empty( $value ) ) {
			$new_attributes[] = sprintf( '%s="%s"', $attribute, esc_attr( $value ) );
		}
	}
 
	return sprintf( '<button %s>%s</button>', implode( ' ', $new_attributes ), esc_html( $fragment->get_attribute( 'value' ) ) );
}

// Remove tabindex from all forms
add_filter( 'gform_tabindex', '__return_false' );

// add html5 attrubutes to required fields
function gform_field_content_html5_required($content, $field, $value, $lead_id, $form_id){
	if (in_array($field->type, array('text', 'email')) && $field->isRequired) {
		$content = str_replace( 'type=', "required type=", $content );
	}
	 
	return $content;
}
add_filter( 'gform_field_content', 'gform_field_content_html5_required', 10, 5);