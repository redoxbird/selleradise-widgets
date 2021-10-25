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

if(!isset($settings['cards'])) {
  return;
}

$cards = $settings['cards'];

if(!$cards) {
  return;
}

?>

<div class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>">

  <ul class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__list">

    <?php foreach ($cards as $key => $card): 
      $class = 'selleradise_PromoCards--'.$settings['card_type'].'__item';
      $class .= ' elementor-repeater-item-'.$card['_id'];

      if($settings['adaptive_colors'] === 'yes') {
        $class .= ' selleradise_adaptive_colors';
      }

      $thumbnail = wp_get_attachment_image_src($card['image']['id'], 'thumbnail');
      $image_alt = get_post_meta($card['image']['id'], '_wp_attachment_image_alt', true);

      ?>
      <li class="<?php echo esc_attr( $class ); ?>">
        <div class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__item-content">
          <p class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__item-title"><?php echo esc_html($card['title']) ?></p>

          <h3 class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__item-subtitle"><?php echo esc_html($card['subtitle']) ?></h3>
          
          <a 
            href="<?php echo esc_url($card['cta_url']['url'] ?: '#'); ?>" 
            class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__item-link"> 
            <?php echo esc_html($card['cta_text']); ?>
          </a>
        </div>

        <a href="<?php echo esc_url($card['cta_url']['url'] ?: '#'); ?>" class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__item-image">
          <img 
            class="<?php echo $settings['adaptive_colors'] === 'yes' ? 'selleradise_skip-lazy-load' : null; ?>"
            src="<?php echo selleradise_get_image_placeholder(); ?>" 
            data-src="<?php echo esc_url($thumbnail ? $thumbnail[0] : selleradise_get_image_placeholder()); ?>" 
            alt="<?php echo esc_attr($image_alt); ?>">
        </a>
      </li>
    <?php endforeach; ?>

  </ul>

</div>