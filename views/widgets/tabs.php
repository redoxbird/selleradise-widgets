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

<section class="selleradiseTabs" x-data="{ selected: '0', selectedRect: { left: $el.querySelector('.trigger')?.offsetLeft, width: $el.querySelector('.trigger')?.offsetWidth } }">

  <div class="triggers">
    <span class="highlighter" x-bind:style="`width: ${selectedRect.width}px; transform: translate(${selectedRect.left}px, 0)`"></span>

    <?php foreach ($tabs as $key => $tab): ?>
      <button
        id="selleradiseTabs--trigger-<?php echo esc_attr($key); ?>"
        aria-controls="selleradiseTabs--tab-<?php echo esc_attr($key); ?>"
        x-ref="selleradiseTabsTrigger<?php echo esc_attr($key); ?>"
        x-bind:class="{ isSelected: selected === '<?php echo esc_attr($key); ?>' }"
        class="trigger"
        x-on:click="
          selected = '<?php echo esc_attr($key); ?>';
          selectedRect.left = $refs.selleradiseTabsTrigger<?php echo esc_attr($key); ?>.offsetLeft;
          selectedRect.width = $refs.selleradiseTabsTrigger<?php echo esc_attr($key); ?>.offsetWidth;
        "
        x-bind:aria-expanded="selected === '<?php echo esc_attr($key); ?>' ? true : false">

        <span class="title">
          <?php echo esc_html($tab['title']); ?>
        </span>
      </button>
    <?php endforeach; ?>
  </div>

  <div class="tabs">
    <?php foreach ($tabs as $key => $tab): ?>
      <div 
        class="tab"
        role="region"
        id="selleradiseTabs--tab-<?php echo esc_attr($key); ?>"
        aria-labelledby="selleradiseTabs--trigger-<?php echo esc_attr($key); ?>"
        x-show="selected === '<?php echo esc_attr($key); ?>'">
        <?php echo $tab['description']; ?>
      </div>
    <?php endforeach; ?>
  </div>

</section>