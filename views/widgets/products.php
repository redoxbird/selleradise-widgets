<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if ($args) {
    extract($args);
}

?>

<div class="selleradiseWidgets_Products cardType--<?php echo esc_attr($settings['card_type'] ?: 'default') ?>">

 <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
    <p class="selleradiseWidgets_Products__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
  <?php endif;?>

  <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
    <h2 class="selleradiseWidgets_Products__title"><?php echo esc_html($settings['section_title']); ?></h2>
  <?php endif;?>

  <div class="selleradiseWidgets_Products__products">
    <ul class="swiper-wrapper">
      <?php 
        foreach ($products as $key => $product) {
            do_action('woocommerce_shop_loop');

            selleradise_widgets_get_template_part('views/components/product/card', $settings['card_type'] ?: 'default', ['product' => $product, 'classes' => 'swiper-slide']);
        }
      ?>

      <li class="swiper-slide card--viewAll">
        <a href="<?php echo esc_url($more_link); ?>"> <?php esc_html_e( 'View All', "selleradise" ) ?> </a>
      </li>
    </ul>
  </div>

</div>