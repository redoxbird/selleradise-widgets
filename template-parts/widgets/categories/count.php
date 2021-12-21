<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

if (!isset($category)) {
  return;
}

?>

<div class="<?php echo esc_attr($prefix) ?>__item-count">
  <span>
    <?php echo esc_html( $category->count ); ?>
  </span>
  <span>
    <?php echo esc_html( $category->count == 1 ? __('Product', 'selleradise-widgets') : __('Products', 'selleradise-widgets') ); ?>
  </span>
</div>

<?php
