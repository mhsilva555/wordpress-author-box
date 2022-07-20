<?php

namespace WppAuthorBox;

class PageOptions
{
    /**
     * PageOptions constructor.
     */
    public function __construct()
    {
        add_action( 'admin_menu', array( __CLASS__, 'createOptionsPage' ) );
    }

    /**
     * Page Options Definitions
     */
    public function createOptionsPage()
    {
        add_menu_page(
            null,
            'Wpp Author Box',
            'administrator',
            'wpp-author-options-page',
            array(__CLASS__, 'callbackPageOption'),
            'dashicons-id'
        );
    }

    /**
     * Callback to Page Options
     */
    public function callbackPageOption()
    {
        if ( is_file( PLUGIN_DIR_PATH . 'public/views/layout.php' ) ) {
            include_once PLUGIN_DIR_PATH . 'public/views/layout.php';
        }
    }
}