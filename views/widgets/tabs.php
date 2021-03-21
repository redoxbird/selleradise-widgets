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

<section class="selleradiseTabs" x-data="{selected: '0', selectedRect: { left: 0, width: 100 }}">

  <div class="triggers">
    <span class="highlighter" x-bind:style="`width: ${selectedRect.width}px; transform: translate(${selectedRect.left}px, 0)`"></span>
    <?php foreach ($tabs as $key => $tab): ?>
      <button
        class="trigger"
        x-ref="selleradiseTabsTrigger<?php echo esc_attr($key); ?>"
        id="selleradiseAccordion--trigger-<?php echo esc_attr($key); ?>"
        aria-controls="selleradiseAccordion--description-<?php echo esc_attr($key); ?>"
        x-bind:class="{ isSelected: selected === '<?php echo esc_attr($key); ?>' }"
        x-on:click="
          selected !== '<?php echo esc_attr($key); ?>' ? selected = '<?php echo esc_attr($key); ?>' : selected = null;
          selectedRect.left = $refs.selleradiseTabsTrigger<?php echo esc_attr($key); ?>.offsetLeft;
          selectedRect.width = $refs.selleradiseTabsTrigger<?php echo esc_attr($key); ?>.offsetWidth;
        "
        x-bind:aria-expanded="selected === '<?php echo esc_attr($key); ?>' ? true : false">
        <span class="title">
          <?php echo esc_html($tab['title']); ?>
        </span>
      </button>

    <?php endforeach;?>
  </div>

</section>