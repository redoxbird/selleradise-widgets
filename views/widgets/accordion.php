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

<section class="selleradise_Accordion">

  <?php if($settings['section_title']): ?>
    <h2 class="selleradise_Accordion__title"><?php echo $settings['section_title']; ?></h2>
  <?php endif; ?>

  <?php foreach($bellows as $key => $bellow): ?>

    <div class="selleradise_Accordion__bellow">
      <button 
        class="selleradise_Accordion__trigger"
        id="selleradise_Accordion__trigger-<?php echo esc_attr($key); ?>"
        aria-controls="selleradise_Accordion__description-<?php echo esc_attr($key); ?>">
        <h3>
          <?php echo esc_html( $bellow['title'] ); ?>
        </h3>
        <span>
          <?php echo selleradise_widgets_svg('material/chevron-down'); ?>
        </span>
      </button>

      <div 
        class="selleradise_Accordion__description"
        id="selleradise_Accordion__description-<?php echo esc_attr($key); ?>"
        role="region"
        aria-labelledby="selleradise_Accordion__trigger-<?php echo esc_attr($key); ?>">
        <?php echo $bellow['description']; ?>
      </div>
    </div>

  <?php endforeach; ?>

</section>