<?php

namespace BasePlugin;

/**
 * The frontend handler class
 * */
class Frontend {
	public function __construct () {
		new Frontend\Shortcode();
	}
}