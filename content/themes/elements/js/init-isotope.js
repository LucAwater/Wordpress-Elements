(function($) {

  if ($('.isotope').length > 0) {
    var masonry = $('.isotope-masonry');

    $('main').imagesLoaded( function() {
      masonry.isotope({
        layoutMode: 'masonry'
      });
    });
  };

}( jQuery ));