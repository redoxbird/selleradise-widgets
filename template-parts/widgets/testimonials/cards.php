<?php 

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);

}

$index = 0;

?>

<section class="py-10 px-page">

  <div class="flex justify-between items-center">
    <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
      <h2 class="m-0 grow">
        <?php echo esc_html($settings['section_title']); ?>
      </h2>
    <?php endif;?>

    <?php if ( $testimonials->have_posts() ) : ?>
      <div class="selleradise_widgets__slider-buttons">
        <button class="selleradise_widgets__slider-button selleradise_widgets__slider-button--left">
          <?php echo selleradise_widgets_svg('hero/arrow-narrow-left'); ?>
        </button>

        <button class="selleradise_widgets__slider-button selleradise_widgets__slider-button--right">
          <?php echo selleradise_widgets_svg('hero/arrow-narrow-right'); ?>
        </button>
      </div>
    <?php endif;?>
  </div>

  <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
    <p class="mt-2 text-h5 text-text-700">
      <?php echo esc_html($settings['section_subtitle']); ?>
    </p>
  <?php endif;?>

  <div class="selleradise_Testimonials--cards__quotes">

    <?php if ( $testimonials->have_posts() ) : ?>
    
    <div class="swiper-wrapper">

      <?php while ($testimonials->have_posts()) : $testimonials->the_post(); 
          $profile_pictures = rwmb_meta('profile_picture', array( 'limit' => 1 ));
          $profile_picture = reset( $profile_pictures ); 
      ?>

        <div class="p-8 swiper-slide bg-body-900 border-1 border-solid border-text-100 rounded-2xl">
          <h3 class="text-h5 m-0 mb-2">
            <?php echo esc_html(get_the_title()); ?>
          </h3>

          <?php selleradise_widgets_get_template_part('template-parts/widgets/testimonials/partials/rating', null, []); ?>
          
          <blockquote class="m-0 mt-4 text-text-700">
            <?php echo wp_kses_post(rwmb_meta('quote')); ?>
          </blockquote>

          <div class="flex justify-start items-center w-full bg-transparent pt-4 mt-auto">
            <img 
              class="w-12 h-12 rounded-full object-cover"
              src="<?php echo esc_url($profile_picture ? $profile_picture['url'] : \Elementor\Utils::get_placeholder_image_src()); ?>" 
              alt="<?php echo esc_attr($profile_picture['alt']); ?>"
            >

            <div class="pl-4 flex flex-col">
              <p class="text-sm font-semibold m-0 text-text-900">
                <?php echo esc_html(rwmb_meta('profile_name')); ?>
              </p>
              <p class="text-xs font-medium m-0 mt-0.5 text-text-700">
                <?php echo esc_html(rwmb_meta('profile_title')); ?>
              </p>
            </div>
          </div>
        </div>

       <?php endwhile; ?>
    </div>

    <?php else: 
      selleradise_widgets_get_template_part('template-parts/empty-state', null, ["title" => __('No testimonials found', 'selleradise-widgets')]);

      endif; wp_reset_postdata(); 
    ?>


  </div>

</section>
