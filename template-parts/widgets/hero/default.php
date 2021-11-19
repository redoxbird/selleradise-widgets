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

<div class="<?php echo esc_attr( $class ); ?>">
  <div class="<?php echo esc_attr($prefix) ?>__content">
    <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/title', null, ["settings" => $settings, "prefix" => $prefix]); ?>
    <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/description', null, ["settings" => $settings, "prefix" => $prefix]);?>
    <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/cta', 'primary', ["settings" => $settings, "prefix" => $prefix]);?>
  </div>

  <div class="selleradise_Hero__image <?php echo esc_attr($prefix) ?>__image">
      <a href="#" 
        data-tippy-content="<?php esc_html_e( 'Scroll down', 'selleradise-widgets' ); ?>" 
        aria-label="<?php esc_html_e( 'Scroll down', 'selleradise-widgets' ); ?>"
        data-smoothscroll-y="500" 
        class="<?php echo esc_attr($prefix) ?>__button-scroll button--icon selleradise_trigger_smoothscroll">
        <?php echo selleradise_widgets_svg('unicons-line/arrow-down'); ?>
      </a>

      <img
        src="<?php echo esc_url( $settings['background_image']['url'] ?: selleradise_get_image_placeholder() ); ?>"
        alt="<?php echo esc_attr(get_post_meta($settings['background_image']['id'], '_wp_attachment_image_alt', true)); ?>"
      >
  </div>

</div>