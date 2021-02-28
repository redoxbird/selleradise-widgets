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
    }

    /**
     * Notice the mix() function in wp_enqueue_...
     * It provides the path to a versioned asset by Laravel Mix using querystring-based
     * cache-busting (This means, the file name won't change, but the md5. Look here for
     * more information: https://github.com/JeffreyWay/laravel-mix/issues/920 )
     */
    public function enqueue_scripts()
    {
        wp_enqueue_style('sellaradise-widgets-style', selleradise_plugin_assets('css/style.css'), array(), time(), 'all');
    }

}
