<?php

if (!$settings) {
    return;
}

?>

<div class="heroSlider--promotional">

    <div class="sliderNavButtons">
        <button class="previous"> < </button>
        <button class="next"> > </button>
    </div>
    
    <div class="swiper-wrapper">
        <?php foreach($settings['slide'] as $key => $slide): ?>
            <div class="swiper-slide" style="background-image: url(<?php echo esc_url($slide['image']['url']); ?>)">
                <div 
                    class="content" style="color: <?php echo esc_attr($slide['text_color']); ?>" >
                    <h2 class="title"><?php echo esc_html($slide['title']) ?></h2>
                    <p class="description"><?php echo esc_html($slide['description']) ?></p>

                    <div class="actions">
                        <a href="#" class="button--primary" style="background-color: <?php echo esc_attr($slide['text_color']); ?>; color: <?php echo esc_attr($slide['button_text_color']); ?>">
                            Learn More
                        </a>

                        <a class="button--secondary" style="color: <?php echo esc_attr($slide['text_color']); ?>">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


</div>
