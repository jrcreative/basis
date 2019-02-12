export default {
  init() {
    jQuery(function(){
      jQuery('.slick').slick({

      });

      jQuery(window).scroll(function(){
        let scrollPos = jQuery(document).scrollTop();
        let navbar = jQuery('nav.navbar');
        if(scrollPos > 0)
        {
          navbar.addClass('is-stuck');
        }
        else
        {
          navbar.removeClass('is-stuck');
        }
      });

      jQuery('#nav-icon').on('click', function() {
        jQuery("html, body").animate({ scrollTop: 0 }, 250);
      })
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
