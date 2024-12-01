<?php
if(!defined('ABSPATH')) {
    exit;
}
$remove_bottom_border = get_sub_field('remove_bottom_border') ?? null;
$heading = get_sub_field('heading') ?? null;
$logos = get_sub_field('logos') ?? null;
?>
<?php if( !empty( $heading ) || !empty( $logos) ):?>
<section class="logos module position-relative bg-ultra-blue
<?php if( !$remove_bottom_border ) { echo ' bottom-border'; };?>
">
    <div class="grid-container position-relative">
        <div class="grid-x grid-padding-x align-middle">
            <?php if( !empty( $heading ) || !empty( $logos ) ):?>
                <?php if( !empty( $heading ) ):?>
                    <div class="cell shrink">
                        <h2>
                            <?=esc_html( $heading );?>
                        </h2>
                    </div>
                <?php endif;?>
                <?php 
                $images = $logos;
                $size = 'full';
                if( $images ): ?>
                    <?php foreach( $images as $image ): ?>
                        <div class="cell shrink">
                            <div class="logo-wrap">
                                <?php echo wp_get_attachment_image( $image['id'], $size ); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif;?>
        </div>
    </div>
</section>
<?php endif;?>