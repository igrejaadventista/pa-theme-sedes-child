<?php

use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\Group;
use WordPlate\Acf\Fields\Url;
use WordPlate\Acf\Fields\Email;
use WordPlate\Acf\Fields\Image;
use WordPlate\Acf\Fields\Repeater;
use WordPlate\Acf\Location;


class PaCptLideres
{

	public function __construct()
	{
		add_action('init', [$this, 'CreatePostType']);
		add_action('init', [$this, 'CreateACFFields']);
	}

	function CreatePostType()
	{
		$labels = array(
			'name'                  => __('Leaders', 'iasd'),
			'singular_name'         => __('Leader', 'iasd'),
			'menu_name'             => __('Leaders', 'iasd'),
			'name_admin_bar'        => __('Leaders', 'iasd'),
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
			'label'                 => __('Leader', 'iasd'),
			'labels'                => $labels,
			'supports'              => array('title', 'thumbnail', 'revisions', 'editor'),
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
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type('lideres', $args);
	}

	function CreateACFFields()
	{
		register_extended_field_group([
			'title' => __('Leaders', 'iasd'),
			'style' => 'default',
			'fields' => [
				Text::make('Cargo/Campo', 'lider_cargo'),
				Textarea::make('Bibliografia', 'lider_bibliografia')
					->newLines('br') // br or wpautop
					->rows(8),
				Group::make('Redes Sociais', 'lider_redes_sociais')
					->fields([
						Url::make('Facebook', 'lider_facebook'),
						Url::make('Twitter', 'lider_twitter'),
						Url::make('Instagram', 'lider_instagram'),
						Email::make('E-mail', 'lider_email')
					])
					->layout('block'),
				Repeater::make('Equipe', 'lider_equipe')
					->fields([
						Text::make('Nome', 'lider_equipe_nome'),
						Text::make('Cargo', 'lider_equipe_cargo'),
						Image::make('Foto', 'lider_equipe_foto')
							->library('all') // all or uploadedTo
							->height(300)
							->width(300)
							->returnFormat('array') // id, url or array (default)
							->previewSize('medium'), // thumbnail, medium or large
						Email::make('E-mail', 'lider_equipe_email'),
						Text::make('Telefone', 'lider_equipe_telefone'),
					])
					->buttonLabel('Adicionar membro')
					->layout('table') // block, row or table
			],
			'location' => [
				Location::if('post_type', 'lideres'),
			],
		]);
	}
}

$PaCptLideres = new PaCptLideres();
