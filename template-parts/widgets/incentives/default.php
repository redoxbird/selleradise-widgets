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
  x-data="{inView: false}"
  class="w-full px-page"
  xyz="fade stagger-1 left-2"
  <?php if (!selleradise_is_normal_mode()): ?>
    x-init="
      $dispatch('selleradise-widget-initialized', { 
        isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
        element: $el,
        widget: 'incentives',
        variation: 'default',
      })
    "
  <?php endif;?>
  >
  <ul class="list-none m-0 p-0 grid md:grid-cols-2 lg:grid-cols-4 gap-8" x-intersect.once="inView = true">
    <?php foreach ($incentives as $index => $incentive): ?>
      <li 
        class="elementor-repeater-item-<?php echo esc_attr( $incentive['_id'] ); ?> flex justify-start items-center" 
        style="--selleradise-item-index: <?php echo esc_attr($index); ?>"
        x-bind:class="{'xyz-in': inView}"
        >

        <div class="flex-shrink-0 w-16 h-16 text-xl bg-text-50 rounded-full mr-4 flex justify-center items-center">
          <?php \Elementor\Icons_Manager::render_icon($incentive['icon'], ['aria-hidden' => 'true']);?>
        </div>

        <div class="flex-grow">
          <h3 class="text-md mb-1">
            <?php echo esc_html(selleradise_truncate($incentive['title'], 35)); ?>
          </h3>

          <div class="text-sm opacity-75">
            <?php echo selleradise_truncate($incentive['description'], 40); ?>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</section>
