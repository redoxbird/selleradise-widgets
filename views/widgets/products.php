<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if ($args) {
    extract($args);
}

?>

<div class="sectionProducts cardType--<?php echo esc_attr($fields['card_type'] ?: 'default') ?>">

  <div class="sectionHead--default">
      <h3 class="title"><?php esc_html_e($fields['name'] ?: 'Products');?></h3>
  </div>

  <div class="products">
    <ul class="swiper-wrapper">
      <?php 
        foreach ($products as $key => $product) {
            do_action('woocommerce_shop_loop');

            selleradise_locate_template('views/components/product/card', $fields['card_type'] ?: 'default', ['product' => $product, 'classes' => 'swiper-slide']);
        }
      ?>

      <li class="swiper-slide card--viewAll">
        <a href="<?php echo esc_url($more_link); ?>"> <?php esc_html_e( 'View All', "selleradise" ) ?> </a>
      </li>
    </ul>
  </div>

</div>