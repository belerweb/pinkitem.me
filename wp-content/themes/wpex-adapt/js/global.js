jQuery(function($){
	$(document).ready(function(){
		
		$(".fitvids").fitVids();
		
		$("ul.sf-menu").superfish({ 
			autoArrows: true,
			delay: 400
		});
		
		$('a[href=#toplink]').click(function(){
			$('html, body').animate({scrollTop:0}, 200);
			return false;
		});
	
		$("li.comments-scroll a").click(function(event){		
			event.preventDefault();
			$('html,body').animate({ scrollTop:$(this.hash).offset().top}, 'normal' );
		});
		
		$(".prettyphoto-link").prettyPhoto({
			theme: 'pp_default',
			animation_speed:'fast',
			allow_resize: true,
			keyboard_shortcuts: true,
			show_title: false,
			social_tools: false,
			autoplay_slideshow: false
		});
			
		$("a[rel^='prettyphoto']").prettyPhoto({
			theme: 'pp_default',
			animation_speed:'fast',
			allow_resize: true,
			keyboard_shortcuts: true,
			show_title: false,
			slideshow:3000,
			social_tools: false,
			autoplay_slideshow: false,
			overlay_gallery: true
		});
	
	});
});