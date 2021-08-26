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

    <?php foreach ($cards as $key => $card): ?>
      <li class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__item elementor-repeater-item-<?php echo $card['_id']; ?>">
        <div class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__item-content">
          <p class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__item-title"><?php echo esc_html($card['title']) ?></p>

          <h3 class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__item-subtitle"><?php echo esc_html($card['subtitle']) ?></h3>
          
          <a 
            href="<?php echo esc_url($card['cta_url']['url'] ?: '#'); ?>" 
            class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__item-link"> 
            <?php echo esc_html($card['cta_text']); ?>
          </a>
        </div>

        <div class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__item-image">
          <span></span>
          <img 
            src="<?php echo esc_url($card['image']['url']); ?>" 
            alt="<?php echo esc_attr(get_post_meta($card['image']['id'], '_wp_attachment_image_alt', true)); ?>">
        </div>
      </li>
    <?php endforeach; ?>

  </ul>

</div>