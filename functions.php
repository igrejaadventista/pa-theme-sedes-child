<?php

require_once 'vendor/autoload.php';
require_once (dirname(__FILE__) . '/classes/controllers/PA_ACF_Leaders.class.php');
require_once (dirname(__FILE__) . '/classes/controllers/PA_ACF_Site-ministries.class.php');
require_once (dirname(__FILE__) . '/classes/controllers/PA_CPT_Projects.class.php');
require_once (dirname(__FILE__) . '/classes/controllers/PA_CPT_Leaders.class.php');
require_once (dirname(__FILE__) . '/classes/controllers/PA_CPT_SliderHome.class.php');
require_once (dirname(__FILE__) . '/classes/controllers/PA_Enqueue_Files.class.php');
require_once (dirname(__FILE__) . '/classes/controllers/PA_Page_Lideres.php');

function getTplPageURL($TEMPLATE_NAME){
    $url = null;
    $pages = get_pages(array(
        'meta_key' => '_wp_page_template',
        //'meta_value' => $TEMPLATE_NAME
    ));

    //pconsole($pages);
    if(isset($pages[0])) {
        $url = get_page_link($pages[0]->ID);
    }
    return $url;
}
