<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

$features = $settings['features'];

if (!$features) {
    return;
}

?>

<section 
  class="w-full px-page lg:px-64"
  x-init="
    $dispatch('selleradise-widget-initialized', { 
      isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
      element: $el,
      widget: 'features',
      variation: 'default',
    })
  ">
  <div class="flex justify-center items-center flex-col mb-10">
    <div class="w-full text-center">
      <?php selleradise_widgets_get_template_part('template-parts/section-title', null, ["settings" => $settings]); ?>
    </div>

  </div>

  <div class="flex justify-center items-stretch flex-col lg:flex-row">
    <ul class="w-full lg:w-1/2 flex flex-col gap-8 lg:py-20 lg:pr-20 order-2 lg:order-1 ">
      <?php foreach ($features as $index => $feature): ?>
        <li 
          class="elementor-repeater-item-<?php echo esc_attr( $feature['_id'] ); ?> flex justify-start items-baseline"
          style="--selleradise-item-index: <?php echo esc_attr($index); ?>">
          
          <div class="selleradise_Features--icon w-8 h-8 text-xs rounded-full flex-shrink-0 inline-flex justify-center items-center text-main-900 bg-main-100 mr-4">
            <?php \Elementor\Icons_Manager::render_icon($feature['icon'], ['aria-hidden' => 'true']);?>
          </div>
          
          <div>
            <h3 class="text-lg mb-2">
              <?php echo esc_html($feature['title']); ?>
            </h3>

            <div class="text-md opacity-75">
              <?php echo esc_attr( $feature['description'] ); ?>
            </div>
          </div>
        </li>
      <?php endforeach;?>
      <li class="pl-12">
        <?php selleradise_widgets_get_template_part('template-parts/widgets/features/partials/cta', null, ["settings" => $settings]);?>
      </li>
    </ul>


    <div class="relative w-full lg:w-1/2 overflow-hidden rounded-2xl">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/features/partials/image', null, ["settings" => $settings, "classes" => "absolute inset-0 !w-full !h-full object-cover"]);?>
    </div>

  </div>

</section>
