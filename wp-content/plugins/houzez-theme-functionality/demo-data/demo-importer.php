<?php
function houzez_importer_intro( $default_text ) {
    $message = '<p>'. esc_html__( 'Best if used on new WordPress install.', 'houzez' ) .'</p>';
      $message .= '<p>'. esc_html__( 'Images are for demo purpose only.', 'houzez' ) .'</p>';
      $message .= '<p>'. __( '<strong>HOUZEZ09:</strong> Only homepage revolution slider will be import, other sliders can be find in download zip file in "houzez09 slider" folder.', 'houzez' ) .'</p>';
      $message .= '
      <h3>What if the Import fails or stalls?</h3>

      <p>
      If the import stalls and fails to respond after a few minutes You are suffering from PHP configuration limits that are set too low to complete the process. You should contact your hosting provider and ask them to increase those limits to a minimum as follows:
      </p>
      <ul style="margin-left: 60px">
          <li>max_execution_time 400</li>
          <li>memory_limit 128M</li>
          <li>post_max_size 32M</li>
          <li>upload_max_filesize 32M</li>
      </ul>
      <p>You can verify your PHP configuration limits by installing a simple plugin found here: <a href="http://wordpress.org/extend/plugins/wordpress-php-info" target="_blank">http://wordpress.org/extend/plugins/wordpress-php-info</a>. And you can also check your PHP error logs to see the exact error being returned.</p>
      <p>If you were not able to import demo, please contact on our <a target="_blank" href="https://favethemes.ticksy.com/"><b>support forum</b></a>, our technical staff will import demo for you.</p>
      ';

      return $message;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'houzez_importer_intro' );

function houzez_importer_plugin_page_setup( $default_settings ) {
    $default_settings['parent_slug'] = 'themes.php';
    $default_settings['page_title']  = esc_html__( 'Houzez Demo Import' , 'houzez-theme-functionality' );
    $default_settings['menu_title']  = esc_html__( 'Houzez Demo Importer' , 'houzez-theme-functionality' );
    $default_settings['capability']  = 'import';
    $default_settings['menu_slug']   = 'houzez-one-click-demo-import';

    return $default_settings;
}
add_filter( 'pt-ocdi/plugin_page_setup', 'houzez_importer_plugin_page_setup' );

