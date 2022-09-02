<?php


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if ($args) {
    extract($args);
}


?>

<div 
  class="px-page" 
  x-init="
    $dispatch('selleradise-widget-initialized', { 
      isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
      element: $el,
      widget: 'posts',
      variation: 'default',
    })
  ">
  <div class="flex justify-between items-center mb-10">
    <div>
      <?php selleradise_widgets_get_template_part('template-parts/section-title', null, ["settings" => $settings]); ?>
    </div>

    <a 
      href="<?php echo esc_url(get_permalink( get_option( 'page_for_posts' ) )); ?>" 
      class="selleradise_button--secondary selleradise_button--sm"
      aria-label="<?php echo sprintf(__('See all (%s)', 'selleradise-widgets'), esc_attr($settings['section_title'] ?: 'Products')); ?>">
      <?php _e('See all', 'selleradise-widgets'); ?> 
      <?php echo selleradise_widgets_svg('tabler-icons/chevron-right'); ?>
    </a>
  </div>

  <div class="grid gap-8 items-start <?php echo function_exists("selleradise_posts_classes") ? esc_attr(selleradise_posts_classes($settings['card_type'], true)) : null ?>">
    <?php 
      $posts = new WP_Query($query_args);

      if ( $posts->have_posts() ) : while ($posts->have_posts()): $posts->the_post();
          get_template_part('template-parts/post/card', $settings['card_type'] ?: 'default' . get_post_format());
        
        endwhile;

      else:
        selleradise_widgets_get_template_part('template-parts/empty-state', null, ["title" => __('No posts found', 'selleradise-widgets')]);
      endif;

      wp_reset_postdata();
    ?>  
  </div>
</div>

