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

class PromoCards extends \Elementor\Widget_Base

{

    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        wp_register_script('selleradise-widget-promo-cards', SELLERADISE_WIDGETS_DIR_URI . '/assets/dist/js/widgets/promo-cards.js', ['elementor-frontend'], selleradise_widgets_get_version(), true);

    }

    public function get_script_depends()
    {
        return ['selleradise-widget-promo-cards'];
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
        return 'selleradise-promo-cards';
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
        return __('Promo Cards', 'selleradise-widgets');
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

        $card = new \Elementor\Repeater();

        $card->add_control(
            'title',
            [
                'label' => __('Title', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
            ]
        );

        $card->add_control(
            'subtitle',
            [
                'label' => __('Subtitle', 'selleradise-widgets'),
                'type' => Controls_Manager::TEXT,
                'input_type' => 'text',
            ]
        );

        $card->add_control(
            'cta_heading',
            [
                'label' => __('Call to action', 'selleradise-widgets'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $card->add_control(
            'link',
            [
                'label' => __('Link', 'selleradise-widgets'),
                'type' => Controls_Manager::URL,
            ]
        );

        $card->add_control(
            'image_heading',
            [
                'label' => __('Image', 'selleradise-widgets'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $card->add_control(
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
            'cards',
            [
                'label' => __('Cards', 'selleradise-widgets'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $card->get_controls(),
                'title_field' => '{{{ title }}}',
                'default' => [
                    [
                        'title' => __('Embrace the new style.', 'selleradise-widgets'),
                        'subtitle' => __('Upto 50% off.', 'selleradise-widgets'),
                        'cta_text' => 'Shop Now',
                    ],
                    [
                        'title' => __('Most comfortable pillows.', 'selleradise-widgets'),
                        'subtitle' => __('Buy 1 get 1 FREE.', 'selleradise-widgets'),
                        'cta_text' => 'See Offer',
                    ],
                    [
                        'title' => __('Bestselling furniture.', 'selleradise-widgets'),
                        'subtitle' => __('Starting from 500.', 'selleradise-widgets'),
                        'cta_text' => 'Shop Now',
                    ],
                ],
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
                'label' => __('Card Type', 'selleradise-widgets'),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => esc_html__('Default', 'selleradise-widgets'),
                    'bold' => esc_html__('Bold', 'selleradise-widgets'),
                ],
            ]
        );

        $this->add_control(
            'adaptive_colors',
            [
                'label' => __('Adaptive Colors', 'selleradise-widgets'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'selleradise-widgets'),
                'label_off' => __('No', 'selleradise-widgets'),
                'return_value' => 'yes',
                'default' => 0,
                'frontend_available' => true,
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

        $type = isset($settings['card_type']) && $settings['card_type'] ? $settings['card_type'] : 'default';

        selleradise_widgets_get_template_part('template-parts/widgets/promo-cards/' . $type, null, ["settings" => $settings]);
    }

}
