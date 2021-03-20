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

  <?php foreach($bellows as $key => $bellow): ?>
    <div class="selleradiseAccordion--bellow">
      <button class="selleradiseAccordion--trigger" x-on:click="opened = '<?php echo esc_attr($key); ?>'">
        <h2 class="selleradiseAccordion--title">
          <?php echo esc_html( $bellow['title'] ); ?>
        </h2>
      </button>

      <div 
        class="selleradiseAccordion--description"
        x-show="opened === '<?php echo esc_attr($key); ?>'" 
      >
        <?php echo $bellow['description']; ?>
      </div>
    </div>
  <?php endforeach; ?>

</section>