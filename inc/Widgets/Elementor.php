<?php

namespace Selleradise_Widgets\Widgets;

class Elementor
{

    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     */
    public static function get_widgets()
    {
        if(!class_exists('Elementor\Plugin')) {
            return;
        }

        $classes = [
            Elementor\Hero::class,
            Elementor\PromoCards::class,
            Elementor\FAQ::class,
            Elementor\Tabs::class,
            Elementor\Testimonials::class,
            Elementor\Features::class,
            Elementor\Incentives::class,
            Elementor\CTA::class,
            Elementor\SaleCountdown::class,
            Elementor\Posts::class,
        ];

        if(class_exists('WooCommerce')) {
            $classes[] = Elementor\Products::class;
            $classes[] = Elementor\Categories::class;
        }

        return $classes;
    }

    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        foreach (self::get_widgets() as $class) {
            $service = self::instantiate($class);

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type($service);
        }

    }

    /**
     * Initialize the class
     * @param  class $class         class from the services array
     * @return class instance         new instance of the class
     */
    private static function instantiate($class)
    {
        return new $class();
    }

}
