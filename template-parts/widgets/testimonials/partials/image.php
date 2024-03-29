<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

$profile_pictures = rwmb_meta('profile_picture', array('limit' => 1));
$profile_picture = reset($profile_pictures);
$alt = $profile_picture ? ($profile_picture['alt'] ?: '') : '';

?>

<img
  <?php echo selleradise_lazy_src($profile_picture ? $profile_picture['url'] : \Elementor\Utils::get_placeholder_image_src()); ?>
  alt="<?php echo esc_attr($alt); ?>"
>

<?php
