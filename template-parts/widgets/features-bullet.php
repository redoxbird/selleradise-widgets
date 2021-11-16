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
  <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
    <p class="selleradise_Features--bullet__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
  <?php endif;?>

  <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
    <h2 class="selleradise_Features--bullet__title"><?php echo esc_html($settings['section_title']); ?></h2>
  <?php endif;?>

  <ul class="selleradise_Features--bullet__list">
    <?php foreach ($features as $index => $feature): ?>
      <li>
        <div class="selleradise_Features--bullet__icon">
          <?php \Elementor\Icons_Manager::render_icon($feature['icon'], ['aria-hidden' => 'true']);?>
        </div>

        <div class="selleradise_Features--bullet__info">
          <h3 class="selleradise_Features--bullet__infoTitle"><?php echo esc_html($feature['title']); ?></h3>

          <div class="selleradise_Features--bullet__infoDescription">
            <?php echo wp_kses_post( $feature['description'] ); ?>
          </div>
        </div>

      </li>
    <?php endforeach;?>
  </ul>

</section>
