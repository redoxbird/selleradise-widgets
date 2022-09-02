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
      variation: 'fancy-alt',
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
          class="relative group rounded-2xl overflow-hidden flex h-full justify-end items-stretch bg-text-100"
          href="<?php echo esc_url($card['link']['url'] ?: '#'); ?>"
          target="<?php echo esc_attr($card['link']['is_external'] ? '_blank' : null); ?>">

          <?php selleradise_widgets_get_template_part('template-parts/widgets/promo-cards/partials/image', null, ["settings" => $settings, "card" => $card, "classes" => "left-4 z-20 top-1/2 -translate-y-1/2 absolute !w-auto !max-w-[50%] !h-auto group-hover:scale-105 duration-700 ease-out-expo origin-center"]);?>

          <div
            class="flex flex-col justify-center items-start pr-10 pl-48 lg:pl-56 py-6 lg:py-20 w-11/12 bg-main-900 text-main-text"
            style="clip-path: polygon(30% 0, 100% 0, 100% 100%, 0% 100%);">
            <p class="m-0 text-md mb-4 font-medium"><?php echo esc_html($card['title']) ?></p>
            <h2 class="m-0 text-lg font-semibold border-0 border-t-1 border-b-1 border-solid border-main-text py-2">
              <?php echo esc_html($card['subtitle']) ?>
            </h2>
          </div>

        </a>
      </li>
    <?php endforeach;?>
  </ul>

</div>