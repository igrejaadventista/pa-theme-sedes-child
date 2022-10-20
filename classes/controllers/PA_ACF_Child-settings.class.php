<?php

use WordPlate\Acf\Fields\TrueFalse;
use WordPlate\Acf\Location;

class PaAcfChildSettings {

  public function __construct() {
    add_action('after_setup_theme', [$this, 'addPageSettings']);
  }

  function addPageSettings() {
    acf_add_options_sub_page(array(
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
        TrueFalse::make(__('Districts', 'iasd'), 'module_districts')
          ->defaultValue(false)
          ->stylisedUi(),
        TrueFalse::make(__('Sliders', 'iasd'), 'module_sliders')
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
