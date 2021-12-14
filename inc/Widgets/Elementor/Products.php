<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

namespace Selleradise_Widgets\Widgets\Elementor;

use WC_Product_Query;
use \Elementor\Controls_Manager;

class Products extends \Elementor\Widget_Base

{

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        wp_register_script('selleradise-widget-products', SELLERADISE_WIDGETS_DIR_URI . '/assets/dist/js/widgets/products.js', ['elementor-frontend'], selleradise_widgets_get_version(), true);

    }

    public function get_script_depends()
    {
        return ['selleradise-widget-products'];
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
        return 'selleradise-products';
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
        return __('Products', 'selleradise-widgets');
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
                'default' => __('Products', 'selleradise-widgets'),
            ]
        );

        $this->add_control(
            'section_subtitle',
            [
                'label' => __('Section Subtitle', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
                'default' => __('Recent in the shop', 'selleradise-widgets'),
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
                        'simple' => esc_html__('Simple', 'selleradise-widgets'),
                        'list' => esc_html__('List', 'selleradise-widgets'),
                        'compact' => esc_html__('Compact', 'selleradise-widgets'),
                    ],
                    "frontend_available" => true,
                ]
            );
        } else {
            $this->add_control(
                'card_type',
                [
                    'label' => __('Card Type', 'selleradise-widgets'),
                    'type' => Controls_Manager::HIDDEN,
                    'default' => 'default',
                    "frontend_available" => true,
                ]
            );
        }

        $this->add_control(
            'status',
            [
                'label' => __('Status', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Any', 'selleradise-widgets'),
                    'featured' => esc_html__('Featured', 'selleradise-widgets'),
                    'onsale' => esc_html__('On Sale', 'selleradise-widgets'),
                ],
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label' => __('Order By', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 'menu_order',
                'options' => [
                    'menu_order' => esc_html__('Default', 'selleradise-widgets'),
                    'date' => esc_html__('Date', 'selleradise-widgets'),
                    'price' => esc_html__('Price', 'selleradise-widgets'),
                    'title' => esc_html__('Title', 'selleradise-widgets'),
                    'rand' => esc_html__('Random', 'selleradise-widgets'),
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
                'default' => 9,
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

        if (!class_exists('WooCommerce')) {
            return;
        }

        $settings = $this->get_settings_for_display();

        $args = [
            'limit' => $settings['limit'] ?? 8,
            'visibility' => 'visible',
        ];

        $url_params = [];

        if (isset($settings['categories']) && $settings['categories'] && !empty($settings['categories'])) {
            $args['category'] = $settings['categories'];
            $url_params['product_cat'] = implode(',', $settings['categories']);
        }

        if (isset($settings['status']) && $settings['status'] == 'featured') {
            $args['featured'] = true;
        }

        if (isset($settings['status']) && $settings['status'] == 'onsale') {
            $args['selleradise_onsale'] = true;
        }

        $order_by = $settings['orderby'] ?? 'date';
        $order = $settings['order'] ?? 'DESC';
        $order_args = WC()->query->get_catalog_ordering_args($order_by, $order);
        $args = array_merge($args, $order_args);

        $url_params['orderby'] = $order_by;
        $url_params['order'] = $order;

        if ($order_by === 'price' && $order === 'DESC') {
            $url_params['orderby'] = 'price-desc';
        }

        if ($order_by === 'menu_order' && $order === 'DESC') {
            $url_params['orderby'] = 'menu_order-desc';
        }

        $products_query = new WC_Product_Query($args);
        $products = $products_query->get_products();

        $shop_link = wc_get_page_permalink('shop');
        $more_link = $shop_link . "?" . http_build_query($url_params);

        selleradise_widgets_get_template_part('template-parts/widgets/products', null, [
            'products' => $products,
            'settings' => $settings,
            'more_link' => $more_link,
        ]
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

        $product_categories['all'] = 'All Categories';

        // dd($terms);

        foreach ($terms as $term) {
            $product_categories[$term->slug] = $term->name;
        }

        return $product_categories;
    }

}
