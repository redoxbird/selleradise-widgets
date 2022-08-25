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

<span>
  <?php echo esc_html( $category->count ); ?>
</span>
<span>
  <?php echo esc_html( $category->count == 1 ? __('Product', 'selleradise-widgets') : __('Products', 'selleradise-widgets') ); ?>
</span>

<?php
