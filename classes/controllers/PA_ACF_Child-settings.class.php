<?php

use WordPlate\Acf\Fields\TrueFalse;
use WordPlate\Acf\Location;

class PaAcfChildSettings {

  public function __construct() {
    add_action('after_setup_theme', [$this, 'createModulesFields']);
  }

  function createModulesFields() {
    register_extended_field_group([
      'title'    => __('Modules', 'iasd'),
      'key'      => 'child_settings_modules',
      'style'    => 'default',
      'fields'   => [
        TrueFalse::make(__('Leaders', 'iasd'), 'module_leaders')
          ->defaultValue(true)
          ->stylisedUi(),
        TrueFalse::make(__('Districts', 'iasd'), 'module_districts')
          ->defaultValue(true)
          ->stylisedUi(),
        TrueFalse::make(__('Sliders', 'iasd'), 'module_sliders')
          ->defaultValue(true)
          ->stylisedUi(),
        TrueFalse::make(__('Projects', 'iasd'), 'module_projects')
          ->defaultValue(true)
          ->stylisedUi(),
      ],
      'location' => [
        Location::if('options_page', 'iasd_custom_settings'),
      ],
    ]);
  }
}

$PaAcfChildettings = new PaAcfChildSettings();
