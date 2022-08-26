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
          class="group  rounded-2xl overflow-hidden hover:border-text-200 hover:bg-transparent transition-all flex h-full justify-between items-stretch bg-text-50"
          href="<?php echo esc_url($card['link']['url'] ?: '#'); ?>"
          target="<?php echo esc_attr($card['link']['is_external'] ? '_blank' : null); ?>">

          <?php selleradise_widgets_get_template_part('template-parts/widgets/promo-cards/partials/image', null, ["settings" => $settings, "card" => $card, "classes" => "relative w-1/2 !h-auto ml-2 inset-0 object-cover"]);?>

          <div class="flex flex-col justify-center items-start px-6 py-6 lg:py-12 w-9/20 border-text-200 border-1 rounded-2xl m-4">
            <p class="text-md mb-4 font-medium"><?php echo esc_html($card['title']) ?></p>
            <h2 class="text-lg font-semibold border-y-1 border-text-100 py-2">
              <?php echo esc_html($card['subtitle']) ?>
            </h2>
          </div>

        </a>
      </li>
    <?php endforeach;?>
  </ul>

</div>