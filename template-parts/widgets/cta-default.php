<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

?>

<section class="selleradise_CTA--default">
  <div class="selleradise_CTA--default__overlay">
    <?php if (isset($settings['title']) && $settings['title']): ?>
      <h2 class="selleradise_CTA--default__title"><?php echo esc_html($settings['title']); ?></h2>
    <?php endif;?>

    <?php if (isset($settings['description']) && $settings['description']): ?>
      <p class="selleradise_CTA--default__description"><?php echo esc_html($settings['description']); ?></p>
    <?php endif;?>

    <a
        class="selleradise_CTA--default__linkPrimary"
        href="<?php echo esc_html($settings['cta_url']['url'] ?? '#'); ?>"
        target="<?php echo esc_html($settings['cta_target'] ? '_blank' : null); ?>">
        <span> <?php echo esc_html($settings['cta_text'] ?: __('Learn More', 'selleradise-widgets')); ?></span>
    </a>
  </div>
</section>