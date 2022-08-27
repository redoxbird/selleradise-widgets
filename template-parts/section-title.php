<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
  extract($args);
}


?>

<?php if (isset($settings['section_title']) && $settings['section_title']): ?>
  <h2 class="text-3xl">
    <?php echo esc_html($settings['section_title']); ?>
  </h2>
<?php endif;?>

<?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
  <p class="mt-2"><?php echo esc_html($settings['section_subtitle']); ?></p>
<?php endif;?>