<?php
require_once (dirname(__FILE__) . '/classes/controllers/PA_CPT_Projects.class.php');
require_once (dirname(__FILE__) . '/classes/controllers/PA_CPT_SliderHome.class.php');
require_once (dirname(__FILE__) . '/classes/controllers/PA_Enqueue_Files.class.php');

if( function_exists('acf_add_options_page') ) {	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'PA - Theme Settings',
		'menu_title'	=> 'PA - Theme Settings',
		'parent_slug'	=> 'themes.php',
	));	
}