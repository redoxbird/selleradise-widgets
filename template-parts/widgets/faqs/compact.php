<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
  extract($args);
}

$index = 0;

?>

<section 
  class="px-page"
  x-data="faqs"
  x-init="
    $dispatch('selleradise-widget-initialized', { 
      isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
      element: $el,
      widget: 'faqs',
      variation: 'default',
    })
  ">

  <div>
    <?php selleradise_widgets_get_template_part('template-parts/section-title', null, ["settings" => $settings]);?>
  </div>

  <div class="mt-8">
    <?php if ( $faqs->have_posts() ) : ?>

      <?php if(!empty($categories)): ?>
        <ul class="list-none m-0 p-0 flex justify-start items-center gap-4">
          <li>
            <button
              x-on:click="setActive('all')"
              class="selleradise_button--sm"
              x-bind:class="[active === 'all' ? 'selleradise_button--neutral' : 'selleradise_button--secondary' ]">
              <?php echo esc_html_e( 'All', 'selleradise-widgets' ); ?>
            </button>
          </li>
          <?php foreach($categories as $category): $slug = $category->slug; ?>
            <li>
              <button x-on:click="setActive('<?php echo esc_attr($slug); ?>')" class="selleradise_button--sm" x-bind:class="[active === '<?php echo esc_attr($slug); ?>' ? 'selleradise_button--neutral' : 'selleradise_button--secondary' ]">
                <?php echo esc_html($category->name); ?>
              </button>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <ul class="list-none p-0 mt-8 grid md:grid-cols-3 lg:grid-cols-3 gap-8">
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
            class="" 
            x-show="isActive('<?php echo esc_attr(implode(',', $category_slugs)); ?>')"
          >
            <h3 class="text-lg flex justify-start items-center">
              <?php echo esc_html( get_the_title() ); ?>
            </h3>

            <div class="selleradise_prose">
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

    <?php 
      else: 
        selleradise_widgets_get_template_part('template-parts/empty-state', null, ["title" => __('No faqs found', 'selleradise-widgets')]);
      endif; 
      wp_reset_postdata(); 
    ?>
  </div>


</section>