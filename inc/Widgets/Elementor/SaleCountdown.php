<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

namespace Selleradise_Widgets\Widgets\Elementor;

use Selleradise_Widgets\Controls\Elementor\Group_Control_Link;
use \Elementor\Controls_Manager;

class SaleCountdown extends \Elementor\Widget_Base

{

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);
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
        return 'selleradise-sale-countdown';
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
        return __('Sale Countdown', 'selleradise-widgets');
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
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => 'New Year Sale',
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __('Subtitle', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => 'Shop now to get 50% on all products.',
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __('Choose Image', 'selleradise-widgets'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $this->add_control(
            'primary_cta_heading',
            [
                'label' => __('CTA', 'selleradise-widgets'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Link::get_type(),
            [
                'name' => 'cta',
                'label' => __('CTA', 'selleradise-widgets'),
            ]
        );

        $this->add_control(
            'sale_timer_title_heading',
            [
                'label' => __('Sale timer title', 'selleradise-widgets'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'sale_start_text',
            [
                'label' => __('Sale start text', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => __('Sale starts in', 'selleradise-widgets'),
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'sale_end_text',
            [
                'label' => __('Sale end text', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => __('Sale ends in', 'selleradise-widgets'),
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'sale_ended_text',
            [
                'label' => __('Sale has ended text', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => __('Sale has ended', 'selleradise-widgets'),
                'frontend_available' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'setting_section',
            [
                'label' => __('Settings', 'selleradise-widgets'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'start_date',
            [
                'label' => __('Start Date', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'end_date',
            [
                'label' => __('End Date', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'colors_heading',
            [
                'label' => __('Colors', 'selleradise-widgets'),
                'type' => Controls_Manager::HEADING,
            ]
        );

        $this->add_control(
            'color_overlay',
            [
                'label' => __('Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .selleradise_widgets_sale-countdown-overlay' => 'background-color: {{value}};',
                ],
            ]
        );

        $this->add_control(
            'color_text',
            [
                'label' => __('Text Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => '--selleradise-color-main-text: {{value}};',
                ],
            ]
        );

        $this->add_control(
            'color_chip',
            [
                'label' => __('Chip Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => '--selleradise-color-text: {{value}};',
                ],
            ]
        );

        $this->add_control(
            'color_button',
            [
                'label' => __('Button Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => '--selleradise-color-accent-light: {{value}};',
                ],
            ]
        );

        $this->add_control(
            'color_button_text',
            [
                'label' => __('Button Text Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}' => '--selleradise-color-accent-light-text: {{value}};',
                ],
            ]
        );

        if (selleradise_is_local() || class_exists('Selleradise\\Init')) {
            $this->add_control(
                'type',
                [
                    'label' => __('Type', 'selleradise-widgets'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'default' => esc_html__('Default', 'selleradise-widgets'),
                        'floating' => esc_html__('Floating', 'selleradise-widgets'),
                    ],
                ]
            );

        } else {
            $this->add_control(
                'type',
                [
                    'label' => __('Type', 'selleradise-widgets'),
                    'type' => Controls_Manager::HIDDEN,
                    'default' => 'default',
                ]
            );
        }


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

        selleradise_widgets_get_template_part("template-parts/widgets/sale-countdown/". $type, null, ["settings" => $settings]);
    }

}
