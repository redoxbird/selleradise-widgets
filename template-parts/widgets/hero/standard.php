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
  <?php if (!selleradise_is_normal_mode()): ?>
    x-init="
      $dispatch('selleradise-widget-initialized', { 
        isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
        element: $el
      })
    "
  <?php endif;?>
  >

  <?php if(isset($settings["pattern"]) && $settings["pattern"]): ?>
    <div class="hidden lg:block absolute z-10 inset-0 children:h-auto children:w-full text-text-100">
      <?php echo selleradise_widgets_svg('patterns/hero-'.($settings["pattern"] ?: 1)); ?>
    </div>
  <?php endif; ?>

  <div class="relative my-10 lg:my-0 z-20 flex w-full lg:w-2/3 flex-grow flex-col justify-center items-start lg:pr-40">
    <h1 class="m-0 text-4xl lg:text-7xl lg:leading-snug font-bold">
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
    <div class="selleradise_Hero__image relative z-20 w-full mt-4 lg:my-8 lg:mr-20 lg:w-120 rounded-2xl lg:rounded-full overflow-hidden">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "!w-full !h-full object-cover"]);?>
    </div>
  <?php endif; ?>

  <?php if(isset($settings["image_shape"]) && $settings["image_shape"] === 'square'): ?>
    <div class="selleradise_Hero__image relative z-20 w-full mt-4 lg:mt-8 h-96 lg:h-auto lg:mr-20 lg:w-120 rounded-2xl lg:rounded-b-none overflow-hidden">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "!w-full !h-full object-cover"]);?>
    </div>
  <?php endif; ?>

  <?php if(isset($settings["image_shape"]) && $settings["image_shape"] === 'circle'): ?>
    <div class="selleradise_Hero__image relative z-20 w-96 h-96 lg:h-120 my-auto lg:mr-20 lg:w-120 rounded-full overflow-hidden">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "!w-full !h-full object-cover"]);?>
    </div>
  <?php endif; ?>

  <?php if(isset($settings["image_shape"]) && $settings["image_shape"] === 'half-oval'): ?>
    <div class="selleradise_Hero__image relative z-20 w-full mb-8 lg:mr-20 lg:w-120 rounded-b-full overflow-hidden ">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "!w-full !h-full object-cover"]);?>
    </div>
  <?php endif; ?>

  <?php if(isset($settings["image_shape"]) && $settings["image_shape"] === 'none'): ?>
    <div class="selleradise_Hero__image w-full lg:w-1/2">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "lg:absolute lg:right-0 lg:bottom-0 lg:!max-w-4xl lg:!max-h-160 w-full lg:w-auto !h-auto z-50"]);?>
    </div>
  <?php endif; ?>

</div>