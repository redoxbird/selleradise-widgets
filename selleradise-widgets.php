<?php

/**
 * @link              https://redoxbird.com
 * @since             1.0.0
 * @package           Selleradise_Widgets
 *
 * @wordpress-plugin
 * Plugin Name:       Selleradise Widgets
 * Plugin URI:        https://selleradise.com/selleradise-widgets
 * Description:       This plugin is intended to be used with Selleradise theme. It contains code for Elementor widgets.
 * Version:           1.0.0
 * Author:            RedOxbird
 * Author URI:        https://redoxbird.com
 * Text Domain:       selleradise-widgets
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 */

define('SELLERADISE_WIDGETS_VERSION', '1.0.0');
define('SELLERADISE_WIDGETS_DIR_URI', plugin_dir_url(__FILE__));
define('SELLERADISE_WIDGETS_DIR_PATH', plugin_dir_path(__FILE__));


if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')):
    require_once dirname(__FILE__) . '/vendor/autoload.php';
endif;

if (class_exists('Selleradise_Widgets\\Init')):
    Selleradise_Widgets\Init::register_services();
endif;

