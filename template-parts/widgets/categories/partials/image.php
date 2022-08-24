<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

if (!isset($category)) {
  return;
}

$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
$thumbnail = wp_get_attachment_image_src($thumbnail_id, 'large');
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
$placeholder = function_exists("wc_placeholder_img_src") ? wc_placeholder_img_src() : \Elementor\Utils::get_placeholder_image_src();
$src = $thumbnail_id ? $thumbnail[0] : $placeholder;

?>

<img 
  class="transition-all duration-700 ease-out-expo"
  <?php echo selleradise_lazy_src($src); ?>
  alt="<?php echo esc_attr($alt); ?>" 
/>