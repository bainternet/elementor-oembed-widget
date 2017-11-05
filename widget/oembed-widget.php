<?php
namespace ElementorOembed\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if (! defined( 'ABSPATH' )) {
    exit; // Exit if accessed directly
}

/**
 * Elementor Oembed widget
 *
 * Elementor widget for Oembed.
 *
 * @since 1.0.0
 */
class Oembed extends Widget_Base
{

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name()
    {
        return 'oembed';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title()
    {
        return __( 'Oembed', 'elementor-oembed-widget' );
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon()
    {
        return 'fa fa-code';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories()
    {
        return [ 'general-elements' ];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'elementor-oembed-widget' ),
            ]
        );

        $this->add_control(
            'url',
            [
                'label'       => __( 'URL to embed', 'elementor-oembed-widget' ),
                'type'        => Controls_Manager::TEXT,
                'input_type'  => 'url',
                'placeholder' => 'http://url/to/oembed',
                'title'       => __( 'URL to Embed', 'elementor-oembed-widget' )
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings();
        $html = wp_oembed_get($settings['url']);
        echo '<div class="Oembed">';
        echo ($html)? $html: $settings['url'];
        echo '</div>';
    }
}
