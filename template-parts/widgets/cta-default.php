<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

?>

<section class="selleradise_CTA--default">

  <div class="selleradise_CTA--default__image">
    <img
      src="<?php echo \Elementor\Utils::get_placeholder_image_src(); ?>"
      data-src="<?php echo esc_url( $settings['background_image']['url'] ?: \Elementor\Utils::get_placeholder_image_src() ); ?>"
      alt="<?php echo esc_attr(get_post_meta($settings['background_image']['id'], '_wp_attachment_image_alt', true)); ?>"
    >
  </div>

  <div class="selleradise_CTA--default__overlay">
    <?php if (isset($settings['title']) && $settings['title']): ?>
      <h2 class="selleradise_CTA--default__title"><?php echo esc_html($settings['title']); ?></h2>
    <?php endif;?>

    <?php if (isset($settings['description']) && $settings['description']): ?>
      <p class="selleradise_CTA--default__description"><?php echo esc_html($settings['description']); ?></p>
    <?php endif;?>

    <a
        class="selleradise_button--accent"
        href="<?php echo esc_attr($settings['cta_url']['url'] ?? '#'); ?>"
        target="<?php echo esc_attr(isset($settings['cta_url']['is_external']) && $settings['cta_url']['is_external'] ? '_blank' : null); ?>">
        <span> <?php echo esc_html($settings['cta_text'] ?: __('Learn More', 'selleradise-widgets')); ?></span>
    </a>
  </div>
</section>
