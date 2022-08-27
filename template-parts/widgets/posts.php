<?php


if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if ($args) {
    extract($args);
}

$posts = new WP_Query($query_args);

?>

<div 
  class="px-page py-20" 
  x-init="
    $dispatch('selleradise-widget-initialized', { 
      isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
      element: $el
    })
  ">
  <div class="flex justify-between items-center mb-10">
    <div>
      <?php selleradise_widgets_get_template_part('template-parts/section-title', null, ["settings" => $settings]); ?>
    </div>

    <a 
      href="<?php echo esc_url(get_permalink( get_option( 'page_for_posts' ) )); ?>" 
      class="mt-8 selleradise_button--secondary"
      aria-label="<?php echo sprintf(__('See all (%s)', 'selleradise-widgets'), esc_attr($settings['section_title'] ?: 'Products')); ?>">
      <?php _e('See all', 'selleradise-widgets'); ?> 
      <?php echo Selleradise_Widgets_svg('unicons-line/angle-right'); ?>
    </a>
  </div>

  <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
    <?php 
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

