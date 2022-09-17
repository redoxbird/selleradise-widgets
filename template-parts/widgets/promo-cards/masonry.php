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

$classes = [
  "li" => [
    0 => "lg:col-span-3",
    1 => "lg:col-span-2",
    2 => "lg:col-span-2",
    3 => "lg:col-span-3",
  ]
];

?>

<div
  x-data="{inView: false}"
  x-intersect.once="inView = true"
  xyz="fade stagger-0.5 left-2"
  <?php if (!selleradise_is_normal_mode()): ?>
    x-init="
      $dispatch('selleradise-widget-initialized', { 
        isEdit: <?php echo wp_json_encode(selleradise_is_normal_mode() ? false : true); ?>,
        element: $el,
        widget: 'promo-cards',
        variation: 'default',
      })
    " 
  <?php endif;?>
  
  class="px-page">

  <ul class="list-none m-0 p-0 grid md:grid-cols-2 lg:grid-cols-5 gap-8">
    <?php foreach ($cards as $index => $card):
      $class = ' elementor-repeater-item-' . $card['_id'];
    ?>
      <li
        class="rounded-2xl overflow-hidden <?php echo esc_attr($classes["li"][$index]); ?>"
        style="--selleradise-item-index: <?php echo esc_attr($index); ?>"
        x-bind:class="{'xyz-in': inView}">
        <a
          class="group relative flex h-full justify-between items-stretch bg-text-50"
          href="<?php echo esc_url($card['link']['url'] ?: '#'); ?>"
          target="<?php echo esc_attr($card['link']['is_external'] ? '_blank' : null); ?>">
          <div class="absolute inset-0">
            <?php selleradise_widgets_get_template_part('template-parts/widgets/promo-cards/partials/image', null, ["settings" => $settings, "card" => $card, "classes" => "absolute !h-full w-full inset-0 object-cover group-hover:scale-105 ease-out-expo duration-700 transition-all"]);?>
          </div>

          <div class="relative flex flex-col justify-center items-start p-8 lg:px-12 lg:py-20 w-60 lg:w-72">
            <h2 class="text-xl lg:text-2xl mb-8 m-0 text-text-900">
              <?php echo esc_html($card['subtitle']) ?>
            </h2>
            <p class="text-text-900 text-sm font-semibold m-0">
              <?php echo esc_html($card['title']) ?>
            </p>
          </div>

        </a>
      </li>
    <?php endforeach;?>
  </ul>

</div>