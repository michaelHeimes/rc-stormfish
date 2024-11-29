<?php
if(!defined('ABSPATH')) {
    exit;
}
$row_index = $args['row_index'];
$heading = get_field('services_heading', 'option') ?? null;
$text = get_field('services_text', 'option') ?? null;
$tabs = get_field('services_tabs', 'option') ?? null;
?>
<?php if( !empty( $heading ) || !empty( $text ) || !empty( $tabs ) ):?>
<section class="services module position-relative bg-ultra-blue">
    <div class="grid-container">
        <?php if( !empty( $heading ) || !empty( $text ) ):?>
            <div class="header grid-x grid-padding-x">
                <?php if( !empty( $heading ) || !empty( $text ) ):?>
                    <div class="cell small-12 medium-10 large-8">
                        <?php if( !empty( $heading ) ):?>
                            <h2>
                                <?=esc_html( $heading );?>
                            </h2>
                        <?php endif;?>
                        <?php if( !empty( $text ) ):?>
                            <div>
                                <?=wp_kses_post( $text );?>
                            </div>
                        <?php endif;?>
                    </div>
                <?php endif;?>
            </div>
        <?php endif;?>
        <?php if( !empty( $tabs ) ):?>
            <div class="tabs-wrap grid-x grid-padding-x">
                <div class="cell small-12 large-4">
                    <ul class="tabs" data-responsive-accordion-tabs="tabs small-accordion large-tabs" id="module-<?=$row_index;?>-tabs">
    
                        <?php $i = 1; foreach($tabs as $tab):
                            $title = $tab['title'] ?? null;
                        ?>
                            <li class="tabs-title<?php if( $i == 1 ) { echo ' is-active';}?>" data-accordion-item>
                                <?php if( !empty( $title ) ):?>
                                    <a href="#<?=sanitize_title($title);?>" class="h3">
                                        <svg width="0" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="m.5 18 15-9-15-9v7l3.41 2L.5 11.026V18Z" fill="#FF8E2E"/></svg>
                                        <?=esc_html( $title  );?>
                                    </a>
                                <?php endif;?>
                            </li>
                        <?php $i++; endforeach;?>
                    </ul>
                </div>
                <div class="cell small-12 large-8">
                    <div class="tabs-content" data-tabs-content="module-<?=$row_index;?>-tabs">
                        <?php $i = 1; foreach($tabs as $tab):
                            $title = $tab['title'] ?? null;
                            $image = $tab['image'] ?? null;
                            $text = $tab['text'] ?? null;
                        ?>
                            <div id="<?=sanitize_title($title);?>" class="tabs-panel<?php if( $i == 1 ) { echo ' is-active';}?>">
                                <div class="grid-x grid-padding-x">
                                    <div class="cell small-12 medium-6">
                                        <?php 
                                        $size = 'full';
                                        if( $image ) :?>
                                            <div class="cell small-12 medium-4">
                                                <?=wp_get_attachment_image( $image['id'], $size );?>
                                            </div>
                                        <?php endif;?>
                                    </div>
                                    <?php if( !empty( $heading ) || !empty( $text ) ):?>
                                        <div class="text cell small-12 medium-6">
                                            <?php if( !empty( $heading ) ):?>
                                                <h3><?=esc_html( $heading );?></h3>
                                            <?php endif;?>
                                            <?php if( !empty( $text ) ):?>
                                                <div><?=wp_kses_post( $text );?></div>
                                            <?php endif;?>
                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        <?php $i++; endforeach;?>   
                    </div>
                </div>
            </div>
        <?php endif;?>
    </div>
</section>
<?php endif;?>