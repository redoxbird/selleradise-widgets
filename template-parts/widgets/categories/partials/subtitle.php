<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

if (!isset($settings['section_subtitle']) || !$settings['section_subtitle']) {
  return;
}

?>

<?php echo esc_html($settings['section_subtitle']) ?>

<?php
