<?php 

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);

}



?>

<section
  x-data
  x-embla-tabs
  class="flex justify-start flex-wrap items-stretch px-page"
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
  <div class="w-full mb-8">
    <?php selleradise_widgets_get_template_part('template-parts/section-title', null, ["settings" => $settings]);?>
  </div>

  <div
    x-embla-tabs:thumbs
    class="w-full overflow-hidden lg:hidden">
    <ul class="w-full flex gap-4">
      <?php if ( $testimonials->have_posts() ) : $index = 0; ?>
        <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
          <li class="w-full flex justify-start items-center">
            <button
              x-embla-tabs:thumb
              data-index="<?php echo esc_attr( $index ); ?>"
              x-bind:class="{'bg-text-50': isInView(<?php echo esc_attr($index); ?>) }"
              class="w-full rounded-xl overflow-hidden flex justify-start items-center transition-all hover:bg-text-25">
              <div class="w-16 h-16 mr-4 rounded-xl overflow-hidden flex-shrink-0">
                <?php selleradise_widgets_get_template_part('template-parts/widgets/testimonials/partials/image', null, []); ?>
              </div>

              <div class="flex flex-col justify-start items-start text-sm whitespace-nowrap pr-4">
                <p class="font-semibold"><?php echo esc_html(rwmb_meta('profile_name')); ?></p>
                <p><?php echo esc_html(rwmb_meta('profile_title')); ?></p>
              </div>
            </button>
          </li>
        <?php $index++; endwhile; ?>
      <?php endif; wp_reset_postdata(); ?>
    </ul>
  </div>

  <div
    x-embla-tabs:thumbs.axis.y
    class="hidden lg:block w-1/4 p-6 border-1 border-text-100 rounded-2xl max-h-96 overflow-y-scroll selleradise-hide-scrollbar">
    <ul class="w-full flex flex-col gap-4">
      <?php if ( $testimonials->have_posts() ) : $index = 0; ?>
        <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
          <li class="flex justify-start items-center">
            <button
              x-embla-tabs:thumb
              data-index="<?php echo esc_attr( $index ); ?>"
              x-bind:class="{'bg-text-50': isInView(<?php echo esc_attr($index); ?>) }"
              class="w-full rounded-xl overflow-hidden flex justify-start items-center transition-all hover:bg-text-25">
              <div class="w-16 h-16 mr-4 rounded-xl overflow-hidden">
                <?php selleradise_widgets_get_template_part('template-parts/widgets/testimonials/partials/image', null, []); ?>
              </div>

              <div class="flex flex-col justify-start items-start text-sm">
                <p class="font-semibold"><?php echo esc_html(rwmb_meta('profile_name')); ?></p>
                <p><?php echo esc_html(rwmb_meta('profile_title')); ?></p>
              </div>
            </button>
          </li>
        <?php $index++; endwhile; ?>
      <?php endif; wp_reset_postdata(); ?>
    </ul>
  </div>

  <div
    x-embla-tabs:panels.axis.y
    class="overflow-hidden selleradise-hide-scrollbar max-h-96 lg:max-h-96 pt-8 lg:pt-0 lg:pl-20 w-full lg:w-3/4">
    <?php if ( $testimonials->have_posts() ) : $index = 0; ?>
    
    <ul class="w-full h-full flex flex-col gap-4">
      <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
        <li class="w-full h-full flex-grow flex-shrink-0">
          <span class="text-6xl opacity-25">&ldquo;</span>
          <h3 class="text-3xl mb-4"><?php echo esc_html(get_the_title()); ?></h3>
          <?php selleradise_widgets_get_template_part('template-parts/widgets/testimonials/partials/rating', null, []); ?>
          <blockquote class="mt-4"><?php echo wp_kses_post(rwmb_meta('quote')); ?></blockquote>
        </li>
      <?php endwhile; ?>
    </ul>

    <?php else: 
      selleradise_widgets_get_template_part('template-parts/empty-state', null, ["title" => __('No testimonials found', 'selleradise-widgets')]);

      endif; wp_reset_postdata(); 
    ?>
  </div>

</section>
