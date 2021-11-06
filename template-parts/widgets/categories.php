<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if ($args) {
    extract($args);
}

if (!$settings) {
    return;
}

$show_description = in_array($settings['card_type'], ['cardImage', 'cardSmall']);
$hide_image = !in_array($settings['card_type'], ['onlyText']);
$page_size = isset($settings["page_size"]) && $settings["page_size"] ? $settings["page_size"] : 8;
$ratio = 1;

if(isset($settings['image_ratio_height']) && $settings['image_ratio_width']) {
    $ratio = $settings['image_ratio_height'] / (int) $settings['image_ratio_width'];
}

$classes = 'selleradiseWidgets_Categories';
$classes .= sprintf(' selleradiseWidgets_Categories--%s', $settings['card_type']);

if(selleradise_is_normal_mode()) {
  $classes .= ' selleradise_scroll_animate';
}

?>


<div 
    class="<?php echo esc_attr( $classes ); ?>"
    style="--ratio: <?php echo esc_attr( $ratio ); ?>; --chunk-size: <?php echo esc_attr( $settings["page_size"] ); ?>"
    data-selleradise-categories-page-size="<?php echo $page_size; ?>">

    <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
        <h2 class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__title"><?php echo esc_html($settings['section_title']); ?></h2>
    <?php endif;?>

    <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
        <p class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
    <?php endif;?>
    
    <ul class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__list">
        <?php foreach ($categories as $index => $category): 
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true); 
            $thumbnail = wp_get_attachment_image_src($thumbnail_id, 'medium');
            $image_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            ?>

            <li 
                class="selleradiseWidgets_Categories__item selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__item"
                data-selleradise-status="<?php echo $index >= $page_size ? 'hidden' : 'initial'; ?>"
                style="--selleradise-item-index: <?php echo esc_attr($index); ?>">
                <a class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__item-inner" href="<?php echo esc_url(get_term_link($category)); ?>">

                    <?php if(in_array($settings['card_type'], ['rounded', 'onlyText'])): ?>
                        <div class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__item-count">
                            <span><?php echo $category->count; ?></span>
                            <span><?php _e('Products', 'selleradise'); ?></span>
                        </div>
                    <?php endif; ?>

                    <div class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemImage">
                        <img
                            src="<?php echo esc_url($thumbnail_id ? $thumbnail[0] : selleradise_get_image_placeholder()); ?>"
                            alt="<?php echo get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>"
                        />
                    </div>

                    <div class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemContent">
                        <h3 class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemName"><?php echo esc_html($category->name); ?></h3>

                        <?php if($category->description): ?>
                            <p class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemDescription">
                                <?php echo selleradise_truncate(esc_html($category->description), 50); ?>
                            </p>
                        <?php endif; ?>

                        <?php if (in_array($settings['card_type'], ['default'])): ?>
                            <div class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__item-count">
                                <span><?php echo $category->count; ?></span>
                                <span><?php _e('Products', 'selleradise');?></span>
                            </div>
                        <?php endif;?>
                    </div>
                </a>
            </li>

        <?php endforeach;?>

        <li class="selleradiseWidgets_Categories__loadMore">
            <button class="selleradise_button--secondary" aria-label="<?php esc_attr_e( "Load More", "selleradise-widgets" ); ?>">
                <?php echo selleradise_widgets_svg('unicons-line/angle-down'); ?>
                <span><?php esc_attr_e( "Load More", "selleradise-widgets" ); ?></span>
            </button>
        </li>
    </ul>
</div>