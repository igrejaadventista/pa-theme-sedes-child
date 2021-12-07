<?php

class PaCptProjects {

	public function __construct(){
		add_action('init', [$this, 'CreatePostType']);
		// add_action('init', [$this, 'RegisterSidebars']);
	}

	function CreatePostType() {
		$labels = array(
			'name'                  => _x( 'Projects', 'Post Type General Name', 'iasd' ),
			'singular_name'         => _x( 'Project', 'Post Type Singular Name', 'iasd' ),
			'menu_name'             => __( 'Projects', 'iasd' ),
			'name_admin_bar'        => __( 'Projects', 'iasd' ),
			'add_new'               => __( 'Add New', 'iasd' ),
			'add_new_item'          => __( 'Add New Item', 'iasd' ),
			'new_item'              => __( 'New item', 'iasd' ),
			'edit_item'             => __( 'Edit item', 'iasd' ),
			'view_item'             => __( 'View item', 'iasd' ),
			'all_items'             => __( 'All items', 'iasd' ),
			'search_items'          => __( 'Search item', 'iasd' ),
			'not_found'             => __('Not found.', 'iasd'),
			'not_found_in_trash'    => __('Not found in Trash.', 'iasd'),
		);
		$args = array(
			'label'                 => __( 'Project', 'iasd' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( __('projects','iasd'), $args );
	}


	function RegisterSidebars() {
		$projetos = query_posts( array('post_type' => 'projetos') );
		foreach($projetos as $projeto) {
			$slug = $projeto->post_name;
			register_sidebar( array(
				'name'	=> __( 'Projeto - '.$projeto->post_title.'', 'iasd'),
				'id'	=> 'projeto-'.$slug,
				'before_widget' => '<div class="pa-widget %2$s col">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			) );
		}
		wp_reset_query();
	}
}

$PaCptProjects = new PaCptProjects();
