<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

namespace Selleradise_Widgets\Widgets\Elementor;

use Selleradise_Widgets\Controls\Elementor\Group_Background;
use Selleradise_Widgets\Controls\Elementor\Group_Control_Link;
use \Elementor\Controls_Manager;

class Hero extends \Elementor\Widget_Base

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
        return 'selleradise-hero';
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
        return __('Hero', 'selleradise-widgets');
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
            'section_title',
            [
                'label' => __('Title', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => __('Explore Our Winter Collection', 'selleradise-widgets'),
            ]
        );

        $this->add_control(
            'section_description',
            [
                'label' => __('Description', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXTAREA,
                'input_type' => 'text',
                'default' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit cumque perferendis sequi minus placeat sint pariatur, similique obcaecati incidunt ab blanditiis maiores nisi inventore expedita laborum aut facere possimus aspernatur.',
            ]
        );

        $this->add_group_control(
            Group_Background::get_type(),
            [
                'name' => 'background',
                'label' => __('Background', 'selleradise-widgets'),
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
                'name' => 'cta_primary',
                'label' => __('Primary CTA', 'selleradise-widgets'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'settings_section',
            [
                'label' => __('Settings', 'selleradise-widgets'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        if (selleradise_is_local() || class_exists('Selleradise\\Init')) {
            $this->add_control(
                'hero_type',
                [
                    'label' => __('Hero Type', 'selleradise-widgets'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'popular',
                    'options' => [
                        'default' => esc_html__('Default', 'selleradise-widgets'),
                        'common' => esc_html__('Common', 'selleradise-widgets'),
                        'popular' => esc_html__('Popular', 'selleradise-widgets'),
                        'centered' => esc_html__('Centered', 'selleradise-widgets'),
                        'standard' => esc_html__('Standard', 'selleradise-widgets'),
                        // 'split' => esc_html__('Split', 'selleradise-widgets'),
                    ],
                ]
            );

        } else {
            $this->add_control(
                'hero_type',
                [
                    'label' => __('Hero Type', 'selleradise-widgets'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'popular',
                    'options' => [
                        'default' => esc_html__('Default', 'selleradise-widgets'),
                        'common' => esc_html__('Common', 'selleradise-widgets'),
                        'popular' => esc_html__('Popular', 'selleradise-widgets'),
                        'centered' => esc_html__('Centered', 'selleradise-widgets'),
                        'standard' => esc_html__('Standard', 'selleradise-widgets'),
                    ],
                ]
            );
        }

        $this->add_control(
            'pattern',
            [
                'label' => __('Background Pattern', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '0' => esc_html__('None', 'selleradise-widgets'),
                    '1' => esc_html__('Pattern 1', 'selleradise-widgets'),
                    '2' => esc_html__('Pattern 2', 'selleradise-widgets'),
                    '3' => esc_html__('Pattern 3', 'selleradise-widgets'),
                    '4' => esc_html__('Pattern 4', 'selleradise-widgets'),
                    '5' => esc_html__('Pattern 5', 'selleradise-widgets'),
                    '6' => esc_html__('Pattern 6', 'selleradise-widgets'),
                    '7' => esc_html__('Pattern 7', 'selleradise-widgets'),
                ],
                'condition' => [
                    'hero_type' => ['standard'],
                ],
            ]
        );

        $this->add_control(
            'image_shape',
            [
                'label' => __('Image Shape', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 'oval',
                'options' => [
                    'oval' => esc_html__('Oval', 'selleradise-widgets'),
                    'circle' => esc_html__('Circle', 'selleradise-widgets'),
                    'square' => esc_html__('Square', 'selleradise-widgets'),
                    'half-oval' => esc_html__('Half Oval', 'selleradise-widgets'),
                    'none' => esc_html__('None', 'selleradise-widgets'),
                ],
                'condition' => [
                    'hero_type' => ['standard'],
                ],
            ]
        );

        $this->add_control(
            'split_pattern',
            [
                'label' => __('Split Pattern', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 0,
                'options' => [
                    '0' => esc_html__('None', 'selleradise-widgets'),
                    'slant' => esc_html__('Slant', 'selleradise-widgets'),
                ],
                'condition' => [
                    'hero_type' => ['split'],
                ],
            ]
        );

        $this->add_control(
            'overlay_heading',
            [
                'label' => __('Overlay', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'condition' => [
                    'hero_type' => ['popular'],
                ],
            ],

        );

        $this->add_responsive_control(
            'overlay_background_color',
            [
                'label' => __('Overlay Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .selleradise_Hero__content' => 'background-color: {{value}};',
                ],
                'condition' => [
                    'hero_type' => ['popular'],
                ],
            ]
        );

        $this->add_responsive_control(
            'text_color',
            [
                'label' => __('Text Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .selleradise_Hero__content' => 'color: {{value}};',
                ],
                'condition' => [
                    'hero_type' => ['popular'],
                ],
            ]
        );

        $this->add_responsive_control(
            'button_color',
            [
                'label' => __('Button Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .selleradise_button--primary' => 'background-color: {{value}};',
                ],
                'condition' => [
                    'hero_type' => ['popular'],
                ],
            ]
        );

        $this->add_responsive_control(
            'button_color_text',
            [
                'label' => __('Button Text Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .selleradise_button--primary' => 'color: {{value}};',
                ],
                'condition' => [
                    'hero_type' => ['popular'],
                ],
            ]
        );

        $this->add_responsive_control(
            'overlay_blur', [
                'label' => __('Overlay Blur', 'selleradise-widgets'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['em'],
                'range' => [
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 0.1,
                    ],
                ],
                'default' => [
                    'unit' => 'em',
                    'size' => 0.25,
                ],
                'selectors' => [
                    '{{WRAPPER}} .selleradise_Hero__content' => 'backdrop-filter: blur({{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'hero_type' => ['popular'],

                ],
            ]
        );

        $this->add_responsive_control(
            'overlay_margin',
            [
                'label' => __('Overlay Margin', 'selleradise-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['%', 'em'],
                'default' => [
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .selleradise_Hero__content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'hero_type' => ['popular'],
                ],
            ]
        );

        $this->add_responsive_control(
            'image_margin',
            [
                'label' => __('Image Margin', 'selleradise-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['%', 'em'],
                'default' => [
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .selleradise_Hero__image img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'hero_type' => ['standard'],
                    'image_shape' => ['none'],
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

        $type = isset($settings['hero_type']) && $settings['hero_type'] ? $settings['hero_type'] : 'popular';

        $prefix = 'selleradise_Hero--' . $type;

        $class = $prefix;

        if (selleradise_is_normal_mode()) {
            $class .= ' selleradise_scroll_animate';
        }

        selleradise_widgets_get_template_part('template-parts/widgets/hero/' . $type, null, ["settings" => $settings, "prefix" => $prefix, "class" => $class]);
    }

}
