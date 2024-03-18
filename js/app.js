jQuery(document).ready(function() {

    jQuery(document).foundation();

    ajaxSaveSubsriber ( );
    
}); 

function ajaxSaveSubsriber ( ) {

    jQuery('#save-subscriber').click ( function ( e ) {
        
        e.preventDefault();

        let subscriber_email = jQuery('#subscriber').val();

        jQuery.ajax ( {

            url: '/wp-admin/admin-ajax.php',

            type: 'POST',

            data: {

                action: 'subscriber_email',

                subscriber_email: subscriber_email,
            },

            success: function ( response ) {

                jQuery ( '#subscriber-message' ).html( response );

            }

        } );

    } );

}
