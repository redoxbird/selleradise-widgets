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

        register_activation_hook(__FILE__, [$this, 'activate']);
        register_deactivation_hook(__FILE__, [$this, 'deactivate']);

        add_action('tgmpa_register', array($this, 'register_required_plugins'));
        add_action('init', [$this, 'register_elementor_widgets']);
        add_action('elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories']);
        add_filter('rwmb_meta_boxes', [$this, 'meta_boxes']);

    }

    public static function activate()
    {

        load_plugin_textdomain(
            'selleradise-widgets',
            false,
            dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
        );

        flush_rewrite_rules();
    }

    public static function deactivate()
    {

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

            array(
                'name' => esc_html__('Meta Box', 'selleradise-widgets'),
                'slug' => 'meta-box',
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

        $widgets_class = new \Selleradise_Widgets\Widgets\Elementor;
        $controls_class = new \Selleradise_Widgets\Controls\Elementor;

        if (method_exists($widgets_class, 'register')) {
            $widgets_class->register();
        }

        if (method_exists($controls_class, 'register')) {
            $controls_class->register();
        }

    }

    public function add_elementor_widget_categories($elements_manager)
    {
        if (!class_exists('\Elementor\Widget_Base')) {
            return;
        }

        $elements_manager->add_category(
            'selleradise',
            [
                'title' => __('Selleradise', 'selleradise-widgets'),
                'icon' => 'fa fa-umbrella-beach',
            ]
        );

    }

    public function meta_boxes($meta_boxes)
    {
        $meta_boxes[] = [
            'title' => esc_html__('Testimonial Info', 'selleradise-widgets'),
            'id' => 'testimonial',
            'post_types' => ['testimonial'],
            'context' => 'normal',
            'fields' => [
                [
                    'name' => __('Quote', 'selleradise-widgets'),
                    'id' => 'quote',
                    'type' => 'wysiwyg',
                    'options' => [
                        'textarea_rows' => 4,
                        'teeny' => true,
                    ],
                ],
                [
                    'name' => __('Rating', 'selleradise-widgets'),
                    'id' => 'rating',
                    'type' => 'number',
                    'min' => 0,
                    'max' => 5,
                    'step' => 0.1,
                ],
                [
                    'name' => __('Profile Picture', 'selleradise-widgets'),
                    'id' => 'profile_picture',
                    'type' => 'image_advanced',
                    'max_file_uploads' => 1,
                    'image_size' => 'thumbnail',
                ],
                [
                    'name' => __('Profile Name', 'selleradise-widgets'),
                    'id' => 'profile_name',
                    'type' => 'text',
                ],
                [
                    'name' => __('Profile Title', 'selleradise-widgets'),
                    'id' => 'profile_title',
                    'type' => 'text',
                ],
            ],
        ];

        return $meta_boxes;

    }

}
