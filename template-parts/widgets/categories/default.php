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


$index = 0;

?>

<div 
  class="<?php echo esc_attr( $classes ); ?>"
  style="--ratio: <?php echo esc_attr( $ratio ); ?>;"
  data-selleradise-categories-page-size="<?php echo esc_attr( $page_size ); ?>"
  x-data="infiniteScroll({
    total: <?php echo esc_attr(empty($categories) ? 0 : count($categories)); ?>,
    pageSize: <?php echo esc_attr( $page_size ); ?>
  })"
 >

    <h2 class="text-4xl text-center mb-4 font-semibold">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/partials/title', null, ["settings" => $settings]); ?>
    </h2>

    <p class="text-lg text-center opacity-75">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/partials/subtitle', null, ["settings" => $settings]); ?>
    </p>

    <?php if(!empty($categories)): ?>
    
    <ul class="grid grid-cols-<?php echo esc_attr( $page_size ); ?>" >
      <?php foreach ($categories as $category): ?>
        <li 
          class="w-full"
          style="--selleradise-item-index: <?php echo esc_attr($index); ?>; --product-image-ratio: <?php echo esc_attr($ratio); ?>"
          x-show="visible > <?php echo esc_attr( $index ); ?>"
          x-transition>
          <a 
            class="w-full flex flex-col justify-center items-center" 
            href="<?php echo esc_url(get_term_link($category)); ?>">

            <div class="flex justify-center items-center overflow-hidden rounded-2xl h-ratio hover:children:scale-110">
              <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/partials/image', null, ["category" => $category]); ?>
            </div>

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
                selleradise_widgets_get_template_part('template-parts/widgets/categories/count', null, [
                    "category" => $category,
                    "prefix" => $prefix
                ]);
              ?>
            </div>
          </a>
        </li>

      <?php $index++; endforeach; ?>

      <li x-show="!exhausted()" class="w-full col-span-full flex justify-center items-center mt-10">
        <button x-on:click.prevent="more()" class="selleradise_button--secondary">
          <?php echo selleradise_widgets_svg('unicons-line/angle-down'); ?>
          <span class="ml-2"><?php _e( "Load More", "selleradise-widgets" ); ?></span>
        </button>
      </li>

      <li x-show="exhausted()" class="w-full col-span-full flex justify-center items-center mt-10">
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