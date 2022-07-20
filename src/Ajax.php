<?php

namespace WppAuthorBox;

class Ajax
{
    public function __construct()
    {
        add_action('wp_ajax_saveProfileAuthor', [__CLASS__, 'saveProfileAuthor']);
        add_action('wp_ajax_removePhotoAuthor', [__CLASS__, 'removePhotoAuthor']);
    }

    /**
     * Save the author information from the form
     */
    public function saveProfileAuthor()
    {
        if ( !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' ) && !current_user_can('administrator')) {
            wp_send_json(401);
        }

        parse_str($_POST['data'], $data);

        array_filter($data, function($v, $k) {
            if ($k != 'wp_media_url') {
                $v = sanitize_text_field($v);
                if ($v == '') {
                    wp_send_json(400);
                }
            }
        }, 1);

        update_option('wpp_author_photo', sanitize_text_field($data['wp_media_url']), true);
        update_option('wpp_author_name', sanitize_text_field($data['author_name']), true);
        update_option('wpp_author_biography', stripcslashes(sanitize_textarea_field($data['author_biography'])), true );

        wp_send_json(200);
    }
}