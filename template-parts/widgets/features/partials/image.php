<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

if (!isset($settings)) {
    return;
}

?>

<img
  class="<?php echo isset($classes) ? esc_attr($classes) : null ?>"
  <?php echo selleradise_lazy_src($settings['image']['url']); ?>
  alt="<?php echo esc_attr(get_post_meta($settings['image']['id'], '_wp_attachment_image_alt', true)); ?>"
/>