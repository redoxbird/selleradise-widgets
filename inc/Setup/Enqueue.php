<?php

namespace Selleradise_Widgets\Setup;

/**
 * Enqueue.
 */
class Enqueue
{

    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('elementor/editor/before_enqueue_scripts', array($this, 'enqueue_scripts_editor'));

    }

    public function enqueue_scripts()
    {

        wp_enqueue_style('selleradise-widgets-tailwind', selleradise_plugin_assets('css/tailwind.css'), array(), selleradise_widgets_get_version(), 'all');

    }

    public function enqueue_scripts_editor()
    {
        wp_enqueue_style('selleradise-style', selleradise_plugin_assets('css/fonts/icomoon.css'), array(), time(), 'all');
    }

}
