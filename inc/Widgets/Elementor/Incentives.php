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

class Incentives extends \Elementor\Widget_Base
{

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        wp_register_script('selleradise-widgets', SELLERADISE_WIDGETS_DIR_URI . '/assets/dist/js/widgets.js', ['elementor-frontend'], time(), true);
    }

    public function get_script_depends()
    {
        return ['selleradise-widgets'];
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
        return 'selleradise-incentives';
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
        return __('Incentives', 'selleradise-widgets');
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
            'setting_section',
            [
                'label' => __('Settings', 'selleradise-widgets'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'type',
            [
                'label' => __('Section Type', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__('Default', 'selleradise-widgets'),
                    'minimal' => esc_html__('Minimal', 'selleradise-widgets'),
                    'minimal-alt' => esc_html__('Minimal Alt', 'selleradise-widgets'),
                ],
            ]
        );

        $this->add_control(
            'color_icon',
            [
                'label' => __('Icon Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .selleradise_incentives' => '--selleradise-color-icon: {{value}};',
                ],
            ]
        );

        $this->add_control(
            'color_icon_background',
            [
                'label' => __('Icon Background Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .selleradise_incentives' => '--selleradise-color-icon-background: {{value}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'selleradise-widgets'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $incentives = new \Elementor\Repeater();

        $incentives->add_control(
            'icon',
            [
                'label' => _x('Icon', 'Incentive', 'selleradise-widgets'),
                'type' => Controls_Manager::ICONS,
            ]
        );

        $incentives->add_control(
            'title',
            [
                'label' => _x('Title', 'Incentive', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $incentives->add_control(
            'description',
            [
                'label' => _x('Description', 'Incentive', 'selleradise-widgets'),
                'type' => Controls_Manager::WYSIWYG,
            ]
        );

        $incentives->add_control(
            'color_icon',
            [
                'label' => __('Icon Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => '--selleradise-color-icon: {{value}};',
                ],
            ]
        );

        $incentives->add_control(
            'color_icon_background',
            [
                'label' => __('Icon Background Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => '--selleradise-color-icon-background: {{value}};',
                ],
            ]
        );

        $this->add_control(
            'incentives',
            [
                'label' => __('Incentives', 'selleradise-widgets'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $incentives->get_controls(),
                'title_field' => '{{{ title }}}',
                'default' => [
                    [
                        'title' => '24/7 Helpline',
                        'description' => 'We are available every day of week to help.',
                        'icon' => [
                            'value' => 'fas fa-headphones-alt',
                            'library' => 'solid',
                        ],
                    ],
                    [
                        'title' => 'Safe Payments',
                        'description' => 'Pay using safest payment systems.',
                        'icon' => [
                            'value' => 'fab fa-apple-pay',
                            'library' => 'brands',
                        ],
                    ],
                    [
                        'title' => 'Friendly Service',
                        'description' => 'You will love our staff.',
                        'icon' => [
                            'value' => 'far fa-smile',
                            'library' => 'regular',
                        ],
                    ],
                    [
                        'title' => 'Instant Delivery',
                        'description' => 'Get products instantly delivered.',
                        'icon' => [
                            'value' => 'far fa-handshake',
                            'library' => 'regular',
                        ],
                    ],
                ],
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

        $type = isset($settings['type']) && $settings['type'] ? $settings['type'] : 'default';

        selleradise_widgets_get_template_part("template-parts/widgets/incentives", null, ["settings" => $settings]);
    }

}
