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
  <div class="flex justify-between items-center mb-10">
    <div>
      <?php selleradise_widgets_get_template_part('template-parts/section-title', null, ["settings" => $settings]); ?>
    </div>

    <?php if (isset($settings['cta_text']) && $settings['cta_text']): ?>
      <a
          href="<?php echo esc_url($settings['cta_url']['url'] ?? '#'); ?>"
          target="<?php echo esc_attr($settings['cta_url']['is_external'] ? '_blank' : null); ?>"
          class="selleradise_Features--default__cta selleradise_button--primary"
      >
        <?php echo esc_html($settings['cta_text']); ?>
        <?php echo Selleradise_Widgets_svg('unicons-line/arrow-right'); ?>
      </a>
    <?php endif;?>
  </div>

  <ul class="grid lg:grid-cols-3 gap-8">
    <?php foreach ($features as $index => $feature): ?>
      <li 
        class="elementor-repeater-item-<?php echo esc_attr( $feature['_id'] ); ?>"
        style="--selleradise-item-index: <?php echo esc_attr($index); ?>">

        <div class="w-14 h-14 text-xl rounded-full flex justify-center items-center text-main-900 bg-main-100 mb-4">
          <?php \Elementor\Icons_Manager::render_icon($feature['icon'], ['aria-hidden' => 'true']);?>
        </div>

        <h3 class="text-xl mb-2"><?php echo esc_html($feature['title']); ?></h3>

        <div class="opacity-75">
          <?php echo esc_attr( $feature['description'] ); ?>
        </div>
      </li>
    <?php endforeach;?>
  </ul>

</section>
