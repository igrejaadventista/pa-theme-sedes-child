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
        add_action('after_switch_theme', [$this, 'flushRewriteRules']);

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
            'name'                  => __('Notas Oficiais', 'iasd'),
            'singular_name'         => __('Nota Oficial', 'iasd'),
            'menu_name'             => __('Notas Oficiais', 'iasd'),
            'name_admin_bar'        => __('Nota Oficial', 'iasd'),
            'add_new'               => __('Adicionar Nova', 'iasd'),
            'add_new_item'          => __('Adicionar Nova Nota Oficial', 'iasd'),
            'new_item'              => __('Nova Nota Oficial', 'iasd'),
            'edit_item'             => __('Editar Nota Oficial', 'iasd'),
            'view_item'             => __('Visualizar Nota Oficial', 'iasd'),
            'all_items'             => __('Todas as Notas Oficiais', 'iasd'),
            'search_items'          => __('Buscar Notas Oficiais', 'iasd'),
            'not_found'             => __('Nenhuma nota oficial encontrada.', 'iasd'),
            'not_found_in_trash'    => __('Nenhuma nota oficial encontrada na lixeira.', 'iasd'),
        );
    
        $args = array(
            'label'                 => __('Notas Oficiais', 'iasd'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'author', 'revisions'),
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
            'capabilities'          => pa_compile_post_type_capabilities('officialnotes', 'officialnotes'),
            'show_in_rest'          => true,
            'rewrite'               => array('slug' => 'official-notes', 'with_front' => false),
        );
    
        register_post_type('officialnotes', $args);
    }

    /**
     * Flush rewrite rules when theme is activated
     */
    public function flushRewriteRules() {
        $this->CreatePostType();
        flush_rewrite_rules();

    }

}

$PaCptOfficialNotes = new PaCptOfficialNotes();
