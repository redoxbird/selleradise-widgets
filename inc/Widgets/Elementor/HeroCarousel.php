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
use Selleradise_Widgets\Controls\Elementor\Group_Control_Link;

class HeroCarousel extends \Elementor\Widget_Base
{

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        wp_register_script('script-handle', SELLERADISE_WIDGETS_DIR_URI . '/assets/dist/js/widgets.js', ['elementor-frontend'], time(), true);

    }

    public function get_script_depends()
    {
        return ['script-handle'];
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
        return 'selleradise-hero-carousel';
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
        return __('Hero Carousel', 'selleradise-widgets');
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
        return 'fa fa-ellipsis-h';
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

        $slide = new \Elementor\Repeater();

        $slide->add_control(
            'type',
            [
                'label' => __('Type', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__('Image With Content', 'selleradise-widgets'),
                    'image_only' => esc_html__('Image Only', 'selleradise-widgets'),
                ],
            ]
        );

        $slide->add_control(
            'image',
            [
                'label' => __('Choose Image', 'selleradise-widgets'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],

            ]
        );

        $slide->add_control(
            'title',
            [
                'label' => __('Title', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'condition' => [
                    'type' => 'default',
                ],
            ]
        );

        $slide->add_control(
            'description',
            [
                'label' => __('Description', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'condition' => [
                    'type' => 'default',
                ],
            ]
        );

        $slide->add_control(
            'show_primary_cta',
            [
                'label' => __('Primary CTA', 'selleradise-widgets'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'your-plugin'),
                'label_off' => __('Hide', 'your-plugin'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'type' => 'default',
                ],
            ]
        );

        $slide->add_group_control(
            Group_Control_Link::get_type(),
            [
                'name' => 'cta_primary',
                'label' => __('Primary CTA', 'selleradise-widgets'),
                'condition' => [
                    'show_primary_cta' => 'yes',
                    'type' => 'default',
                ],
            ]
        );

        $slide->add_control(
            'show_secondary_cta',
            [
                'label' => __('Secondary CTA', 'selleradise-widgets'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'your-plugin'),
                'label_off' => __('Hide', 'your-plugin'),
                'return_value' => 'yes',
                'default' => 0,
                'condition' => [
                    'type' => 'default',
                ],
            ]
        );

        $slide->add_group_control(
            Group_Control_Link::get_type(),
            [
                'name' => 'cta_secondary',
                'label' => __('Primary CTA', 'selleradise-widgets'),
                'condition' => [
                    'show_secondary_cta' => 'yes',
                    'type' => 'default',
                ],
            ]
        );

        $slide->add_control(
            'text_color',
            [
                'label' => __('Text Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_1,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.swiper-slide .content' => 'color: {{value}};',
                    '{{WRAPPER}} {{CURRENT_ITEM}}.swiper-slide .button--primary' => 'background-color: {{value}};',
                    '{{WRAPPER}} {{CURRENT_ITEM}}.swiper-slide .button--secondary' => 'color: {{value}};',
                ],
                'condition' => [
                    'type' => 'default',
                ],
            ]
        );

        $slide->add_control(
            'button_text_color',
            [
                'label' => __('Button Text Color', 'selleradise-widgets'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Scheme_Color::get_type(),
                    'value' => \Elementor\Scheme_Color::COLOR_2,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.swiper-slide .button--primary' => 'color: {{value}};',
                ],
                'condition' => [
                    'type' => 'default',
                ],
            ]
        );

        $slide->add_group_control(
            Group_Control_Link::get_type(),
            [
                'name' => 'image_link',
                'label' => __('Image Link', 'selleradise-widgets'),
                'condition' => [
                    'type' => 'image_only',
                ],
            ]
        );

        $slide->add_control(
            'content_position',
            [
                'label' => __('Content Position', 'selleradise-widgets'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['%', 'px'],
                'allowed_dimensions' => ['top', 'left'],
                'default' => [
                    "isLinked" => false,
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.swiper-slide .content' => 'top: {{TOP}}{{UNIT}}; right: {{RIGHT}}{{UNIT}}; bottom: {{BOTTOM}}{{UNIT}}; left: {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'type' => 'default',
                ],
            ]
        );

        $this->add_control(
            'slide',
            [
                'label' => __('Slides', 'selleradise-widgets'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $slide->get_controls(),
                'default' => [
                    [
                        'title' => __('Get the light where it is needed the most.', 'selleradise-widgets'),
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet nisl ullamcorper',
                        'image' => [
                            'url' => 'https://images.unsplash.com/photo-1604572689968-e608a2332849?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80',
                        ],
                        'cta_primary_text' => 'Most popular Lamps',
                        'cta_primary_url' => '#',
                        'text_color' => '#FFF4E0',
                        'button_text_color' => '#8E3B15',
                    ],
                    [
                        'title' => __('Sit in peace and relax your mild.', 'selleradise-widgets'),
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet nisl ullamcorper',
                        'image' => [
                            'url' => 'https://images.unsplash.com/photo-1610559176044-d2695ca6c63d?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1521&q=80',
                        ],
                        'cta_primary_text' => 'Top Rated Lamps',
                        'cta_primary_url' => '#',
                        'text_color' => '#373A3C',
                        'button_text_color' => '#fff',
                    ],
                    [
                        'title' => __('A good chair can improve your health.', 'selleradise-widgets'),
                        'image' => [
                            'url' => 'https://images.unsplash.com/photo-1534361227963-bbac191159cc?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
                        ],
                        'cta_primary_text' => 'Top Rated Chairs',
                        'cta_primary_url' => '#',
                        'text_color' => '#025EA9',
                        'button_text_color' => '#fff',
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

        selleradise_widgets_get_template_part('views/widgets/hero/carousel', null, ["settings" => $settings]);
    }

}
