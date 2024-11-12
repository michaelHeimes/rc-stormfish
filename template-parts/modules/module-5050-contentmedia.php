<?php
if(!defined('ABSPATH')) {
    exit;
}
$reverse_columns_for_mobile = get_sub_field('reverse_columns_for_mobile') ?? null;
$left_half = get_sub_field('left_half') ?? null;
$right_half = get_sub_field('right_half') ?? null;
?>
<section class="content-50-50 has-object-fit-img">
    <div class="grid-container position-relative">
        <div class="grid-x grid-padding-x<?php if( $reverse_columns_for_mobile == true ) { echo ' flex-dir-column-reverse tablet-flex-dir-row'; };?>">
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
