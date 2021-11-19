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

if (!isset($settings['section_description'])) {
    return;
}

if (!$settings['section_description']) {
    return;
}

?>

<p class="<?php echo esc_attr($prefix) ?>__description">
  <?php echo esc_html($settings['section_description']); ?>
</p>
