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

<div x-data class="px-page">

  <ul class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php foreach ($cards as $index => $card):
      $class = ' elementor-repeater-item-' . $card['_id'];
    ?>
      <li
        style="--selleradise-item-index: <?php echo esc_attr($index); ?>">

        <a
          class="relative group rounded-2xl overflow-hidden flex h-full justify-end items-stretch bg-text-100"
          href="<?php echo esc_url($card['link']['url'] ?: '#'); ?>"
          target="<?php echo esc_attr($card['link']['is_external'] ? '_blank' : null); ?>">

          <?php selleradise_widgets_get_template_part('template-parts/widgets/promo-cards/partials/image', null, ["settings" => $settings, "card" => $card, "classes" => "left-4 z-20 top-1/2 -translate-y-1/2 absolute !w-auto !max-w-md !h-full group-hover:scale-105 duration-700 ease-out-expo origin-center"]);?>

          <div
            class="flex flex-col justify-center items-start pr-10 pl-44 lg:pl-56 py-6 lg:py-20 w-11/12 bg-main-900 text-main-text"
            style="clip-path: polygon(30% 0, 100% 0, 100% 100%, 0% 100%);">
            <p class="text-md mb-4 font-medium"><?php echo esc_html($card['title']) ?></p>
            <h2 class="text-lg font-semibold border-y-1 border-main-text py-2">
              <?php echo esc_html($card['subtitle']) ?>
            </h2>
          </div>

        </a>
      </li>
    <?php endforeach;?>
  </ul>

</div>