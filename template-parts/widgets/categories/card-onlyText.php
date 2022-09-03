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
    class="w-full h-full flex flex-col justify-center items-center border-text-100 border-1 border-solid text-text-900 py-6 px-4 rounded-2xl hover:border-text-300"
    href="<?php echo esc_url(get_term_link($category)); ?>">

    <p class="m-0 bg-text-50 text-text-700 px-3 py-1.5 rounded-full text-xs font-semibold mb-4">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/partials/count', null, ["category" => $category]);?>
    </p>

    <h3 class="m-0 text-sm z-10 mt-4">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/partials/name', null, ["category" => $category, "duplicate_names" => $duplicate_names]);?>
    </h3>
  </a>
</li>