<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Properties Carousel v2 Widget.
 * @since 1.5.6
 */
class Houzez_Elementor_Properties_Carousels_v2 extends Widget_Base {

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
        return 'houzez_elementor_properties_carousel_v2';
    }

    /**
     * Get widget title.
     * @since 1.5.6
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Property Carousel v2', 'houzez-theme-functionality' );
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

        $sort_by = array( 
            '' => esc_html__('Default', 'houzez-theme-functionality'), 
            'a_price' => esc_html__('Price (Low to High)', 'houzez-theme-functionality'), 
            'd_price' => esc_html__('Price (High to Low)', 'houzez-theme-functionality'),
            'a_date' => esc_html__('Date Old to New', 'houzez-theme-functionality'),
            'd_date' => esc_html__('Date New to Old', 'houzez-theme-functionality'),
            'featured_top' => esc_html__('Featured on Top', 'houzez-theme-functionality'),
            'random' => esc_html__('Random', 'houzez-theme-functionality')
        );

        $this->start_controls_section(
            'content_section',
            [
                'label'     => esc_html__( 'Content', 'houzez-theme-functionality' ),
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
            'property_ids',
            [
                'label'     => esc_html__( 'Properties IDs', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::TEXT,
                'description'   => esc_html__( 'Enter properties ids comma separated. Ex 12,305,34', 'houzez-theme-functionality' ),
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

        $this->add_control(
            'sort_by',
            [
                'label'     => esc_html__( 'Sort By', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $sort_by,
                'description' => '',
                'default' => '',
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

        //Carousel Settings
        $this->start_controls_section(
            'filters_section',
            [
                'label'     => esc_html__( 'Carousel Settings', 'houzez-theme-functionality' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'slide_infinite',
            [
                'label'     => esc_html__('Infinite Scroll', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'true' => esc_html__('Yes', 'houzez-theme-functionality' ),
                    'false' => esc_html__('No', 'houzez-theme-functionality' )
                ],
                "description" => '',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'slide_auto',
            [
                'label'     => esc_html__('Auto Play', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'false' => esc_html__('No', 'houzez-theme-functionality' ),
                    'true' => esc_html__('Yes', 'houzez-theme-functionality' )
                    
                ],
                "description" => '',
                'default' => 'false',
            ]
        );
        $this->add_control(
            'slides_to_scroll',
            [
                'label'     => esc_html__('Slides To Scroll', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6'
                ],
                "description" => '',
                'default' => '1',
            ]
        );
        $this->add_control(
            'auto_speed',
            [
                'label'     => 'Auto Play Speed',
                'type'      => Controls_Manager::TEXT,
                'description' => esc_html__("Autoplay Speed in milliseconds. Default 3000", 'houzez-theme-functionality'),
                'default' => '3000'
            ]
        );
        $this->add_control(
            'navigation',
            [
                'label'     => esc_html__('Next/Prev Navigation', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'false' => esc_html__('No', 'houzez-theme-functionality' ),
                    'true' => esc_html__('Yes', 'houzez-theme-functionality' )
                    
                ],
                "description" => '',
                'default' => 'true',
            ]
        );
        $this->add_control(
            'slide_dots',
            [
                'label'     => esc_html__('Dots Nav', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'false' => esc_html__('No', 'houzez-theme-functionality' ),
                    'true' => esc_html__('Yes', 'houzez-theme-functionality' )
                    
                ],
                "description" => '',
                'default' => 'true',
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

        $args['property_type']   =  $property_type;
        $args['property_status']   =  $property_status;
        $args['property_label']   =  $property_label;
        $args['property_state']   =  $property_state;
        $args['property_city']   =  $property_city;
        $args['property_area']   =  $property_area;

        $args['featured_prop'] =  $settings['featured_prop'];
        $args['property_ids'] =  $settings['property_ids'];
        $args['posts_limit'] =  $settings['posts_limit'];
        $args['sort_by'] =  $settings['sort_by'];
        $args['offset'] =  $settings['offset'];

        $args['custom_title'] = $settings['custom_title'];
        $args['all_btn'] = $settings['all_btn'];
        $args['all_url'] = $settings['all_url'];
        $args['slides_to_scroll'] = $settings['slides_to_scroll'];
        $args['slide_infinite'] = $settings['slide_infinite'];
        $args['slide_auto'] = $settings['slide_auto'];
        $args['auto_speed'] = $settings['auto_speed'];
        $args['navigation'] = $settings['navigation'];
        $args['slide_dots'] = $settings['slide_dots'];

        
       
        if( function_exists( 'houzez_prop_carousel_v2' ) ) {
            echo houzez_prop_carousel_v2( $args );
        }

        if ( Plugin::$instance->editor->is_edit_mode() ) : 
            $token = wp_generate_password(5, false, false);
            ?>

            <style>
                .slide-animated {
                    opacity: 1;
                }
            </style>
            <script>
            jQuery('.carousel[id^="properties-carousel-v2-"]').each(function(){
                var $div = jQuery(this);
                var token = $div.data('token');
                var obj = window['prop_carousel_v2_' + token];

                var slidesToScroll = <?php echo $settings['slides_to_scroll']; ?>,
                    autoplay = <?php echo $settings['slide_auto']; ?>,
                    autoplaySpeed = parseInt(<?php echo $settings['auto_speed']; ?>),
                    dots = <?php echo $settings['slide_dots']; ?>,
                    slide_infinite =  <?php echo $settings['slide_infinite']; ?>;

                var houzez_rtl = HOUZEZ_ajaxcalls_vars.houzez_rtl;

                if( houzez_rtl == 'yes' ) {
                    houzez_rtl = true;
                } else {
                    houzez_rtl = false;
                }

                function parseBool(str) {
                    if( str == 'true' ) { return true; } else { return false; }
                }

                var faveOwl = jQuery('#properties-carousel-v2-'+token);

                faveOwl.owlCarousel({
                    rtl: houzez_rtl,
                    loop: slide_infinite,
                    autoplay: autoplay,
                    autoplaySpeed: autoplaySpeed,
                    dots: dots,
                    smartSpeed: 700,
                    slideBy: slidesToScroll,
                    nav:false,
                    responsive:{
                        0: {
                            items: 1
                        },
                        320: {
                            items: 1
                        },
                        480: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });    


                jQuery('.btn-prev-'+token).on('click',function(){
                        faveOwl.trigger('prev.owl.carousel',[1000])
                })
                jQuery('.btn-next-'+token).on('click',function(){
                    faveOwl.trigger('next.owl.carousel')
                })

            });
            
            </script>
        
        <?php endif; 

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Houzez_Elementor_Properties_Carousels_v2 );