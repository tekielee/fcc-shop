$ ( document ).ready ( function () {

    $( '.dropdown' ).hover( function() {

        $(this).addClass( 'show' );

        $(this).find(' .dropdown-menu ').addClass( 'show' );

    }, function() {

        $(this).removeClass( 'show' );

        $(this).find( '.dropdown-menu' ).removeClass( 'show' );

    });

    $( '[class^="product_"]' ).click( function (event) {

        console.log(event.currentTarget.className.replace('product_',''));

    });

} );
