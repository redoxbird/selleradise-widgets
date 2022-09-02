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
  style="
    --selleradise-item-index: <?php echo esc_attr($index); ?>;
    --product-image-ratio: <?php echo esc_attr($ratio); ?>;
    --width: 14rem;
  "
  x-show="visible > <?php echo esc_attr( $index ); ?>"
  x-init="$el.style.setProperty('--width', $el.offsetWidth + 'px')"
  x-transition>
  <a 
    class="w-full flex flex-col justify-center items-center bg-background-900 text-text-900" 
    href="<?php echo esc_url(get_term_link($category)); ?>">

    <div class="w-full relative z-10 flex justify-center items-center overflow-hidden rounded-2xl h-ratio hover:children:scale-110">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/partials/image', null, ["category" => $category]); ?>
    </div>

    <h3 class="relative bg-text-900 text-background-900 px-4 py-1.5 rounded-full -mt-4 text-center text-xs z-20">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/categories/partials/name', null, ["category" => $category, "duplicate_names" => $duplicate_names]); ?>
    </h3>
  </a>
</li>