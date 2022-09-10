<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

?>

<a 
  href="<?php echo esc_url($link ?: '#'); ?>" 
  class="selleradise_button--secondary selleradise_button--sm flex justify-start items-center"
  aria-label="<?php echo sprintf(__('See all (%s)', 'selleradise-widgets'), esc_attr($section_title ?: '')); ?>">
  <?php _e('See all', 'selleradise-widgets'); ?> 
  <span class="w-5 h-5 flex justify-center items-center ml-1 -mr-1">
    <?php echo selleradise_widgets_svg('tabler-icons/chevron-right'); ?>
  </span>
</a>