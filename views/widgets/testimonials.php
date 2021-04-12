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
  <h2 class="selleradise_Testimonials--default__title"><?php echo esc_html($settings['section_title']); ?></h2>

  <ul class="selleradise_Testimonials--default__profiles">

    <?php foreach($testimonies as $index => $testimony): ?>

      <li data-slide-index="<?php echo esc_attr( $index ); ?>">
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

  <div class="selleradise_Testimonials--default__quotes">
    <div class="swiper-wrapper">
      <?php foreach ($testimonies as $index => $testimony): ?>

        <div class="swiper-slide">
          <h3><?php echo esc_html($testimony['title']); ?></h3>

          <blockquote><?php echo esc_html($testimony['quote']); ?></blockquote>

        </div>
      <?php endforeach;?>
    </div>
  </div>

</section>
