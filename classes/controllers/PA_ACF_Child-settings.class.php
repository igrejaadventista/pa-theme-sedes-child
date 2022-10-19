<?php

use WordPlate\Acf\ConditionalLogic;
use WordPlate\Acf\Fields\Tab;
use WordPlate\Acf\Fields\Text;
use WordPlate\Acf\Fields\Textarea;
use WordPlate\Acf\Fields\Taxonomy;
use WordPlate\Acf\Fields\TrueFalse;
use WordPlate\Acf\Fields\Url;
use WordPlate\Acf\Location;


class PaAcfChildSettings {

  public function __construct() {
    add_action('after_setup_theme', [$this, 'addPageSettings']);
  }

  function addPageSettings() {
    acf_add_options_sub_page(array(
      // 'post_id'     => 'pa_child_settings',
      'page_title'  => __('IASD Site - Child Settings', 'iasd'),
      'menu_title'  => __('IASD Site - Child Settings', 'iasd'),
      'menu_slug'   => 'iasd_child_settings',
      'parent_slug' => 'themes.php',
      'capability'  => 'manage_options'
    ));

    $this->createAcfFields();
  }

  function createAcfFields() {

    register_extended_field_group([
      'title'    => __('Modules', 'iasd'),
      'key'      => 'child_settings_modules',
      'style'    => 'default',
      'fields'   => [
        TrueFalse::make(__('Leaders', 'iasd'), 'module_leaders')
          ->defaultValue(false)
          ->stylisedUi(),
      ],
      'location' => [
        Location::if('options_page', 'iasd_child_settings'),
      ],
    ]);
  }
}
$PaAcfChildettings = new PaAcfChildSettings();
