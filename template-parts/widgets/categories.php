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

$hide_image = !in_array($settings['card_type'], ['onlyText']);
$page_size = isset($settings["page_size"]) && $settings["page_size"] ? $settings["page_size"] : 8;
$ratio = 1;

if (isset($settings['image_ratio_height']) && $settings['image_ratio_width']) {
    $ratio = $settings['image_ratio_height'] / (int) $settings['image_ratio_width'];
}

$names = array_column($categories, "name");
$duplicate_names = array_unique(array_diff_assoc($names, array_unique($names)));

$prefix = sprintf('selleradiseWidgets_Categories--%s', $settings['card_type']);
$classes = 'selleradiseWidgets_Categories';
$classes .= sprintf(' %s', $prefix);

if (selleradise_is_normal_mode()) {
    $classes .= ' selleradise_scroll_animate';
}

$index = 0;

?>

<div 
    class="<?php echo esc_attr( $classes ); ?>"
    style="--ratio: <?php echo esc_attr( $ratio ); ?>;"
    data-selleradise-categories-page-size="<?php echo esc_attr( $page_size ); ?>">

    <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/title', null, [
        "settings" => $settings, 
        "prefix" => $prefix
    ]); ?>

    <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/subtitle', null, [
        "settings" => $settings, 
        "prefix" => $prefix
    ]); ?>

    <?php if(!empty($categories)): ?>
    
    <ul class="<?php echo esc_attr($prefix); ?>__list">
        <?php foreach ($categories as $category): ?>
            <li 
                class="selleradiseWidgets_Categories__item <?php echo esc_attr($prefix); ?>__item"
                data-selleradise-status="<?php echo esc_attr( (int) $index < $page_size ? 'initial' : 'hidden' ); ?>"
                style="--selleradise-item-index: <?php echo esc_attr($index); ?>">
                <a 
                    class="<?php echo esc_attr($prefix); ?>__item-inner" 
                    href="<?php echo esc_url(get_term_link($category)); ?>">

                    <?php 
                        if(in_array($settings['card_type'], ['rounded', 'onlyText'])):
                            selleradise_widgets_get_template_part('template-parts/widgets/categories/count', null, [
                                "category" => $category,
                                "prefix" => $prefix
                            ]);
                        endif;
                    ?>
                    
                    <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/image', null, [
                        "category" => $category,
                        "prefix" => $prefix,
                        "index" => $index,
                        "page_size" => $page_size,
                    ]); ?>

                    <div class="<?php echo esc_attr($prefix); ?>__itemContent">
                        <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/name', null, [
                            "category" => $category,
                            "prefix" => $prefix,
                            "duplicate_names" => $duplicate_names,
                        ]); ?>
                    
                        <?php if($category->description): ?>
                            <p class="<?php echo esc_attr( $prefix ); ?>__itemDescription">
                                <?php echo selleradise_truncate(esc_html($category->description), 50); ?>
                            </p>
                        <?php endif; ?>

                        <?php 
                            if(in_array($settings['card_type'], ['default'])):
                                selleradise_widgets_get_template_part('template-parts/widgets/categories/count', null, [
                                    "category" => $category,
                                    "prefix" => $prefix
                                ]);
                            endif;
                        ?>
                    </div>
                </a>
            </li>

        <?php $index++; endforeach; ?>

        <li class="selleradiseWidgets_Categories__loadMore">
            <button class="selleradise_button--secondary">
                <?php echo selleradise_widgets_svg('unicons-line/angle-down'); ?>
                <span><?php _e( "Load More", "selleradise-widgets" ); ?></span>
            </button>
        </li>

        <li class="selleradiseWidgets_Categories__toShop hidden">
            <a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>" class="selleradise_button--secondary">
                <span><?php _e( "Go to shop", "selleradise-widgets" ); ?></span>
            </a>
        </li>
    </ul>
    
    <?php 
        else: 
            selleradise_widgets_get_template_part('template-parts/empty-state', null, [
                "title" => __('Could not find any category', 'selleradise-widgets')
            ]); 
        endif; 
    ?>
</div>