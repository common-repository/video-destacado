<?php
/**
 * @package   Video Destacado
 * @author    Airton Vancin Junior <airtonvancin@gmail.com>
 * @license   GPL-2.0+
 * @link      https://github.com/airton/video-destacado
 * @copyright 2016 Airton
 *
 * @wordpress-plugin
 * Plugin Name:       Video Destacado
 * Plugin URI:        https://github.com/airton/video-destacado
 * Description:       Insert a video posted to Youtube for posts, pages and custom post
 * Version:           1.5.0
 * Author:            Airton Vancin Junior
 * Author URI:        http://airtonvancin.com
 * Text Domain:       video-destacado
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/airton/video-destacado
 */

// Previne acesso direto
if( ! defined( 'ABSPATH' ) ){
    exit;
}

define( 'VD_VERSION', '1.5.0' );
define( 'VD_MINIMUM_WP_VERSION', '3.0' );
define( 'VD_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'VD_PLUGIN_BASENAME', plugin_basename(__FILE__) );
define( 'VD_DELETE_LIMIT', 100000 );

/**
 * video_destacado_load_textdomain()
 *
 * Carrega arquivos de traduções.
 */
function video_destacado_load_textdomain() {
    load_plugin_textdomain( 
        'video-destacado', 
        false, 
        VD_PLUGIN_DIR . 'languages/' 
    );
}

add_action( 'plugins_loaded', 'video_destacado_load_textdomain' );

require_once( VD_PLUGIN_DIR . 'video-destacado-settings.php' );
require_once( VD_PLUGIN_DIR . 'video-destacado-metabox.php' );
require_once( VD_PLUGIN_DIR . 'video-destacado-functions.php' );

if ( is_admin() ) {
	require_once( VD_PLUGIN_DIR . 'video-destacado-assets.php' );
}