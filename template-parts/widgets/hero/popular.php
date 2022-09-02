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
  x-init="
    $dispatch('selleradise-widget-initialized', { 
      isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
      element: $el,
      widget: 'hero',
      variation: 'popular',
    })
  "
  class="w-padding-adjusted p-0 h-auto my-4 mx-auto relative flex justify-center items-center">

  <div class="selleradise_Hero__image absolute inset-0 overflow-hidden bg-text-100 rounded-2xl">
    <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "absolute inset-0 w-full !h-full rotate-0 object-cover object-center"]); ?>
  </div>

  <div class="selleradise_Hero__content relative flex flex-col justify-start items-start mt-28 mr-[50%] px-28 bg-background-100 text-text-900 backdrop-blur-xl rounded-2xl p-14">
    <h1 class="m-0 text-3xl lg:text-4xl lg:leading-snug font-bold">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/title', null, ["settings" => $settings]);?>
    </h1>
    <p class="text-md lg:text-xl mt-4">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/description', null, ["settings" => $settings]);?>
    </p>
    
    <div class="mt-4 lg:mt-8">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/cta', 'primary', ["settings" => $settings]);?>
    </div>
  </div>

</div>