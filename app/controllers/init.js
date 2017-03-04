(function($) {
	$.routes.add('admin/{page:user}/', function() {
	$('#news').load('?page=' + this.page).show();
	});
	$.routes.add('admin/{page:question}/', function() {
		$('#news').load('?page=' + this.page).show();
	});
	$.routes.add('admin/{page:topic}/', function() {
		$('#news').load('?page=' + this.page).show();
	});
	$.routes.add('admin/{page:subject}/', function() {
		$('#news').load('?page=' + this.page).show();
	});
	$.routes.add('admin/{page:news}/', function() {
		$('#news').load('?page=' + this.page).show();
	});
	$.routes.add('admin/{page:guidelines}/', function() {
		$('#news').load('?page=' + this.page).show();
	});
	$.routes.add('admin/{page:exam}', function() {
		console.log(page);
		$('#load').load('?page=' + this.page).show();
});
})(jQuery);