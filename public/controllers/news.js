function doRenderTable(id){
	$.ajax({
        method: "POST",
        url: "../app/models/user.php"
    }).done(function(userdata){
    	_USERTABLE_DATA = JSON.parse(userdata);
    	$.ajax({
    		method: "POST",
    		url: "../app/models/news.php",
    	}).done(function(newsdata){
    		_NEWSTABLE_DATA = JSON.parse(newsdata);
    		renderTable(id,newsdata,['id', 'userid', 'name', 'content', 'date'],['create','read','update','delete']);	
    	})
	});
}
	
$(function () {	
	setTimeout(doRenderTable('#news'),3000);
});