function Houzez_Import_Files() {
  return array(
    array(
      'import_file_name'             => 'Houzez01',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez01/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez01/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez01/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez01/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez01.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez02',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez02/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez02/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez02/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez02/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez02.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez03',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez03/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez03/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez03/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez03/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez03.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez04',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez04/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez04/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez04/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez04/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez04.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez05',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez05/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez05/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez05/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez05/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez05.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez06',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez06/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez06/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez06/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez06/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez06.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez07',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez07/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez07/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez07/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez07/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez07.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez08',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez08/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez08/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez08/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez08/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez08.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez09',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez09/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez09/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez09/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez09/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez09.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez10',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez10/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez10/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez10/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez10/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez10.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez11',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez11/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez11/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez11/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez11/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez11.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez12',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez12/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez12/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez12/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez12/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez12.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez13',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez13/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez13/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez13/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez13/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez13.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez14',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez14/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez14/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez14/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez14/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez14.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez15',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez15/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez15/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez15/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez15/screen-image.png',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez15.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez16',
      'categories'                   => array( 'WP Bakery' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez16/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez16/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/vc/houzez16/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/vc/houzez16/screen-image.png',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez16.favethemes.com',
    ),

    /*=========== Elementor ================================================================*/
    array(
      'import_file_name'             => 'Houzez01',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez01/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez01/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez01/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez01/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez01.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez02',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez02/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez02/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez02/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez02/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez02.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez03',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez03/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez03/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez03/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez03/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez03.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez04',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez04/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez04/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez04/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez04/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez04.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez05',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez05/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez05/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez05/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez05/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez05.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez06',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez06/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez06/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez06/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez06/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez06.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez07',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez07/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez07/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez07/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez07/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez07.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez08',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez08/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez08/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez08/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez08/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez08.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez09',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez09/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez09/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez09/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez09/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez09.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez10',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez10/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez10/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez10/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez10/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez10.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez11',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez11/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez11/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez11/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez11/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez11.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez12',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez12/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez12/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez12/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez12/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez12.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez13',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez13/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez13/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez13/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez13/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez13.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez14',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez14/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez14/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez14/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez14/screen-image.jpg',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez14.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez15',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez15/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez15/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez15/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez15/screen-image.png',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez15.favethemes.com',
    ),

    array(
      'import_file_name'             => 'Houzez16',
      'categories'                   => array( 'Elementor' ),
      'local_import_file'            => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez16/content.xml',
      'local_import_widget_file'     => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez16/widgets.json',
      'local_import_customizer_file' => '',
      'local_import_redux'           => array(
        array(
          'file_path'   => HOUZEZ_PLUGIN_PATH.'/demo-data/elementor/houzez16/theme-options.json',
          'option_name' => 'houzez_options',
        ),
      ),

      'import_preview_image_url'     => HOUZEZ_PLUGIN_URL.'/demo-data/elementor/houzez16/screen-image.png',
      'import_notice'                => __( 'After you import this demo, you will have to setup the slider separately.', 'homey' ),
      'preview_url'                  => 'http://houzez16.favethemes.com',
    ),

  );
}
add_filter( 'pt-ocdi/import_files', 'Houzez_Import_Files' );

function houzez_before_content_import( $selected_import ) {

    $rs_slider = '';
    $demo_name = $selected_import['import_file_name'];

    if ( 'Houzez01' === $demo_name ) {
        $rs_slider = 'houzez01/news-gallery2';

    } elseif ( 'Houzez02' === $demo_name ) {
        $rs_slider = 'houzez02/news-gallery2';

    } elseif ( 'Houzez03' === $demo_name ) {
        $rs_slider = 'houzez03/news-gallery2';

    } elseif ( 'Houzez04' === $demo_name ) {
        $rs_slider = 'houzez04/news-gallery2';

    } elseif ( 'Houzez05' === $demo_name ) {
        $rs_slider = 'houzez05/for-rent';

    } elseif ( 'Houzez06' === $demo_name ) {
        $rs_slider = 'houzez06/personal';

    } elseif ( 'Houzez07' === $demo_name ) {
        $rs_slider = 'houzez07/home';

    } elseif ( 'Houzez08' === $demo_name ) {
        $rs_slider = 'houzez08/highlight-showcase4';

    } elseif ( 'Houzez09' === $demo_name ) {
        $rs_slider = 'houzez09/home-hero';

    } elseif ( 'Houzez10' === $demo_name ) {
        $rs_slider = 'houzez10/creative-frontpage';

    } elseif ( 'Houzez11' === $demo_name ) {
        $rs_slider = 'houzez11/homepage';

    } elseif ( 'Houzez12' === $demo_name ) {
        $rs_slider = 'houzez12/homepage_slider';

    } elseif ( 'Houzez13' === $demo_name ) {
        $rs_slider = 'houzez13/homepage';

    } elseif ( 'Houzez14' === $demo_name ) {
        $rs_slider = 'houzez14/homepage_slider';

    } elseif ( 'Houzez15' === $demo_name ) {
        $rs_slider = 'houzez15/homepage';

    }

    if ( class_exists( 'RevSlider' ) && !empty($rs_slider) ) {

        $sliderPath = HOUZEZ_PLUGIN_PATH.'/demo-data/vc/'.$rs_slider.'.zip';
        $slider = new RevSlider();
        $slider->importSliderFromPost( true, true, $sliderPath );
    }
}
add_action( 'pt-ocdi/before_content_import', 'houzez_before_content_import' );

function houzez_after_import_setup($selected_import) {
    // Assign menus to their locations.
    $demo_name = $selected_import['import_file_name'];
    $front_page_id = $blog_page_id = $main_menu = '';

    if ( 'Houzez01' === $demo_name ) {
        $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        $front_page_id = get_page_by_title( 'Homepage with Map' );
        $blog_page_id  = get_page_by_title( 'Blog' );

    } elseif ( 'Houzez02' === $demo_name || 'Houzez05' === $demo_name || 'Houzez06' === $demo_name || 'Houzez07' === $demo_name || 'Houzez09' === $demo_name || 'Houzez10' === $demo_name || 'Houzez11' === $demo_name || 'Houzez12' === $demo_name || 'Houzez14' === $demo_name || 'Houzez16' === $demo_name ) {
        $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        $front_page_id = get_page_by_title( 'Homepage' );
        $blog_page_id  = get_page_by_title( 'Blog' );

    } elseif ( 'Houzez03' === $demo_name ) {
        $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        $front_page_id = get_page_by_title( 'Homepage with Revolution Slider' );
        $blog_page_id  = get_page_by_title( 'Blog' );

    } elseif ( 'Houzez04' === $demo_name ) {
        $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        $front_page_id = get_page_by_title( 'Homepage with properties slider' );
        $blog_page_id  = get_page_by_title( 'Blog' );

    } elseif ( 'Houzez08' === $demo_name ) {
        $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        $front_page_id = get_page_by_title( 'Home' );
        $blog_page_id  = get_page_by_title( 'Blog' );

    } elseif ( 'Houzez13' === $demo_name ) {
        $mobile_menu = get_term_by( 'name', 'Mobile Menu', 'nav_menu' );
        $left_menu = get_term_by( 'name', 'Left Menu', 'nav_menu' );
        $right_menu = get_term_by( 'name', 'Right Menu', 'nav_menu' );
        $front_page_id = get_page_by_title( 'Homepage' );
        $blog_page_id  = get_page_by_title( 'Blog' );

    } elseif ( 'Houzez15' === $demo_name ) {
        $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        $front_page_id = get_page_by_title( 'Homepage 2' );
        $blog_page_id  = get_page_by_title( 'Blog' );

    }

    
    if(!empty($left_menu)) {
      set_theme_mod( 'nav_menu_locations', array(
              'main-menu-left' => $left_menu->term_id,
          )
      );
    }
    if(!empty($right_menu)) {
      set_theme_mod( 'nav_menu_locations', array(
              'main-menu-right' => $right_menu->term_id,
          )
      );
    }

    if(!empty($mobile_menu)) {
      set_theme_mod( 'nav_menu_locations', array(
              'mobile-menu-hed6' => $mobile_menu->term_id,
          )
      );
    }

    if(!empty($footer_menu)) {
      set_theme_mod( 'nav_menu_locations', array(
              'footer-menu' => $footer_menu->term_id,
          )
      );
    }

    if(!empty($main_menu)) {
      set_theme_mod( 'nav_menu_locations', array(
              'main-menu' => $main_menu->term_id,
          )
      );
    }

    update_option( 'show_on_front', 'page' );
    if(!empty($front_page_id)) {
        update_option( 'page_on_front', $front_page_id->ID );
    }

    if(!empty($blog_page_id)) {
        update_option( 'page_for_posts', $blog_page_id->ID );
    }
}
add_action( 'pt-ocdi/after_import', 'houzez_after_import_setup' );
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
