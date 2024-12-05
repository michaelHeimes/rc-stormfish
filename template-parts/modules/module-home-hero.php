<?php
if(!defined('ABSPATH')) {
    exit;
}
$remove_bottom_border = get_sub_field('remove_bottom_border') ?? null;
$background_image = get_sub_field('background_image') ?? null;
$background_image_orientation = get_sub_field('background_image_orientation') ?? null;
$heading = get_sub_field('heading') ?? null;
$intro_text = get_sub_field('intro_text') ?? null;
?>
<?php if( !empty( $background_image ) || !empty( $heading ) || !empty( $intro_text ) ):?>
<section class="home-hero module has-object-fit-img position-relative bg-ultra-blue
<?php if( !$remove_bottom_border ) { echo ' bottom-border'; };?>
">
    <?php 
    if( $background_image ) {
        $size = 'full-width-hero';
        $image_id =  $background_image['id'] ?? null;
        echo wp_get_attachment_image(
            $image_id, 
            $size, 
            false, 
            array( 
                'class' => 'img-fill orientation-' . esc_attr( $background_image_orientation ) 
            ) 
        );
    }?>
    <div class="grid-container position-relative module-spacing grid-x align-bottom">
        <div class="grid-x grid-padding-x h-100">
            <?php if( !empty( $heading ) || !empty( $intro_text ) ):?>
                <div class="cell small-12 medium-10 large-8">
                    <?php if( !empty( $heading ) ):?>
                        <h1>
                            <?=esc_html( $heading );?>
                        </h1>
                    <?php endif;?>
                    <?php if( !empty( $intro_text ) ):?>
                        <p class="p24">
                            <?=esc_html( $intro_text );?>
                        </p>
                    <?php endif;?>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>
<?php endif;?>