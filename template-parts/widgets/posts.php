<?php


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if ($args) {
    extract($args);
}

?>

<div class="selleradise_widget--posts">
  <div class="selleradise_widget--posts__head">
    <div>
      <?php if (isset($settings['section_title']) && $settings['section_title']): ?>
        <h2 class="selleradise_widget--posts__title"><?php echo esc_html($settings['section_title']); ?></h2>
      <?php endif;?>

      <?php if (isset($settings['section_subtitle']) && $settings['section_subtitle']): ?>
        <p class="selleradise_widget--posts__subtitle"><?php echo esc_html($settings['section_subtitle']); ?></p>
      <?php endif;?>
    </div>

    <div class="selleradise_widget--posts__slider-buttons">
      <button class="selleradise_widget--posts__slider-button selleradise_widget--posts__slider-button--left">
        <?php echo selleradise_widgets_svg('hero/arrow-narrow-left'); ?>
      </button>

      <button class="selleradise_widget--posts__slider-button selleradise_widget--posts__slider-button--right">
        <?php echo selleradise_widgets_svg('hero/arrow-narrow-right'); ?>
      </button>
    </div>

  </div>
  <div class="selleradise_widget--posts__slider swiper-container">
    <div class="swiper-wrapper">
      <?php 
        if ( $posts->have_posts() ) :

        while ($posts->have_posts()): $posts->the_post();

            get_template_part('template-parts/post/card', $settings['card_type'] ?: 'default' . get_post_format(), ["classes" => 'swiper-slide']);

        endwhile;

        else:

          selleradise_widgets_get_template_part('template-parts/empty-state', null, ["title" => __('No posts found', 'selleradise-widgets')]);

        endif;

        wp_reset_postdata();
      ?>  
    </div>
  </div>
</div>

