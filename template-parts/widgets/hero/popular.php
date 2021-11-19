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

?>

<div class="<?php echo esc_attr( $class ) ?>">

  <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/image', null, ["settings" => $settings, "prefix" => $prefix]); ?>

  <div class="selleradise_Hero__content <?php echo esc_attr( $prefix ) ?>__content">
    <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/title', null, ["settings" => $settings, "prefix" => $prefix]); ?>
    <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/description', null, ["settings" => $settings, "prefix" => $prefix]);?>
    <?php selleradise_widgets_get_template_part('template-parts/widgets/hero/partials/cta', 'primary', ["settings" => $settings, "prefix" => $prefix]);?>
  </div>

</div>