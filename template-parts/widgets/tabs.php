<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

$tabs = $settings['tabs'];

if (!$tabs) {
    return;
}

?>

<section class="selleradise_Tabs--default">

  <div class="selleradise_Tabs--default__head">
    <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
      <h2 class="selleradise_Tabs--default__title"><?php echo esc_html($settings['section_title']); ?></h2>
    <?php endif;?>
    <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
      <p class="selleradise_Tabs--default__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
    <?php endif;?>
  </div>

  <div class="selleradise_Tabs--default__body">
    <div class="selleradise_Tabs--default__triggers">
      <span class="selleradise_Tabs--default__highlighter"></span>

      <?php foreach ($tabs as $key => $tab): ?>
        <button
          id="selleradise_Tabs--default__trigger-<?php echo esc_attr($key); ?>"
          aria-controls="selleradise_Tabs--default__tab-<?php echo esc_attr($key); ?>"
          class="selleradise_Tabs--default__trigger">
          <span class="title">
            <?php echo esc_html($tab['title']); ?>
          </span>
        </button>
      <?php endforeach; ?>
    </div>

    <div class="selleradise_Tabs--default__tabs">
      <?php foreach ($tabs as $key => $tab): ?>
        <div 
          class="selleradise_Tabs--default__tab"
          role="region"
          id="selleradise_Tabs--default__tab-<?php echo esc_attr($key); ?>"
          aria-labelledby="selleradise_Tabs--default__trigger-<?php echo esc_attr($key); ?>">
          <?php echo wp_kses_post($tab['description']); ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

</section>