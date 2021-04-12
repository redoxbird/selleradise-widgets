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
        return [
            Elementor\HeroCarousel::class,
            Elementor\Categories::class,
            Elementor\Products::class,
            Elementor\Accordion::class,
            Elementor\Tabs::class,
            Elementor\Testimonials::class,
        ];
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
