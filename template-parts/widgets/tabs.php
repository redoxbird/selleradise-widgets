<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

$tabs = $settings['tabs'];

if (!$tabs) {
    return;
}

?>

<section 
  x-data
  x-embla-tabs 
  class="px-page"
  <?php if (!selleradise_is_normal_mode()): ?>
    x-init="
      $dispatch('selleradise-widget-initialized', {
        isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
        element: $el,
        widget: 'tabs',
        variation: 'default',
      })
    "
  <?php endif;?>
  >

  <div>
    <?php selleradise_widgets_get_template_part('template-parts/section-title', null, ["settings" => $settings]);?>
  </div>

  <div class="mt-4">
    <div
      x-embla-tabs:thumbs
      class="w-full">
      <div class="w-full flex justify-start items-center gap-2">
        <?php foreach ($tabs as $index => $tab): ?>
          <button
            x-embla-tabs:thumb
            id="selleradise_Tabs--default__trigger-<?php echo esc_attr($index); ?>"
            aria-controls="selleradise_Tabs--default__tab-<?php echo esc_attr($index); ?>"
            class="selleradise_button--sm"
            data-index="<?php echo esc_attr( $index ); ?>"
            <?php if (selleradise_is_normal_mode()): ?>
              x-bind:class="[isInView(<?php echo esc_attr($index); ?>) ? 'selleradise_button--neutral' : 'selleradise_button--secondary']">
            <?php endif;?>
            <span class="title">
              <?php echo esc_html($tab['title']); ?>
            </span>
          </button>
        <?php endforeach;?>
      </div>
    </div>

    <div
      x-embla-tabs:panels
      class="embla mt-4">
      <div class="embla__container">
        <?php foreach ($tabs as $key => $tab): ?>
          <div
            class="embla__slide selleradise_prose"
            role="region"
            id="selleradise_Tabs--default__tab-<?php echo esc_attr($key); ?>"
            aria-labelledby="selleradise_Tabs--default__trigger-<?php echo esc_attr($key); ?>">
            <?php echo wp_kses_post($tab['description']); ?>
          </div>
        <?php endforeach;?>
      </div>
    </div>

  </div>

</section>