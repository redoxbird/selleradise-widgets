<?php

namespace Selleradise_Widgets\Setup;

class Setup
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action('tgmpa_register', array($this, 'register_required_plugins'));

        register_activation_hook(__FILE__, [$this, 'activate']);
        register_deactivation_hook(__FILE__, [$this, 'deactivate']);

        add_action('plugins_loaded', [$this, 'set_locale'], 'load_plugin_textdomain');
        add_action('init', [$this, 'register_elementor_widgets']);
        add_action('elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories']);

    }

    public static function activate()
    {

    }

    public static function deactivate()
    {

    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the Selleradise_Widgets_i18n class in order to set the domain and to register the hook
     * with WordPress.
     *
     * @since    1.0.0
     * @access   private
     */

    public function set_locale()
    {

        load_plugin_textdomain(
            'selleradise-widgets',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );

    }

    public function register_required_plugins()
    {
        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(

            array(
                'name' => esc_html__('Elementor', 'selleradise-widgets'),
                'slug' => 'elementor',
                'required' => true,
            ),

        );

        /*
         * Array of configuration settings. Amend each line as needed.
         *
         * TGMPA will start providing localized text strings soon. If you already have translations of our standard
         * strings available, please help us make TGMPA even better by giving us access to these translations or by
         * sending in a pull-request with .po file(s) with the translations.
         *
         * Only uncomment the strings in the config array if you want to customize the strings.
         */
        $config = array(
            'id' => 'selleradise-widgets', // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '', // Default absolute path to bundled plugins.
            'menu' => 'tgmpa-install-plugins', // Menu slug.
            'has_notices' => true, // Show admin notices or not.
            'dismissable' => true, // If false, a user cannot dismiss the nag message.
            'dismiss_msg' => '', // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false, // Automatically activate plugins after installation or not.
            'message' => '', // Message to output right before the plugins table.
        );

        tgmpa($plugins, $config);
    }

    public static function register_elementor_widgets()
    {
        if (!class_exists('\Elementor\Widget_Base')) {
            return;
        }

        $class = new \Selleradise_Widgets\Widgets\Elementor;

        if (method_exists($class, 'register')) {
            $class->register();
        }

    }

    public function add_elementor_widget_categories($elements_manager)
    {

        $elements_manager->add_category(
            'selleradise',
            [
                'title' => __('Selleradise', 'selleradise-widgets'),
                'icon' => 'fa fa-umbrella-beach',
            ]
        );

    }

}
