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

$description_length = [
    "cardImage" => 100,
    "cardSmall" => 50,
];

$page_size = isset($settings["page_size"]) && $settings["page_size"] ? $settings["page_size"] : 8;

?>


<div 
    class="selleradiseWidgets_Categories selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>" 
    style="--ratio: <?php echo (int) $settings['image_ratio_height'] / (int) $settings['image_ratio_width']; ?>"
    data-selleradise-categories-page-size="<?php echo $page_size; ?>">

    <?php if (isset($settings['title']) && $settings['title']): ?>
        <h2 class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__title">
            <?php echo $settings['title'] ?: esc_html__('Categories', 'selleradise'); ?>
        </h2>
    <?php endif;?>

    <ul class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__list">
        <?php foreach ($categories as $index => $category): 
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true); ?>

            <li 
                class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__item <?php echo $index >= $page_size ? 'selleradiseWidgets_Categories__item--hidden' : null; ?>" >
                <a href="<?php echo esc_url(get_term_link($category)); ?>">

                    <?php if ($hide_image): ?>
                        <div class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemImage">
                            <?php if($thumbnail_id): ?>
                                <img
                                    data-src="<?php echo esc_url(wp_get_attachment_url($thumbnail_id)); ?>"
                                    src="<?php echo selleradise_get_image_placeholder(); ?>"
                                    alt="<?php echo get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>"
                                />
                            <?php else: ?>
                                <img
                                    src="<?php echo selleradise_get_image_placeholder(); ?>"
                                    alt=""
                                />
                            <?php endif; ?>
                        </div>
                    <?php endif;?>

                    <div class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemContent">
                        <p class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemName"><?php echo esc_html($category->name); ?></p>

                        <?php if ((isset($category->description) && $category->description) && $show_description): ?>
                            <p class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemDescription">
                                <?php echo selleradise_truncate(esc_html($category->description), $description_length[$settings['card_type'] ?? 50]); ?>
                            </p>
                        <?php endif;?>

                    </div>
                </a>
            </li>

        <?php endforeach;?>

        <li class="selleradiseWidgets_Categories__loadMore">
            <button>
                <span><?php esc_attr_e( "Load More", "selleradise-widgets" ); ?></span>
                <?php echo selleradise_widgets_svg('material/plus'); ?>
            </button>
        </li>
    </ul>
</div>