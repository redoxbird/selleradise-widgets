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

if (!isset($settings['cta_primary_text'])) {
    return;
}

if (!$settings['cta_primary_text']) {
    return;
}

?>

  <a
    href="<?php echo esc_url($settings['cta_primary_url']['url'] ?? '#'); ?>"
    target="<?php echo esc_attr($settings['cta_primary_url']['is_external'] ? '_blank' : null); ?>"
    class="<?php echo esc_attr($prefix) ?>__primaryCTA selleradise_button--primary"
>
  <?php echo esc_html($settings['cta_primary_text']); ?>
  <?php echo selleradise_widgets_svg('unicons-line/arrow-right'); ?>
</a>
