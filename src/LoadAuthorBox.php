<?php


namespace WppAuthorBox;

class LoadAuthorBox
{
    public function __construct()
    {
        add_filter('the_content', function($content) {
            if( is_single() ) {
                $fullcontent = $content . $this->callbackShortcodeAuthorBox();

                return $fullcontent;
            }
        });
    }

    private function callbackShortcodeAuthorBox()
    {
        ob_start();
        include_once(PLUGIN_DIR_PATH . 'public/views/author_box.php');
        return ob_get_clean();
    }
}