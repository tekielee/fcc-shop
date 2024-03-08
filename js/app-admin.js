$(document).ready(function() {

    $(document).foundation();

    getUploadLogoUrl ();
    
    ajaxSaveLogoUrl ( ajaxurl );

});

function ajaxSaveLogoUrl ( ajaxurl ) {

    jQuery('#save-logo-url').click ( function ( e ) {

        e.preventDefault();

        let logo_url = jQuery('#img-upload-url').val();

        jQuery.ajax ( {

            url: ajaxurl,

            type: 'POST',

            data: {

                action: 'logo_url',

                logo_url: logo_url,
            },

            success: function ( response ) {

                let message = '<div class="callout success" data-closable="slide-out-right">' + 
                
                    response + '<button class="close-button" aria-label="Dismiss alert" ' + 
                    
                    'type="button" data-close><span aria-hidden="true">&times;</span></button></div>';

                jQuery ( '#logo-url-message' ).html( message );

            }

        } );

    } );

}

function getUploadLogoUrl () {

    jQuery('#img-upload').click ( function ( e ) {

        e.preventDefault();

        let upload = wp.media ( {

        title:'Choose Image Logo', 

        multiple: false

        } ).on ( 'select' , function () {

            let select = upload.state ().get ( 'selection' );

            let attach = select.first().toJSON();

            jQuery('#img-upload-url').val( attach.url );

        }).open ();

   });

}
