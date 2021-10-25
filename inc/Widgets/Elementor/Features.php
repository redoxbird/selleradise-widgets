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

class Features extends \Elementor\Widget_Base
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
        return 'selleradise-features';
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
        return __('Features', 'selleradise-widgets');
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
                'label' => __('Section Title', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => __('Why choose us?', 'selleradise-widgets'),
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label' => __('Section Subtitle', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => __('Everything you need to quickly start your online store is here.', 'selleradise-widgets'),
            ]
        );

        $this->add_control(
            'section_type',
            [
                'label' => __('Section Type', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__('Default', 'selleradise-widgets'),
                    'simple' => esc_html__('Simple', 'selleradise-widgets'),
                    'bullet' => esc_html__('Bullet', 'selleradise-widgets'),
                ],
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
            ]
        );

        $features = new \Elementor\Repeater();

        $features->add_control(
            'icon',
            [
                'label' => _x('Icon', 'Feature', 'selleradise-widgets'),
                'type' => Controls_Manager::ICONS,
            ]
        );

        $features->add_control(
            'title',
            [
                'label' => _x('Title', 'Feature', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $features->add_control(
            'description',
            [
                'label' => _x('Description', 'Feature', 'selleradise-widgets'),
                'type' => Controls_Manager::WYSIWYG,
            ]
        );

        $features->add_control(
            'color_icon',
            [
                'label' => __('Icon Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => '--selleradise-color-icon: {{value}};',
                ],
            ]
        );

        $features->add_control(
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
            'cta_heading',
            [
                'label' => __('Call To Action', 'selleradise-widgets'),
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

        $this->add_control(
            'features',
            [
                'label' => __('Features', 'selleradise-widgets'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $features->get_controls(),
                'title_field' => '{{{ title }}}',
                'default' => [
                    [
                        'title' => __('Incredibly Fast.', 'selleradise-widgets'),
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet nisl ullamcorper.',
                        'icon' => [
                            'value' => 'fas fa-bolt',
                            'library' => 'solid',
                        ],
                    ],
                    [
                        'title' => __('Amazingly responsive.', 'selleradise-widgets'),
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet nisl ullamcorper.',
                        'icon' => [
                            'value' => 'fas fa-mobile-alt',
                            'library' => 'solid',
                        ],
                    ],
                    [
                        'title' => __('Exceptionally Accessible.', 'selleradise-widgets'),
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet nisl ullamcorper.',
                        'icon' => [
                            'value' => 'fab fa-accessible-icon',
                            'library' => 'brand',
                        ],
                    ],
                    [
                        'title' => __('Beautifully designed.', 'selleradise-widgets'),
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet nisl ullamcorper.',
                        'icon' => [
                            'value' => 'fas fa-paint-brush',
                            'library' => 'solid',
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

        $type = isset($settings['section_type']) && $settings['section_type'] ? $settings['section_type'] : 'default';

        selleradise_widgets_get_template_part("template-parts/widgets/features/$type", null, ["settings" => $settings]);
    }

}
