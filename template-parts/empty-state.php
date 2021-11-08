<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

?>

<section class="selleradise_empty_state">
  <div class="selleradise_empty_state__svg">
    <?php echo selleradise_widgets_svg('misc/empty-state'); ?>
  </div>

  <p class="selleradise_empty_state__title" role="status">
    <?php echo esc_attr( $title ) ?? __('Nothing found', 'selleradise-widgets'); ?>
  </p>
</section>