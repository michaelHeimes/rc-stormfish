<?php
if(!defined('ABSPATH')) {
    exit;
}
$index = get_row_index();
$background_image = get_sub_field('background_image') ?? null;
$small_title = get_sub_field('small_title') ?? null;
$large_title = get_sub_field('large_title') ?? null;
?>
<?php if( !empty( $background_image ) || !empty( $small_title ) || !empty( $large_title ) ):?>
<section class="contact-hero module has-object-fit-img position-relative bg-ultra-blue bottom-border<?php if( $index == 1 ) { echo ' first-section'; };?>">
    <?php 
    if( $background_image ) {
        $size = 'full-width-hero';
        $image_id =  $background_image['id'] ?? null;
        echo wp_get_attachment_image( $image_id, $size, false, array( 'class' => 'img-fill' ) );
    }?>
    <div class="grid-container position-relative">
        <?php if( $index == 1 ):?>
            <div class="header-spacer"></div>
        <?php endif;?>
        <div class="grid-x grid-padding-x module-padding align-bottom">
            
            <?php if( !empty( $small_title ) || !empty( $large_title ) ):?>
                <div class="cell small-12 medium-10 large-8">
                    <?php if( !empty( $small_title ) ):?>
                        <div class="eyebrow grid-x align-middle">
                            <h1 class="h4 grid-x text-nowrap align-middle">
                                <?=esc_html( $small_title );?><span></span>
                            </h1>
                        </div>
                    <?php endif;?>
                    <?php if( !empty( $large_title ) ):?>
                        <h2 class="h1 display">
                            <?=esc_html( $large_title );?>
                        </h2>
                    <?php endif;?>
                </div>
            <?php endif;?>
        </div>
    </div>
</section>
<?php endif;?>