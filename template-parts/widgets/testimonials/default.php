<?php 

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);

}

$index = 0;

?>

<section class="selleradise_Testimonials--default">

  <div class="selleradise_Testimonials--default__title-outer">
    <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
      <h2 class="selleradise_Testimonials--default__title"><?php echo esc_html($settings['section_title']); ?></h2>
    <?php endif;?>

    <div class="selleradise_widgets__slider-buttons">
      <button class="selleradise_widgets__slider-button selleradise_widgets__slider-button--left">
        <?php echo selleradise_widgets_svg('unicons-line/arrow-up'); ?>
      </button>

      <button class="selleradise_widgets__slider-button selleradise_widgets__slider-button--right">
        <?php echo selleradise_widgets_svg('unicons-line/arrow-down'); ?>
      </button>
    </div>

    <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
      <p class="selleradise_Testimonials--default__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
    <?php endif;?>
  </div>

  <div class="selleradise_Testimonials--default__profiles-outer">
    <ul class="selleradise_Testimonials--default__profiles">
      <?php if ( $testimonials->have_posts() ) : ?>
      <div class="swiper-wrapper">
        
        <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>

        <li class="selleradise_Testimonials--default__profile swiper-slide" data-slide-index="<?php echo esc_attr( $index ); ?>">
          <button>
            <?php selleradise_widgets_get_template_part('template-parts/widgets/testimonials/partials/image', null, []); ?>

            <div>
              <p><?php echo esc_html(rwmb_meta('profile_name')); ?></p>
              <p><?php echo esc_html(rwmb_meta('profile_title')); ?></p>
            </div>
          </button>
        </li>


        <?php $index++; endwhile; ?>
      </div> 
      <?php endif; wp_reset_postdata(); ?>

    </ul>


  </div>

  <div class="selleradise_Testimonials--default__quotes">

    <?php if ( $testimonials->have_posts() ) : ?>
    
    <div class="swiper-wrapper">
      <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
        <div class="swiper-slide">
          <h3><?php echo esc_html(get_the_title()); ?></h3>
          <?php selleradise_widgets_get_template_part('template-parts/widgets/testimonials/partials/rating', null, []); ?>
          <blockquote><?php echo wp_kses_post(rwmb_meta('quote')); ?></blockquote>
        </div>
       <?php endwhile; ?>
    </div>

    <?php else: 
      selleradise_widgets_get_template_part('template-parts/empty-state', null, ["title" => __('No testimonials found', 'selleradise-widgets')]);

      endif; wp_reset_postdata(); 
    ?>


  </div>

</section>
