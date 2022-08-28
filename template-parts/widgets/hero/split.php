<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

if (!isset($settings)) {
    return;
}

?>

<div
  x-data
  class="relative w-full flex flex-col lg:flex-row justify-between items-stretch lg:min-h-screen-adjusted overflow-hidden"
  x-init="
    $dispatch('selleradise-widget-initialized', {
      isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
      element: $el,
      widget: 'hero',
      variation: 'split',
    })
  ">

  <div class="relative px-page mb-10 lg:mb-0 z-20 flex w-full lg:w-1/2 flex-grow flex-col justify-center items-start">
    <h1 class="text-4xl lg:text-7xl lg:leading-snug font-bold">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/title', null, ["settings" => $settings]);?>
    </h1>
    <p class="text-md lg:text-xl mt-8">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/description', null, ["settings" => $settings]);?>
    </p>
    <div class="mt-8 lg:mt-20">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/cta', 'primary', ["settings" => $settings]);?>
    </div>
  </div>

  <div class="selleradise_Hero__image relative z-20 w-full lg:w-1/2 overflow-hidden">
    <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "!w-full !h-full object-cover"]);?>
  </div>

</div>