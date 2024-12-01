<?php
if(!defined('ABSPATH')) {
    exit;
}
$remove_bottom_border = get_sub_field('remove_bottom_border') ?? null;
$eyebrow_title = get_sub_field('eyebrow_title') ?? null;
$heading = get_sub_field('heading') ?? null;
$copy = get_sub_field('copy') ?? null;
?>
<?php if( !empty( $eyebrow_title ) || !empty( $heading ) || !empty( $copy ) ):?>
<section class="titles-left-copy-right parallax-section module position-relative position-relative bg-ultra-blue layout-<?php if( empty($eyebrow_title) ) { echo 'no-eyebrow has-bg'; };?>
<?php if( !$remove_bottom_border ) { echo ' bottom-border'; };?>    
">
    <?php if( empty($eyebrow_title) ):?>
        <div class="bg" style="background-image: url('<?=get_template_directory_uri(); ?>/assets/images/pixels-mask.png'); background-size: cover;"></div>
    <?php endif;?>
    <div class="grid-container position-relative">
        <div class="grid-x grid-padding-x">
            <?php if( !empty( $eyebrow_title ) || !empty( $heading ) ):?>
                <?php if( !empty( $eyebrow_title ) ):?>
                    <div class="cell small-12 parallax-2">
                        <div class="eyebrow grid-x align-middle">
                            <h2 class="h4 grid-x text-nowrap align-middle">
                                <?=esc_html(  $eyebrow_title );?>
                                <span></span>
                            </h2>
                        </div>
                    </div>
                <?php endif;?>
                <div class="cell small-12 medium-6 parallax-2">
                    <?php if( !empty( $heading ) ):?>
                        <h3 class="h2">
                            <?=esc_html( $heading );?>
                        </h3>
                    <?php endif;?>
                </div>
            <?php endif;?>
            <?php if( !empty( $copy) ):?>
                <div class="cell small-12 medium-6 parallax-1">
                    <div class="copy">
                        <?=wp_kses_post( $copy );?>
                    </div>            
                </div>
            <?php endif;?>      
        </div>
    </div>
</section>
<?php endif;?>