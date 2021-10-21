<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

if (!isset($settings)) {
    return;
}

$attributes = [];

$attributes['title'] = $settings['title'];

?>

<div class="selleradise_widgets_sale-countdown">

  <div class="selleradise_widgets_sale-countdown__image">
    <img
      <?php if( class_exists('\Elementor\Plugin') && \Elementor\Plugin::$instance->editor->is_edit_mode() ): ?>
        src="<?php echo esc_url($settings['image']['url'] ?: selleradise_get_image_placeholder()); ?>"
      <?php else: ?>
        src="<?php echo selleradise_get_image_placeholder(); ?>"
        data-src="<?php echo esc_url($settings['image']['url'] ?: selleradise_get_image_placeholder()); ?>"
      <?php endif; ?>
      alt="<?php echo esc_attr(get_post_meta($settings['image']['id'], '_wp_attachment_image_alt', true)); ?>"
    >
  </div>

  <div class="selleradise_widgets_sale-countdown__content">
    <div class="selleradise_widgets_sale-countdown__title-outer">
      <?php if (isset($settings['title']) && $settings['title']): ?>
        <h2 class="selleradise_widgets_sale-countdown__title"><?php echo esc_html($settings['title']); ?></h2>
      <?php endif;?>

      <?php if (isset($settings['subtitle']) && $settings['subtitle']): ?>
        <p class="selleradise_widgets_sale-countdown__subtitle"><?php echo esc_html($settings['subtitle']); ?></p>
      <?php endif;?>
    </div>

    <!-- Timer component is mounted on this element -->
    
    <div class="selleradise_widgets_sale-countdown__timer"></div>

    <!-- Timer component is mounted on this element -->

    <?php if (isset($settings['cta_text']) && $settings['cta_text']): ?>
      <div class="selleradise_widgets_sale-countdown__cta-outer">
        <a
          href="<?php echo esc_url($settings['cta_url']['url'] ?? '#'); ?>"
          target="<?php echo esc_attr($settings['cta_url']['is_external'] ? '_blank' : null); ?>"
          class="selleradise_widgets_sale-countdown__cta"
        >
          <?php echo esc_html($settings['cta_text']); ?>
          <?php echo selleradise_widgets_svg('material/arrow-right'); ?>
        </a>
      </div>
    <?php endif;?>
  </div>
</div>