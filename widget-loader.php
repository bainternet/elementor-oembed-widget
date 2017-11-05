<?php
namespace ElementorOembed;

use ElementorOembed\Widgets\Oembed;

if (! defined( 'ABSPATH' )) {
    exit; // Exit if accessed directly
}

/**
 * Oembed_Widget_Loader
 */
class Oembed_Widget_Loader {

    function __construct() {
        $this->hooks();
    }

    function hooks() {
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );
    }

    function on_widgets_registered() {
        //include widget file
        require __DIR__ . '/widgets/oembed-widget.php';

        //register widget with elementor
        \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Oembed() );
    }
}
new Oembed_Widget_Loader();
