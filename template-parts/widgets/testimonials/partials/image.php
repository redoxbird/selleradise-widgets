  <?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

$profile_pictures = rwmb_meta('profile_picture', array('limit' => 1));
$profile_picture = reset($profile_pictures);

?>

<img
  src="<?php echo \Elementor\Utils::get_placeholder_image_src(); ?>"
  data-src="<?php echo esc_url($profile_picture ? $profile_picture['url'] : \Elementor\Utils::get_placeholder_image_src()); ?>"
  alt="<?php echo esc_attr($profile_picture['alt']); ?>"
>

<?php
