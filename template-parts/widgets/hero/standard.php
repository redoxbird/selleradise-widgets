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
  class="bg-text-25 relative w-full flex flex-col lg:flex-row justify-between items-stretch px-page lg:h-160 overflow-hidden"
  x-init="
    $dispatch('selleradise-widget-initialized', { 
      isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
      element: $el
    })
  ">

  <div class="hidden lg:block absolute z-10 inset-0 children:h-auto children:w-full text-text-100">
    <?php echo selleradise_widgets_svg('patterns/hero-'.($settings["pattern"] ?: 1)); ?>
  </div>

  <div class="relative mb-10 lg:mb-0 z-20 flex w-full lg:w-2/3 flex-grow flex-col justify-center items-start lg:pr-40">
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

  <?php if(isset($settings["image_shape"]) && $settings["image_shape"] === 'oval'): ?>
    <div class="relative z-20 w-full my-8 lg:mr-20 lg:w-120 rounded-2xl lg:rounded-full overflow-hidden">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "!w-full !h-full object-cover"]);?>
    </div>
  <?php endif; ?>

  <?php if(isset($settings["image_shape"]) && $settings["image_shape"] === 'square'): ?>
    <div class="relative z-20 w-full mt-8 lg:mr-20 lg:w-120 rounded-t-2xl overflow-hidden">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "!w-full !h-full object-cover"]);?>
    </div>
  <?php endif; ?>

  <?php if(isset($settings["image_shape"]) && $settings["image_shape"] === 'circle'): ?>
    <div class="relative z-20 w-full h-120 my-auto lg:mr-20 lg:w-120 rounded-full overflow-hidden">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "!w-full !h-full object-cover"]);?>
    </div>
  <?php endif; ?>

  <?php if(isset($settings["image_shape"]) && $settings["image_shape"] === 'half-oval'): ?>
    <div class="relative z-20 w-full mb-8 lg:mr-20 lg:w-120 rounded-b-full overflow-hidden">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "!w-full !h-full object-cover"]);?>
    </div>
  <?php endif; ?>

  <?php if(isset($settings["image_shape"]) && $settings["image_shape"] === 'none'): ?>
    <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "relative mr-40 z-50"]);?>
  <?php endif; ?>

</div>