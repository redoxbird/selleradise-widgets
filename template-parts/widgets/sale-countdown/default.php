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
  class="w-full h-auto relative overflow-hidden"
  <?php if (!selleradise_is_normal_mode()): ?>
    x-init="
      $dispatch('selleradise-widget-initialized', { 
        isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
        element: $el
      })
    "
  <?php endif;?>
  
  >

  <img
    class="absolute inset-0 !h-full w-full object-cover"
    <?php echo selleradise_lazy_src($settings['image']['url']); ?>
    alt="<?php echo esc_attr(get_post_meta($settings['image']['id'], '_wp_attachment_image_alt', true)); ?>"
  >

  <div class="selleradise_widgets_sale-countdown-overlay relative flex justify-center items-center flex-col lg:flex-row w-full px-page py-10 text-main-text bg-main-700">
    <div class="w-full text-center lg:text-left lg:w-3/10">
      <?php if (isset($settings['title']) && $settings['title']): ?>
        <h2 class="text-5xl m-0">
          <?php echo esc_html($settings['title']); ?>
        </h2>
      <?php endif;?>

      <?php if (isset($settings['subtitle']) && $settings['subtitle']): ?>
        <p class="text-xl mt-2">
          <?php echo esc_html($settings['subtitle']); ?>
        </p>
      <?php endif;?>
    </div>

    <div class="flex flex-col w-full lg:w-2/5 justify-center items-center mt-10 lg:mt-0">

      <p class="inline-flex text-sm w-auto font-semibold text-center mb-4">
        <span x-show="status === 'started'">
          <?php esc_html_e('Sale Ends In', 'selleradise-widgets')?>
        </span>
        <span x-show="status === 'starting'">
          <?php esc_html_e('Sale Starts In', 'selleradise-widgets')?>
        </span>
        <span x-show="status === 'ended'">
          <?php esc_html_e('Sale Has Ended', 'selleradise-widgets') ?>
        </span>
      </p>
  
      <div x-show="interval" class="w-full flex justify-center items-center gap-8">
        <template x-for="label in ['months', 'days', 'hours', 'minutes', 'seconds']">
          <div x-show="getDurationByLabel(label)" class="flex flex-col justify-start items-center text-center">
            <span class="text-5xl font-semibold" x-text="getDurationByLabel(label)"></span>
            <span class="text-sm" x-text="label"></span>
          </div>
        </template>
      </div>

     
    </div>

    <?php if (isset($settings['cta_text']) && $settings['cta_text']): ?>
      <div class="w-full flex justify-center lg:justify-end items-center lg:w-3/10 mt-10 lg:mt-0">
        <a
          href="<?php echo esc_url($settings['cta_url']['url'] ?? '#'); ?>"
          target="<?php echo esc_attr($settings['cta_url']['is_external'] ? '_blank' : null); ?>"
          class=" selleradise_button--accent"
        >
          <?php echo esc_html($settings['cta_text']); ?>
          <span class="flex justify-center items-center ml-4 h-4 w-auto">
            <?php echo selleradise_widgets_svg('tabler-icons/arrow-right'); ?>
          </span>
        </a>
      </div>
    <?php endif;?>
  </div>
</div>