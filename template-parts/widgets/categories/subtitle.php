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

<p class="<?php echo esc_attr($prefix) ?>__subtitle">
  <?php echo esc_html($settings['section_subtitle']) ?>
</p>

<?php
