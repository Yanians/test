function doRenderTable(id){
	$.ajax({
        method: "POST",
        url: "app/models/user.php"
    }).done(function(userdata){
    	// console.log(userdata);
    	_USERTABLE_DATA = JSON.parse(userdata);
    	renderTable(id,userdata,['id', 'email', 'password', 'firstname', 'lastname', 'createat', 'isadmin'],['create','read','update','delete']);	
	});
}
	
$(function () {	
	setTimeout(doRenderTable('#user'),3000);
});

