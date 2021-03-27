<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
  extract($args);
}

$bellows = $settings['accordion'];

if(!$bellows) {
  return;
}

?>

<section class="selleradiseAccordion" x-data="{opened: '0'}">

  <?php if($settings['section_title']): ?>
    <div class="sectionTitle">
      <h2><?php echo $settings['section_title']; ?></h2>
    </div>
  <?php endif; ?>

  <?php foreach($bellows as $key => $bellow): ?>

    <div class="bellow" x-bind:class="{'isOpen': opened === '<?php echo esc_attr($key); ?>'}">
      <button 
        class="trigger"
        id="selleradiseAccordion--trigger-<?php echo esc_attr($key); ?>"
        aria-controls="selleradiseAccordion--description-<?php echo esc_attr($key); ?>"
        x-on:click="opened !== '<?php echo esc_attr($key); ?>' ? opened = '<?php echo esc_attr($key); ?>' : opened = null;"
        x-bind:aria-expanded="opened === '<?php echo esc_attr($key); ?>' ? true : false">
        <h3 class="title">
          <?php echo esc_html( $bellow['title'] ); ?>
        </h3>
        <?php echo selleradise_widgets_svg('material/chevron-down'); ?>
      </button>

      <div 
        class="description"
        x-ref="description<?php echo esc_attr($key); ?>"
        id="selleradiseAccordion--description-<?php echo esc_attr($key); ?>"
        role="region"
        aria-labelledby="selleradiseAccordion--trigger-<?php echo esc_attr($key); ?>"
        x-show="opened === '<?php echo esc_attr($key); ?>'"
        <?php echo selleradise_get_alpine_transition_names(); ?> >

        <?php echo $bellow['description']; ?>
      </div>
    </div>

  <?php endforeach; ?>

</section>