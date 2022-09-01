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
  class="w-full px-page"
  x-init="
    $dispatch('selleradise-widget-initialized', { 
      isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
      element: $el,
      widget: 'features',
      variation: 'default',
    })
  ">
  <div class="flex justify-between items-start lg:items-center flex-col lg:flex-row mb-10">
    <div>
      <?php selleradise_widgets_get_template_part('template-parts/section-title', null, ["settings" => $settings]); ?>
    </div>

    <?php selleradise_widgets_get_template_part('template-parts/widgets/features/partials/cta', null, ["settings" => $settings]);?>
  </div>

  <ul class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
    <?php foreach ($features as $index => $feature): ?>
      <li 
        class="elementor-repeater-item-<?php echo esc_attr( $feature['_id'] ); ?>"
        style="--selleradise-item-index: <?php echo esc_attr($index); ?>">

        <div class="selleradise_Features--icon w-14 h-14 text-xl rounded-full flex justify-center items-center text-main-900 bg-main-100 mb-4">
          <?php \Elementor\Icons_Manager::render_icon($feature['icon'], ['aria-hidden' => 'true']);?>
        </div>

        <h3 class="text-lg mb-2"><?php echo esc_html($feature['title']); ?></h3>

        <div class="text-sm opacity-75">
          <?php echo esc_attr( $feature['description'] ); ?>
        </div>
      </li>
    <?php endforeach;?>
  </ul>

</section>
