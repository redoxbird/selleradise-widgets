<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

if (!isset($settings['section_title']) || !$settings['section_title']) {
  return;
}

?>

<?php echo esc_html($settings['section_title']) ?>

<?php
