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

$categories = [];

?>

<section class="selleradise_Accordion">

  <div class="selleradise_Accordion__head">
      <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
      <p class="selleradise_Accordion__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
    <?php endif;?>

    <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
      <h2 class="selleradise_Accordion__title"><?php echo esc_html($settings['section_title']); ?></h2>
    <?php endif;?>
  </div>


  <div class="selleradise_Accordion__bellows">

    <ul class="selleradise_Accordion__categories">
      <?php foreach ($bellows as $key => $bellow): 
          $slug = sanitize_title( $bellow['category'] );
          if(isset($bellow['category']) && $bellow['category']) {
            if(!in_array($slug, $categories, true)){
                array_push($categories, $slug);
            } else {
              continue;
            }
          } else {
            continue;
          }
        ?>

          <li class="selleradise_Accordion__category" data-selleradise-slug="<?php echo esc_attr( $slug ); ?>">
            <button>
              <?php echo esc_html($bellow['category']); ?>
            </button>
          </li>
      <?php endforeach; ?>
    </ul>


    <?php foreach ($bellows as $key => $bellow): ?>

      <div class="selleradise_Accordion__bellow" data-selleradise-category="<?php echo sanitize_title($bellow['category']); ?>" data-selleradise-index="<?php echo esc_attr( $key ); ?>">
        <button
          class="selleradise_Accordion__trigger"
          id="selleradise_Accordion__trigger-<?php echo esc_attr($key); ?>"
          aria-controls="selleradise_Accordion__description-<?php echo esc_attr($key); ?>">
          <span class="selleradise_Accordion__icon-plus">
            <?php echo selleradise_widgets_svg('unicons-line/plus'); ?>
          </span>
          <span class="selleradise_Accordion__icon-minus">
            <?php echo selleradise_widgets_svg('unicons-line/minus'); ?>
          </span>
          <h3>
            <?php echo esc_html($bellow['title']); ?>
          </h3>
        </button>

        <div
          class="selleradise_Accordion__description"
          id="selleradise_Accordion__description-<?php echo esc_attr($key); ?>"
          role="region"
          aria-labelledby="selleradise_Accordion__trigger-<?php echo esc_attr($key); ?>">
          <?php echo wp_kses_post( $bellow['description'] ); ?>

        </div>
      </div>

    <?php endforeach;?>
  </div>

</section>