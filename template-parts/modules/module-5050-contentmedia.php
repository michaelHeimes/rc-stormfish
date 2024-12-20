<?php
if(!defined('ABSPATH')) {
    exit;
}
$remove_bottom_border = get_sub_field('remove_bottom_border') ?? null;
$reverse_columns_for_mobile = get_sub_field('reverse_columns_for_mobile') ?? null;
$left_half = get_sub_field('left_half') ?? null;
$right_half = get_sub_field('right_half') ?? null;
?>
<section class="content-50-50 module parallax-section has-object-fit-img position-relative bg-ultra-blue
<?php if( !$remove_bottom_border ) { echo ' bottom-border'; };?>
">
    <?php $index = get_row_index(); if( $index == 1 ):?>
        <div class="header-spacer"></div>
    <?php endif;?>
    <div class="grid-container position-relative">
        <div class="grid-x grid-padding-x align-justify<?php if( $reverse_columns_for_mobile == true ) { echo ' flex-dir-column-reverse tablet-flex-dir-row'; };?>">
            <?php if( !empty( $left_half ) ) {
                get_template_part('template-parts/part', '50-50-half',
                    array(
                        'half' => $left_half,
                    ),
                );
                
            };?>
            <?php if( !empty( $right_half ) ) {
                get_template_part('template-parts/part', '50-50-half',
                    array(
                        'half' => $right_half,
                    ),
                );
                
            };?>
        </div>
    </div>
</section>
