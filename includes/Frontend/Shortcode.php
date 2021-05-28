<?php

namespace BasePLugin\Frontend;

/**
 * Shortcode handler class
 * */
class Shortcode {
	/**
	 * Shortcode constructor.
	 */
	public function __construct () {
		add_shortcode( 'wp-starter-plugin', [ $this, 'render_shortcode' ] );
	}

	/**
	 * Shortcode render method
	 *
	 * @param $atts
	 * @param string $content
	 *
	 * @return string
	 */
	public function render_shortcode ( $atts, $content = '' ) {
		return 'Hello from font end';
	}
}
