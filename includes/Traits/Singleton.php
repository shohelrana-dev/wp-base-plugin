<?php


namespace BasePLugin\Traits;


/**
 * Trait Singleton
 * @package BasePLugin\Traits
 */
trait Singleton {
	/**
	 * @var array
	 */
	private static $instance = [];

	/**
	 * Get the class instance
	 *
	 * @return object
	 */
	public static function get_instance () {
		$called_class = get_called_class();

		if ( ! array_key_exists( $called_class, self::$instance ) ) {
			self::$instance[ $called_class ] = new $called_class;
		}

		return self::$instance[ $called_class ];
	}
}