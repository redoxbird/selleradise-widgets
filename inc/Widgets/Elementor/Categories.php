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

class Categories extends \Elementor\Widget_Base
{

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
        return 'selleradise-product-categories';
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
        return __('Product Categories', 'selleradise-widgets');
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
        return 'fa fa-sitemap';
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
    protected function _register_controls()
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
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label' => __('Section Subtitle', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
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

        $this->add_control(
            'card_type',
            [
                'label' => __('Type', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__('Default', 'selleradise-widgets'),
                    'rounded' => esc_html__('Rounded', 'selleradise-widgets'),
                    'cardSmall' => esc_html__('Small Card', 'selleradise-widgets'),
                    'cardImage' => esc_html__('Image Card', 'selleradise-widgets'),
                    'onlyImage' => esc_html__('Image Only', 'selleradise-widgets'),
                    'onlyText' => esc_html__('Text Only', 'selleradise-widgets'),
                    'pill' => esc_html__('Pill', 'selleradise-widgets'),
                ],
            ]
        );

        $this->add_control(
            'number',
            [
                'label' => __('Limit', 'selleradise-widgets'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 1000,
                'step' => 1,
                'default' => 14,
            ]
        );

        $this->add_control(
            'page_size',
            [
                'label' => __('Chunk Size', 'selleradise-widgets'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 100,
                'step' => 1,
                'default' => 10,
            ]
        );

        $this->add_control(
            'hide_empty',
            [
                'label' => __('Hide Empty', 'selleradise-widgets'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'selleradise-widgets'),
                'label_off' => __('No', 'selleradise-widgets'),
                'return_value' => true,
                'default' => true,
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => __('Order By', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 'count',
                'options' => [
                    'name' => __('Name', 'selleradise-widgets'),
                    'count' => __('Count', 'selleradise-widgets'),
                    'id' => __('ID', 'selleradise-widgets'),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __('Order', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 'DESC',
                'options' => [
                    'ASC' => __('Ascending', 'selleradise-widgets'),
                    'DESC' => __('Descending', 'selleradise-widgets'),
                ],
            ]
        );

        $this->add_control(
            'aspect_ratio_heading',
            [
                'label' => __('Image Aspect Ratio', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'card_type' => ['default', 'onlyImage'],
                ],
            ]
        );

        $this->add_control(
            'image_ratio_width',
            [
                'label' => __('X', 'selleradise-widgets'),
                'type' => Controls_Manager::NUMBER,
                'default' => 4,
                'condition' => [
                    'card_type' => ['default', 'onlyImage', 'cardImage'],
                ],
            ]
        );

        $this->add_control(
            'image_ratio_height',
            [
                'label' => __('Y', 'selleradise-widgets'),
                'type' => Controls_Manager::NUMBER,
                'default' => 5,
                'condition' => [
                    'card_type' => ['default', 'onlyImage', 'cardImage'],
                ],
            ]
        );

        // $this->add_control(
        //     'hierarchical',
        //     [
        //         'label' => __('Hierarchical', 'selleradise-widgets'),
        //         'type' => Controls_Manager::SWITCHER,
        //         'label_on' => __('Yes', 'selleradise-widgets'),
        //         'label_off' => __('No', 'selleradise-widgets'),
        //         'return_value' => true,
        //         'default' => true,
        //     ]
        // );

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
        $terms = [];

        $available_args = ["hide_empty", "orderby", "order", "number"];

        $args = [];

        foreach ($available_args as $index => $arg) {
            if (isset($settings[$arg]) && $settings[$arg]) {
                $args[$arg] = $settings[$arg];
            }
        }

        // if (isset($settings["hierarchical"]) && $settings["hierarchical"]) {
        //     $args["parent"] = false;
        // }

        $terms = get_terms('product_cat', $args);

        if (empty($terms)) {
            return;
        }

        selleradise_widgets_get_template_part('views/widgets/categories', null,
            ["settings" => $settings, "categories" => $terms]
        );
    }

}
