<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Elementor Blog Posts Widget.
 * @since 1.5.6
 */
class Houzez_Elementor_Blog_Posts extends Widget_Base {

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
        return 'houzez_elementor_blog_posts';
    }

    /**
     * Get widget title.
     * @since 1.5.6
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__( 'Blog Posts Grid', 'houzez-theme-functionality' );
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
        return 'fa fa-pencil';
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

        $category = array();
        
        houzez_get_terms_id_array( 'category', $category );

        $this->start_controls_section(
            'content_section',
            [
                'label'     => esc_html__( 'Content', 'houzez-theme-functionality' ),
                'tab'       => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'grid_style',
            [
                'label'     => esc_html__( 'Grid Style', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'style_1'  => 'Style 1',
                    'style_2'    => 'Style 2'
                ],
                "description" => '',
                'default' => 'style_1',
            ]
        );

        $this->add_control(
            'category_id',
            [
                'label'     => esc_html__( 'Category', 'houzez-theme-functionality' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => $category,
                'description' => '',
                'default' => '',
            ]
        );

        $this->add_control(
            'posts_limit',
            [
                'label'     => esc_html__('Number of posts to show', 'houzez-theme-functionality'),
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
            'title',
            [
                'label'     => esc_html__("Title", "houzez-theme-functionality"),
                'type'      => Controls_Manager::TEXT,
                'description' => '',
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'     => esc_html__("Subtitle", "houzez-theme-functionality"),
                'type'      => Controls_Manager::TEXT,
                'description' => '',
            ]
        );
        $this->add_control(
            'all_btn',
            [
                'label'     => esc_html__("All Posts Text", "houzez-theme-functionality"),
                'type'      => Controls_Manager::TEXT,
                'description' => '',
            ]
        );
        $this->add_control(
            'all_url',
            [
                'label'     => esc_html__("All Posts Link", "houzez-theme-functionality"),
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

        $args['grid_style'] =  $settings['grid_style'];
        $args['category_id'] =  $settings['category_id'];
        $args['posts_limit'] =  $settings['posts_limit'];
        $args['title'] =  $settings['title'];
        $args['offset'] =  $settings['offset'];
        $args['sub_title'] =  $settings['sub_title'];
        $args['all_btn'] = $settings['all_btn'];
        $args['all_url'] = $settings['all_url'];
       
        if( function_exists( 'houzez_blog_posts' ) ) {
            echo houzez_blog_posts( $args );
        }

    }

}

Plugin::instance()->widgets_manager->register_widget_type( new Houzez_Elementor_Blog_Posts );