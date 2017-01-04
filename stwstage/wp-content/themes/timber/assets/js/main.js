// requires cookies lib and query string
// https://github.com/ScottHamper/Cookies
// https://github.com/sindresorhus/query-string
// bower install --save query-string cookies-js

Cookies.defaults = {
    path: '/',
    // domain: '.bubs.dev',
    expires: 365 * 24 * 60 * 60
};

var bsdSource = function() {
    var parsed = queryString.parse(location.search);
    if ( parsed.source ) {
        Cookies.set('source', parsed.source);
    }
    if ( parsed.subsource ) {
        Cookies.set('subsource', parsed.subsource);
    }
};

var videoLightbox = function() {
    $('.video-lightbox').magnificPopup({
        type: 'iframe',
    });
};

var fitVidInit = function(){
    $('.container').fitVids();
};

var smoothScrollInit = function(){
    $('a').smoothScroll();
};

// adjust bootstrap collapse duration
$.fn.collapse.Constructor.TRANSITION_DURATION = 0;

var menuToggle = function(){
    var $collapseParent = $('.js-header');
    $collapseParent.on('show.bs.collapse','.collapse', function() {
        $collapseParent.find('.collapse.in').collapse('hide');
    });
}

var waypointsNav = function(){
    var $navbar = $('.js-header');
    new Waypoint.Sticky({
       element: $navbar
    });
};

var gravityHelper = function(){
    if ( $('.js-signup-home form').length ){
        var $gfHome = $('.js-signup-home form');
        $gfHome.addClass('inline-form');
        $gfHome.find('#field_1_1 label').hide();
        $gfHome.find('#input_1_1')
            .addClass('email')
            .attr('type', 'email')
            .attr('placeholder', 'Email Address');
        $gfHome.find('.button').addClass('btn btn-primary');
    }

    if ( $('.js-signup-sidebar form').length ){
        var $gfSide = $('.js-signup-sidebar form');
        $gfSide.addClass('stacked-form');
        $gfSide.find('#field_1_1 label').hide();
        $gfSide.find('#input_1_1')
            .addClass('email email-box')
            .attr('type', 'email')
            .attr('placeholder', 'Email Address');
    }
};

var jumpMenu = function(){
    $('.js-jump-menu').on('change', function () {
        var url = $(this).val(); // get selected value
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
    });
};

        
var cardsMenu = function(){			        
    $('.btnNext').click(function(){
	  $('.nav-tabs > .active').next('li').find('a').trigger('click');
	});
	
	$('.btnPrevious').click(function(){
	  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
	});
});
			

// init without document.ready
bsdSource();

// init within document.ready
(function($) {

    fitVidInit();
    smoothScrollInit();
    quickShare(); //quickshare share buttons (in mark with 'qs-link' class)
    videoLightbox();
    menuToggle();
    waypointsNav();
    gravityHelper();
    jumpMenu();
    cardsMenu();

})(jQuery);
