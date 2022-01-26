<?php

/**
 * @link              https://redoxbird.com
 * @since             1.0.0
 * @package           Selleradise_Widgets
 *
 * @wordpress-plugin
 * Plugin Name:       Selleradise Widgets
 * Plugin URI:        https://selleradise.com
 * Description:       This is a plugin for the Selleradise theme. It contains Elementor widgets which are necessary to create a landing page shown in the Demo of Selleradise theme.
 * Version:           1.2.2
 * Author:            RedOxbird
 * Requires at least: 5.5
 * Tested up to:      5.9
 * Requires PHP:      7.1
 * Author URI:        https://redoxbird.com
 * Text Domain:       selleradise-widgets
 * Domain Path:       /languages
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 */

define('SELLERADISE_WIDGETS_VERSION', '1.2.2');
define('SELLERADISE_WIDGETS_DIR_URI', plugin_dir_url(__FILE__));
define('SELLERADISE_WIDGETS_DIR_PATH', plugin_dir_path(__FILE__));


if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')):
    require_once dirname(__FILE__) . '/vendor/autoload.php';
endif;

if (class_exists('Selleradise_Widgets\\Init')):
    Selleradise_Widgets\Init::register_services();
endif;

