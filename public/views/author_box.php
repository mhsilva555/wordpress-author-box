<div class="author-box">
    <div class="row-box">
        <div class="col-box">
            <div class="author-profile-photo">
                <?php if (get_option('wpp_author_photo') != ''): ?>
                    <img src=" <?php echo get_option('wpp_author_photo') ?>" alt="">
                <?php else: ?>
                    <img src="https://via.placeholder.com/200x200" alt="">
                <?php endif; ?>
            </div>
        </div>
        
        <div class="col-box">
            <div class="author-profile-meta">
                <h3 class="author-box-name">
                    <?php
                        if ( get_option('wpp_author_name') != '' ) {
                            echo get_option('wpp_author_name');
                        } else {
                            echo esc_html_e( 'Author do Post', 'envixo' );
                        }
                    ?>
                </h3>

                <div class="author-box-bio">
                    <?php
                        if ( get_option('wpp_author_biography') != '' ) {
                            echo str_replace("\n", '<br>', get_option('wpp_author_biography') );
                        } else {
                            echo esc_html_e( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'envixo' );
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>