<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
  extract($args);
}

$index = 0;

?>

<section class="selleradise_faq selleradise_faq--<?php echo esc_attr($settings['type']) ?>">

  <div class="selleradise_faq--<?php echo esc_attr($settings['type']) ?>__head">
    <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
      <h2 class="selleradise_faq--<?php echo esc_attr($settings['type']) ?>__section-title"><?php echo esc_html($settings['section_title']); ?></h2>
    <?php endif;?>

    <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
      <p class="selleradise_faq--<?php echo esc_attr($settings['type']) ?>__section-subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
    <?php endif;?>
  </div>

  <div class="selleradise_faq--<?php echo esc_attr($settings['type']) ?>__body">
    <?php if ( $faqs->have_posts() ) : ?>

      <?php if(!empty($categories)): ?>
        <ul class="selleradise_faq__categories selleradise_tablist">
          <li class="selleradise_faq--<?php echo esc_attr($settings['type']) ?>__category" data-selleradise-slug="all">
            <button class="selleradise_tablist__button">
              <?php echo esc_html_e( 'All', 'selleradise-widgets' ); ?>
            </button>
          </li>
          <?php foreach($categories as $category): $slug = $category->slug; ?>
              <li class="selleradise_faq--<?php echo esc_attr($settings['type']) ?>__category" data-selleradise-slug="<?php echo esc_attr($slug); ?>">
                <button class="selleradise_tablist__button">
                  <?php echo esc_html($category->name); ?>
                </button>
              </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>


      <ul class="selleradise_faq--<?php echo esc_attr($settings['type']) ?>__list">
        <?php 
          while ($faqs->have_posts()) : $faqs->the_post();
          
          $categories = get_the_terms(get_the_ID(), 'faq_category');
          $category_slugs = [];

          if(!empty($categories)) {
            foreach($categories as $category) {
              $category_slugs[] = $category->slug;
            }
          }
          
          ?>
        
          <li 
              class="selleradise_faq__item selleradise_faq--<?php echo esc_attr($settings['type']) ?>__item" 
              data-selleradise-category="<?php echo esc_attr(implode(',', $category_slugs)); ?>">
            <h3 class="selleradise_faq--<?php echo esc_attr($settings['type']) ?>__title">
              <?php echo esc_html( get_the_title() ); ?>
            </h3>

            <div class="selleradise_faq--<?php echo esc_attr($settings['type']) ?>__content">
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
          </li>

        <?php $index++; endwhile; ?>
      </ul>

    <?php else: 

        selleradise_widgets_get_template_part('template-parts/empty-state', null, ["title" => __('No faqs found', 'selleradise-widgets')]);

    endif; wp_reset_postdata(); ?>
  </div>


</section>