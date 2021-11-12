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

class CTA extends \Elementor\Widget_Base

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
        return 'selleradise-cta';
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
        return __('Call To Action', 'selleradise-widgets');
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
                'default' => __('The best fashion store in town', 'selleradise-widgets'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => __('Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat repudiandae accusamus aperiam provident quibusdam ratione quod id reprehenderit quidem autem porro ducimus dolorem consequuntur dolore quam, et ab at similique!', 'selleradise-widgets'),
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
            'cta_heading',
            [
                'label' => __('Call To Action Link', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );

        $this->add_group_control(
            Group_Control_Link::get_type(),
            [
                'name' => 'cta',
                'label' => __('Link', 'selleradise-widgets'),
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
            'overlay_heading',
            [
                'label' => __('Overlay', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
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
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .selleradise_CTA--default__overlay' => 'backdrop-filter: blur({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->add_control(
            'colors_heading',
            [
                'label' => __('Colors', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'color_text',
            [
                'label' => __('Text Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .selleradise_CTA--default__overlay' => 'color: {{value}};',
                ],
            ]
        );

        $this->add_control(
            'color_background',
            [
                'label' => __('Background color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .selleradise_CTA--default__overlay' => 'background-color: {{value}};',
                ],
            ]
        );

        $this->add_control(
            'color_main',
            [
                'label' => __('Button background color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .selleradise_CTA--default__overlay' => '--selleradise-color-main: {{value}};',
                ],
            ]
        );

        $this->add_control(
            'color_main_text',
            [
                'label' => __('Button Text Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .selleradise_CTA--default__overlay' => '--selleradise-color-main-text: {{value}};',
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

        // $type = isset($settings['section_type']) && $settings['section_type'] ? $settings['section_type'] : 'list';

        selleradise_widgets_get_template_part('template-parts/widgets/cta', 'default', ["settings" => $settings]);
    }

}
