<?php


namespace BasePlugin;

/**
 * Class Assets for load css & js
 * @package BasePLugin
 */
class Assets {
	/**
	 * Assets constructor.
	 */
	public function __construct () {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
	}

	/**
	 * get styles
	 * @return array[]
	 */
	public function get_styles () {
		return [
			'academy-style' => [
				'src'     => BasePLugin_ASSETS_URL . '/css/frontend.css',
				'version' => filemtime( BASEPLUGIN_PATH . '/assets/css/frontend.css' )
			]
		];
	}

	/**
	 * get scripts
	 * @return array[]
	 */
	public function get_scripts () {
		return [
			'academy-script' => [
				'src'     => BasePLugin_ASSETS_URL . '/js/frontend.js',
				'version' => filemtime( BASEPLUGIN_PATH . '/assets/js/frontend.js' ),
				'deps'    => [],
			]
		];
	}

	/**
	 * Enqueue assets
	 * @return void
	 */
	public function enqueue_assets () {
		$styles  = $this->get_styles();
		$scripts = $this->get_scripts();

		foreach ( $styles as $handle => $style ) {
			wp_enqueue_style( $handle, $style['src'], [], $style['version'] );
		}

		foreach ( $scripts as $handle => $script ) {
			wp_enqueue_script( $handle, $script['src'], $script['deps'], $script['version'], true );
		}
	}
}