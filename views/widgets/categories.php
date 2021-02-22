<?php

if (!$settings) {
    return;
}


?>

<div class="sectionCategories">
    <div class="sectionHead--centered">
      <h3 class="title"><?php echo $settings['title'] ?: esc_html__('Categories', 'selleradise'); ?></h3>
    </div>

    <?php if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ): ?>
        <p>This Widget might <b>NOT</b> render correctly in <b>Elementor editor.</b></p>
    <?php endif; ?>

    <categories-grid v-bind:chunk-size="14" v-bind:type='<?php echo wp_json_encode( $settings['card_type']); ?>'> </categories-grid>
</div>