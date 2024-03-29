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
  class="relative w-full flex flex-col lg:flex-row justify-between items-stretch px-page lg:h-160 overflow-hidden"
  <?php if (!selleradise_is_normal_mode()): ?>
    x-init="
      $dispatch('selleradise-widget-initialized', { 
        isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
        element: $el,
        widget: 'hero',
        variation: 'common',
      })
    "
  <?php endif;?>
  >

  <div class="selleradise_Hero__image relative z-20 w-full my-8 lg:mr-20 min-h-[24rem] lg:w-160 rounded-2xl overflow-hidden">
    <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "absolute inset-0 !w-full !h-full object-cover"]);?>
  </div>

  <div class="relative mb-10 lg:mb-0 z-20 flex w-full lg:w-2/3 flex-grow flex-col justify-center items-start">
    <h1 class="m-0 text-4xl lg:text-7xl lg:leading-snug font-bold">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/title', null, ["settings" => $settings]);?>
    </h1>
    <p class="text-md lg:text-xl mt-4 lg:mt-8">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/description', null, ["settings" => $settings]);?>
    </p>
    <div class="mt-8 lg:mt-20">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/cta', 'primary', ["settings" => $settings]);?>
    </div>
  </div>

</div>