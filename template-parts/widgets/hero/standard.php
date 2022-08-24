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

<div x-data class="relative w-full flex flex-col lg:flex-row justify-between items-stretch px-page pt-8 lg:h-168 overflow-hidden">

  <div class="absolute z-10 inset-0 children:h-auto children:w-full">
    <?php echo selleradise_widgets_svg('patterns/hero-1'); ?>
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

  <div class="relative z-20 w-full lg:w-144 rounded-2xl lg:rounded-full overflow-hidden">
    <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "classes" => "!w-full !h-full object-cover"]);?>
  </div>

</div>