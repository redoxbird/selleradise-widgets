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
  class="w-full xyz-in"
  style="
    --selleradise-item-index: <?php echo esc_attr($index); ?>;
    --product-image-ratio: <?php echo esc_attr($ratio); ?>;
    --width: 14rem;
  "
  x-show="visible > <?php echo esc_attr( $index ); ?>"
  x-init="$el.style.setProperty('--width', $el.offsetWidth + 'px')"
  >
  <a 
    class="w-full flex flex-col justify-center items-center bg-background-900 text-text-900" 
    href="<?php echo esc_url(get_term_link($category)); ?>">

    <div class="w-full flex justify-center items-center overflow-hidden rounded-2xl h-ratio hover:children:scale-110">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/partials/image', null, ["category" => $category]); ?>
    </div>

    <div class="p-4 w-full text-center">
      <h3 class="text-sm z-10 m-0 align-baseline">
        <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/partials/name', null, ["category" => $category, "duplicate_names" => $duplicate_names]); ?>
      </h3>

      <p class="text-sm m-0 mt-2 text-text-700">
        <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/partials/count', null, ["category" => $category]); ?>
      </p>
    </div>
  </a>
</li>