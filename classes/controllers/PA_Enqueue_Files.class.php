<?php 

class PA_Enqueue_Files {
	public function __construct(){
		self::RegisterChildAssets();
	}

	public function RegisterChildAssets() {
		wp_enqueue_style( 'pa-child-style', get_stylesheet_uri());
	}
}

add_action('init', new PA_Enqueue_Files());