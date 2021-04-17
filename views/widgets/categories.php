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

$terms = get_terms('product_cat', array(
    'hide_empty' => true,
    'orderby' => 'count',
    'order' => 'DESC',
    'number' => isset($settings['limit']) && $settings['limit'] ? $settings['limit'] : 14,
));

if (!$terms) {
    return;
}

$product_categories = [];

foreach ($terms as $term) {

    $product_categories[] = (object) [
        'term_id' => $term->term_id,
        'slug' => $term->slug,
        'name' => $term->name,
        'image_url' => wp_get_attachment_url(get_term_meta($term->term_id, 'thumbnail_id', true)),
        'url' => get_term_link($term),
        'description' => $term->description,
        'parent' => $term->parent,
    ];
}

$show_description = in_array($settings['card_type'], ['cardImage', 'cardSmall']);
$hide_image = !in_array($settings['card_type'], ['onlyText']);

$description_length = [
    "cardImage" => 100,
    "cardSmall" => 50,
]

?>


<div class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>">

    <?php if (isset($settings['title']) && $settings['title']): ?>
        <h2 class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__title">
            <?php echo $settings['title'] ?: esc_html__('Categories', 'selleradise'); ?>
        </h2>
    <?php endif;?>

    <ul class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__list">
        <?php foreach($product_categories as $category): ?>

            <li class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__item">
                <a href="<?php echo esc_url( $category->url ); ?>">

                    <?php if($hide_image): ?>
                        <div class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemImage">
                            <img
                                data-src="<?php echo $category->image_url ? esc_url( $category->image_url ) : selleradise_get_image_placeholder(); ?>"
                                src="__blank"
                                alt=""
                            />
                        </div>
                    <?php endif; ?>

                    <div class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemContent">
                        <p class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemName"><?php echo esc_html( $category->name ); ?></p>
                        
                        <?php if((isset($category->description) && $category->description) && $show_description): ?>
                            <p class="selleradiseWidgets_Categories--<?php echo $settings['card_type']; ?>__itemDescription">
                                <?php echo selleradise_truncate(esc_html( $category->description ), $description_length[$settings['card_type'] ?? 50]); ?>
                            </p>
                        <?php endif; ?>

                    </div>
                </a>
            </li>

        <?php endforeach; ?>
    </ul>
</div>