<?php
if(!defined('ABSPATH')) {
    exit;
}
$remove_bottom_border = get_sub_field('remove_bottom_border') ?? null;
$layout = get_sub_field('layout') ?? null;
$eyebrow_title = get_sub_field('eyebrow_title') ?? null;
$heading = get_sub_field('heading') ?? null;
$description_text = get_sub_field('description_text') ?? null;
$subheading = get_sub_field('subheading') ?? null;
$button_link = get_sub_field('button_link') ?? null;
$image = get_sub_field('image') ?? null;
?>
<?php if( !empty( $eyebrow_title ) || !empty( $heading ) || !empty( $description_text ) || !empty( $subheading ) || !empty( $button_link ) || !empty( $image ) ):?>
<section class="overlapping-text-image parallax-section overflow-hidden module module-padding border-bottom position-relative bg-ultra-blue position-relative module-padding layout-<?=esc_attr( $layout );?>
    <?php if( !$remove_bottom_border ) { echo ' bottom-border'; };?>
    
">
    <?php $index = get_row_index(); if( $index == 1 ):?>
        <div class="header-spacer"></div>
    <?php endif;?>    <div class="position-relative img-stop">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <?php if( !empty( $eyebrow_title ) || !empty( $heading ) || !empty( $description_text ) || !empty( $subheading ) || !empty( $button_link ) ):?>
                    <div class="overlap cell small-12 medium-9 large-6 xlarge-5 position-relative parallax-1">
                        <?php if( !empty( $eyebrow_title ) ):?>
                            <div class="eyebrow grid-x align-middle">
                                <h2 class="h4 grid-x text-nowrap align-middle">
                                    <?=esc_html(  $eyebrow_title );?>
                                    <span></span>
                                </h2>
                            </div>
                        <?php endif;?>
                        <div class="fade-in-left">
                            <?php if( !empty( $heading ) ):?>
                                <h3 class="<?php if( $layout == 'large-heading' ) { echo 'h1'; } else { echo 'h2'; };?>">
                                    <?=esc_html( $heading );?>
                                </h3>
                            <?php endif;?>
                            <?php if( !empty( $subheading ) && $layout !== 'large-heading' ):?>
                                <h4 class="h3">
                                    <b><?=esc_html( $subheading );?></b>
                                </h4>
                            <?php endif;?>    
                            <?php if( !empty( $description_text ) && $layout !== 'large-heading' && $layout !== 'heading-subheading' ):?>
                                <div class="description-text">
                                    <?=wp_kses_post( $description_text );?>
                                </div>
                            <?php endif;?>
                            <?php 
                            $link = $button_link;
                            if( $link && $layout !== 'large-heading' ): 
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <div class="btn-wrap">
                                    <a class="button no-margin" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                                        <span><?php echo esc_html( $link_title ); ?></span>
                                        <svg width="11" height="11" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M.9 0v1.527h7.493L0 9.92 1.08 11l8.393-8.393v7.492H11V0H.9Z" fill="#FF8E2E"/></svg>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif;?>
                
                <?php 
                if( $image ) :
                    $size = 'overlapping-text-image';
                    $image_id =  $image['id'] ?? null;?>
                    <div class="img-wrap position-relative cell small-12 medium-10 large-6 xlarge-7 parallax-2">
                        <div class="img-wrap-inner">
                        <?=wp_get_attachment_image( $image_id, $size, false, array( 'class' => '' ) );?>
                        </div>
                    </div>
                <?php endif;?>
                
            </div>
        </div>
    </div>
</section>
<?php endif;?>
