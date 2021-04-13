<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if ($args) {
    extract($args);
}

if(!isset($rating)) {
  return;
} 

if($rating <= 0) {
  return;
}

?>

<div class="selleradise_Testimonials--default__rating">
    <div class="back-stars">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <?php echo selleradise_widgets_svg('material/star'); ?>
        <?php endfor;?>

        <div class="front-stars" style="width: <?php echo ($rating / 5) * 100; ?>%;">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <?php echo selleradise_widgets_svg('material/star'); ?>
            <?php endfor;?>
        </div>
    </div>
</div>