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
    class="selleradise_button--primary"
>
  <?php echo esc_html($settings['cta_primary_text']); ?>
  <span class="inline-flex justify-center items-center w-5 h-auto ml-2"><?php echo selleradise_widgets_svg('tabler-icons/arrow-right'); ?></span>
</a>
