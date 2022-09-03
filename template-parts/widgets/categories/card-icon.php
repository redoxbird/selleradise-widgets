<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if ($args) {
    extract($args);
}

if (!$settings) {
    return;
}

?>

<li
  class="w-full"
  style="--selleradise-item-index: <?php echo esc_attr($index); ?>; --product-image-ratio: <?php echo esc_attr($ratio); ?>;"
  x-show="visible > <?php echo esc_attr($index); ?>"
  x-transition>
  <a
    class="w-full h-full flex flex-col justify-center items-center text-text-900"
    href="<?php echo esc_url(get_term_link($category)); ?>">

    <div class="flex justify-center items-center overflow-hidden rounded-full w-20 h-20 hover:children:scale-110">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/partials/image', null, ["category" => $category]);?>
    </div>

    <h3 class="m-0 text-sm z-10 mt-4 text-center">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/partials/name', null, ["category" => $category, "duplicate_names" => $duplicate_names]);?>
    </h3>
  </a>
</li>