jQuery(document).ready(function($) {
	
	$('.rvsp-form').on('submit', function(e) {
		e.preventDefault();
 
		var $form = $(this);
 
		$.post($form.attr('action'), $form.serialize(), function(data) {
			console.log(data)
		}, 'json');
	});
 
});