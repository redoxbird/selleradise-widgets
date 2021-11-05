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

if (!isset($settings['cards'])) {
    return;
}

$cards = $settings['cards'];

if (!$cards) {
    return;
}

$classes = sprintf('selleradise_PromoCards--%s', $settings['card_type']);

if(selleradise_is_normal_mode()) {
  $classes .= ' selleradise_scroll_animate';
}

?>

<div class="<?php echo esc_attr( $classes ); ?>">

  <ul class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__list">

    <?php foreach ($cards as $index => $card): 
      $class = 'selleradise_PromoCards--' . $settings['card_type'] . '__item';
      $class .= ' elementor-repeater-item-' . $card['_id'];

      if ($settings['adaptive_colors'] === 'yes') {
          $class .= ' selleradise_adaptive_colors';
      }

      ?>
      <li 
        class="<?php echo esc_attr( $class ); ?>"
        style="--selleradise-item-index: <?php echo esc_attr($index); ?>">
        <a   
          href="<?php echo esc_url($card['link']['url'] ?: '#'); ?>"
          target="<?php echo esc_attr($card['link']['is_external'] ? '_blank' : null); ?>">
          <div class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__item-content">
            <h3 class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__item-title"><?php echo esc_html($card['title']) ?></h3>
            <p class="selleradise_PromoCards--<?php echo esc_html($settings['card_type']); ?>__item-subtitle"><?php echo esc_html($card['subtitle']) ?></p>
          </div>

          <?php selleradise_widgets_get_template_part('template-parts/widgets/promo-cards/partials/image', null, ["settings" => $settings, "card" => $card]);?>
        </a>
      </li>
    <?php endforeach;?>

  </ul>

</div>