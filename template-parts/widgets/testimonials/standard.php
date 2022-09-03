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
  x-data
  x-embla
  class="px-page"
  <?php if (!selleradise_is_normal_mode()): ?>
    x-init="
      $dispatch('selleradise-widget-initialized', {
        isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
        element: $el,
        widget: 'testimonials',
        variation: 'default',
      })
    "
  <?php endif;?>
  >

  <div class="w-full mb-8 text-center">
    <?php selleradise_widgets_get_template_part('template-parts/section-title', null, ["settings" => $settings]);?>
  </div>



  <div x-embla:main class="embla">
    <?php if ( $testimonials->have_posts() ) : ?>
      
      <ul class="list-none m-0 p-0 embla__container">
        <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>

          <li class="embla__slide flex flex-col justify-center items-center lg:px-72">
            <span class="text-6xl opacity-25">&ldquo;</span>

            <h3 class="text-md mb-4">
              <?php echo esc_html(get_the_title()); ?>
            </h3>
            
            <?php selleradise_widgets_get_template_part('template-parts/widgets/testimonials/partials/rating', null, []); ?>
            
            <blockquote class="m-0 text-xl mt-4 text-center">
              <?php echo wp_kses_post(rwmb_meta('quote')); ?>
            </blockquote>

            <div class="overflow-hidden flex justify-start items-center mt-8 text-sm">
              <div class="w-8 h-8 mr-4 rounded-full overflow-hidden flex-shrink-0">
                <?php selleradise_widgets_get_template_part('template-parts/widgets/testimonials/partials/image', null, []); ?>
              </div>
              <p class="font-semibold"><?php echo esc_html(rwmb_meta('profile_name')); ?></p>
              <span class="px-2 opacity-50">|</span>
              <p><?php echo esc_html(rwmb_meta('profile_title')); ?></p>
            </div>
          </li>

        <?php endwhile; ?>
      </ul>

      

    <?php else: 
      selleradise_widgets_get_template_part('template-parts/empty-state', null, ["title" => __('No testimonials found', 'selleradise-widgets')]);

      endif; wp_reset_postdata(); 
    ?>
  </div>
  
  <div class="flex justify-center items-center mt-8">
    <button x-embla:prev class="selleradise_widgets__slider-button">
      <?php echo selleradise_widgets_svg('hero/arrow-narrow-left'); ?>
    </button>
    <button x-embla:next class="selleradise_widgets__slider-button">
      <?php echo selleradise_widgets_svg('hero/arrow-narrow-right'); ?>
    </button>
  </div>

</section>
