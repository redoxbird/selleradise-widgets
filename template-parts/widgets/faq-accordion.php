<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
  extract($args);
}

$index = 0;

?>

<section class="selleradise_Accordion">

  <div class="selleradise_Accordion__head">
    <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
      <h2 class="selleradise_Accordion__title"><?php echo esc_html($settings['section_title']); ?></h2>
    <?php endif;?>

    <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
      <p class="selleradise_Accordion__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
    <?php endif;?>
  </div>

  <div class="selleradise_Accordion__bellows">
    <?php if(!empty($categories)): ?>
      <ul class="selleradise_Accordion__categories">
        <?php foreach($categories as $category): $slug = $category->slug; ?>
            <li class="selleradise_Accordion__category" data-selleradise-slug="<?php echo esc_attr( $slug ); ?>">
              <button>
                <?php echo esc_html($category->name); ?>
              </button>
            </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>


    <?php if ( $faqs->have_posts() ) : while ($faqs->have_posts()) : $faqs->the_post();
          
      $categories = get_the_terms(get_the_ID(), 'faq_category');
      $category_slugs = [];

      if(!empty($categories)) {
        foreach($categories as $category) {
          $category_slugs[] = $category->slug;
        }
      }; ?>

      <div class="selleradise_Accordion__bellow" 
          data-selleradise-category="<?php echo esc_attr(implode(',', $category_slugs)); ?>"
          data-selleradise-index="<?php echo esc_attr( $index ); ?>">

        <button
          class="selleradise_Accordion__trigger"
          id="selleradise_Accordion__trigger-<?php echo esc_attr($index); ?>"
          aria-controls="selleradise_Accordion__description-<?php echo esc_attr($index); ?>">
          <span class="selleradise_Accordion__icon-plus">
            <?php echo selleradise_widgets_svg('unicons-line/plus'); ?>
          </span>
          <span class="selleradise_Accordion__icon-minus">
            <?php echo selleradise_widgets_svg('unicons-line/minus'); ?>
          </span>
          <h3>
            <?php echo esc_html( get_the_title() ); ?>
          </h3>
        </button>

        <div
          class="selleradise_Accordion__description"
          id="selleradise_Accordion__description-<?php echo esc_attr($index); ?>"
          role="region"
          aria-labelledby="selleradise_Accordion__trigger-<?php echo esc_attr($index); ?>">
          
          <?php
            the_content(
                sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. */
                        __('Continue reading %s <span class="meta-nav">&rarr;</span>', 'selleradise-widgets'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    the_title('<span class="screen-reader-text">"', '"</span>', false)
                )
            );
          ?>

        </div>

      </div>
    <?php $index++; endwhile; ?>


    <?php else: ?>
      <div class="selleradise_faq__empty">
        <p><?php esc_html_e( "Could not find any FAQs.", 'selleradise-widgets' ); ?></p>
      </div>
    <?php endif; wp_reset_postdata(); ?>
  </div>

</section>