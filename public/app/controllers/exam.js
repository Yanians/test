$(function () {
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
				        renderTable(id,examdata,['id','user_id','subject_id','question_id','answer'],['read']);

				        //Other methods starts here...
				        doRenderSubject(1);
				    });
			    });	        
		    });	
		});
	}
	setTimeout(doRenderTable('#exam'),1000);

	function doRenderSubject(subjectid){
		$.ajax({
	        method: "POST",
	        url: "app/models/exam.php",
	        data:{'subjectid':subjectid,'action':'getquestions'}
    	}).done(function(questions){
    		// console.log(questions);
    		var subjectinfo = getSubjectInfo(subjectid);
    		// console.log(subjectinfo);
    		$('#subjecttitle').html(subjectinfo.name);
    		$('#subjectdesc').html(
    			'Description: ' + subjectinfo.description + '<br/>' +
    			'Time duration: ' + subjectinfo.timeduration + '<br/>' +
    			'Passing Rate: ' + subjectinfo.passingrate + '<br/>' +
    			'No. of attempts: ' + subjectinfo.attempt + '<br/>' +
    			'No. of items: ' + subjectinfo.items + '<br/>'
    		);
    		// $('#subjectdesc').html(getSubjectDesc(subjectid));
    		quest = JSON.parse(questions);
    		// console.log(quest)
    		html = "";
    		var i = 1;
    		for(q in quest){
    			html += '<tr>';
    			html += '<td><div style="position: absolute;margin-left: 7px;margin-top:1px;">A</div><input type="radio" name="item'+i+'" /></td>';
    			html += '<td><div style="position: absolute;margin-left: 7px;margin-top:1px;">B</div><input type="radio" name="item'+i+'" /></td>';
    			html += '<td><div style="position: absolute;margin-left: 7px;margin-top:1px;">C</div><input type="radio" name="item'+i+'" /></td>';
    			html += '<td><div style="position: absolute;margin-left: 7px;margin-top:1px;">D</div><input type="radio" name="item'+i+'" /></td>';
    			html += '<td style="text-align: center;">'+ i++ +'</td>';
    			html += '<td>';
    			html += quest[q].question;
    			html += '<br>A. ' + quest[q].choice_a;
    			html += '<br>B. ' + quest[q].choice_b;
    			html += '<br>C. ' + quest[q].choice_c;
    			html += '<br>D. ' + quest[q].choice_d;
    			html += '</td>';
    			html += '</tr>';
    		}
    		$('#items').html(html);
			$('input[type=radio]').iCheck({
				checkboxClass: 'icheckbox_square-green',
				radioClass: 'iradio_square-green',
		    		increaseArea: '20%' // optional
		    });
    	});
	}
	
	function getSubjectInfo(subjectid){
		 return info = _SUBJECTTABLE_DATA.map(function(studentobj){
			if(studentobj.id==subjectid){				
				return studentobj;
			}
		})[0];		
	}

});
