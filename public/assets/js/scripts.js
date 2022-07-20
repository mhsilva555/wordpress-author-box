var j = jQuery.noConflict();

j(function($){
    var wpMedia;
    
    j('#wp_media_button').click(function(e) {
        e.preventDefault();

        if (wpMedia) {
            wpMedia.open();
            return;
        }
        wpMedia = wp.media.frames.file_frame = wp.media({
            multiple: false
        });
        wpMedia.on('select', function() {
            var attachment = wpMedia.state().get('selection').first().toJSON();
            j('#wp_media_url').val(attachment.url);
            j('.photo-profile img').attr('src', attachment.url);
            j('.photo-profile').addClass('bg-none');
            j('#remove-photo').show(0);
        });
        wpMedia.open();
    });

    j(document).on('click', '#remove-photo', function() {
        j('.photo-profile').removeClass('bg-none');
        j('.photo-profile').addClass('bg-default');
        j('.photo-profile img').attr('src', '');
        j('#wp_media_url').val('');
        j('#remove-photo').hide(0);
    });

    j(document).on('submit', '#wpp-profile-form', function(e) {
        e.preventDefault();

        let data = j(this).serialize();

        j.ajax({
            method: 'POST',
            url: obj.ajax_url,
            data: {
                data: data,
                nonce: obj.nonce,
                action: 'saveProfileAuthor'
            }
        }).done(function(response) {
            switch (response) {
                case 400:
                    Swal.fire('', 'Ops! Alguns Campos Não Foram Preenchios Corretamente!', 'error');
                    break;
                case 401:
                    Swal.fire('', 'Ação Não Permitida!', 'error');
                    break;
                case 200:
                    Swal.fire('', 'Dados Alterados com Sucesso!', 'success');
                    break;
                default:
                    Swal.fire('', 'Ops! Não foi possível alterar os dados, tente novamente em instantes.', 'error');
                    break;
            }
        });
    });
});