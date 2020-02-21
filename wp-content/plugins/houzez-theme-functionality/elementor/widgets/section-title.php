<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Section Title Widget.
 * @since 1.5.6
 */
class Houzez_Elementor_Section_Title extends Widget_Base {

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
        return 'houzez_elementor_section_title';
    }

    /**
     * Get widget title.
     * @since 1.5.6
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Section Title', 'houzez-theme-functionality' );
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
        return 'fa fa-font';
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
            'hz_section_title',
            [
                'label'     => esc_html__( 'Title', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::TEXT,
                'description'   => esc_html__( 'Enter section title', 'houzez-theme-functionality' ),
            ]
        );

        $this->add_control(
            'hz_section_subtitle',
            [
                'label'     => esc_html__( 'Sub Title', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::TEXT,
                'description'   => esc_html__( 'Enter section subtitle', 'houzez-theme-functionality' ),
            ]
        );

        $this->add_control(
            'hz_section_title_align',
            [
                'label'     => esc_html__( 'Align', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'text-center'  => esc_html__( 'Center Align', 'houzez-theme-functionality'),
                    'text-left'    => esc_html__( 'Left Align', 'houzez-theme-functionality'),
                    'text-right'   => esc_html__( 'Right Align', 'houzez-theme-functionality'),
                ],
                'default' => 'text-center',
            ]
        );

        $this->add_control(
            'hz_section_title_color',
            [
                'label'     => esc_html__( 'Title Color Scheme', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    ''  => esc_html__( 'Default', 'houzez-theme-functionality'),
                    'houzez-section-title-light'  => esc_html__( 'Light', 'houzez-theme-functionality'),
                    'houzez-section-title-dark'   => esc_html__( 'Dark', 'houzez-theme-functionality'),
                ],
                'default' => '',
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
                
        $args['hz_section_title']        =  $settings['hz_section_title'];
        $args['hz_section_subtitle']     =  $settings['hz_section_subtitle'];
        $args['hz_section_title_align']  =  $settings['hz_section_title_align'];
        $args['hz_section_title_color']  =  $settings['hz_section_title_color'];
       
        if( function_exists( 'houzez_section_title' ) ) {
            echo houzez_section_title( $args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Houzez_Elementor_Section_Title );