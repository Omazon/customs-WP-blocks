<?php
/*
*
*	***** Guegue Blocks *****
*
*	This file initializes all GB Core components
*	
*/
// If this file is called directly, abort. //
if ( ! defined( 'WPINC' ) ) {die;} // end if
// Define Our Constants

define('GB_PLUGIN_FILE',__FILE__ );
define('GB_PLUGIN_DIR',plugin_dir_path( GB_PLUGIN_FILE ) );
define('GB_CORE_BLOCKS',dirname( __FILE__ ).'/blocks/');
define('GB_CORE_IMG',plugins_url( 'assets/img/', __FILE__ ));
define('GB_CORE_CSS',plugins_url( 'assets/css/', __FILE__ ));
define('GB_CORE_JS',plugins_url( 'assets/js/', __FILE__ ));
define('MY_ACF_PATH', __DIR__ . '/includes/acf/' );
define('MY_ACF_URL', plugin_dir_url( __FILE__ ) . 'includes/acf/' );
/*
*
*  Register CSS
*
*/
function gb_register_core_css(){
wp_enqueue_style('gb-core', GB_CORE_CSS . 'gb-core.css',null,time(),'all');
};
add_action( 'wp_enqueue_scripts', 'gb_register_core_css' );
/*
*
*  Register JS/Jquery Ready
*
*/
function gb_register_core_js(){
wp_enqueue_script('gb-core', GB_CORE_JS . 'gb-core.js','jquery',time(),true);
};
add_action( 'wp_enqueue_scripts', 'gb_register_core_js' );
/*
*
*  Includes
*
*/

if ( ! function_exists( 'is_plugin_active' ) ) {
    include_once ABSPATH . 'wp-admin/includes/plugin.php';
}

if ( is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {

    return;
}

include_once( MY_ACF_PATH . 'acf.php' );
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

if ( is_plugin_active( 'advanced-custom-fields/acf.php' ) ) {
    add_action( 'admin_notices', function () {
        ?>
        <div class="updated" style="border-left: 4px solid #ffba00;">
            <p>El Plugin ACF no puede ser activado al mismo tiempo que el Plugin ACF PRO.</p>
        </div>
        <?php
    }, 99 );

    // Disable ACF free plugin
    deactivate_plugins( 'advanced-custom-fields/acf.php' );
}
//include blocks
if ( file_exists( GB_CORE_BLOCKS . 'blocks-init.php' ) ) {
    require_once GB_CORE_BLOCKS . 'blocks-init.php';
}

//include theme options
if ( file_exists( GB_PLUGIN_DIR . 'theme.php' ) ) {
    require_once GB_PLUGIN_DIR . 'theme.php';
}