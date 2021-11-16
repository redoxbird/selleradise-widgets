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

<section class="selleradise_Features--bullet">
  <ul class="selleradise_Features--bullet__list">
    <?php foreach ($features as $index => $feature): ?>
      <li class="elementor-repeater-item-<?php echo esc_attr( $feature['_id'] ); ?>">
        <div class="selleradise_Features--bullet__icon">
          <?php \Elementor\Icons_Manager::render_icon($feature['icon'], ['aria-hidden' => 'true']);?>
        </div>

        <div class="selleradise_Features--bullet__info">
          <h3 class="selleradise_Features--bullet__infoTitle"><?php echo esc_html(selleradise_truncate($feature['title'], 35)); ?></h3>

          <div class="selleradise_Features--bullet__infoDescription">
            <?php echo selleradise_truncate($feature['description'], 40); ?>
          </div>
        </div>

      </li>
    <?php endforeach;?>
  </ul>
</section>
