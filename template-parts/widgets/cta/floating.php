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
  class="w-full px-page lg:pl-80">
  <div class="w-full flex justify-start items-stretch bg-main-900 text-main-text p-10 rounded-2xl">
    <div class="relative w-9/20 overflow-hidden rounded-2xl -ml-64">
      <?php selleradise_widgets_get_template_part('template-parts/widgets/cta/partials/image', null, ["settings" => $settings, "classes" => "absolute inset-0 !w-full !h-full object-cover"]);?>
    </div>

    <div class="flex flex-col justify-center items-start w-1/2 flex-grow py-12 px-28">
      <?php if (isset($settings['title']) && $settings['title']): ?>
        <h2 class="text-5xl font-semibold mb-4 leading-snug"><?php echo esc_html($settings['title']); ?></h2>
      <?php endif;?>

      <?php if (isset($settings['description']) && $settings['description']): ?>
        <p class="text-md opacity-75 mb-12"><?php echo esc_html($settings['description']); ?></p>
      <?php endif;?>

      <a
        class="selleradise_button--accent mt-auto"
        href="<?php echo esc_attr($settings['cta_url']['url'] ?? '#'); ?>"
        target="<?php echo esc_attr(isset($settings['cta_url']['is_external']) && $settings['cta_url']['is_external'] ? '_blank' : null); ?>">
        <span class="mr-4"> <?php echo esc_html($settings['cta_text'] ?: __('Learn More', 'selleradise-widgets')); ?></span>
        <?php echo selleradise_widgets_svg("tabler-icons/arrow-right"); ?>
      </a>
    </div>
  </div>
</section>