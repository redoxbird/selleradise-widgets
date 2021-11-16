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

?>

<div class="selleradise_Hero--<?php echo esc_attr( $settings['hero_type'] ) ?>">

  <div class="selleradise_Hero--<?php echo esc_attr( $settings['hero_type'] ) ?>__content">

    <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
      <h1 class="selleradise_Hero--<?php echo esc_attr( $settings['hero_type'] ) ?>__title"><?php echo esc_html($settings['section_title']); ?></h1>
    <?php endif;?>

    <?php if (isset($settings['section_description']) && $settings['section_description']): ?>
      <p class="selleradise_Hero--<?php echo esc_attr( $settings['hero_type'] ) ?>__description"><?php echo esc_html($settings['section_description']); ?></p>
    <?php endif;?>

    <?php if (isset($settings['cta_primary_text']) && $settings['cta_primary_text']): ?>
        <a
            href="<?php echo esc_url($settings['cta_primary_url']['url'] ?? '#'); ?>"
            target="<?php echo esc_attr($settings['cta_primary_url']['is_external'] ? '_blank' : null); ?>"
            class="selleradise_Hero--<?php echo esc_attr( $settings['hero_type'] ) ?>__primaryCTA selleradise_button--primary"
        >
            <?php echo esc_html($settings['cta_primary_text']); ?>
            <?php echo selleradise_widgets_svg('unicons-line/arrow-right'); ?>
        </a>
    <?php endif;?>

  </div>

  <div class="selleradise_Hero__image selleradise_Hero--<?php echo esc_attr( $settings['hero_type'] ) ?>__image">
    <img
        src="<?php echo esc_url( $settings['background_image']['url'] ?: selleradise_get_image_placeholder() ); ?>"
        alt="<?php echo esc_attr(get_post_meta($settings['background_image']['id'], '_wp_attachment_image_alt', true)); ?>"
    >
  </div>

</div>