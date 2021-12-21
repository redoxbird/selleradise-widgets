<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

if (!isset($category) || !isset($duplicate_names)) {
    return;
}

?>

<h3 class="<?php echo esc_attr($prefix) ?>__itemName">
  <?php 
    if(in_array($category->name, $duplicate_names) && $category->parent): 
      $parent = get_term($category->parent, $category->taxonomy);
      echo esc_html($category->name); ?>
    <span>
      (<?php echo esc_html($parent->name); ?>)
    </span>
  <?php 
    else:
      echo esc_html($category->name);
    endif;
  ?>
</h3>

<?php
