<?php
if(!defined('ABSPATH')) {
    exit;
}
$eyebrow_title = get_sub_field('eyebrow_title') ?? null;
$heading = get_sub_field('heading') ?? null;
$copy = get_sub_field('copy') ?? null;
?>
<?php if( !empty( $eyebrow_title ) || !empty( $heading ) || !empty( $copy ) ):?>
<section class="overlapping-text-image module position-relative position-relative bg-ultra-blue layout-<?php if( empty($eyebrow_title) ) { echo 'no-eyebrow has-bg'; };?>">
    <?php if( empty($eyebrow_title) ):?>
        <div class="bg" style="background-image: url('<?=get_template_directory_uri(); ?>/assets/images/pixels-mask.png'); background-size: cover;"></div>
    <?php endif;?>
    <div class="grid-container position-relative">
        <div class="grid-x grid-padding-x">
            <?php if( !empty( $eyebrow_title ) || !empty( $heading ) ):?>
                <div class="cell small-12 medium-6">
                    <?php if( !empty( $eyebrow_title ) ):?>
                        <div class="eyebrow grid-x align-middle">
                            <h2 class="h4">
                                <?=esc_html(  $eyebrow_title );?>
                            </h2>
                        </div>
                    <?php endif;?>
                    <?php if( !empty( $heading ) ):?>
                        <h3 class="h2">
                            <?=esc_html( $heading );?>
                        </h3>
                    <?php endif;?>
                </div>
            <?php endif;?>
            <?php if( !empty( $copy) ):?>
                <div class="cell small-12 medium-6">
                    <div class="copy">
                        <?=wp_kses_post( $copy );?>
                    </div>            
                </div>
            <?php endif;?>      
        </div>
    </div>
</section>
<?php endif;?>