<?php

class PA_Theme_Handler
{
    public function __construct() {
        add_action( 'after_switch_theme', array( $this, 'checkParent' ) );
        add_action( 'admin_notices', array( $this, 'showError' ) );
    }

    public function checkParent() {
        $theme = wp_get_theme();
        $parent_theme = $theme->parent();
        $error_message = '';

        if ( ! $parent_theme->exists() || $parent_theme->Stylesheet !== 'pa-theme-sedes' ) {
            $error_message = 'Desculpe. Este tema-filho necessita do tema Sedes instalado.' ;
            switch_theme( WP_DEFAULT_THEME );
        }

        $notice = $error_message ? sprintf( '<div class="error">%s</div>', $error_message ) : '';

        update_option( 'theme_error_notice', $notice );
    }

    public function showError() {
        $notice = get_option( 'theme_error_notice' );
        if ( $notice ) {
            echo $notice;
            delete_option( 'theme_error_notice' );
        }
    }
}

new PA_Theme_Handler();