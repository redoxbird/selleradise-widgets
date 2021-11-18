<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

$incentives = $settings['incentives'];

if (!$incentives) {
    return;
}

?>

<section class="selleradise_incentives selleradise_incentives--<?php echo esc_attr( $settings['type'] ); echo selleradise_is_normal_mode() ? ' selleradise_scroll_animate' : ''; ?>">
  <ul class="selleradise_incentives--<?php echo esc_attr( $settings['type'] ); ?>__list">
    <?php foreach ($incentives as $index => $incentive): ?>
      <li 
        class="elementor-repeater-item-<?php echo esc_attr( $incentive['_id'] ); ?>" 
        style="--selleradise-item-index: <?php echo esc_attr($index); ?>">
        <div class="selleradise_incentives--<?php echo esc_attr( $settings['type'] ); ?>__icon">
          <?php \Elementor\Icons_Manager::render_icon($incentive['icon'], ['aria-hidden' => 'true']);?>
        </div>

        <div class="selleradise_incentives--<?php echo esc_attr( $settings['type'] ); ?>__info">
          <h3 class="selleradise_incentives--<?php echo esc_attr( $settings['type'] ); ?>__info-title"><?php echo esc_html(selleradise_truncate($incentive['title'], 35)); ?></h3>

          <div class="selleradise_incentives--<?php echo esc_attr( $settings['type'] ); ?>__info-description">
            <?php echo selleradise_truncate($incentive['description'], 40); ?>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</section>
