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
  src="<?php echo esc_url($settings['background_image']['url'] ?: \Elementor\Utils::get_placeholder_image_src()); ?>"
  alt="<?php echo esc_attr(get_post_meta($settings['background_image']['id'], '_wp_attachment_image_alt', true)); ?>"
/>