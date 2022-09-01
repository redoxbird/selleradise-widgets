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

if(!isset($settings['cta_text']) || !$settings['cta_text']) {
  return;
}

?>

<a
  href="<?php echo esc_url($settings['cta_url']['url'] ?? '#'); ?>"
  target="<?php echo esc_attr($settings['cta_url']['is_external'] ? '_blank' : null); ?>"
  class="selleradise_button--primary selleradise_button--sm mt-4"
>
  <?php echo esc_html($settings['cta_text']); ?>
  <span class="inline-flex justify-center items-center w-4 h-auto ml-1 -mr-1">
    <?php echo selleradise_widgets_svg('tabler-icons/chevron-right'); ?>
  </span>
</a>