<?php 
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

$index = 0;

?>

<section 
  class="px-page w-full"
  x-data="infiniteScroll({
    total: <?php echo esc_attr(empty($testimonials->posts) ? 0 : count($testimonials->posts)); ?>,
    pageSize: 4
  })"
  x-init="
    $dispatch('selleradise-widget-initialized', { 
      isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
      element: $el,
      widget: 'testimonials',
      variation: 'cards',
    })
  ">

  <div>
    <?php selleradise_widgets_get_template_part('template-parts/section-title', null, ["settings" => $settings]);?>
  </div>

  <?php if ( $testimonials->have_posts() ) : ?>

  <ul class="grid lg:grid-cols-4 gap-8 mt-8">
    <?php while ($testimonials->have_posts()) : $testimonials->the_post(); 
      $profile_pictures = rwmb_meta('profile_picture', array( 'limit' => 1 ));
      $profile_picture = reset( $profile_pictures ); 
    ?>

    <li 
      class="p-6 rounded-2xl border-1 border-text-100 flex flex-col justify-start items-start"
      x-show="visible > <?php echo esc_attr( $index ); ?>"
      x-transition>
        <h3 class="mb-2 text-md">
          <?php echo esc_html(get_the_title()); ?>
        </h3>
        
        <?php selleradise_widgets_get_template_part('template-parts/widgets/testimonials/partials/rating', null, []); ?>
        
        <blockquote class="mt-4 text-sm">
          <?php echo wp_kses_post(rwmb_meta('quote')); ?>
        </blockquote>
        
        <div class="pt-6 flex justify-start items-center mt-auto">
          <img 
            class="w-12 h-12 !rounded-full overflow-hidden object-cover mr-4"
            src="<?php echo esc_url($profile_picture ? $profile_picture['url'] : \Elementor\Utils::get_placeholder_image_src()); ?>" 
            alt="<?php echo esc_attr($profile_picture['alt']); ?>"
          >

          <div>
            <p class="text-sm font-semibold"><?php echo esc_html(rwmb_meta('profile_name')); ?></p>
            <p class="text-sm opacity-75"><?php echo esc_html(rwmb_meta('profile_title')); ?></p>
          </div>
        </div>
    </li>

    <?php $index++; endwhile; ?>

    <li x-show="!exhausted()" class="w-full col-span-full flex justify-center items-center mt-10">
      <button x-on:click.prevent="more()" class="selleradise_button--secondary selleradise_button--sm">
        <span class="mr-1"><?php esc_html_e( "Load More", "selleradise-widgets" ); ?></span>
        <span class="w-4 h-4 flex justify-center items-center"><?php echo selleradise_widgets_svg('tabler-icons/chevron-down'); ?></span>
      </button>
    </li>

  </ul>

  <?php 
    else: 
      selleradise_widgets_get_template_part('template-parts/empty-state', null, ["title" => __('No testimonials found', 'selleradise-widgets')]);
    endif; 
      wp_reset_postdata(); 
  ?>
</section>