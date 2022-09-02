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
      variation: 'brochure',
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
          class="relative group rounded-2xl overflow-hidden flex h-full justify-between items-stretch bg-main-900 text-main-text pl-16 pb-16"
          href="<?php echo esc_url($card['link']['url'] ?: '#'); ?>"
          target="<?php echo esc_attr($card['link']['is_external'] ? '_blank' : null); ?>">

          <h2 class="m-0 absolute left-4 top-6 text-lg font-semibold" style="writing-mode: vertical-rl; text-orientation: mixed;">
            <?php echo esc_html($card['subtitle']) ?>
          </h2>

          <span class="flex justify-center items-center absolute left-4 bottom-4 w-8 h-auto text-accent-900">
            <?php echo selleradise_widgets_svg("tabler-icons/arrow-up-right-circle"); ?>
          </span>

          <p class="m-0 absolute right-6 bottom-2 text-sm mb-4 font-semibold"><?php echo esc_html($card['title']) ?></p>

          <div class="relative h-60 w-full overflow-hidden rounded-bl-2xl">
            <?php selleradise_widgets_get_template_part('template-parts/widgets/promo-cards/partials/image', null, ["settings" => $settings, "card" => $card, "classes" => "absolute !h-full w-full inset-0 object-cover group-hover:scale-110 transition-all duration-700 ease-out-expo origin-center"]);?>
          </div>
        </a>
      </li>
    <?php endforeach;?>
  </ul>

</div>