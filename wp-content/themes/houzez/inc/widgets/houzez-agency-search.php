<?php
/**
 * Widget Name: Agency Search
 * Version: 1.0
 * Author: Waqas Riaz
 * Author URI: http://favethemes.com/
 *
 * Created by PhpStorm.
 * User: waqasriaz
 * Date: 20/04/18
 * Time: 10:56 PM
 */

class HOUZEZ_agency_search extends WP_Widget {

    /**
     * Register widget
     **/
    public function __construct() {

        parent::__construct(
            'houzez_agency_search', // Base ID
            esc_html__( 'HOUZEZ: Agency Search', 'houzez' ), // Name
            array( 'description' => esc_html__( 'Agency Search', 'houzez' ), ) // Args
        );

    }


    /**
     * Front-end display of widget
     **/
    public function widget( $args, $instance ) {

        global $before_widget, $after_widget, $before_title, $after_title, $post;
        extract( $args );

        $allowed_html_array = array(
            'div' => array(
                'id' => array(),
                'class' => array()
            ),
            'h3' => array(
                'class' => array()
            )
        );

        $title = apply_filters('widget_title', $instance['title'] );

        echo wp_kses( $before_widget, $allowed_html_array );

        if ( $title ) echo wp_kses( $before_title, $allowed_html_array ) . $title . wp_kses( $after_title, $allowed_html_array );

        houzez_agency_search_widget();

        echo wp_kses( $after_widget, $allowed_html_array );

    }


    /**
     * Sanitize widget form values as they are saved
     **/
    public function update( $new_instance, $old_instance ) {

        $instance = array();

        /* Strip tags to remove HTML. For text inputs and textarea. */
        $instance['title'] = strip_tags( $new_instance['title'] );

        return $instance;

    }


    /**
     * Back-end widget form
     **/
    public function form( $instance ) {

        /* Default widget settings. */
        $defaults = array(
            'title' => 'Find Agency'
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e('Title:', 'houzez'); ?></label>
            <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
        </p>

        <?php
    }

}

if ( ! function_exists( 'HOUZEZ_agency_search_loader' ) ) {
    function HOUZEZ_agency_search_loader (){
        register_widget( 'HOUZEZ_agency_search' );
    }
    add_action( 'widgets_init', 'HOUZEZ_agency_search_loader' );
}

function houzez_agency_search_widget() {

    $houzez_local = houzez_get_localization();


    $agent_name = '';

    $purl = get_post_type_archive_link("houzez_agency");

    $agency_name = '';
    if (isset($_GET['agency_name'])) {
        $agency_name = $_GET['agency_name'];
    }

 ?>
    <div class="widget-range">
        <div class="widget-body">
            <form method="get" action="<?php echo esc_url($purl); ?>">
                <div class="range-block rang-form-block">
                    <div class="row">

                        <div class="col-sm-12 col-xs-12 agent_name_search_field">
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?php echo esc_attr($agency_name); ?>" name="agency_name" placeholder="<?php echo $houzez_local['search_agency_name']?>">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="range-block rang-form-block">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <button type="submit" class="btn btn-secondary btn-block"><i class="fa fa-search fa-left"></i><?php echo $houzez_local['search_agency_btn']; ?></button>
                        </div>
                     </div>
                </div>

            </form>
        </div>
    </div>
<?php
}