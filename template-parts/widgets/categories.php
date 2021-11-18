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

function title($settings) 
{
    if(!isset($settings['section_title']) || !$settings['section_title']) {
        return;
    }

    $class = esc_attr( sprintf('selleradiseWidgets_Categories--%s__title', $settings['card_type']) );
    $title = esc_html( $settings['section_title'] );

    return "<h2 class='$class'>{$title}</h2>";
}

function subtitle($settings) 
{
    if(!isset($settings['section_subtitle']) || !$settings['section_subtitle']) {
        return;
    }

    $class = esc_attr( sprintf('selleradiseWidgets_Categories--%s__subtitle', $settings['card_type']) );

    return "<p class='$class'>{$settings['section_subtitle']}</p>";
}


function category_count($settings, $category) 
{
    if(!isset($settings['section_subtitle']) || !$settings['section_subtitle']) {
        return;
    }

    $class = esc_attr( sprintf('selleradiseWidgets_Categories--%s__item-count', $settings['card_type']) );
    $text = $category->count == 1 ? __('Product', 'selleradise') : __('Products', 'selleradise');

    return "<div class='$class'><span>$category->count</span><span>$text</span></div>";
}

function category_image($settings, $category, $page_size, $index)
{
    $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
    $thumbnail = wp_get_attachment_image_src($thumbnail_id, 'large');
    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    $class = esc_attr( sprintf('selleradiseWidgets_Categories--%s__itemImage', $settings['card_type']) );
    $placeholder = wc_placeholder_img_src();
    $src = $thumbnail_id ? $thumbnail[0] : wc_placeholder_img_src();

    if($index <= $page_size) {
        return "<div class='$class'><img src='$placeholder' data-src='$src' alt='$alt' /></div>";
    }

    
    return "<div class='$class'><img src='$src' alt='$alt' /></div>";
}

function category_name($settings, $duplicate_names, $category) 
{
    $class = esc_attr( sprintf('selleradiseWidgets_Categories--%s__itemName', $settings['card_type']) );

    if(in_array($category->name, $duplicate_names) && $category->parent) {
        $parent = get_term($category->parent, $category->taxonomy);
        return "<h3 class='$class'>$category->name <span>($parent->name)</span></h3>";
    } else {
        return "<h3 class='$class'>$category->name</h3>";
    }
}

$hide_image = !in_array($settings['card_type'], ['onlyText']);
$page_size = isset($settings["page_size"]) && $settings["page_size"] ? $settings["page_size"] : 8;
$ratio = 1;

if (isset($settings['image_ratio_height']) && $settings['image_ratio_width']) {
    $ratio = $settings['image_ratio_height'] / (int) $settings['image_ratio_width'];
}

$classes = 'selleradiseWidgets_Categories';
$classes .= sprintf(' selleradiseWidgets_Categories--%s', $settings['card_type']);

if (selleradise_is_normal_mode()) {
    $classes .= ' selleradise_scroll_animate';
}

$names = array_column($categories, "name");
$duplicate_names = array_unique(array_diff_assoc($names, array_unique($names)));

?>


<div 
    class="<?php echo esc_attr( $classes ); ?>"
    style="--ratio: <?php echo esc_attr( $ratio ); ?>;"
    data-selleradise-categories-page-size="<?php echo esc_attr( $page_size ); ?>">

    <?php echo title($settings); ?>

    <?php echo subtitle($settings); ?>

    <?php if(!empty($categories)): ?>
    
    <ul class="<?php echo esc_attr( sprintf('selleradiseWidgets_Categories--%s__list', $settings['card_type']) ); ?>">
        <?php foreach ($categories as $index => $category): ?>
            <li 
                class="selleradiseWidgets_Categories__item <?php echo esc_attr( sprintf('selleradiseWidgets_Categories--%s__item', $settings['card_type']) ); ?>"
                data-selleradise-status="<?php echo esc_attr( $index < $page_size ? 'initial' : 'hidden' ); ?>"
                style="--selleradise-item-index: <?php echo esc_attr($index); ?>">
                <a 
                    class="<?php echo esc_attr( sprintf('selleradiseWidgets_Categories--%s__item-inner', $settings['card_type']) ); ?>" 
                    href="<?php echo esc_url(get_term_link($category)); ?>">

                    <?php 
                        if(in_array($settings['card_type'], ['rounded', 'onlyText'])):
                            echo category_count($settings, $category);
                        endif;
                    ?>
                    
                    <?php echo category_image($settings, $category, $page_size, $index); ?>

                    <div class="<?php echo esc_attr( sprintf('selleradiseWidgets_Categories--%s__itemContent', $settings['card_type']) ); ?>">
                        <?php echo category_name($settings, $duplicate_names, $category); ?>
                    
                        <?php if($category->description): ?>
                            <p class="<?php echo esc_attr( sprintf('selleradiseWidgets_Categories--%s__itemDescription', $settings['card_type']) ); ?>">
                                <?php echo selleradise_truncate(esc_html($category->description), 50); ?>
                            </p>
                        <?php endif; ?>

                        <?php 
                            if(in_array($settings['card_type'], ['default'])):
                               echo category_count($settings, $category);
                            endif;
                        ?>
                    </div>
                </a>
            </li>

        <?php endforeach;?>

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
            selleradise_widgets_get_template_part('template-parts/empty-state', null, ["title" => __('Could not find any category', 'selleradise-widgets')]); 
        endif; 
    ?>
</div>