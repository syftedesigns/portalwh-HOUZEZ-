<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Properties Grids Widget.
 * @since 1.5.6
 */
class Houzez_Elementor_Properties_Grids extends Widget_Base {

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
        return 'houzez_elementor_properties_grids';
    }

    /**
     * Get widget title.
     * @since 1.5.6
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Property Grids', 'houzez-theme-functionality' );
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
        return 'fa fa-building-o';
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
            'prop_grid_type',
            [
                'label'     => esc_html__( 'Grid Style', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'grid_1'  => 'Grid v1',
                    'grid_2'    => 'Gri v2',
                    'grid_3'    => 'Gri v3',
                    'grid_4'    => 'Gri v4',
                ],
                'description' => '',
                'default' => 'grid_1',
            ]
        );

        $this->add_control(
            'posts_limit',
            [
                'label'     => esc_html__('Number of properties', 'houzez-theme-functionality'),
                'type'      => Controls_Manager::TEXT,
                'description' => '',
                'default' => '9',
            ]
        );

        $this->add_control(
            'offset',
            [
                'label'     => 'Offset',
                'type'      => Controls_Manager::TEXT,
                'description' => '',
            ]
        );

        $this->add_control(
            'custom_title',
            [
                'label'     => esc_html__("Optional - Custom Title", "houzez-theme-functionality"),
                'type'      => Controls_Manager::TEXT,
                'description' => '',
            ]
        );

        $this->add_control(
            'all_btn',
            [
                'label'     => esc_html__("All - Button Text", "houzez-theme-functionality"),
                'type'      => Controls_Manager::TEXT,
                'description' => '',
            ]
        );
        $this->add_control(
            'all_url',
            [
                'label'     => esc_html__("All - Button URL", "houzez-theme-functionality"),
                'type'      => Controls_Manager::TEXT,
                'description' => '',
            ]
        );
        
        $this->end_controls_section();

        //Filters
        $this->start_controls_section(
            'filters_section',
            [
                'label'     => esc_html__( 'Filters', 'houzez-theme-functionality' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
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
            'featured_prop',
            [
                'label'     => esc_html__( 'Featured Properties', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    ''  => esc_html__( '- Any -', 'houzez-theme-functionality'),
                    'no'    => esc_html__('Without Featured', 'houzez'),
                    'yes'  => esc_html__('Only Featured', 'houzez')
                ],
                "description" => esc_html__("You can make a post featured by clicking featured properties checkbox while add/edit post", "houzez-theme-functionality"),
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
        $property_type = $property_status = $property_label = $property_state = $property_city = $property_area = '';

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

        $args['prop_grid_type'] =  $settings['prop_grid_type'];
        $args['featured_prop'] =  $settings['featured_prop'];
        $args['posts_limit'] =  $settings['posts_limit'];
        $args['offset'] =  $settings['offset'];
        $args['custom_title'] =  $settings['custom_title'];
        $args['all_btn'] =  $settings['all_btn'];
        $args['all_url'] =  $settings['all_url'];

        $args['property_type']   =  $property_type;
        $args['property_status']   =  $property_status;
        $args['property_label']   =  $property_label;
        $args['property_state']   =  $property_state;
        $args['property_city']   =  $property_city;
        $args['property_area']   =  $property_area;
       
        if( function_exists( 'houzez_prop_grids' ) ) {
            echo houzez_prop_grids( $args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Houzez_Elementor_Properties_Grids );