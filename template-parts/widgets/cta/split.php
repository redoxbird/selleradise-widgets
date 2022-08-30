<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

?>

<section
  x-init="
    $dispatch('selleradise-widget-initialized', {
        isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
        element: $el
      })
    "
  class="flex justify-center items-start lg:items-stretch flex-wrap lg:flex-nowrap w-full px-page gap-10">
  
  <div class="relative w-full h-96 lg:h-auto lg:w-1/2 overflow-hidden rounded-2xl">
    <?php selleradise_widgets_get_template_part('template-parts/widgets/cta/partials/image', null, ["settings" => $settings, "classes" => "absolute inset-0 !w-full !h-full object-cover"]);?>
  </div>
  
  <div class="w-full lg:w-1/2 flex flex-col justify-start items-start bg-main-900 text-main-text p-20 rounded-2xl">
    <?php if (isset($settings['title']) && $settings['title']): ?>
      <h2 class="text-5xl font-semibold mb-4 leading-snug">
        <?php echo esc_html($settings['title']); ?>
      </h2>
    <?php endif;?>

    <?php if (isset($settings['description']) && $settings['description']): ?>
      <p class="text-md mb-12">
        <?php echo esc_html($settings['description']); ?>
      </p>
    <?php endif;?>

    <a
      class="selleradise_button--accent mt-auto"
      href="<?php echo esc_attr($settings['cta_url']['url'] ?? '#'); ?>"
      target="<?php echo esc_attr(isset($settings['cta_url']['is_external']) && $settings['cta_url']['is_external'] ? '_blank' : null); ?>">
      <span class="mr-4"> <?php echo esc_html($settings['cta_text'] ?: __('Learn More', 'selleradise-widgets')); ?></span>
      <?php echo selleradise_widgets_svg("tabler-icons/arrow-right"); ?>
    </a>
  </div>
</section>
