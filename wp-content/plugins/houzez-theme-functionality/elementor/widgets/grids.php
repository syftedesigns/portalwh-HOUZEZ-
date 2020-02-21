<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Grids Widget.
 * @since 1.5.6
 */
class Houzez_Elementor_Grids extends Widget_Base {

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
        return 'houzez_elementor_grids';
    }

    /**
     * Get widget title.
     * @since 1.5.6
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Houzez Grids', 'houzez-theme-functionality' );
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
        return 'fa fa-th';
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

        $prop_states = array();
        $prop_cities = array();
        $prop_types = array();
        $prop_status = array();
        $prop_area = array();
        $prop_label = array();
        
        houzez_get_terms_array( 'property_status', $prop_status );
        houzez_get_terms_array( 'property_type', $prop_types );
        houzez_get_terms_array( 'property_city', $prop_cities );
        houzez_get_terms_array( 'property_state', $prop_states );
        houzez_get_terms_array( 'property_label', $prop_label );
        houzez_get_terms_array( 'property_area', $prop_area );

        $this->start_controls_section(
            'content_section',
            [
                'label'     => esc_html__( 'Content', 'houzez-theme-functionality' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'houzez_grid_type',
            [
                'label'     => esc_html__( 'Choose Grid', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'grid_v1'  => esc_html__( 'Grid v1', 'houzez-theme-functionality'),
                    'grid_v2'    => esc_html__( 'Grid v2', 'houzez-theme-functionality')
                ],
                'description' => '',
                'default' => 'grid_v1',
            ]
        );

        $this->add_control(
            'houzez_grid_from',
            [
                'label'     => esc_html__( 'Choose Taxonomy', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'property_type' => 'Property Types',
                    'property_status' => 'Property Status',
                    'property_label' => 'Property Label',
                    'property_state' => 'Property State',
                    'property_city' => 'Property City',
                    'property_area' => 'Property Neighborhood',
                ],
                'description' => '',
                'default' => 'property_type',
            ]
        );

        $this->add_control(
            'property_type',
            [
                'label'     => esc_html__( 'Property Type', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT2,
                'options'   => $prop_types,
                'description' => '',
                'multiple' => true,
                'default' => '',
            ]
        );

        $this->add_control(
            'property_status',
            [
                'label'     => esc_html__( 'Property Status', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT2,
                'options'   => $prop_status,
                'description' => '',
                'multiple' => true,
                'default' => '',
            ]
        );

        $this->add_control(
            'property_label',
            [
                'label'     => esc_html__( 'Property Label', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT2,
                'options'   => $prop_label,
                'description' => '',
                'multiple' => true,
                'default' => '',
            ]
        );

        $this->add_control(
            'property_state',
            [
                'label'     => esc_html__( 'Property State', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT2,
                'options'   => $prop_states,
                'description' => '',
                'multiple' => true,
                'default' => '',
            ]
        );

        $this->add_control(
            'property_city',
            [
                'label'     => esc_html__( 'Property City', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT2,
                'options'   => $prop_cities,
                'description' => '',
                'multiple' => true,
                'default' => '',
            ]
        );

        $this->add_control(
            'property_area',
            [
                'label'     => esc_html__( 'Property Area', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT2,
                'options'   => $prop_area,
                'description' => '',
                'multiple' => true,
                'default' => '',
            ]
        );

        $this->add_control(
            'houzez_show_child',
            [
                'label'     => esc_html__( 'Show Child', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    '0'  => esc_html__( 'No', 'houzez-theme-functionality'),
                    '1'    => esc_html__( 'Yes', 'houzez-theme-functionality')
                ],
                'description' => '',
                'default' => '0',
            ]
        );

        $this->add_control(
            'houzez_hide_empty',
            [
                'label'     => esc_html__( 'Hide Empty', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    '0'  => esc_html__( 'No', 'houzez-theme-functionality'),
                    '1'    => esc_html__( 'Yes', 'houzez-theme-functionality')
                ],
                'description' => '',
                'default' => '1',
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'     => esc_html__( 'Order By', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'name'  => esc_html__( 'Name', 'houzez-theme-functionality'),
                    'count'    => esc_html__( 'Count', 'houzez-theme-functionality'),
                    'id'    => esc_html__( 'ID', 'houzez-theme-functionality')
                ],
                'description' => '',
                'default' => 'name',
            ]
        );

        $this->add_control(
            'order',
            [
                'label'     => esc_html__( 'Order', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'ASC'  => esc_html__( 'ASC', 'houzez-theme-functionality'),
                    'DESC'  => esc_html__( 'DESC', 'houzez-theme-functionality')
                ],
                'default' => 'ASC',
            ]
        );


        $this->add_control(
            'no_of_terms',
            [
                'label'     => esc_html__('Number of Items to Show', 'houzez-theme-functionality'),
                'type'      => Controls_Manager::TEXT,
                'description' => '',
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
        $property_type = $property_status = $property_label = $property_state = $property_city = $property_area = array();

        if(!empty($settings['property_type'])) {
            $property_type = implode (",", $settings['property_type']);
        }

        if(!empty($settings['property_status'])) {
            $property_status = implode (",", $settings['property_status']);
        }

        if(!empty($settings['property_label'])) {
            $property_label = implode (",", $settings['property_label']);
        }

        if(!empty($settings['property_state'])) {
            $property_state = implode (",", $settings['property_state']);
        }

        if(!empty($settings['property_city'])) {
            $property_city = implode (",", $settings['property_city']);
        }

        if(!empty($settings['property_area'])) {
            $property_area = implode (",", $settings['property_area']);
        }

        $args['houzez_grid_type'] =  $settings['houzez_grid_type'];
        $args['houzez_grid_from'] =  $settings['houzez_grid_from'];
        $args['houzez_show_child'] =  $settings['houzez_show_child'];
        $args['orderby'] =  $settings['orderby'];
        $args['order'] =  $settings['order'];
        $args['houzez_hide_empty'] =  $settings['houzez_hide_empty'];
        $args['no_of_terms'] =  $settings['no_of_terms'];

        $args['property_type']   =  $property_type;
        $args['property_status']   =  $property_status;
        $args['property_label']   =  $property_label;
        $args['property_state']   =  $property_state;
        $args['property_city']   =  $property_city;
        $args['property_area']   =  $property_area;
       
        if( function_exists( 'houzez_grids' ) ) {
            echo houzez_grids( $args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Houzez_Elementor_Grids );