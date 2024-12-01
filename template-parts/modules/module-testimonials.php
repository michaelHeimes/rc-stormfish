<?php
if(!defined('ABSPATH')) {
    exit;
}
$remove_bottom_border = get_sub_field('remove_bottom_border') ?? null;
$heading = get_sub_field('heading') ?? null;
$testimonials = get_sub_field('testimonials') ?? null;
?>
<?php if( !empty( $heading ) || !empty( $testimonials ) ):?>
<section class="testimonials module has-animated-pipe position-relative bg-ultra-blue
<?php if( !$remove_bottom_border ) { echo ' bottom-border'; };?>
">
    <div class="grid-container position-relative">
        <div class="inner">
            <div class="grid-x grid-padding-x">
                <?php if( !empty( $heading ) ):?>
                    <div class="cell small-12">
                        <?php if( !empty( $heading ) ):?>
                            <h2 class="position-relative">
                                <?=esc_html( $heading );?>
                                <span class="pipe mobile hide-for-medium"><span></span></span>
                            </h2>
                        <?php endif;?>
                    </div>
                <?php endif;?>
                <?php if( !empty( $testimonials ) ):?>
                    <div class="cell small-12 medium-9 medium-offset-2 large-7 large-offset-3 position-relative">
                        <div class="pipe desktop show-for-medium"><span></span></div>
                        <div class="slider slider-testimonials overflow-hidden">
                            <div class="swiper-wrapper">
                                <?php foreach($testimonials as $testimonial):
                                    $quote = $testimonial['quote'] ?? null;
                                    $author_name = $testimonial['author_name'] ?? null;
                                    $author_title = $testimonial['author_title'] ?? null;
                                ?>
                                    <div class="swiper-slide">
                                        <?php if( !empty( $quote ) ):?>
                                            <div class="quote">
                                                <?=wp_kses_post( $quote);?>
                                            </div>
                                        <?php endif;?>
                                        <?php if( !empty( $author_name ) ):?>
                                            <div>
                                                <?=esc_html( $author_name );?>
                                                <?php if( !empty( $author_title ) ):?>
                                                    <span>, <b><i><?=esc_html( $author_title );?></i></b></span>
                                                <?php endif;?>
                                            </div>
                                        <?php endif;?>
                                    </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                    <?php if( count($testimonials) > 1 ):?>
                        <div class="swiper-nav cell small-12 large-2 grid-x align-bottom">
                            <div class="swiper-button-prev">
                                Prev
                            </div>
                            <div class="swiper-button-next">
                                Next
                            </div>
                        </div>
                    <?php endif;?>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>
<?php endif;?>