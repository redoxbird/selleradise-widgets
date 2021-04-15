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
        return __('Features List', 'selleradise-widgets');
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
            'show_cta',
            [
                'label' => __('Show Call To Action', 'selleradise-widgets'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'selleradise-widgets'),
                'label_off' => __('Hide', 'selleradise-widgets'),
                'return_value' => 'yes',
                'default' => 0,
            ]
        );

        $features->add_group_control(
            Group_Control_Link::get_type(),
            [
                'name' => 'cta',
                'label' => __('Call To Action', 'selleradise-widgets'),
                'condition' => [
                    'show_cta' => 'yes',
                ],
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
                        'title' => __('Get the light where it is needed the most.', 'selleradise-widgets'),
                        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sit amet nisl ullamcorper',
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

        selleradise_widgets_get_template_part('views/widgets/features', 'list', ["settings" => $settings]);
    }

}
