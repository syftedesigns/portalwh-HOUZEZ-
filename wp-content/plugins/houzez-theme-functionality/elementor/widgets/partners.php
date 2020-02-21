<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Partners Widget.
 * @since 1.5.6
 */
class Houzez_Elementor_Partners extends Widget_Base {

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
        return 'houzez_elementor_partners';
    }

    /**
     * Get widget title.
     * @since 1.5.6
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Partners', 'houzez-theme-functionality' );
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
        return 'fa fa-handshake-o';
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
            'custom_title',
            [
                'label'     => esc_html__('Optional - Custom Title', 'houzez-theme-functionality'),
                'type'      => Controls_Manager::TEXT,
                'description' => '',
                'default' => '',
            ]
        );
        $this->add_control(
            'custom_subtitle',
            [
                'label'     => esc_html__('Optional - Custom SubTitle', 'houzez-theme-functionality'),
                'type'      => Controls_Manager::TEXT,
                'description' => '',
                'default' => '',
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
                'description' => '',
                'default' => '',
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
            'offset',
            [
                'label'     => 'Offset',
                'type'      => Controls_Manager::TEXT,
                'description' => '',
            ]
        );

        $this->add_control(
            'posts_limit',
            [
                'label'     => esc_html__( 'Limit', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::TEXT,
                'description'   => esc_html__( 'Number of testimonials to show.', 'houzez-theme-functionality' ),
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
        

        $args['custom_title'] =  $settings['custom_title'];
        $args['custom_subtitle'] =  $settings['custom_subtitle'];
        $args['posts_limit'] =  $settings['posts_limit'];
        $args['orderby'] =  $settings['orderby'];
        $args['order'] =  $settings['order'];
        $args['offset'] =  $settings['offset'];
       
        if( function_exists( 'houzez_partners' ) ) {
            echo houzez_partners( $args );
        }

        if ( Plugin::$instance->editor->is_edit_mode() ) : ?>

            <style>
                .slide-animated {
                    opacity: 1;
                }
            </style>
            <script>    
            if(jQuery("#partner-carousel").length > 0) {
                var houzez_rtl = HOUZEZ_ajaxcalls_vars.houzez_rtl;
                if( houzez_rtl == 'yes' ) {
                    houzez_rtl = true;
                } else {
                    houzez_rtl = false;
                }

                jQuery("#partner-carousel").owlCarousel({
                    rtl: houzez_rtl,
                    loop: false,
                    dots: true,
                    slideBy: 2,
                    autoplay: true,
                    autoplaySpeed: 700,
                    nav:false,
                    responsive:{
                        0: {
                            items: 1
                        },
                        320: {
                            items: 1
                        },
                        480: {
                            items: 3
                        },
                        768: {
                            items: 4
                        },
                        992: {
                            items: 4
                        }
                    }
                });

                jQuery('.btn-prev-partners').on('click',function() {
                    jQuery("#partner-carousel").trigger('prev.owl.carousel',[700])
                });
                jQuery('.btn-next-partners').on('click',function() {
                    jQuery("#partner-carousel").trigger('next.owl.carousel', [700])
                });

            }
            </script>
        
        <?php endif; 

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Houzez_Elementor_Partners );