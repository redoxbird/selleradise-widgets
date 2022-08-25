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
        class="border-text-100 border-1 rounded-2xl p-3 hover:border-text-200 transition-all"
        style="--selleradise-item-index: <?php echo esc_attr($index); ?>">

        <a
          class="flex h-full justify-between items-stretch"
          href="<?php echo esc_url($card['link']['url'] ?: '#'); ?>"
          target="<?php echo esc_attr($card['link']['is_external'] ? '_blank' : null); ?>">

          <div class="flex flex-col justify-between items-start p-3 w-1/2 flex-grow">
            <h2 class="text-2xl mb-4 font-semibold"><?php echo esc_html($card['title']) ?></h2>
            <p class="bg-text-900 text-background-50 px-4 py-2 rounded-full text-xs font-semibold">
              <?php echo esc_html($card['subtitle']) ?>
            </p>
          </div>

          <div class="w-[35%] relative rounded-2xl overflow-hidden">
            <?php selleradise_widgets_get_template_part('template-parts/widgets/promo-cards/partials/image', null, ["settings" => $settings, "card" => $card, "classes" => "absolute !h-full w-full inset-0 object-cover"]);?>
          </div>
        </a>
      </li>
    <?php endforeach;?>
  </ul>

</div>