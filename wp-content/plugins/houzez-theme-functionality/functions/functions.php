<?php
if( !function_exists('houzez_wpml_translate_single_string') ) {
    function houzez_wpml_translate_single_string($string_name) {
        $translated_string = apply_filters('wpml_translate_single_string', $string_name, 'houzez_cfield', $string_name );

        return $translated_string;
    }
}

/*-----------------------------------------------------------------------------------*/
// Get terms array
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'houzez_get_terms_id_array' ) ) {
    function houzez_get_terms_id_array( $tax_name, &$terms_array ) {
        $tax_terms = get_terms( $tax_name, array(
            'hide_empty' => false,
        ) );
        houzez_add_term_id_children( 0, $tax_terms, $terms_array );
    }
}


if ( ! function_exists( 'houzez_add_term_id_children' ) ) :
    function houzez_add_term_id_children( $parent_id, $tax_terms, &$terms_array, $prefix = '' ) {
        if ( ! empty( $tax_terms ) && ! is_wp_error( $tax_terms ) ) {
            foreach ( $tax_terms as $term ) {
                if ( $term->parent == $parent_id ) {
                    $terms_array[ $term->term_id ] = $prefix . $term->name;
                    houzez_add_term_children( $term->term_id, $tax_terms, $terms_array, $prefix . '- ' );
                }
            }
        }
    }
endif;

/**
 * Get currency exchange rates.
 */
function Fcc_get_exchange_rates( $currency = 'USD' ) {

    $rates = FCC_Rates::get_rates();
    if ( is_array( $rates ) && $currency != 'USD' ) :

        if ( ! Fcc_currency_exists( $currency ) ) {
            trigger_error(
                esc_html__( 'Base currency to get rates not found in database', 'favethemes-currency-converter' ),
                E_USER_WARNING
            );
            return null;
        }

        $new_rates = array();
        $base_rate = $rates[strtoupper( $currency )];

        while ( $array_key = current( $rates ) ) :
            $key = key( $rates );
            $new_rates[$key] = 1 * $rates[$key] / $base_rate;
            next( $rates );
        endwhile;

        $rates = $new_rates;

    endif;

    return $rates;
}

/**
 * Sends json object for given currency with exchange rates
 */
function Fcc_get_exchange_rates_json( $currency = 'USD' ) {
    $rates = FCC_get_exchange_rates( strtoupper( $currency ) );
    wp_send_json( $rates );
}
add_action( 'wp_ajax_nopriv_get_exchange_rates', 'Fcc_get_exchange_rates_json' );
add_action( 'wp_ajax_get_exchange_rates', 'Fcc_get_exchange_rates_json' );

/**
 * Convert from one currency to another.
 */
function Fcc_convert_currency( $amount = 1, $from = 'USD', $in = 'EUR' ) {

    $rates = FCC_Rates::get_rates();

    $error = $result = '';
    if ( $rates && is_array( $rates ) && count( $rates ) > 100 ) {

        if ( ! Fcc_currency_exists( $from ) OR ! Fcc_currency_exists( $in ) ) {
            trigger_error(
                esc_html__( 'Currency was not exist or found in database.', 'favethemes-currency-converter' ),
                E_USER_WARNING
            );
            $error = true;
        }

        if ( ! is_numeric( $amount ) ) {
            trigger_error(
                esc_html__( 'Amount to covert is not number, it must be number.', 'favethemes-currency-converter' ),
                E_USER_WARNING
            );
            $error = true;
        }

        if ( ! $error === true ) {
            $from   = strtoupper( $from );
            $in     = strtoupper( $in );
            $result = $rates[ $from ] && $rates[ $in ] ? (float) $amount * (float) $rates[ $in ] / (float) $rates[ $from ] : floatval( $amount );
        }

    } else {

        trigger_error(
            __( 'Look like your API is not valid, There was a problem to get currency data from database.', 'favethemes-currency-converter' ),
            E_USER_WARNING
        );

    }

    return $result;
}

/**
 * Get currency exchange rate from one to another.
 */
function Fcc_get_exchange_rate( $currency, $other_currency ) {
    $currency = strtoupper( $currency );
    $other_currency = strtoupper( $other_currency );
    $rate = $currency == $other_currency ? 1 : Fcc_convert_currency( 1, $currency, $other_currency );
    return $rate;
}

/**
 * Get currencies array
 */
function Fcc_get_currencies() {
    return FCC_Rates::get_currencies();
}

/**
 * Get List of currencies as json object.
 */
function Fcc_get_currencies_json() {
    $currencies = FCC_get_currencies();
    if ( $currencies && is_array( $currencies ) ) {
        wp_send_json( $currencies );
    }
}
add_action( 'wp_ajax_nopriv_fcc_get_currencies', 'Fcc_get_currencies_json' );
add_action( 'wp_ajax_fcc_get_currencies', 'Fcc_get_currencies_json' );

/**
 * Get currency data.
 */
function Fcc_get_currency( $currency_code = 'USD' ) {

    if ( ! is_string( $currency_code ) OR strlen( $currency_code ) != 3 ) {
        trigger_error(
            esc_html__( 'Please pass valid currency code for argument and it must be a string of three characters long', 'favethemes-currency-converter' ),
            E_USER_WARNING
        );
        return null;
    }

    $currency_data = Fcc_get_currencies();

    if ( ! array_key_exists( strtoupper( $currency_code ), $currency_data ) ) {
        trigger_error(
            esc_html__( 'Currency could not be found', 'favethemes-currency-converter' ),
            E_USER_WARNING
        );
        return null;
    }

    return (array) $currency_data[strtoupper( $currency_code )];
}

/**
 * Format currency
 */
