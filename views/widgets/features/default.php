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

<section class="selleradise_Features--default">
  <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
    <h2 class="selleradise_Features--default__title"><?php echo esc_html($settings['section_title']); ?></h2>
  <?php endif;?>

  <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
    <p class="selleradise_Features--default__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
  <?php endif;?>

  <ul class="selleradise_Features--default__list">
    <?php foreach ($features as $index => $feature): ?>
      <li class="elementor-repeater-item-<?php echo $feature['_id']; ?>">
        <div class="selleradise_Features--default__icon">
          <?php \Elementor\Icons_Manager::render_icon($feature['icon'], ['aria-hidden' => 'true']);?>
        </div>

        <h3 class="selleradise_Features--default__listTitle"><?php echo esc_html($feature['title']); ?></h3>

        <div class="selleradise_Features--default__listDescription">
          <?php echo $feature['description']; ?>
        </div>
      </li>
    <?php endforeach;?>
  </ul>

  <?php if (isset($settings['cta_text']) && $settings['cta_text']): ?>
    <a
        href="<?php echo esc_html($settings['cta_url']['url'] ?? '#'); ?>"
        target="<?php echo esc_html($settings['cta_url']['is_external'] ? '_blank' : null); ?>"
        class="selleradise_Features--default__cta"
    >
      <?php echo esc_html($settings['cta_text'] ?: __('Learn More', 'selleradise-widgets')); ?>
      <?php echo Selleradise_Widgets_svg('material/chevron-right'); ?>
    </a>
  <?php endif;?>

</section>
