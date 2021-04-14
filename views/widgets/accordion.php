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

<section class="selleradise_Accordion" x-data="{opened: '0'}">

  <?php if($settings['section_title']): ?>
    <div class="selleradise_Accordion__title">
      <h2><?php echo $settings['section_title']; ?></h2>
    </div>
  <?php endif; ?>

  <?php foreach($bellows as $key => $bellow): ?>

    <div class="selleradise_Accordion__bellow" x-bind:class="{'selleradise_Accordion__bellow--open': opened === '<?php echo esc_attr($key); ?>'}">
      <button 
        id="selleradise_Accordion__trigger-<?php echo esc_attr($key); ?>"
        aria-controls="selleradise_Accordion__description-<?php echo esc_attr($key); ?>"
        x-on:click="opened !== '<?php echo esc_attr($key); ?>' ? opened = '<?php echo esc_attr($key); ?>' : opened = null;"
        x-bind:aria-expanded="opened === '<?php echo esc_attr($key); ?>' ? true : false">

        <span>
          <?php echo selleradise_widgets_svg('material/chevron-down'); ?>
        </span>

        <h3>
          <?php echo esc_html( $bellow['title'] ); ?>
        </h3>
      </button>

      <div 
        class="selleradise_Accordion__description"
        x-ref="description<?php echo esc_attr($key); ?>"
        id="selleradise_Accordion__description-<?php echo esc_attr($key); ?>"
        role="region"
        aria-labelledby="selleradise_Accordion__trigger-<?php echo esc_attr($key); ?>"
        x-show="opened === '<?php echo esc_attr($key); ?>'"
        <?php echo selleradise_get_alpine_transition_names(); ?> >

        <?php echo $bellow['description']; ?>
      </div>
    </div>

  <?php endforeach; ?>

</section>