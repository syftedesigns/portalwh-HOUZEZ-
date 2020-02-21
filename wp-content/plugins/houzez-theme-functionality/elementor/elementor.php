<?php
/**
 * Name         : Elementor Addons For Houzez
 * Description  : Provides additional Elementor Elements for the Houzez theme
 * Author : Waqas Riaz
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if( ! class_exists( 'Houzez_Elementor_Extensions' ) ) {
    final class Houzez_Elementor_Extensions {

        /**
         * Houzez_Extensions The single instance of Houzez_Extensions.
         * @var     object
         * @access  private
         * @since   1.5.6
         */
        private static $_instance = null;

        /**
         * Constructor function.
         * @access  public
         * @since   1.5.6
         * @return  void
         */
        public function __construct() {
            add_action( 'elementor/elements/categories_registered', array( $this, 'add_widget_categories' ) );
            add_action( 'init', array( $this, 'elementor_widgets' ),  20 );
        }

        /**
         * Houzez_Elementor_Extensions Instance
         *
         * Ensures only one instance of Houzez_Elementor_Extensions is loaded or can be loaded.
         *
         * @since 1.5.6
         * @static
         * @return Houzez_Elementor_Extensions instance
         */
        public static function instance () {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }


        /**
         * Widget Category Register
         *
         * @since  1.5.6
         * @access public
         */
        public function add_widget_categories( $elements_manager ) {
            $elements_manager->add_category(
                'houzez-elements',
                [
                    'title' => esc_html__( 'Houzez Elements', 'houzez-theme-functionality' ),
                    'icon' => 'fa fa-plug',
                ]
            );
        }

        /**
         * Widgets
         *
         * @since  1.0.0
         * @access public
         */
        public function elementor_widgets() {
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/section-title.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/space.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/properties.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-carousel-v1.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-carousel-v2.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-by-id.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/property-by-ids.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/properties-grids.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/grids.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/agents.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/icon-box.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/price-table.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/blog-posts.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/blog-posts-carousel.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/advanced-search.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/testimonials.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/team-member.php';
            require_once HOUZEZ_PLUGIN_PATH . '/elementor/widgets/partners.php';
        }
    }
}

if ( did_action( 'elementor/loaded' ) ) {
    // Finally initialize code
    Houzez_Elementor_Extensions::instance();
}