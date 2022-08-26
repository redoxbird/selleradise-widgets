<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if ($args) {
    extract($args);
}

?>

<div 
  class="px-page py-20"
  data-selleradise-card-type="<?php echo esc_attr($settings['card_type'] ?: 'default') ?>">

  <div class="flex justify-between items-center mb-10">
    <div>
      <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
        <h2 class="text-3xl"><?php echo esc_html($settings['section_title']); ?></h2>
      <?php endif;?>

      <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
        <p class=""><?php echo esc_html($settings['section_subtitle']); ?></p>
      <?php endif;?>
    </div>

    <a 
      href="<?php echo esc_url($more_link); ?>" 
      class="mt-8 selleradise_button--secondary"
      aria-label="<?php echo sprintf(__('See all (%s)', 'selleradise-widgets'), esc_attr($settings['section_title'] ?: 'Products')); ?>">
      <?php _e('See all', 'selleradise-widgets'); ?> 
      <?php echo Selleradise_Widgets_svg('unicons-line/angle-right'); ?>
    </a>
  </div>

  <?php if(!empty($products)): ?>

    <ul class="grid lg:grid-cols-4 gap-8">
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