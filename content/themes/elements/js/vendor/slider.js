(function ( $ ) {

    $.fn.slider = function( options ) {

        // Default options
        var settings = $.extend({
          click: true,
          buttons: true,
          keys: true,
          swipe: true,
          bullets: true,
          lightbox: true
        }, options );

        // Variables
        var images = $('.slider-images')
        var image = $('.slider-images li')

        var bullets = $('.slider-bullets')
        var bullet = $('.slider-bullets li')

        var controls = $('.slider-controls')
        var next = $('.slider-next')
        var prev = $('.slider-prev')

        // First image & bullet get first & active classes
        image.first().addClass("first-image first is-active")
        bullet.first().addClass("first-bullet first is-active")

        // Last image & bullet get last class
        image.last().addClass("last-image last")
        bullet.last().addClass("last-bullet last")

        // Next image if clicked on image
        if( settings.click === true ) {
          image.click(function() {
            var current = $('.is-active');

            if (current.hasClass("last")) {
              var target = $('.first');
            } else {
              var target = current.next();
            }

            current.removeClass("is-active");
            target.addClass("is-active");
          });
        }

        // Next and previous arrow buttons
        if( settings.buttons === true ) {
          next.click(function() {
            var current = $('.is-active');

            if (current.hasClass("last")) {
              var target = $('.first');
            } else {
              var target = current.next();
            }

            current.removeClass("is-active");
            target.addClass("is-active");
          });

          prev.click(function() {
            var current = $('.is-active');

            if (current.hasClass("first")) {
              var target = $('.last');
            } else {
              var target = current.prev();
            }

            current.removeClass("is-active");
            target.addClass("is-active");
          });
        } else {
          controls.hide();
        }

        // Next and previous with keyboard
        if( settings.keys === true ) {
          $(window).keydown(function(e) {
            if (e.which === 39) {
              var current = $('.is-active');

              if (current.hasClass("last")) {
                var target = $('.first');
              } else {
                var target = current.next();
              }

              current.removeClass("is-active");
              target.addClass("is-active");
            }

            if (e.which === 37) {
              var current = $('.is-active');

              if (current.hasClass("first")) {
                var target = $('.last');
              } else {
                var target = current.prev();
              }

              current.removeClass("is-active");
              target.addClass("is-active");
            }
          });
        }

        // Next and previous with swipe
        if( settings.swipe === true ) {
          image.on("swipeleft", function() {
            var current = $('.is-active');

            if (current.hasClass("last")) {
              var target = $('.first');
            } else {
              var target = current.next();
            }

            current.removeClass("is-active");
            target.addClass("is-active");
          });

          image.on("swiperight", function() {
            var current = $('.is-active');

            if (current.hasClass("first")) {
              var target = $('.last');
            } else {
              var target = current.prev();
            }

            current.removeClass("is-active");
            target.addClass("is-active");
          });
        }

        // Next and previous with swipe
        if( settings.bullets === true ) {
          // Bullet click functionality
          bullet.click(function() {
            var count = $(this).index() + 1;
            var current = $('.is-active');
            var target = $('.slider-images li:nth-child(' + count + ')');
            var target_bullet = $('.slider-bullets li:nth-child(' + count + ')');

            current.removeClass("is-active");
            target.addClass("is-active");
            target_bullet.addClass("is-active");
          });

          // Hide bullets if there's only 1 image
          if (image.length < 2) {
            bullets.hide();
            controls.hide();
          } else {
            // Do nothing
          }
        } else {
          bullets.hide();
        }

    };

}( jQuery ));
