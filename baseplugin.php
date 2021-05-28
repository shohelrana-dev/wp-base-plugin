<?php
/**
 * Plugin Name:       Base Plugin
 * Plugin URI:        https://github.com/shohelrrrana
 * Description:       A starter plugin of WordPress
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Shohel Rana
 * Author URI:        https://github.com/shohelrrrana
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       baseplugin
 * Domain Path:       /languages
 * */

if ( ! defined( 'ABSPATH' ) ) exit;

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 * */
class BasePlugin {

	/**
	 * Plugin Version
	 * @var string
	 */
	const plugin_version = '1.0.0';

	/**
	 * BasePLugin constructor.
	 */
	private function __construct () {
		$this->define_constants();
		register_activation_hook( __FILE__, [ $this, 'activate' ] );
		add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
	}

	/**
	 * initializes a singleton instance
	 * @return BasePLugin
	 */
	public static function init () {
		static $instance = null;

		if ( $instance === null ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Define the required plugin constants
	 * @return void
	 */
	public function define_constants () {
		define( 'BASEPLUGIN_VERSION', self::plugin_version );
		define( 'BASEPLUGIN_TEXT_DOMAIN', 'baseplugin' );
		define( 'BASEPLUGIN_FILE', __FILE__ );
		define( 'BASEPLUGIN_PATH', __DIR__ );
		define( 'BASEPLUGIN_INC_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'includes' );
		define( 'BASEPLUGIN_LIB_PATH', __DIR__ . DIRECTORY_SEPARATOR . 'library' );
		define( 'BASEPLUGIN_URL', plugins_url( '', BASEPLUGIN_FILE ) );
		define( 'BASEPLUGIN_ASSETS_URL', BASEPLUGIN_URL . '/assets' );
	}

	/**
	 * Do stuff upon activate plugin
	 * @return void
	 */
	public function activate () {
		$installer = new \BasePlugin\Installer();
		$installer->run();
	}

	public function init_plugin () {

		new \BasePlugin\Assets();
		new \BasePlugin\API();

		if ( is_admin() ) {
			new \BasePlugin\Admin();
		} else {
			new \BasePlugin\Frontend();
		}
	}
}

/**
 * Initializes the plugin
 * @return BasePlugin
 */

function base_plugin_run () {
	return BasePlugin::init();
}

//Kick off the plugin
base_plugin_run();
