<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if ($args) {
    extract($args);
}

?>

<div 
  class="selleradiseWidgets_Products"
  data-selleradise-card-type="<?php echo esc_attr($settings['card_type'] ?: 'default') ?>">

  <div class="selleradiseWidgets_Products__head">
    <div>
      <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
        <h2 class="selleradiseWidgets_Products__title"><?php echo esc_html($settings['section_title']); ?></h2>
      <?php endif;?>

      <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
        <p class="selleradiseWidgets_Products__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
      <?php endif;?>
    </div>

    <div class="selleradiseWidgets_Products__slider-buttons">
      <button class="selleradiseWidgets_Products__slider-button selleradiseWidgets_Products__slider-button--left">
        <?php echo selleradise_widgets_svg('hero/arrow-narrow-left'); ?>
      </button>

      <button class="selleradiseWidgets_Products__slider-button selleradiseWidgets_Products__slider-button--right">
        <?php echo selleradise_widgets_svg('hero/arrow-narrow-right'); ?>
      </button>
    </div>

  </div>


  <div class="selleradiseWidgets_Products__slider" >
    <ul class="swiper-wrapper">
      <?php 
        foreach ($products as $key => $product) {
          selleradise_widgets_get_template_part(
            'views/components/product/card', 
            $settings['card_type'] ?: 'default', ['product' => $product, 'classes' => 'swiper-slide']
          );
        }
      ?>
    </ul>
  </div>

  <a href="<?php echo esc_url($more_link); ?>" class="selleradiseWidgets_Products__moreLink">See More <?php echo Selleradise_Widgets_svg('material/chevron-right'); ?></a>

</div>