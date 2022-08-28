<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
if ($args) {
    extract($args);
}
if (!$settings) {
    return;
}

if (!isset($settings['cards'])) {
    return;
}

$cards = $settings['cards'];

if (!$cards) {
    return;
}


?>
<div
  x-data
  x-init="
    $dispatch('selleradise-widget-initialized', { 
      isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
      element: $el,
      widget: 'promo-cards',
      variation: 'fancy',
    })
  " 
  class="px-page">

  <ul class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php foreach ($cards as $index => $card):
      $class = ' elementor-repeater-item-' . $card['_id'];
    ?>
      <li
        style="--selleradise-item-index: <?php echo esc_attr($index); ?>">
        <a
          class="relative group rounded-2xl overflow-hidden flex h-full justify-between items-stretch bg-text-50"
          href="<?php echo esc_url($card['link']['url'] ?: '#'); ?>"
          target="<?php echo esc_attr($card['link']['is_external'] ? '_blank' : null); ?>">

         <div
            class="z-20 bg-main-800 h-full w-72 text-main-text flex flex-col justify-center items-start py-10 lg:py-16 px-10 pr-32"
            style="clip-path: polygon(0 0, 60% 0, 100% 100%, 0% 100%);">
            <p class="text-sm mb-4 font-semibold"><?php echo esc_html($card['title']) ?></p>
            <h2 class="text-lg font-semibold border-y-1 border-main-text py-2 mt-2">
              <?php echo esc_html($card['subtitle']) ?>
            </h2>
          </div>

          <div class="absolute z-10 inset-0 overflow-hidden" >
            <?php selleradise_widgets_get_template_part('template-parts/widgets/promo-cards/partials/image', null, ["settings" => $settings, "card" => $card, "classes" => "absolute !h-full w-full inset-0 object-cover group-hover:scale-110 transition-all duration-700 ease-out-expo origin-center"]);?>
          </div>
        </a>
      </li>
    <?php endforeach;?>
  </ul>

</div>