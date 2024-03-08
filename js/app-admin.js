$(document).ready(function() {

    $(document).foundation();

    getUploadLogoUrl ();
    
});

function getUploadLogoUrl () {

    jQuery('#img-upload').click ( function ( e ) {

        e.preventDefault();

        let upload = wp.media ( {

        title:'Choose Image Logo', 

        multiple:false

        } ).on ( 'select' , function () {

            let select = upload.state ().get ( 'selection' );

            let attach = select.first().toJSON();

            jQuery('#img-upload-url').val( attach.url );

        }).open ();
        
   });

}
