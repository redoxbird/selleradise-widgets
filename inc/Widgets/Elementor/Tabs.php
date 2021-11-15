<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

namespace Selleradise_Widgets\Widgets\Elementor;

use \Elementor\Controls_Manager;

class Tabs extends \Elementor\Widget_Base

{

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        wp_register_script('selleradise-widget-tabs', SELLERADISE_WIDGETS_DIR_URI . '/assets/dist/js/widgets/tabs.js', ['elementor-frontend'], selleradise_widgets_get_version(), true);

    }

    public function get_script_depends()
    {
        return ['selleradise-widget-tabs'];
    }

    /**
     * Get widget name.
     *
     * Retrieve oEmbed widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'selleradise-tabs';
    }

    /**
     * Get widget title.
     *
     * Retrieve oEmbed widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __('Tabs', 'selleradise-widgets');
    }

    /**
     * Get widget icon.
     *
     * Retrieve oEmbed widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'icon-selleradise-logo';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the oEmbed widget belongs to.
     *
     * @since 1.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return ['selleradise'];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'selleradise-widgets'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => __('Section Title', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => __('Tabs', 'selleradise-widgets'),
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label' => __('Section Subtitle', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => __('Information', 'selleradise-widgets'),
            ]
        );

        $tabs = new \Elementor\Repeater();

        $tabs->add_control(
            'title',
            [
                'label' => __('Title', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
            ]
        );

        $tabs->add_control(
            'description',
            [
                'label' => __('Description', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label' => __('Tabs', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $tabs->get_controls(),
                'default' => [
                    [
                        'title' => __('Title #1', 'selleradise-widgets'),
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet nisl ullamcorper, euismod velit ut, porta risus. Morbi lobortis scelerisque massa, nec dignissim ante commodo at. Donec non mollis nisl, et varius nisi. Nulla vel finibus justo. Phasellus quis urna tellus. Fusce eget consequat erat. Sed gravida sollicitudin velit nec consectetur. Maecenas feugiat bibendum metus in viverra. In commodo viverra odio sit amet porta. Phasellus interdum placerat ipsum, a posuere ex euismod vitae. Nulla at turpis eget eros dignissim ultrices.',
                    ],
                    [
                        'title' => __('Title #2', 'selleradise-widgets'),
                        'description' => 'Etiam ut consectetur tellus. Sed iaculis eget dui id ultrices. In id lacus ipsum. Morbi pretium consequat magna in luctus. Cras elit mi, gravida eget sapien eu, suscipit lacinia sapien. Sed porta lobortis est, tempor mattis nisi faucibus quis. Duis ac lacus finibus, fringilla mauris in, tincidunt neque. Nam sed libero venenatis, elementum ipsum eget, viverra metus. Praesent sapien dolor, tincidunt sit amet nisl vestibulum, placerat blandit nulla. Nam tincidunt dapibus magna ac placerat.',
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        selleradise_widgets_get_template_part('template-parts/widgets/tabs', null, ["settings" => $settings]);
    }

}
