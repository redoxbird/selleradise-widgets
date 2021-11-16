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

<div class="heroCarousel--default">

    <div class="sliderNavButtons">
        <button class="previous"> <?php echo selleradise_widgets_svg('unicons-line/angle-left'); ?></button>
        <button class="next"> <?php echo selleradise_widgets_svg('unicons-line/angle-right'); ?></button>
    </div>

    <div class="swiper-wrapper">
        <?php foreach ($settings['slide'] as $key => $slide): ?>

	            <?php if (isset($slide['type']) && $slide['type'] === 'default'): ?>

	                <div class="swiper-slide elementor-repeater-item-<?php echo esc_attr( $slide['_id'] ); ?>" style="background-image: url(<?php echo esc_url($slide['image']['url']); ?>)">
	                    <div
	                        class="content">
	                        <h2 class="title"><?php echo esc_html($slide['title']) ?></h2>

	                        <?php if ($slide['description']): ?>
	                            <p class="description"><?php echo esc_html($slide['description']) ?></p>
	                        <?php endif;?>

                        <div class="actions">
                            <?php if ($slide['show_primary_cta'] === 'yes'): ?>
                                <a
                                    href="<?php echo esc_html($slide['cta_primary_url']['url'] ?? '#'); ?>"
                                    target="<?php echo esc_html($slide['cta_primary_target'] ? '_blank' : null); ?>"
                                    class="button--primary"
                                >
                                    <?php echo esc_html($slide['cta_primary_text'] ?? __('Learn More', 'selleradise-widgets')); ?>
                                </a>
                            <?php endif;?>

                            <?php if ($slide['show_secondary_cta'] === 'yes'): ?>
                                <a
                                    href="<?php echo esc_url($slide['cta_secondary_url']['url'] ?? '#'); ?>"
                                    target="<?php echo esc_attr($slide['cta_secondary_target'] ? '_blank' : null); ?>"
                                    class="button--secondary">
                                    <?php echo esc_html($slide['cta_secondary_text'] ?? __('Learn More', 'selleradise-widgets')); ?>
                                </a>
                            <?php endif;?>


                        </div>
                    </div>
                </div>

            <?php else: ?>

                <a
                    href="<?php echo esc_html($slide['image_link_url']['url'] ?? '#'); ?>"
                    target="<?php echo esc_html($slide['image_link_target'] ? '_blank' : null); ?>"
                    aria-label="<?php echo esc_html($slide['image_link_text'] ?? null); ?>"
                    class="swiper-slide" style="background-image: url(<?php echo esc_url($slide['image']['url']); ?>)">
                </a>

            <?php endif;?>

        <?php endforeach;?>
    </div>


</div>
