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

if (!$card) {
  return;
}

$thumbnail = wp_get_attachment_image_src($card['image']['id'], 'medium');
$image_alt = get_post_meta($card['image']['id'], '_wp_attachment_image_alt', true);

$is_editor = class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->editor->is_edit_mode();

?>

<div class="selleradise_PromoCards--<?php echo esc_attr($settings['card_type']); ?>__item-image">
  <img
    class="<?php echo esc_attr( $settings['adaptive_colors'] === 'yes' ? 'selleradise_skip-lazy-load' : null ); ?>"

    <?php 
      echo sprintf(
        '%s="%s"',
        'data-src',
        esc_url($thumbnail ? $thumbnail[0] : selleradise_get_image_placeholder())
      ); 
    ?>

    src="<?php echo selleradise_get_image_placeholder(); ?>"
    alt="<?php echo esc_attr($image_alt); ?>">
</div>