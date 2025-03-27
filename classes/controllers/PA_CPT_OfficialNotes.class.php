<?php

use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\Image;
use Extended\ACF\Fields\Url;
use Extended\ACF\Location;

class PaCptOfficialNotes {

    public function __construct()
    {
        add_action('init', [$this, 'checkModule']);
    }

    function checkModule()
    {
        // Verifica se o módulo de notas oficiais está ativado
        if(get_field('module_officialnotes', 'pa_settings') === false)
            return;

        $this->CreatePostType();
       // $this->CreateACFFields(); // Criar campos personalizados
    }

    function CreatePostType() {
        $labels = array(
            'name'                  => __('Official Notes', 'iasd'),
            'singular_name'         => __('Official Note', 'iasd'),
            'menu_name'             => __('Official Notes', 'iasd'),
            'name_admin_bar'        => __('Official Notes', 'iasd'),
            'add_new'               => __('Add New', 'iasd'),
            'add_new_item'          => __('Add New Item', 'iasd'),
            'new_item'              => __('New item', 'iasd'),
            'edit_item'             => __('Edit item', 'iasd'),
            'view_item'             => __('View item', 'iasd'),
            'all_items'             => __('All items', 'iasd'),
            'search_items'          => __('Search item', 'iasd'),
            'not_found'             => __('Not found.', 'iasd'),
            'not_found_in_trash'    => __('Not found in Trash.', 'iasd'),
        );
    
        $args = array(
            'label'                 => __('Official Notes', 'iasd'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'author', 'revisions'), // Aqui está o ajuste
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => false,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capabilities'          => pa_compile_post_type_capabilities('officialnotes', 'officialnotes'),
            'show_in_rest'          => true,
        );
    
        register_post_type('officialnotes', $args);
    }

}

$PaCptOfficialNotes = new PaCptOfficialNotes();
