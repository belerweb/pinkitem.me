jQuery(function($){
	$(document).ready(function(){
		
		$("<select />").appendTo("#masternav");
		$("<option />", {
			"selected": "selected",
			"value" : "",
			"text" : wpexLocalize.responsiveMenuText
		}).appendTo("#masternav select");

		$("#masternav a").each(function() {
			var el = $(this);
			if(el.parents('.sub-menu').length >= 1) {
				$('<option />', {
				 'value' : el.attr("href"),
				 'text' : '- ' + el.text()
				}).appendTo("#masternav select");
			}
			else if(el.parents('.sub-menu .sub-menu').length >= 1) {
				$('<option />', {
				 'value' : el.attr('href'),
				 'text' : '-- ' + el.text()
				}).appendTo("#masternav select");
			}
			else {
				$('<option />', {
				 'value' : el.attr('href'),
				 'text' : el.text()
				}).appendTo("#masternav select");
			}
		});	
		$("#masternav select").change(function() {
		  window.location = $(this).find("option:selected").val();
		});
		
		$("#masternav select").uniform();
	
	});
});