<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
  extract($args);
}

$index = 0;

?>

<section class="selleradise_faq">

  <div class="selleradise_faq__head">
      <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
      <h2 class="selleradise_faq__section-title"><?php echo esc_html($settings['section_title']); ?></h2>
    <?php endif;?>

    <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
      <p class="selleradise_faq__section-subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
    <?php endif;?>
  </div>

  <div class="selleradise_faq__body">

    <?php if(!empty($categories)): ?>
      <ul class="selleradise_faq__categories">
        <li class="selleradise_faq__category" data-selleradise-slug="all">
          <button>
            <?php echo esc_html_e( 'All', 'selleradise-widgets' ); ?>
          </button>
        </li>
        <?php foreach($categories as $category): 
            $slug = $category->slug; ?>
            <li class="selleradise_faq__category" data-selleradise-slug="<?php echo esc_attr($slug); ?>">
              <button>
                <?php echo esc_html($category->name); ?>
              </button>
            </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <?php if ( $faqs->have_posts() ) : ?>

      <ul class="selleradise_faq__list">
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
        
          <li class="selleradise_faq__item" data-selleradise-category="<?php echo esc_attr(implode(',', $category_slugs)); ?>">
            <h3 class="selleradise_faq__title">
              <?php echo esc_html( get_the_title() ); ?>
            </h3>

            <div class="selleradise_faq__content">
              <?php
                the_content(
                    sprintf(
                        wp_kses(
                            /* translators: %s: Name of current post. */
                            __('Continue reading %s <span class="meta-nav">&rarr;</span>', 'selleradise'),
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

    <?php else: ?>
      <div class="selleradise_faq__empty">
        <p><?php esc_html_e( "Could not find any FAQs.", 'selleradise-widgets' ); ?></p>
      </div>
    <?php endif; wp_reset_postdata(); ?>
  </div>


</section>