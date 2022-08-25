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

<h2 class="text-4xl text-center mb-4 font-semibold">
 <?php echo esc_html($settings['section_title']) ?>
</h2>
