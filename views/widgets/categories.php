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



?>


<div 
    class="selleradiseWidgets_Categories <?php echo sprintf('selleradiseWidgets_Categories--%s', $settings['card_type']); ?>"
    style="--ratio: <?php echo (int) $settings['image_ratio_height'] / (int) $settings['image_ratio_width']; ?>"
    data-selleradise-categories-page-size="<?php echo $page_size; ?>">

    <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
        <p class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
    <?php endif;?>

    <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
        <h2 class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__title"><?php echo esc_html($settings['section_title']); ?></h2>
    <?php endif;?>
    
    <ul class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__list">
        <?php foreach ($categories as $index => $category): 
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true); ?>

            <li 
                class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__item <?php echo $index >= $page_size ? 'selleradiseWidgets_Categories__item--hidden' : null; ?>" >
                <a class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__item-inner" href="<?php echo esc_url(get_term_link($category)); ?>">

                    <div class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__item-count">
                        <span><?php echo $category->count; ?></span>
                        <span><?php _e('Products', 'selleradise'); ?></span>
                    </div>

                    <div class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemImage">
                        <?php if($thumbnail_id): ?>
                            <img
                                src="<?php echo $thumbnail_id ? esc_url(wp_get_attachment_url($thumbnail_id)) : selleradise_get_image_placeholder(); ?>"
                                alt="<?php echo get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>"
                            />
                        <?php else: ?>
                            <img
                                src="<?php echo selleradise_get_image_placeholder(); ?>"
                                alt=""
                            />
                        <?php endif; ?>
                    </div>

                    <div class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemContent">
                        <h3 class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemName"><?php echo esc_html($category->name); ?></h3>

                        <p class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemDescription">
                            <?php echo selleradise_truncate(esc_html($category->description), 50); ?>
                        </p>
                    </div>
                </a>
            </li>

        <?php endforeach;?>

        <li class="selleradiseWidgets_Categories__loadMore">
            <button aria-label="<?php esc_attr_e( "Load More", "selleradise-widgets" ); ?>">
                <?php echo selleradise_widgets_svg('material/chevron-down'); ?>
                <span><?php esc_attr_e( "Load More", "selleradise-widgets" ); ?></span>
            </button>
        </li>
    </ul>
</div>