<?php 

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);

}

$testimonies = $settings['testimonies'];

if (!$testimonies) {
    return;
}


?>

<section class="selleradise_Testimonials--default">

  <div class="selleradise_Testimonials--default__profiles-outer">
     <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
      <p class="selleradise_Testimonials--default__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
    <?php endif;?>

    <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
      <h2 class="selleradise_Testimonials--default__title"><?php echo esc_html($settings['section_title']); ?></h2>
    <?php endif;?>

    <ul class="selleradise_Testimonials--default__profiles">

      <li class="selleradise_Testimonials--default__highlighter"></li>

      <?php foreach($testimonies as $index => $testimony): ?>
        <li class="selleradise_Testimonials--default__profile" data-slide-index="<?php echo esc_attr( $index ); ?>">
          <button>
            <img src="<?php echo esc_url($testimony['profile_picture']['url']); ?>" alt="">

            <div>
              <p><?php echo esc_html($testimony['profile_name']); ?></p>
              <p><?php echo esc_html($testimony['profile_info']); ?></p>
            </div>
          </button>
        </li>
      <?php endforeach; ?>
    </ul>

  </div>

  <div class="selleradise_Testimonials--default__quotes">
    <div class="swiper-wrapper">
      <?php foreach ($testimonies as $index => $testimony): ?>

        <div class="swiper-slide">
          <h3><?php echo esc_html($testimony['title']); ?></h3>
          <?php selleradise_widgets_get_template_part('template-parts/widgets/testimonials/rating', null, ["rating" => $testimony['rating']]); ?>
          <blockquote><?php echo esc_html($testimony['quote']); ?></blockquote>
        </div>

      <?php endforeach;?>
    </div>
  </div>

</section>
