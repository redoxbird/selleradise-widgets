<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://khizar.info
 * @since             1.0.0
 * @package           Selleradise_Widgets
 *
 * @wordpress-plugin
 * Plugin Name:       Selleradise Widgets
 * Plugin URI:        https://redoxbird.com/selleradise-widgets
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Khizar Hasan
 * Author URI:        https://khizar.info
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       selleradise-widgets
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */

define('SELLERADISE_WIDGETS_VERSION', '1.0.0');
define('SELLERADISE_WIDGETS_DIR_URI', plugin_dir_url(__FILE__));


if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')):
    require_once dirname(__FILE__) . '/vendor/autoload.php';
endif;

if (class_exists('Selleradise_Widgets\\Init')):
    Selleradise_Widgets\Init::register_services();
endif;

// /**
//  * The code that runs during plugin activation.
//  * This action is documented in includes/class-selleradise-widgets-activator.php
//  */
// function activate_selleradise_widgets() {
//     require_once plugin_dir_path( __FILE__ ) . 'includes/class-selleradise-widgets-activator.php';
//     Selleradise_Widgets_Activator::activate();
// }

// /**
//  * The code that runs during plugin deactivation.
//  * This action is documented in includes/class-selleradise-widgets-deactivator.php
//  */
// function deactivate_selleradise_widgets() {
//     require_once plugin_dir_path( __FILE__ ) . 'includes/class-selleradise-widgets-deactivator.php';
//     Selleradise_Widgets_Deactivator::deactivate();
// }

// register_activation_hook( __FILE__, 'activate_selleradise_widgets' );
// register_deactivation_hook( __FILE__, 'deactivate_selleradise_widgets' );

// /**
//  * The core plugin class that is used to define internationalization,
//  * admin-specific hooks, and public-facing site hooks.
//  */
// require plugin_dir_path( __FILE__ ) . 'includes/class-selleradise-widgets.php';

// /**
//  * Begins execution of the plugin.
//  *
//  * Since everything within the plugin is registered via hooks,
//  * then kicking off the plugin from this point in the file does
//  * not affect the page life cycle.
//  *
//  * @since    1.0.0
//  */
// function run_selleradise_widgets() {

//     $plugin = new Selleradise_Widgets();
//     $plugin->run();

// }
// run_selleradise_widgets();
