<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

namespace Selleradise_Widgets\Widgets\Elementor;

class Accordion extends \Elementor\Widget_Base
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
        return 'selleradise-accordion';
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
        return __('Accordion', 'selleradise-widgets');
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
        return 'far fa-caret-square-down';
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
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'section_title',
            [
                'label' => __('Section Title', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
            ]
        );

        $accordion = new \Elementor\Repeater();

        $accordion->add_control(
            'title',
            [
                'label' => __('Title', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'text',
            ]
        );

        $accordion->add_control(
            'description',
            [
                'label' => __('Description', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
            ]
        );

        $this->add_control(
            'accordion',
            [
                'label' => __('Accordion', 'selleradise-widgets'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $accordion->get_controls(),
                'default' => [
                    [
                        'title' => __('Title #1', 'selleradise-widgets'),
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

        selleradise_locate_template('views/widgets/accordion', null, ["settings" => $settings]);
    }

}
