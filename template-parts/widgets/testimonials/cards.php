<?php 

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);

}

if(!function_exists('carbon_get_post_meta')) {
  return '<p><b> Carbon fields not found</b> </p>';
}

$index = 0;

?>

<section class="selleradise_Testimonials--cards">

  <div class="selleradise_Testimonials--cards__title-outer">
    <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
      <h2 class="selleradise_Testimonials--cards__title"><?php echo esc_html($settings['section_title']); ?></h2>
    <?php endif;?>
    

    <div class="selleradise_widgets__slider-buttons">
      <button class="selleradise_widgets__slider-button selleradise_widgets__slider-button--left">
        <?php echo selleradise_widgets_svg('hero/arrow-narrow-left'); ?>
      </button>

      <button class="selleradise_widgets__slider-button selleradise_widgets__slider-button--right">
        <?php echo selleradise_widgets_svg('hero/arrow-narrow-right'); ?>
      </button>
    </div>
  </div>

  <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
    <p class="selleradise_Testimonials--cards__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
  <?php endif;?>

  <div class="selleradise_Testimonials--cards__quotes">

    <?php if ( $testimonials->have_posts() ) : ?>
    
    <div class="swiper-wrapper">
      <?php while ($testimonials->have_posts()) : $testimonials->the_post(); 
          $profile_picture_id = carbon_get_post_meta(get_the_ID(), 'profile_picture' );
          $profile_picture = wp_get_attachment_image_src($profile_picture_id, 'medium');
          $profile_picture_alt = get_post_meta($profile_picture_id, '_wp_attachment_image_alt', true); ?>

        <div class="selleradise_Testimonials--cards__quote swiper-slide">
          <h3><?php echo esc_html(get_the_title()); ?></h3>
          <?php selleradise_widgets_get_template_part('template-parts/widgets/testimonials/rating', null, ["rating" => carbon_get_post_meta( get_the_ID(), 'rating' )]); ?>
          <blockquote><?php echo esc_html(carbon_get_post_meta( get_the_ID(), 'quote' )); ?></blockquote>

            <div class="selleradise_Testimonials--cards__profile">
              <img src="<?php echo esc_url($profile_picture[0] ?? \Elementor\Utils::get_placeholder_image_src()); ?>" alt="<?php echo esc_attr($profile_picture_alt); ?>">

              <div>
                <p><?php echo esc_html(carbon_get_post_meta(get_the_ID(), 'profile_name' )); ?></p>
                <p><?php echo esc_html(carbon_get_post_meta(get_the_ID(), 'profile_title' )); ?></p>
              </div>
            </div>
        </div>

       <?php endwhile; ?>
    </div>

    <?php else: 
      esc_html_e( 'No testimonials found', 'selleradise-widgets' ); 
      endif; wp_reset_postdata(); 
    ?>


  </div>

</section>
