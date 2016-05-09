<?php

/******************************
* script control
******************************/

function mfwp_load_scripts() {
	if(is_singular()) {
		wp_enqueue_style('mfwp-styles', plugin_dir_url( __FILE__ ) . 'css/plugin_styles.css');
	}
}
add_action('wp_enqueue_scripts', 'mfwp_load_scripts');