
jQuery(function ($) {

    'use strict';

	$('.wpaddons-parallax-wrapper').each(function() {
		var $this = $(this);
		var wpaRowFind = $this.prevAll('.vc_row:first');
		wpaRowFind.prepend(this);
	});

	$(window).on('load', function(){
		var parallaxWrapper = $('.wpaddons-parallax-wrapper');
		parallaxWrapper.show();
        parallaxWrapper.enllax();
    });

});