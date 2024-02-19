$ ( document ).ready ( function () {

    // Main nav hover dropdown menu

    $( '.dropdown' ).hover( function() {

        $(this).addClass( 'show' );

        $(this).find(' .dropdown-menu ').addClass( 'show' );

    }, function() {

        $(this).removeClass( 'show' );

        $(this).find( '.dropdown-menu' ).removeClass( 'show' );

    });

    // Product detail toggle full gallery images

    let current_li = 1;

    $( '[class^="thumbnail_"' ).on('click', function (event) {

        $('.full-image li:nth-child(' + current_li + ')').hide();

        let next_li = event.currentTarget.className.replace('thumbnail_', '');

        $('.full-image li:nth-child(' + next_li + ')').show();

        current_li = next_li;
    });


} );
