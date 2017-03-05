function doRenderTable(id){
	$.ajax({
        method: "POST",
        url: "app/models/user.php"
    }).done(function(userdata){
    	_USERTABLE_DATA = JSON.parse(userdata);
	    $.ajax({
	        method: "POST",
	        url: "app/models/exam.php"
	    }).done(function(examdata){
	    	_EXAMTABLE_DATA = JSON.parse(examdata);
	    	$.ajax({
		        method: "POST",
		        url: "app/models/subject.php"
	    	}).done(function(subjectdata){
	    		_SUBJECTTABLE_DATA = JSON.parse(subjectdata);
	    		$.ajax({
			        method: "POST",
			        url: "app/models/question.php"
		    	}).done(function(questiondata){
		    		_QUESTIONTABLE_DATA = JSON.parse(questiondata);
			    	//renderTable([id],[data],[table columns],[actions])
			        renderTable(id,subjectdata,['id','name','description','timeduration','passingrate','attempt','items'],['create','read','update','delete']);

			        //Other methods starts here...
			        // doRenderSubject(1);
			    });
		    });	        
	    });	
	});
}
	
$(function () {	
	setTimeout(doRenderTable('#subject'),1000);
});
