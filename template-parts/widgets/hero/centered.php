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

<div class="selleradise_Hero--<?php echo $settings['hero_type'] ?>">

  <div class="selleradise_Hero--<?php echo $settings['hero_type'] ?>__content">

    <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
      <h1 class="selleradise_Hero--<?php echo $settings['hero_type'] ?>__title"><?php echo esc_html($settings['section_title']); ?></h1>
    <?php endif;?>

    <?php if (isset($settings['section_description']) && $settings['section_description']): ?>
      <p class="selleradise_Hero--<?php echo $settings['hero_type'] ?>__description"><?php echo esc_html($settings['section_description']); ?></p>
    <?php endif;?>

    <?php if (isset($settings['cta_primary_text']) && $settings['cta_primary_text']): ?>
        <a
            href="<?php echo esc_html($settings['cta_primary_url']['url'] ?? '#'); ?>"
            target="<?php echo esc_html($settings['cta_primary_url']['is_external'] ? '_blank' : null); ?>"
            class="selleradise_Hero--<?php echo $settings['hero_type'] ?>__primaryCTA"
        >
            <?php echo esc_html($settings['cta_primary_text']); ?>
        </a>
    <?php endif;?>

    <?php if (isset($settings['cta_secondary_text']) && $settings['cta_secondary_text']): ?>
        <a
            href="<?php echo esc_html($settings['cta_secondary_url']['url'] ?? '#'); ?>"
            target="<?php echo esc_html($settings['cta_secondary_url']['is_external'] ? '_blank' : null); ?>"
            class="selleradise_Hero--<?php echo $settings['hero_type'] ?>__secondaryCTA"
        >
            <?php echo esc_html($settings['cta_secondary_text']); ?>
        </a>
    <?php endif;?>
  </div>

  <div class="selleradise_Hero__image selleradise_Hero--<?php echo $settings['hero_type'] ?>__image">  </div>

</div>