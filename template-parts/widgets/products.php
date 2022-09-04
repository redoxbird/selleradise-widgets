<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if ($args) {
    extract($args);
}

?>

<div 
  class="px-page"
  <?php if (!selleradise_is_normal_mode()): ?>
    x-init="
      $dispatch('selleradise-widget-initialized', { 
        isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
        element: $el,
        widget: 'products',
        variation: 'default',
      })
    "
  <?php endif;?>
  data-selleradise-card-type="<?php echo esc_attr($settings['card_type'] ?: 'default') ?>">

  <div class="flex justify-between items-center mb-10">
    <div>
      <?php selleradise_widgets_get_template_part('template-parts/section-title', null, ["settings" => $settings]); ?>
    </div>

    <a 
      href="<?php echo esc_url($more_link); ?>" 
      class="selleradise_button--secondary selleradise_button--sm"
      aria-label="<?php echo sprintf(__('See all (%s)', 'selleradise-widgets'), esc_attr($settings['section_title'] ?: 'Products')); ?>">
      <?php _e('See all', 'selleradise-widgets'); ?> 
      <span class="w-3 ml-1">
        <?php echo selleradise_widgets_svg('tabler-icons/chevron-right'); ?>
      </span>
    </a>
  </div>

  <?php if(!empty($products)): ?>

    <ul class="list-none m-0 p-0 grid items-start gap-8 <?php echo function_exists("selleradise_products_classes") ? esc_attr(selleradise_products_classes($settings['card_type'], true)) : null ?>">
      <?php 
        foreach ($products as $key => $product) {
          get_template_part(
            'template-parts/product/card', 
            $settings['card_type'] ?: 'default', ['product' => $product]
          );
        }
      ?>
    </ul>

  <?php else: 
  
    selleradise_widgets_get_template_part('template-parts/empty-state', null, ["title" => __('No products found', 'selleradise-widgets')]); 

    endif; 
  ?>

</div>