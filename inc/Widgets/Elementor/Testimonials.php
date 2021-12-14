<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

namespace Selleradise_Widgets\Widgets\Elementor;

use WP_Query;
use \Elementor\Controls_Manager;

class Testimonials extends \Elementor\Widget_Base

{

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        wp_register_script('selleradise-widget-testimonials', SELLERADISE_WIDGETS_DIR_URI . '/assets/dist/js/widgets/testimonials.js', ['elementor-frontend'], selleradise_widgets_get_version(), true);

    }

    public function get_script_depends()
    {
        return ['selleradise-widget-testimonials'];
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
        return 'selleradise-testimonials';
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
        return __('Testimonials', 'selleradise-widgets');
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
                'default' => __('Testimonials', 'selleradise-widgets'),
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label' => __('Section Subtitle', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => __('Check what our customers say about us', 'selleradise-widgets'),
            ]
        );

        if (class_exists('Selleradise\\Init')) {

            $this->add_control(
                'type',
                [
                    'label' => __('Hero Type', 'selleradise-widgets'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'default' => esc_html__('Default', 'selleradise-widgets'),
                        'cards' => esc_html__('Cards', 'selleradise-widgets'),
                        'standard' => esc_html__('Standard', 'selleradise-widgets'),
                    ],
                ]
            );

        } else {
            $this->add_control(
                'type',
                [
                    'label' => __('Card Type', 'selleradise-widgets'),
                    'type' => Controls_Manager::HIDDEN,
                    'default' => 'cards',
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

        $args = [
            'post_type' => 'testimonial',
            'posts_per_page' => 8,
        ];

        $testimonials = new WP_Query($args);

        $type = isset($settings['type']) && $settings['type'] ? $settings['type'] : 'cards';

        if (!function_exists('rwmb_meta')) {
            selleradise_widgets_get_template_part('template-parts/empty-state', null, ["title" => __('Meta Boxes not found', 'selleradise-widgets')]);
            return;
        }

        selleradise_widgets_get_template_part("template-parts/widgets/testimonials/$type", null, ["settings" => $settings, "testimonials" => $testimonials]);
    }

}
