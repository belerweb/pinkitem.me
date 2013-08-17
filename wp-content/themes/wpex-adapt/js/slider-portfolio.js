jQuery( function($) {
	$(window).load(function() {
		$('#portfolio-post-slider').flexslider({
			slideshow : true,
			randomize : false,
			animation : 'fade',
			animationLoop: true,
			direction: "horizontal",
			slideshowSpeed: 7000,
			animationSpeed: 500,
			smoothHeight : true,
			directionNav : true,
			controlNav : true,
			pauseOnAction: true,
			pauseOnHover: true,
			prevText : '<span class=" icon-chevron-left"></span>',
			nextText : '<span class="icon-chevron-right"></span>'
		});
	});
});