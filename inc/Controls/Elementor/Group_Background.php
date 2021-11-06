<?php

namespace Selleradise_Widgets\Controls\Elementor;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Base;

/**
 * Elementor border control.
 *
 * A base control for creating border control. Displays input fields to define
 * border type, border width and border color.
 *
 * @since 1.0.0
 */
class Group_Background extends Group_Control_Base
{

    /**
     * Fields.
     *
     * Holds all the border control fields.
     *
     * @since 1.0.0
     * @access protected
     * @static
     *
     * @var array Border control fields.
     */
    protected static $fields;

    /**
     * Get border control type.
     *
     * Retrieve the control type, in this case `border`.
     *
     * @since 1.0.0
     * @access public
     * @static
     *
     * @return string Control type.
     */
    public static function get_type()
    {
        return 'selleradise_background';
    }

    /**
     * Init fields.
     *
     * Initialize border control fields.
     *
     * @since 1.2.2
     * @access protected
     *
     * @return array Control fields.
     */
    protected function init_fields()
    {
        $fields = [];

        $fields['heading'] = [
            'label' => _x('Background', 'Background Control', 'selleradise-widgets'),
            'type' => Controls_Manager::HEADING,
        ];

        $fields['image'] = [
            'label' => _x('Image', 'Background Control', 'selleradise-widgets'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ];

        $fields['flip'] = [
            'label' => _x('Flip', 'Background Control', 'selleradise-widgets'),
            'type' => Controls_Manager::SELECT,
            'default' => 'rotate(0)',
            'options' => [
                'rotate(0)' => esc_html__('None', 'selleradise-widgets'),
                'rotateY(180deg)' => esc_html__('Horizontal', 'selleradise-widgets'),
                'rotateX(180deg)' => esc_html__('Vertical', 'selleradise-widgets'),
            ],
            'responsive' => true,
            'selectors' => [
                '{{WRAPPER}} .selleradise_Hero__image img' => 'transform: {{VALUE}};',
                '(mobile) {{WRAPPER}} .selleradise_Hero__image img' => 'transform: {{VALUE}};',
                '(tablet) {{WRAPPER}} .selleradise_Hero__image img' => 'transform: {{VALUE}};',
            ],
        ];

        $fields['position'] = [
            'label' => _x('Position', 'Background Control', 'selleradise-widgets'),
            'type' => Controls_Manager::SELECT,
            'default' => 'center center',
            'options' => [
                'top left' => esc_html__("Top left", "selleradise-widgets"),
                'top center' => esc_html__("Top center", "selleradise-widgets"),
                'top right' => esc_html__("Top right", "selleradise-widgets"),
                'center left' => esc_html__("Center left", "selleradise-widgets"),
                'center center' => esc_html__("Center Center", "selleradise-widgets"),
                'center right' => esc_html__("Center right", "selleradise-widgets"),
                'bottom left' => esc_html__("Bottom left", "selleradise-widgets"),
                'bottom center' => esc_html__("Bottom center", "selleradise-widgets"),
                'bottom right' => esc_html__("Bottom right", "selleradise-widgets"),
            ],
            'responsive' => true,
            'selectors' => [
                '{{WRAPPER}} .selleradise_Hero__image img' => 'object-position:{{VALUE}}',
                '(mobile) {{WRAPPER}} .selleradise_Hero__image img' => 'object-position: {{VALUE}}',
                '(tablet) {{WRAPPER}} .selleradise_Hero__image img' => 'object-position: {{VALUE}}',
            ],
        ];

        return $fields;
    }

    /**
     * Get default options.
     *
     * Retrieve the default options of the border control. Used to return the
     * default options while initializing the border control.
     *
     * @since 1.9.0
     * @access protected
     *
     * @return array Default border control options.
     */
    protected function get_default_options()
    {
        return [
            'popover' => false,
        ];
    }
}
