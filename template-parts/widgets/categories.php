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

$index = 0;

?>

<div 
  class="my-20 px-page"
  style="--ratio: <?php echo esc_attr( $ratio ); ?>;"
  data-selleradise-categories-page-size="<?php echo esc_attr( $page_size ); ?>"
  x-data="infiniteScroll({
    total: <?php echo esc_attr(empty($categories) ? 0 : count($categories)); ?>,
    pageSize: <?php echo esc_attr( $page_size ); ?>
  })"
  x-init="
    $dispatch('selleradise-widget-initialized', { 
      isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
      element: $el
    })
  "
 >

  <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/partials/title', null, ["settings" => $settings]); ?>
  <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/partials/subtitle', null, ["settings" => $settings]); ?>

  <?php if(!empty($categories)): ?>
  
    <ul class="grid grid-cols-<?php echo esc_attr( round($page_size / 3) ); ?> md:grid-cols-<?php echo esc_attr( round($page_size / 2) ); ?> lg:grid-cols-<?php echo esc_attr( $page_size ); ?> gap-8 mt-8">
      <?php foreach ($categories as $category): ?>
        <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/card', $settings['card_type'], ["settings" => $settings, "category" => $category, "index" => $index, "duplicate_names" => $duplicate_names, "ratio" => $ratio]); ?>
      <?php $index++; endforeach; ?>

      <li x-show="!exhausted()" class="w-full col-span-full flex justify-center items-center mt-10">
        <button x-on:click.prevent="more()" class="selleradise_button--secondary selleradise_button--sm">
          <span class="mr-1"><?php esc_html_e( "Load More", "selleradise-widgets" ); ?></span>
          <span class="w-4 h-4 flex justify-center items-center"><?php echo selleradise_widgets_svg('tabler-icons/chevron-down'); ?></span>
        </button>
      </li>

      <li x-show="exhausted()" class="w-full col-span-full flex justify-center items-center mt-10">
        <a href="<?php echo esc_url( wc_get_page_permalink('shop') ); ?>" class="selleradise_button--secondary selleradise_button--sm">
          <span><?php esc_html_e( "Go to shop", "selleradise-widgets" ); ?></span>
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