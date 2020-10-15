<?php 

class PA_ACF_Custom{
	public function __construct(){
		add_action('acf/init', [$this, 'registerThemeSettings']);
	}

	function registerThemeSettings(){
		acf_add_options_sub_page(array(
			'page_title' 	=> 'PA - Theme Settings',
			'menu_title'	=> 'PA - Theme Settings',
			'parent_slug'	=> 'themes.php',
		));
	}
}

new PA_ACF_Custom();