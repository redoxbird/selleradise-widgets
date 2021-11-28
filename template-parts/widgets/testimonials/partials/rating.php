<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if ($args) {
    extract($args);
}

$rating =  rwmb_meta('rating');

if(!isset($rating)) {
  return;
} 

if($rating <= 0) {
  return;
}

?>

<div class="selleradise_Testimonials__rating selleradise_productRating--normal">
    <div class="back-stars">
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <?php echo selleradise_widgets_svg('unicons-solid/star'); ?>
        <?php endfor;?>

        <div class="front-stars" style="width: <?php echo esc_attr( ($rating / 5) * 100 ) ?>%;">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <?php echo selleradise_widgets_svg('unicons-solid/star'); ?>
            <?php endfor;?>
        </div>
    </div>
</div>