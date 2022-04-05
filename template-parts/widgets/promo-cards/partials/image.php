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

<div class="w-48 h-48 relative rounded-lg overflow-hidden">
  <img class="absolute inset-0 h-full w-full object-cover"
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