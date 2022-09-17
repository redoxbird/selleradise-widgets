<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

?>

<section
  x-data
  <?php if (!selleradise_is_normal_mode()): ?>
    x-init="
      $dispatch('selleradise-widget-initialized', {
          isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
          element: $el
        })
    "
  <?php endif;?>

  class="relative w-full px-page py-16 lg:py-24 bg-gray-100 z-10">

  <div class="w-full flex justify-start items-center flex-col lg:flex-row">

    <div class="relative z-20 w-full lg:w-3/10 lg:pr-10 text-center lg:text-left">
      <?php if (isset($settings['title']) && $settings['title']): ?>
        <h2 class="lg:text-5xl font-semibold m-0 mb-4 leading-snug">
          <?php echo esc_html($settings['title']); ?>
        </h2>
      <?php endif;?>

      <?php if (isset($settings['description']) && $settings['description']): ?>
        <p class="text-md opacity-75">
          <?php echo esc_html($settings['description']); ?>
        </p>
      <?php endif;?>
    </div>

    <div class="relative z-20 w-full lg:w-2/5 h-88 overflow-hidden rounded-2xl my-10 lg:my-0">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/cta/partials/image', null, ["settings" => $settings, "classes" => "absolute inset-0 !w-full !h-full object-cover"]);?>
    </div>

    <div class="relative flex flex-col justify-center items-center w-full lg:w-3/10 flex-grow bg-gray-100 lg:py-20">
      <span class="hidden lg:inline-block w-2 h-2 bg-main-900 rounded-full absolute left-1/2 -translate-x-[0.3rem] top-0"></span>
      <span class="hidden lg:inline-block w-2 h-2 bg-main-900 rounded-full absolute left-1/2 -translate-x-[0.3rem] bottom-0"></span>
      <div class="hidden lg:block absolute -z-[1] top-1/2 right-1/2 -translate-y-1/2 w-144 h-112 bg-transparent border-2 border-solid border-main-900 rounded-2xl"></div>

      <a
        class="selleradise_button--primary"
        href="<?php echo esc_attr($settings['cta_url']['url'] ?? '#'); ?>"
        target="<?php echo esc_attr(isset($settings['cta_url']['is_external']) && $settings['cta_url']['is_external'] ? '_blank' : null); ?>">
        <span class="mr-4">
          <?php echo esc_html($settings['cta_text'] ?: __('Learn More', 'selleradise-widgets')); ?>
        </span>
        <?php echo selleradise_widgets_svg("tabler-icons/arrow-right"); ?>
      </a>
    </div>
  </div>
</section>
