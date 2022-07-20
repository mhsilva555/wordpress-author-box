<div class="wrap wpp-wrap">

    <div class="wpp-main-painel">
        <div class="wpp-painel-header">
            Wordpress Author Box
        </div>

        <div class="wpp-profile-author">

            <form method="POST" id="wpp-profile-form">
                <?php wp_nonce_field('wpp-nounce-profile-author') ?>

                <!-- Profile Photo -->
                <fieldset class="fieldset-photo">
                    <div id="photo">
                        <div class="photo-profile <?php echo \WppAuthorBox\Author::showBgDefaultPhoto() ?>">
                            <img src="<?php echo \WppAuthorBox\Author::getAuthorPhoto() ?>" alt="">
                        </div>

                        <div id="remove-photo" <?php echo \WppAuthorBox\Author::showRemovePhoto() ?>>X</div>
                    </div>

                    <button id="wp_media_button" type="button" class="file-button"><?php echo esc_html_e('Selecionar foto de perfil', 'wpp-author-box') ?></button>
                    <input id="wp_media_url" type="hidden" name="wp_media_url"/>
                </fieldset>
                <!-- End Profile Photo -->

                <!-- Profile Author Name -->
                <fieldset class="fieldset-author-name">
                    <label for="author_name"><?php echo esc_html_e('Preencha o nome do autor:', 'wpp-author-box') ?></label>
                    <input type="text" id="author_name" name="author_name"
                           placeholder="<?php echo esc_html_e('Ex: Patrick Espake', 'wpp-author-box') ?>"
                           value="<?php echo \WppAuthorBox\Author::getAuthorName() ?>">
                </fieldset>
                <!-- End Profile Author Name -->

                <!-- Profile Author Biografy -->
                <fieldset class="fieldset-author-bio">
                    <label for="author_biography"><?php echo esc_html_e('Biografia do autor:', 'wpp-author-box') ?></label>
                    <textarea id="author_biography" name="author_biography" placeholder="<?php echo esc_html_e('Ex: Lorem ipsum dolor...', 'wpp-author-box') ?>"><?php echo \WppAuthorBox\Author::getAuthorBio() ?></textarea>
                </fieldset>
                <!-- End Profile Author Biografy -->

                <button type="submit" id="save-profile-fields"><?php echo esc_html_e('Salvar informações', 'wpp-author-box') ?></button>
            </form>

        </div>
    </div>

</div>