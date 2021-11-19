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

if(!isset($settings['section_title'])) {
  return;
}

if(!$settings['section_title']) {
  return;
}

?>

<h1 class="<?php echo esc_attr($prefix) ?>__title">
  <?php echo esc_html($settings['section_title']); ?>
</h1>