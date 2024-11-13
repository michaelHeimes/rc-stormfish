<?php
if(!defined('ABSPATH')) {
    exit;
}
$background_image = get_sub_field('background_image') ?? null;
$heading = get_sub_field('heading') ?? null;
$intro_text = get_sub_field('intro_text') ?? null;
?>
<?php if( !empty( $background_image ) || !empty( $heading ) || !empty( $intro_text ) ):?>
<section class="home-hero has-object-fit-img position-relative bg-ultra-blue">
    <?php 
    if( $background_image ) {
        $size = 'full';
        $image_id =  $background_image['id'] ?? null;
        echo wp_get_attachment_image( $image_id, $size, false, array( 'class' => 'img-fill' ) );
    }?>
    <div class="grid-container position-relative">
        <div class="grid-x grid-padding-x">
            <?php if( !empty( $heading ) || !empty( $intro_text ) ):?>
                <div class="cell small-12 medium-10 large-8">
                    <?php if( !empty( $heading ) ):?>
                        <h2>
                            <?=esc_html( $heading );?>
                        </h2>
                    <?php endif;?>
                    <?php if( !empty( $intro_text ) ):?>
                        <p class="p-30">
                            <?=esc_html( $intro_text );?>
                        </p>
                    <?php endif;?>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>
<?php endif;?>