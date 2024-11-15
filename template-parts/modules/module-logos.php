<?php
if(!defined('ABSPATH')) {
    exit;
}
$heading = get_sub_field('heading') ?? null;
$logos = get_sub_field('logos') ?? null;
?>
<?php if( !empty( $heading ) || !empty( $logos) ):?>
<section class="logos module position-relative bg-ultra-blue">
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
                            <?php echo wp_get_attachment_image( $image['id'], $size ); ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endif;?>
        </div>
    </div>
</section>
<?php endif;?>