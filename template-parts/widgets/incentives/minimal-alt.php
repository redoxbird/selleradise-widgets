<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

$incentives = $settings['incentives'];
$prefix = 'selleradise_incentives--'.$settings['type'];

if (!$incentives) {
    return;
}

?>

<section 
  class="w-full px-page"
  <?php if (!selleradise_is_normal_mode()): ?>
    x-init="
      $dispatch('selleradise-widget-initialized', { 
        isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
        element: $el,
        widget: 'incentives',
        variation: 'minimal',
      })
    "
  <?php endif;?>
  >
  <ul class="list-none m-0 grid md:grid-cols-2 lg:grid-cols-4 gap-8 bg-text-50 px-10 py-5 rounded-2xl lg:rounded-full">
    <?php foreach ($incentives as $index => $incentive): ?>
      <li
        class="elementor-repeater-item-<?php echo esc_attr( $incentive['_id'] ); ?> flex justify-center items-center" 
        style="--selleradise-item-index: <?php echo esc_attr($index); ?>"
      >

        <div class="flex-shrink-0 text-xl mr-4">
          <?php \Elementor\Icons_Manager::render_icon($incentive['icon'], ['aria-hidden' => 'true']);?>
        </div>

        <h3 class="text-md m-0">
          <?php echo esc_html(selleradise_truncate($incentive['title'], 35)); ?>
        </h3>
      </li>
    <?php endforeach; ?>
  </ul>
</section>
