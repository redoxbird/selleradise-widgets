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
  x-init="
    $dispatch('selleradise-widget-initialized', { 
      isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
      element: $el,
      widget: 'hero',
      variation: 'default',
    })
  ">

  <div class="relative my-10 lg:mb-0 z-20 flex w-full lg:w-2/3 flex-grow flex-col justify-center items-start lg:pr-40">
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

  <span id="heroDefaultTooltip" role="tooltip" class="selleradise_tooltip z-50">
    <?php echo esc_html_e('Scroll down', 'selleradise-widgets') ?>
  </span>

  <div class="selleradise_Hero__image relative z-20 w-full h-120 my-auto lg:mr-20 lg:w-120">
    <a href="#" 
      x-tooltip="heroDefaultTooltip"
      data-smoothscroll-y="500" 
      class="selleradise_trigger_smoothscroll hidden absolute z-50 lg:bottom-8 left-4 w-20 h-20 p-5 lg:flex justify-center items-center bg-accent-900 text-accent-text rounded-full">
      <?php echo selleradise_widgets_svg('tabler-icons/arrow-down'); ?>
    </a>  
    <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "!w-full !h-full object-cover !rounded-2xl lg:!rounded-full overflow-hidden"]);?>
  </div>

</div>