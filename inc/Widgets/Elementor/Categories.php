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
    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        wp_register_script('selleradise-widget-categories', SELLERADISE_WIDGETS_DIR_URI . '/assets/dist/js/widgets/categories.js', ['elementor-frontend'], selleradise_widgets_get_version(), true);

    }

    public function get_script_depends()
    {
        return ['selleradise-widget-categories'];
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
                'default' => __('Categories', 'selleradise-widgets'),
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label' => __('Section Subtitle', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => __('Explore the shop', 'selleradise-widgets'),
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

        if (class_exists('Selleradise\\Init')) {

            $this->add_control(
                'card_type',
                [
                    'label' => __('Type', 'selleradise-widgets'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'default' => esc_html__('Default', 'selleradise-widgets'),
                        'rounded' => esc_html__('Rounded', 'selleradise-widgets'),
                        'icon' => esc_html__('Icon', 'selleradise-widgets'),
                        'card-image-alt' => esc_html__('Image Card Alt', 'selleradise-widgets'),
                        'onlyImage' => esc_html__('Image Only', 'selleradise-widgets'),
                        'onlyText' => esc_html__('Text Only', 'selleradise-widgets'),
                    ],
                ]
            );
        } else {
            $this->add_control(
                'card_type',
                [
                    'label' => __('Card Type', 'selleradise-widgets'),
                    'type' => Controls_Manager::HIDDEN,
                    'default' => 'default',
                ]
            );
        }

        $this->add_control(
            'include',
            [
                'label' => __('Include', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->get_select_categories(),
                'multiple' => true,
            ]
        );

        $this->add_control(
            'parent',
            [
                'label' => __('Top Level', 'selleradise-widgets'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'selleradise-widgets'),
                'label_off' => __('No', 'selleradise-widgets'),
                'return_value' => "yes",
                'default' => false,
            ]
        );

        $this->add_control(
            'hide_empty',
            [
                'label' => __('Hide Empty', 'selleradise-widgets'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'selleradise-widgets'),
                'label_off' => __('No', 'selleradise-widgets'),
                'return_value' => "yes",
                'default' => "yes",
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
            'number',
            [
                'label' => __('Limit', 'selleradise-widgets'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 1000,
                'step' => 1,
                'default' => 100,
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
                'default' => 6,
                'frontend_available' => true,
            ]
        );

        $this->add_responsive_control(
            'width',
            [
                'label' => __('Item Width', 'selleradise-widgets'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['rem'],
                'range' => [
                    'rem' => [
                        'min' => 5,
                        'max' => 95,
                        'step' => 0.5,
                    ],
                ],
                'default' => [
                    'unit' => 'rem',
                    'size' => 14,
                ],
                'desktop_default' => [
                    'unit' => 'rem',
                    'size' => 14,
                ],
                'tablet_default' => [
                    'unit' => 'rem',
                    'size' => 14,
                ],
                'mobile_default' => [
                    'unit' => 'rem',
                    'size' => 13,
                ],
                'selectors' => [
                    '{{WRAPPER}} .selleradiseWidgets_Categories' => '--width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'card_type' => ['default', 'card-image-alt', 'onlyImage', 'onlyText'],
                ],
            ]
        );

        $this->add_control(
            'aspect_ratio_heading',
            [
                'label' => __('Image Aspect Ratio', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::HEADING,
                'condition' => [
                    'card_type' => ['default', 'onlyImage', 'cardImage'],
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
                    'card_type' => ['default', 'onlyImage', 'cardImage', 'card-image-alt'],
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
                    'card_type' => ['default', 'onlyImage', 'cardImage', 'card-image-alt'],
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

        $terms = [];

        $available_args = ["orderby", "order", "number"];

        $args = [];

        foreach ($available_args as $index => $arg) {
            if (isset($settings[$arg]) && $settings[$arg]) {
                $args[$arg] = $settings[$arg];
            }
        }

        if (isset($settings["parent"]) && $settings["parent"] === "yes") {
            $args["parent"] = 0;
        }

        if (isset($settings["hide_empty"]) && $settings["hide_empty"] === "yes") {
            $args["hide_empty"] = true;
        } else {
            $args["hide_empty"] = 0;
        }

        if (isset($settings['include']) && $settings['include'] && !empty($settings['include'])) {
            $args['include'] = $settings['include'];
            $args['orderby'] = 0;
        }

        $terms = get_terms('product_cat', $args);

        selleradise_widgets_get_template_part('template-parts/widgets/categories', null,
            ["settings" => $settings, "categories" => $terms]
        );
    }

    public function get_select_categories($limit = 1000)
    {
        $terms = get_terms(array(
            'taxonomy' => 'product_cat',
            'hide_empty' => false,
            'orderby' => 'count',
            'order' => 'DESC',
            'number' => $limit,
        ));

        if (!$terms) {
            return;
        }

        $product_categories = [];

        foreach ($terms as $term) {
            $product_categories[$term->term_id] = $term->name;
        }

        return $product_categories;
    }

}
