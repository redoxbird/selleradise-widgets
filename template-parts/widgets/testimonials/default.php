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
        
        <?php while ($testimonials->have_posts()) : $testimonials->the_post(); 
          $profile_picture_id = carbon_get_post_meta(get_the_ID(), 'profile_picture' );
          $profile_picture = wp_get_attachment_image_src($profile_picture_id, 'medium');
          $profile_picture_alt = get_post_meta($profile_picture_id, '_wp_attachment_image_alt', true); ?>

        <li class="selleradise_Testimonials--default__profile swiper-slide" data-slide-index="<?php echo esc_attr( $index ); ?>">
          <button>
            <img src="<?php echo esc_url($profile_picture[0] ?? \Elementor\Utils::get_placeholder_image_src()); ?>" alt="">

            <div>
              <p><?php echo esc_html(carbon_get_post_meta(get_the_ID(), 'profile_name' )); ?></p>
              <p><?php echo esc_html(carbon_get_post_meta(get_the_ID(), 'profile_title' )); ?></p>
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
          <?php selleradise_widgets_get_template_part('template-parts/widgets/testimonials/rating', null, ["rating" => carbon_get_post_meta( get_the_ID(), 'rating' )]); ?>
          <blockquote><?php echo esc_html(carbon_get_post_meta( get_the_ID(), 'quote' )); ?></blockquote>
        </div>

       <?php endwhile; ?>
    </div>

    <?php else: 
      esc_html_e( 'No testimonials found', 'selleradise-widgets' ); 
      endif; wp_reset_postdata(); 
    ?>


  </div>

</section>
