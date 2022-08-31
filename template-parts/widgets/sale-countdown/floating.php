<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (isset($args)) {
    extract($args);
}

if (!isset($settings)) {
    return;
}

$attributes = [];
$attributes['title'] = $settings['title'];

?>

<div 
  x-data="saleTimer({
    saleFrom: '<?php echo esc_attr($settings['start_date']) ?>',
    saleTo: '<?php echo esc_attr($settings['end_date']) ?>'
  })" 
  class="w-full px-page lg:pl-80"
  <?php if(!selleradise_is_normal_mode()): ?>
    x-init="
      $dispatch('selleradise-widget-initialized', { 
        isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
        element: $el,
        widget: 'sale-countdown',
        variation: 'floating',
      })
    "
  <?php endif; ?>
  >

  <div class="w-full flex justify-start items-stretch flex-col lg:flex-row bg-main-900 text-main-text p-4 lg:p-10 rounded-2xl">
    <div class="relative w-full lg:w-9/20 h-96 lg:h-112 overflow-hidden rounded-2xl -mt-20 lg:mt-0 lg:-ml-64">
      <img
        class="w-full !h-full object-cover !rounded-2xl"
        <?php echo selleradise_lazy_src($settings['image']['url']); ?>
        alt="<?php echo esc_attr(get_post_meta($settings['image']['id'], '_wp_attachment_image_alt', true)); ?>"
      >
    </div>

    <div class="selleradise_widgets_sale-countdown-overlay flex flex-col justify-center items-center lg:items-start w-full lg:w-1/2 flex-grow py-6 lg:pl-28 lg:pr-page">
      <div class="w-full text-center lg:text-left">
        <?php if (isset($settings['title']) && $settings['title']): ?>
          <p class="text-xl m-0">
            <?php echo esc_html($settings['title']); ?>
          </p>
        <?php endif;?>

        <?php if (isset($settings['subtitle']) && $settings['subtitle']): ?>
          <h2 class="text-3xl lg:text-5xl mt-2 lg:leading-snug">
            <?php echo esc_html($settings['subtitle']); ?>
          </h2>
        <?php endif;?>
      </div>

      <div class="w-full mt-10 flex flex-col lg:flex-row justify-between items-center">
        <div class="flex flex-col flex-grow justify-start items-center lg:items-start">
          <p x-show="status === 'started'" class="text-sm font-medium mb-2">
            <?php esc_html_e('Sale Ends In', 'selleradise-widgets') ?>
          </p>
          <p x-show="status === 'starting'" class="text-sm font-medium mb-2">
            <?php esc_html_e('Sale Starts In', 'selleradise-widgets') ?>
          </p>
          <p x-show="status === 'ended'" class="text-sm font-medium mb-2">
            <?php esc_html_e('Sale Has Ended', 'selleradise-widgets') ?>
          </p>

          <div x-show="interval" class="w-full flex justify-start items-start gap-8">
            <template x-for="label in ['months', 'days', 'hours', 'minutes', 'seconds']">
              <div x-show="getDurationByLabel(label)" class="flex flex-col justify-start items-center text-center">
                <span class="text-5xl font-semibold" x-text="getDurationByLabel(label)"></span>
                <span class="text-sm" x-text="label"></span>
              </div>
            </template>
          </div>
        </div>

        <?php if (isset($settings['cta_text']) && $settings['cta_text']): ?>
          <a
            href="<?php echo esc_url($settings['cta_url']['url'] ?? '#'); ?>"
            target="<?php echo esc_attr($settings['cta_url']['is_external'] ? '_blank' : null); ?>"
            class="selleradise_button--accent px-8 whitespace-nowrap mt-10 lg:mt-0"
          >
            <?php echo esc_html($settings['cta_text']); ?>
            <span class="flex justify-center items-center ml-4 h-4 w-auto">
              <?php echo selleradise_widgets_svg('tabler-icons/arrow-right'); ?>
            </span>
          </a>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>