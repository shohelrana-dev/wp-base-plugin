<?php


namespace BasePlugin;

/**
 * Class API
 * @package BasePLugin
 */
class API {
	public function __construct () {
		add_action( 'rest_api_init', [ $this, 'register_rest_api' ] );
	}

	/**
	 * Register rest api
	 * @return void
	 */
	public function register_rest_api () {

	}
}