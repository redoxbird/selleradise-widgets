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

if(!isset($settings['cards']) || !$settings['cards']) {
  return;
}

$cards = $settings['cards'];

?>

<div class="px-page">
  <ul class="grid grid-cols-3 list-none gap-8 p-0 sm:grid-cols-1">
    <?php foreach ($cards as $index => $card): 
      $class = ' elementor-repeater-item-'.$card['_id'];

      if($settings['adaptive_colors'] === 'yes') {
        $class .= ' selleradise_adaptive_colors';
      }
    ?>
      <li class="<?php echo esc_attr( $class ); ?>" style="--selleradise-item-index: <?php echo esc_attr($index); ?>">
        <a
          class="flex justify-between items-stretch text-text-900 bg-body-900 border-1 border-solid border-text-100 rounded-2xl p-3 w-full h-auto relative hover:border-text-200" 
          href="<?php echo esc_url($card['link']['url'] ?: '#'); ?>"
          target="<?php echo esc_attr($card['link']['is_external'] ? '_blank' : null); ?>">

          <div class="flex items-start justify-start flex-col px-4 py-2 w-2/5 grow">
            <h2 class="m-0 mb-2 text-h5 md:text-p">
              <?php echo esc_html($card['title']) ?>
            </h2>
            <p class="text-xs font-bold mt-auto bg-text-900 text-body-900 px-5 py-2 rounded-full">
              <?php echo esc_html($card['subtitle']) ?>
            </p>
          </div>

          <?php 
            selleradise_widgets_get_template_part(
              'template-parts/widgets/promo-cards/partials/image', 
              null, 
              ["settings" => $settings, "card" => $card]
            ); 
          ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</div>