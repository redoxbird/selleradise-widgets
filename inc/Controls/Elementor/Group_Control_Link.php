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
class Group_Control_Link extends Group_Control_Base
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
        return 'selleradise_link';
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

        $fields['url'] = [
            'label' => _x('URL', 'Link Control', 'selleradise-widgets'),
            'type' => Controls_Manager::URL,
        ];

        $fields['text'] = [
            'label' => _x('Text', 'Link Control', 'selleradise-widgets'),
            'type' => Controls_Manager::TEXT,
            'input_type' => 'text',
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
