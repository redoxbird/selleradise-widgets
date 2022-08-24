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

?>

<img
  class="<?php echo isset($classes) ? esc_attr($classes) : null ?>"
  <?php echo selleradise_lazy_src($thumbnail ? $thumbnail[0] : selleradise_get_image_placeholder()); ?>
  alt="<?php echo esc_attr($image_alt); ?>">