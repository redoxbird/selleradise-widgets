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

class Posts extends \Elementor\Widget_Base

{

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        wp_register_script('selleradise-widget-posts', SELLERADISE_WIDGETS_DIR_URI . '/assets/dist/js/widgets/posts.js', ['elementor-frontend'], selleradise_widgets_get_version(), true);

    }

    public function get_script_depends()
    {
        return ['selleradise-widget-posts'];
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
        return 'selleradise-posts';
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
        return __('Posts', 'selleradise-widgets');
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
                'default' => __('Posts', 'selleradise-widgets'),
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label' => __('Section Subtitle', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => __('Recent in the blog', 'selleradise-widgets'),
            ]
        );

        if (class_exists('Selleradise\\Init')) {

            $this->add_control(
                'card_type',
                [
                    'label' => __('Card Type', 'selleradise-widgets'),
                    'type' => Controls_Manager::SELECT,
                    'default' => 'default',
                    'options' => [
                        'default' => esc_html__('Default', 'selleradise-widgets'),
                        'minimal' => esc_html__('Minimal', 'selleradise-widgets'),
                    ],
                ]
            );

        } else {
            $this->add_control(
                'card_type',
                [
                    'label' => __('Card Type', 'selleradise-widgets'),
                    'type' => Controls_Manager::HIDDEN,
                    'default' => 'popular',
                ]
            );
        }

        $this->add_control(
            'orderby',
            [
                'label' => __('Order By', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 'menu_order',
                'options' => [
                    'menu_order' => esc_html__('Default', 'selleradise-widgets'),
                    'date' => esc_html__('Date', 'selleradise-widgets'),
                    'rand' => esc_html__('Random', 'selleradise-widgets'),
                    'title' => esc_html__('Title', 'selleradise-widgets'),
                    'comment_count' => esc_html__('Comment Count', 'selleradise-widgets'),
                ],
            ]
        );

        $this->add_control(
            'order',
            [
                'label' => __('Order', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 'ASC',
                'options' => [
                    'ASC' => esc_html__('Ascending', 'selleradise-widgets'),
                    'DESC' => esc_html__('Descending', 'selleradise-widgets'),
                ],
            ]
        );

        $this->add_control(
            'categories',
            [
                'label' => __('Categories', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->get_select_categories(),
                'multiple' => true,
            ]
        );

        $this->add_control(
            'limit',
            [
                'label' => __('Limit', 'selleradise-widgets'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 50,
                'step' => 1,
                'default' => 5,
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

        $args = [
            'post_type' => 'post',
            'posts_per_page' => $settings['limit'] ?? 8,
        ];

        if (isset($settings['categories']) && $settings['categories'] && !empty($settings['categories'])) {
            $args['category_name'] = implode(',', $settings['categories']);
        }

        if (isset($settings['orderby']) && $settings['orderby']) {
            $args['orderby'] = $settings['orderby'];
        }

        if (isset($settings['order']) && $settings['order']) {
            $args['order'] = $settings['order'];
        }

        $posts = new WP_Query($args);

        selleradise_widgets_get_template_part('template-parts/widgets/posts', null, [
            'posts' => $posts,
            'settings' => $settings,
        ]);

    }

    public function get_select_categories($limit = 1000)
    {
        $terms = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => false,
            'orderby' => 'count',
            'order' => 'DESC',
            'number' => $limit,
        ));

        if (!$terms) {
            return;
        }

        $categories = [];

        $categories['all'] = 'All Categories';

        foreach ($terms as $term) {
            $categories[$term->slug] = $term->name;
        }

        return $categories;
    }

}
