function doRenderTable(id){
	$.ajax({
        method: "POST",
        url: "app/models/user.php"
    }).done(function(userdata){
    	_USERTABLE_DATA = JSON.parse(userdata);
    	$.ajax({
    		method: "POST",
    		url: "app/models/guidelines.php"
    	}).done(function(guidelinesdata){
    		_GUIDELINESTABLE_DATA = JSON.parse(guidelinesdata);
            // console.log(guidelinesdata);
            renderTable(id,guidelinesdata,['id', 'user name', 'subjects to Pass', 'date'],['create','read','update','delete']);
    	});
	});
}
	
$(function () {	
	setTimeout(doRenderTable('#guidelines'),3000);
});

