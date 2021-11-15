<?php 

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);

}

$index = 0;

?>

<section class="selleradise_Testimonials--standard">

  <div class="selleradise_Testimonials--standard__title-outer">
    <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
      <h2 class="selleradise_Testimonials--standard__title"><?php echo esc_html($settings['section_title']); ?></h2>
    <?php endif;?>

    <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
      <p class="selleradise_Testimonials--standard__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
    <?php endif;?>
  </div>


  <div class="selleradise_Testimonials--standard__quotes">

    <button class="selleradise_widgets__slider-button selleradise_widgets__slider-button--left">
      <?php echo selleradise_widgets_svg('hero/arrow-narrow-left'); ?>
    </button>

    <?php if ( $testimonials->have_posts() ) : ?>
    
    <div class="swiper-wrapper">
      <?php while ($testimonials->have_posts()) : $testimonials->the_post(); ?>

        <div class="swiper-slide">

          <h3><?php echo esc_html(get_the_title()); ?></h3>
          <?php selleradise_widgets_get_template_part('template-parts/widgets/testimonials/partials/rating', null, []); ?>
          <blockquote><?php echo wp_kses_post(rwmb_meta('quote')); ?></blockquote>

          <div class="selleradise_Testimonials--standard__profile">
            <?php selleradise_widgets_get_template_part('template-parts/widgets/testimonials/partials/image', null, []);?>
            <p class="selleradise_Testimonials--standard__profile-name"><?php echo esc_html(rwmb_meta('profile_name')); ?></p>
            <p class="selleradise_Testimonials--standard__profile-title"><?php echo esc_html(rwmb_meta('profile_title')); ?></p>
          </div>
        </div>

       <?php endwhile; ?>
    </div>

    <button class="selleradise_widgets__slider-button selleradise_widgets__slider-button--right">
      <?php echo selleradise_widgets_svg('hero/arrow-narrow-right'); ?>
    </button>

    <?php else: 
      selleradise_widgets_get_template_part('template-parts/empty-state', null, ["title" => __('No testimonials found', 'selleradise-widgets')]);

      endif; wp_reset_postdata(); 
    ?>
  </div>

</section>
