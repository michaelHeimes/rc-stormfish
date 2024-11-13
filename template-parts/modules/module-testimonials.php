<?php
if(!defined('ABSPATH')) {
    exit;
}
$heading = get_sub_field('heading') ?? null;
$testimonials = get_sub_field('testimonials') ?? null;
?>
<?php if( !empty( $heading ) || !empty( $testimonials ) ):?>
<section class="testimonials module position-relative bg-ultra-blue">
    <div class="grid-container position-relative">
        <div class="grid-x grid-padding-x">
            <?php if( !empty( $heading ) ):?>
                <div class="cell small-12">
                    <?php if( !empty( $heading ) ):?>
                        <h2>
                            <?=esc_html( $heading );?>
                        </h2>
                    <?php endif;?>
                </div>
            <?php endif;?>
            <?php if( !empty( $testimonials ) ):?>
                <div class="cell small-12 medium-7 medium-offset-3">
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
                    <div class="cell medium-2 grid-x align-bottom align-center">
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
</section>
<?php endif;?>