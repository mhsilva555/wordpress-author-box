<?php

namespace WppAuthorBox;

class App
{
    private static $instance;

    /**
     * Singleton method
     */
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
    }

    /**
     * App constructor.
     */
    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueueAllScripts']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueStylesAuthorBox']);
        new PageOptions();
        new Ajax();
        new LoadAuthorBox();
    }

    /**
     * Queue all stylesheets
     */
    private function enqueueStyles()
    {
        wp_register_style('styles', PLUGIN_ASSETS_URL.'/css/styles.css', __FILE__);
        wp_enqueue_style('styles');
    }

    /**
     * Queue stylesheets from author box in front-end
     */
    public function enqueueStylesAuthorBox()
    {
        if (is_single()) {
            wp_register_style('authorbox', PLUGIN_ASSETS_URL . '/css/author_box.css', __FILE__);
            wp_enqueue_style('authorbox');
        }
    }

    /**
     * Queue all Javascript files and pass data in an object
     */
    private function enqueueScripts()
    {
        wp_register_script('sweetalert', '//cdn.jsdelivr.net/npm/sweetalert2@11', array(), null, true);
        wp_register_script('scripts', PLUGIN_ASSETS_URL.'/js/scripts.js', array('jquery'), false, true);
        wp_enqueue_media();
        wp_enqueue_script('sweetalert');
        wp_enqueue_script('scripts');

        // Object to Javascript
        wp_localize_script('scripts', 'obj', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('ajax-nonce')
        ));
    }

    /**
     * Queue all scripts
     */
    public function enqueueAllScripts()
    {
        if (isset($_GET['page']) && $_GET['page'] == 'wpp-author-options-page') {
            $this->enqueueStyles();
            $this->enqueueScripts();
        }
    }
}