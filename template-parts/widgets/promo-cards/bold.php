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
      variation: 'bold',
    })
  "
  class="px-page">

  <ul class="list-none m-0 p-0 grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php foreach ($cards as $index => $card):
      $class = ' elementor-repeater-item-' . $card['_id'];
    ?>
      <li
        style="--selleradise-item-index: <?php echo esc_attr($index); ?>">
        <a
          class="relative group rounded-2xl overflow-hidden transition-all flex flex-col h-full justify-between items-start"
          href="<?php echo esc_url($card['link']['url'] ?: '#'); ?>"
          target="<?php echo esc_attr($card['link']['is_external'] ? '_blank' : null); ?>">
       
          <div class="relative w-full h-72 z-20 overflow-hidden rounded-b-[100%7rem]">
            <?php selleradise_widgets_get_template_part('template-parts/widgets/promo-cards/partials/image', null, ["settings" => $settings, "card" => $card, "classes" => "absolute !h-full w-full inset-0 object-cover group-hover:scale-110 transition-all duration-700 ease-out-expo origin-center"]);?>
          </div>

          <div
            class="relative z-10 bg-main-800 h-auto w-full text-main-text flex flex-col justify-center items-center px-16 pb-8 pt-24 text-center -mt-14">
            <p class="m-0 text-sm mb-4 font-semibold text-center"><?php echo esc_html($card['title']) ?></p>
            <h2 class="m-0 text-lg font-semibold border-main-text mt-2 text-center">
              <?php echo esc_html($card['subtitle']) ?>
            </h2>
          </div>

        </a>
      </li>
    <?php endforeach;?>
  </ul>

</div>