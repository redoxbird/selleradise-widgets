<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if ($args) {
    extract($args);
}

?>

<div class="selleradiseWidgets_Products cardType--<?php echo esc_attr($fields['card_type'] ?: 'default') ?>">

  <h2 class="selleradiseWidgets_Products__title"><?php esc_html_e($fields['name'] ?: __('Products', 'selleradise-widgets'));?></h2>

  <div class="selleradiseWidgets_Products__products">
    <ul class="swiper-wrapper">
      <?php 
        foreach ($products as $key => $product) {
            do_action('woocommerce_shop_loop');

            selleradise_widgets_get_template_part('views/components/product/card', $fields['card_type'] ?: 'default', ['product' => $product, 'classes' => 'swiper-slide']);
        }
      ?>

      <li class="swiper-slide card--viewAll">
        <a href="<?php echo esc_url($more_link); ?>"> <?php esc_html_e( 'View All', "selleradise" ) ?> </a>
      </li>
    </ul>
  </div>

</div>