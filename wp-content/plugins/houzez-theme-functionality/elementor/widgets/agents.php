<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Agents Widget.
 * @since 1.5.6
 */
class Houzez_Elementor_Agents extends Widget_Base {

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
        return 'houzez_elementor_agents';
    }

    /**
     * Get widget title.
     * @since 1.5.6
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Agents', 'houzez-theme-functionality' );
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
        return 'fa fa-black-tie';
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

        $agent_category = array();
        $agent_city = array();
        
        houzez_get_terms_array( 'agent_category', $agent_category );
        houzez_get_terms_array( 'agent_city', $agent_city );

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
            'agents_type',
            [
                'label'     => esc_html__( 'Agents Type', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'grid'  => esc_html__('Grid', 'houzez-theme-functionality'),
                    'Carousel'    => esc_html__('Carousel', 'houzez')
                ],
                "description" => '',
                'default' => 'grid',
            ]
        );

        $this->add_control(
            'agent_category',
            [
                'label'     => esc_html__( 'Category', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $agent_category,
                'description' => '',
                'default' => '',
            ]
        );

        $this->add_control(
            'agent_city',
            [
                'label'     => esc_html__('City', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $agent_city,
                'description' => '',
                'default' => '',
            ]
        );

        $this->add_control(
            'posts_limit',
            [
                'label'     => esc_html__('Number of Agents', 'houzez-theme-functionality'),
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
            'orderby',
            [
                'label'     => esc_html__( 'Order By', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'none'  => esc_html__( 'None', 'houzez-theme-functionality'),
                    'ID'  => esc_html__( 'ID', 'houzez-theme-functionality'),
                    'title'   => esc_html__( 'Title', 'houzez-theme-functionality'),
                    'date'   => esc_html__( 'Date', 'houzez-theme-functionality'),
                    'rand'   => esc_html__( 'Random', 'houzez-theme-functionality'),
                    'menu_order'   => esc_html__( 'Menu Order', 'houzez-theme-functionality'),
                ],
                'default' => 'none',
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
            'custom_title',
            [
                'label'     => esc_html__("Optional - Custom Title", "houzez-theme-functionality"),
                'type'      => Controls_Manager::TEXT,
                'description' => '',
            ]
        );

        $this->add_control(
            'custom_subtitle',
            [
                'label'     => esc_html__("Optional - Custom Subtitle", "houzez-theme-functionality"),
                'type'      => Controls_Manager::TEXT,
                'description' => '',
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

        $agent_category = $agent_city = array();

        if(!empty($settings['agent_category'])) {
            $agent_category = implode (",", $settings['agent_category']);
        }

        if(!empty($settings['agent_city'])) {
            $agent_city = implode (",", $settings['agent_city']);
        }

        $args['agent_category']   =  $agent_category;
        $args['agent_city']   =  $agent_city;

        $args['agents_type'] =  $settings['agents_type'];
        $args['orderby'] =  $settings['orderby'];
        $args['posts_limit'] =  $settings['posts_limit'];
        $args['order'] =  $settings['order'];
        $args['offset'] =  $settings['offset'];

        $args['custom_title'] = $settings['custom_title'];
        $args['custom_subtitle'] = $settings['custom_subtitle'];
    
       
        if( function_exists( 'houzez_agents' ) ) {
            echo houzez_agents( $args );
        }

        if ( Plugin::$instance->editor->is_edit_mode() ) : 
            $token = wp_generate_password(5, false, false);
            if (is_rtl()) {
                $houzez_rtl = "true";
            } else {
                $houzez_rtl = "false";
            }
            ?>

            <style>
                .slide-animated {
                    opacity: 1;
                }
            </style>
            <script>
            if(jQuery("#agents-carousel-<?php echo esc_attr( $token ); ?>").length > 0){
                var owlAgents = jQuery('#agents-carousel-<?php echo esc_attr( $token ); ?>');
                owlAgents.owlCarousel({
                    rtl: <?php echo esc_attr( $houzez_rtl ); ?>,
                    loop: true,
                    dots: false,
                    slideBy: 1,
                    autoplay: true,
                    autoplaySpeed: 700,
                    nav: false,
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
                        },
                        1280: {
                            items: 4
                        }
                    }
                });

                jQuery('.btn-prev-agents').on('click',function() {
                    owlAgents.trigger('prev.owl.carousel',[700])
                });
                jQuery('.btn-next-agents').on('click',function() {
                    owlAgents.trigger('next.owl.carousel',[700])
                });

            }
            
            </script>
        
        <?php endif;

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Houzez_Elementor_Agents );