function Fcc_format_currency( $amount, $currency_code, $currency_symbol = true, $sup = false ) {

    if ( ! $amount || ! $currency_code OR is_nan( $amount ) )
        return '';

    $currency = Fcc_get_currency( strtoupper( $currency_code ) );

    if ( is_null( $currency ) ){
        return '';
    }

    if ( ! $currency ) {
        $symbol = $currency_symbol == true ? strtoupper( $currency_code ) : '';
        $result = $amount . ' ' . $symbol;
    } else {
        $formatted = number_format( $amount, $currency['decimals'], $currency['decimals_sep'], $currency['thousands_sep'] );
        if ( $currency_symbol == false ) {
            $result = $formatted;
        } else {
            if($sup) {
                $currency_symbol = '<sup>'.$currency['symbol'].'</sup>';
            } else {
                $currency_symbol = $currency['symbol'];
            }

            $result = $currency['position'] == 'before' ? $currency_symbol . '' . $formatted : $formatted . '' . $currency_symbol;
        }
    }

    return html_entity_decode( $result );
}

/**
 * Check if currency code exist
 */
function Fcc_currency_exists( $currency_code ) {

    $currencies = Fcc_get_currencies();

    $codes = array();
    if ( $currencies && is_array( $currencies ) ) {
        foreach ( $currencies as $key => $value ) {
            $codes[] = $key;
        }
    }

    return $codes && is_array( $codes ) ? in_array( strtoupper( $currency_code ), (array) $codes ) : null;
}

if ( ! function_exists( 'houzez_get_terms_array' ) ) {
    function houzez_get_terms_array( $tax_name, &$terms_array ) {
        $tax_terms = get_terms( $tax_name, array(
            'hide_empty' => false,
        ) );
        houzez_add_term_children( 0, $tax_terms, $terms_array );
    }
}


if ( ! function_exists( 'houzez_add_term_children' ) ) :
    function houzez_add_term_children( $parent_id, $tax_terms, &$terms_array, $prefix = '' ) {
        if ( ! empty( $tax_terms ) && ! is_wp_error( $tax_terms ) ) {
            foreach ( $tax_terms as $term ) {
                if ( $term->parent == $parent_id ) {
                    $terms_array[ $term->slug ] = $prefix . $term->name;
                    houzez_add_term_children( $term->term_id, $tax_terms, $terms_array, $prefix . '- ' );
                }
            }
        }
    }
endif;


if(!function_exists('houzez_check_for_taxonomy_plugin')) {
    function houzez_check_for_taxonomy_plugin($tax_setting_name) {

        if(class_exists('Houzez_Taxonomies')) {
            if(Houzez_Taxonomies::get_setting($tax_setting_name) != 'disabled') {
                return true;
            } else {
                return false;
            }
        }

        return true;
    }
}

if(!function_exists('houzez_check_post_types_plugin')) {
    function houzez_check_post_types_plugin($post_type) {

        if(class_exists('Houzez_Post_Type')) {
            if(Houzez_Post_Type::get_setting($post_type) != 'disabled') {
                return true;
            } else {
                return false;
            }
        }

        return true;
    }
}
if (!function_exists('houzez_theme_activation')) {
    function houzez_theme_activation() {
        $status = get_option( 'houzez_activation' );
        if(empty($status) && $status != 'none'){
            update_option( 'houzez_activation', 'none' );
        }
        ?>
        <div class="notice">
        <form action="" method="post">
            <h2 class="activation_title">Activate Houzez</h2>
            <p>To unlock all Houzez features please enter your purchase code below. To get your purchase code, login to ThemeForest, and go to Downloads section and, click on the green Download button next to Houzez and select “License certificate & purchase code” in any format. </p>
            <div id="title-wrap" class="input-text-wrap">
                <label id="api_key_prompt_text" class="prompt" for="api_key"> Enter your purchase key </label>
                <input id="api_key" name="api_key" autocomplete="off" type="text">
            </div>
            <?php echo wp_nonce_field( 'envato_api_nonce', 'envato_api_nonce_field' ,true, false ); ?>
            <input type="submit" name="submit" class="button button-primary button-hero" value="Activate"/>
        </form>
        <?php

        if( isset( $_POST['envato_api_nonce_field'] ) &&  wp_verify_nonce( $_POST['envato_api_nonce_field'], 'envato_api_nonce' ) && !empty($_POST['api_key'])){

            $purchase_key = $_POST['api_key'];
            $item_id = 15752549;
            $purchase_data = houzez_verify_envato_purchase_key( $purchase_key );

            if( isset($purchase_data['verify-purchase']['buyer']) && $purchase_data['verify-purchase']['item_id'] == $item_id) {
                update_option( 'houzez_activation', 'activated' );
                echo '<p class="successful"> '.__( 'Activated Successfully, reload page!', 'houzez' ).' </p>';
            } else{
                echo '<p class="error"> '.__( 'Invalid license key', 'houzez' ).' </p>';
            }



        }
        echo '</div>';
    }
    $status = get_option( 'houzez_activation' );
    if(empty($status) || $status != 'activated') {
        update_option( 'houzez_activation', 'activated' );
        //add_action( 'admin_notices', 'houzez_theme_activation' );
    }
}
function houzez_verify_envato_purchase_key($code_to_verify) {

    $username = 'favethemes';

    $api_key = '2ftjwxihndy1yojj9ato4y8yjl3p7qcx';

    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, "http://marketplace.envato.com/api/edge/". $username ."/". $api_key ."/verify-purchase:". $code_to_verify .".json");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $agent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)';
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);

    $output = json_decode(curl_exec($ch), true);
    curl_close($ch);

    return $output;
}