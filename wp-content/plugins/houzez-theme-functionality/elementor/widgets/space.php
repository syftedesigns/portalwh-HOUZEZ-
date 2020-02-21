<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Space Widget.
 * @since 1.5.6
 */
class Houzez_Elementor_Space extends Widget_Base {

    /**
     * Get widget name.
     *
     * Retrieve widget name.
     *
     * @since 1.5.6
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'houzez_elementor_space';
    }

    /**
     * Get widget title.
     * @since 1.5.6
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Empty Space', 'houzez-theme-functionality' );
    }

    /**
     * Get widget icon.
     *
     * @since 1.5.6
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'fa fa-square-o';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the widget belongs to.
     *
     * @since 1.5.6
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'houzez-elements' ];
    }

    /**
     * Register widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.5.6
     * @access protected
     */
    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label'     => esc_html__( 'Content', 'houzez-theme-functionality' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'height',
            [
                'label'     => esc_html__( 'Height of the space(px)', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::TEXT,
                'description'   => esc_html__( 'Set height of the space. You can add white space between elements to separate them beautifully.', 'houzez-theme-functionality' ),
            ]
        );
        
        $this->end_controls_section();

    }

    /**
     * Render widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.5.6
     * @access protected
     */
    protected function render() {

        $settings = $this->get_settings_for_display();
                
        $args['height'] =  $settings['height'];
       
        if( function_exists( 'houzez_space_shortcode' ) ) {
            echo houzez_space_shortcode( $args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Houzez_Elementor_Space );