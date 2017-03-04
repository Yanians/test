 function renderTable(id,data,columns,actions){
	var arrofobj = JSON.parse(data);

	if(id=='#exam'){
		_EXAMTABLE_SELECTED_ID = id;		
	}		
	else if(id=='#subject'){
		_SUBJECTTABLE_SELECTED_ID = id;		
	}
	else if(id=='#user'){
		_USERTABLE_SELECTED_ID = id;		
	}	
	else if(id=='#news'){
		_NEWSTABLE_SELECTED_ID = id;		
	}	
	else if(id=='#topic'){
		_TOPICTABLE_SELECTED_ID = id;		
	}	
	else if(id=='#guidelines'){
		_GUIDELINESTABLE_SELECTED_ID = id;		
	}	
	else if(id=='#feedback'){
		_FEEDBACKTABLE_SELECTED_ID = id;		
	}	
    var html = "";
    html += "<thead>";
    html += "<tr>";
    for(col in columns)
    	html += "<th>"+columns[col].toUpperCase()+"</th>";
    html += "</tr>";
    html += "</thead>";
    html += "<tbody>";
    for(obj in arrofobj){
      html += "<tr>";
      // console.log(obj);
      for(o in arrofobj[obj])
        html += '<td>'+arrofobj[obj][o]+'</td>';
    	// console.log(obj+' '+o);
      html += "</tr>"
    }
    html+="</tbody>"
    $(id+'table').html(html);
    var table = $(id+'table').DataTable({
    	destroy: true,
    	"language":{
    		search: "_INPUT_",
    		searchPlaceholder: "Search entry..."
    	}
    });        
    $('.dataTables_filter input[type="search"]').css({'width':'350px','display':'inline-block'});
    $(id + 'table tbody').on( 'click', 'tr', function () {
    	if($(this).hasClass('active')){
    		$(this).removeClass('active');  
    		// console.log('Nothing selected'); 
    		_EXAMTABLE_SELECTED_ID = 0;
    		$(id+'table-status').html('<i class="fa fa-info-circle text-gray"></i> &nbsp;&nbsp;Nothing Selected');
    		for(act in actions)if(actions[act]!='create')$(id +'table-btn' + actions[act]).attr('disabled','disabled');
    	} else {
    		$(this).addClass('active').siblings().removeClass('active');
    		// console.log($(this)[0].childNodes[0].innerHTML);
    		_EXAMTABLE_SELECTED_ID = $(this)[0].childNodes[0].innerHTML;
    		$(id+'table-status').html('<i class="fa fa-info-circle text-gray"></i> &nbsp;&nbsp; You selected Entry ID: <span class="text-green" style="font-weight:bold">'+_EXAMTABLE_SELECTED_ID+'</span>!');
			for(act in actions)if(actions[act]!='create')$(id +'table-btn' + actions[act]).removeAttr('disabled');			
    	}    	
    }); 
    $(id+'table-loading').hide();
    $(id+'table-status').html('<i class="fa fa-info-circle text-gray"></i> &nbsp;&nbsp;Nothing Selected');
    for(act in actions){
    	$(id +'table-btn' + actions[act]).show();
    	// console.log(actions[act]); 	  	
    }

    if(id=='#exam')renderExamModals();
    if(id=='#subject')renderSubjectModals();
    if(id=='#user')renderUserModals();
    if(id=='#news')renderNewsModals()
    if(id=='#topic')renderTopicModals()
    if(id=='#feedback')renderFeedbackModals()
    if(id=='#guidelines')renderGuidelinesModals()
}
let userForm = `
	<form data-toggle="validator" role="form" id="addUser-form">
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">First Name:</label>
			<input type="text" class="form-control" placeholder="first name" id="firstname" required>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Last Name:</label>
			<input type="text" class="form-control" placeholder="Last name" id="lastname" required>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">E-mail:</label>
			<input type="email" class="form-control" placeholder="Email" id="email" data-error="This email address is invalid" required>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<div class="help-block with-errors"></div>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Role:</label>
			<select name="colors" class="form-control" id="isadmin">
				<option value="0">Student</option>
				<option value="1">Admin</option>
			</select>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Password:</label>
			<input type="password" data-minlength="6" class="form-control" placeholder="Password" id="password" required>
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			<div class="help-block">Minimum of 6 characters</div>
		</div>
	</form>
`;
let topicForm = `
	<form data-toggle="validator" role="form" id="addTopic-form">
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">User Name:</label>
			<input type="text" class="form-control" placeholder="first name" id="userid" required>
			<span class="glyphicon glyphicon-topic form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Subject:</label>
			<select name="colors" class="form-control" id="subjectid">
			</select>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Name:</label>
			<input type="text" class="form-control" placeholder="Enter title" id="name" required>
			<span class="glyphicon glyphicon-topic form-control-feedback"></span>
		</div>
	</form>
`;
let subjectForm = `
	<form>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-4">
					<label for="recipient-name" class="control-label">Name:</label>
					<input type="text" class="form-control" id="name">
				</div>
				<div class="col-sm-4">
					<label for="recipient-name" class="control-label">Time Duration:</label>
					<input type="text" class="form-control" id="timeduration">
				</div>
				<div class="col-sm-4">
					<label for="recipient-name" class="control-label">Passing Rate:</label>
					<input type="text" class="form-control" id="passingrate">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="message-text" class="control-label">Description:</label>
			<textarea class="form-control" id="description"></textarea>
		</div>
		<div class="form-group">
			<div class="row">
				<div class="col-sm-6">
					<label for="recipient-name" class="control-label">No. of attempts:</label>
					<input type="text" class="form-control" id="attempt">
				</div>
				<div class="col-sm-6">
					<label for="recipient-name" class="control-label">No. of items:</label>
					<input type="text" class="form-control" id="items">
				</div>
			</div>
		</div>
	</form>
`;
let newsForm = `
	<form data-toggle="validator" role="form" id="addNews-form">
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">User Name:</label>
			<input type="text" class="form-control" placeholder="first name" id="userid" required>
			<span class="glyphicon glyphicon-news form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Title:</label>
			<input type="text" class="form-control" placeholder="Enter title" id="name" required>
			<span class="glyphicon glyphicon-news form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Content:</label>
			<textarea class="form-control" placeholder="content" id="content" data-maxlength="255" data-error="not less than 255 characters" required></textarea>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<div class="help-block with-errors"></div>
		</div>
	</form>
`;
let guidelinesForm = `
	<form data-toggle="validator" role="form" id="addGuidelines-form">
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">User Name:</label>
			<input type="text" class="form-control" placeholder="first name" id="userid" required>
			<span class="glyphicon glyphicon-guidelines form-control-feedback"></span>
		</div>
		
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">No.of Subject to Pass:</label>
			<input type="number" class="form-control" placeholder="Subjects to Pass" id="subjectstopass" required>
			<span class="glyphicon glyphicon-guidelines form-control-feedback"></span>
		</div>
	</form>
`;
/* 
<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Subject:</label>
			<select name="subjects" class="form-control" id="subjectid">
			</select>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>


*/


let feedBackForms = `
	<form data-toggle="validator" role="form" id="addFeddback-form">
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">User Name:</label>
			<input type="text" class="form-control" placeholder="first name" id="userid" required>
			<span class="glyphicon glyphicon-feedback form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<label for="recipient-name" class="control-label">Content:</label>
			<textarea class="form-control" placeholder="content" id="content" data-maxlength="255" data-error="not less than 255 characters" required></textarea>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			<div class="help-block with-errors"></div>
		</div>
	</form>
`;
function renderExamModals(){
	/*
	$(id + 'modal-create').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var recipient = button.data('id') // Extract info from data-* attributes
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  modal.find('.modal-title').text('Create')
	  modal.find('.modal-body input').val(recipient)
	});
	*/
	$(_EXAMTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
	  var modal = $(this);
	  modal.find('.modal-title').text('Read Entry ID: ' + _EXAMTABLE_SELECTED_ID)	  
	  modal.find('.modal-body input').attr('readonly','readonly');
	  modal.find('#examquestion').attr('readonly','readonly');

	  _EXAMTABLE_DATA.map(function(examobj){
	  	if(examobj.id===_EXAMTABLE_SELECTED_ID){
		  	_USERTABLE_DATA.map(function(userobj){
		  		if(userobj.id===examobj.user_id){
		  			_SUBJECTTABLE_DATA.map(function(subjectobj){
		  				if(subjectobj.id===examobj.subject_id){
		  					_QUESTIONTABLE_DATA.map(function(questionobj){
		  						if(questionobj.id===examobj.question_id){
		  							modal.find('#examuser').val(userobj.lastname.toUpperCase()+', '+userobj.firstname.toUpperCase());
		  							modal.find('#examsubject').val(subjectobj.name);
		  							modal.find('#examquestion').val(questionobj.question);
		  							modal.find('#examuseranswer').val(examobj.answer);
		  							modal.find('#examimockanswer').val(questionobj.answer);
		  							(examobj.answer===questionobj.answer)?
		  							modal.find('#examresult').val("CORRECT"):
		  							modal.find('#examresult').val("INCORRECT");				  				
		  							return;
		  						}					  	
		  					});
		  					return;
		  				}
		  			});
		  			return;
		  		}
		  	});
	  	return;
	  }
	});
	  
	});
}

function renderSubjectModals(){

	$(_SUBJECTTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		// console.log("I'm here");
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _SUBJECTTABLE_SELECTED_ID)	  
		modal.find('.modal-body').html(subjectForm);
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#subjectdescription').attr('readonly','readonly');

		_EXAMTABLE_DATA.map(function(examobj){
	  		_SUBJECTTABLE_DATA.map(function(subjectobj){
	  			if(subjectobj.id===_EXAMTABLE_SELECTED_ID){
					modal.find('#name').val(subjectobj.name);
					modal.find('#timeduration').val(subjectobj.timeduration);
					modal.find('#passingrate').val(subjectobj.passingrate);
					modal.find('#description').val(subjectobj.description);
					modal.find('#attempt').val(subjectobj.attempt);		  									  				
					modal.find('#items').val(subjectobj.items);		  									  				
					return;
				}
			});
			return;
		});
	});

	$(_SUBJECTTABLE_SELECTED_ID + 'modal-create').on('show.bs.modal', function (event) {
		var modal =$(this);
		modal.find('.modal-body').html(subjectForm);
	});

	$(_SUBJECTTABLE_SELECTED_ID + 'modal-update').on('show.bs.modal', function (event) {
		var modal =$(this);
		modal.find('.modal-body').html(subjectForm);
		modal.find('.modal-title').text('Edit Entry ID: ' + _SUBJECTTABLE_SELECTED_ID)	  
		modal.find('.modal-body').html(subjectForm);

		_EXAMTABLE_DATA.map(function(examobj){
	  		_SUBJECTTABLE_DATA.map(function(subjectobj){
	  			if(subjectobj.id===_EXAMTABLE_SELECTED_ID){
					modal.find('#name').val(subjectobj.name);
					modal.find('#timeduration').val(subjectobj.timeduration);
					modal.find('#passingrate').val(subjectobj.passingrate);
					modal.find('#description').val(subjectobj.description);
					modal.find('#attempt').val(subjectobj.attempt);		  									  				
					modal.find('#items').val(subjectobj.items);		  									  				
					return;
				}
			});
			return;
		});
	});

	$(_SUBJECTTABLE_SELECTED_ID + 'modal-delete').on('show.bs.modal', function (event) {
		var modal =$(this);
		modal.find('.modal-body').html(subjectForm);
		modal.find('.modal-title').text('Delete Entry ID: ' + _SUBJECTTABLE_SELECTED_ID)	  
		modal.find('.modal-body').html(subjectForm);
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#description').attr('readonly','readonly');

		_EXAMTABLE_DATA.map(function(examobj){
	  		_SUBJECTTABLE_DATA.map(function(subjectobj){
	  			if(subjectobj.id===_EXAMTABLE_SELECTED_ID){
					modal.find('#name').val(subjectobj.name);
					modal.find('#timeduration').val(subjectobj.timeduration);
					modal.find('#passingrate').val(subjectobj.passingrate);
					modal.find('#description').val(subjectobj.description);
					modal.find('#attempt').val(subjectobj.attempt);		  									  				
					modal.find('#items').val(subjectobj.items);		  									  				
					return;
				}
			});
			return;
		});
	});

	$('#subjectbtncreate').on('click',function(){				
		console.log("clicked");
		var newSubject = {
			name:$('#name').val(),
			timeduration:$('#timeduration').val(),
			passingrate:$('#passingrate').val(),
			description:$('#description').val(),
			attempt:$('#attempt').val(),
			items:$('#items').val()
		};
		console.log(newSubject);
		$.ajax({
	        method: "POST",
	        url: "../app/models/subject.php",
	        data: {
	        	action:'createsubject',
	        	name:newSubject.name,	        	
	        	timeduration:newSubject.timeduration,	        	
	        	passingrate:newSubject.passingrate,	        	
	        	description:newSubject.description,	        	
	        	attempt:newSubject.attempt,	        	
	        	items:newSubject.items     	
	        }
	    }).done(function(res){
	    	// console.log(res);
	    	$('#subjectmodal-create').modal('hide');
	    	$('#name').val("");$('#timeduration').val("");
	    	$('#passingrate').val("");$('#description').val("");
	    	$('#attempt').val("");$('#items').val("");
	    	setTimeout(function(){
	    		$('#subjecttable-loading').html('<img src="dist/img/loading1.gif">');
	    		doRenderTable('#subject');
	    		swal("Success!", "New subject has been created!", "success");
	    	},1000);	    	
	    });
	});

	$('#subjectbtnupdate').on('click',function(){				
		console.log("updateclicked");
		swal({
		  title: "Are you sure?",
		  text: "You wanna edit this data?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, edit it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
			var newSubject = {
				name:$('#name').val(),
				timeduration:$('#timeduration').val(),
				passingrate:$('#passingrate').val(),
				description:$('#description').val(),
				attempt:$('#attempt').val(),
				items:$('#items').val()
			};
			console.log(newSubject);
			$.ajax({
		        method: "POST",
		        url: "../app/models/subject.php",
		        data: {
		        	action:'updatesubject',
		        	id:_EXAMTABLE_SELECTED_ID,
		        	name:newSubject.name,	        	
		        	timeduration:newSubject.timeduration,	        	
		        	passingrate:newSubject.passingrate,	        	
		        	description:newSubject.description,	        	
		        	attempt:newSubject.attempt,	        	
		        	items:newSubject.items     	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#subjectmodal-update').modal('hide');
		    	$('#name').val("");$('#timeduration').val("");
		    	$('#passingrate').val("");$('#description').val("");
		    	$('#attempt').val("");$('#items').val("");
		    	setTimeout(function(){
		    		$('#subjecttable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#subject');
		    		swal("Success!", "New subject has been updated!", "success");
		    	},1000);	    	
	    	});
		  } else {
			    swal("Cancelled", "Subject data is safe :)", "error");
		  }
		});
	});

	$('#subjectbtndelete').on('click',function(){				
		console.log("delete  clicked");
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this data!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, delete it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		  	var newSubject = {
				name:$('#name').val(),
				timeduration:$('#timeduration').val(),
				passingrate:$('#passingrate').val(),
				description:$('#description').val(),
				attempt:$('#attempt').val(),
				items:$('#items').val()
			};
		    $.ajax({
		        method: "POST",
		        url: "../app/models/subject.php",
		        data: {
		        	action:'deletesubject',
		        	id:_EXAMTABLE_SELECTED_ID,
		        	name:newSubject.name,	        	
		        	timeduration:newSubject.timeduration,	        	
		        	passingrate:newSubject.passingrate,	        	
		        	description:newSubject.description,	        	
		        	attempt:newSubject.attempt,	        	
		        	items:newSubject.items	  	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#subjectmodal-delete').modal('hide');
		    	$('#name').val("");$('#timeduration').val("");
		    	$('#passingrate').val("");$('#description').val("");
		    	$('#attempt').val("");$('#items').val("");
		    	setTimeout(function(){
		    		$('#subjecttable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#subject');
		    		swal("Deleted!", "The subject has been deleted!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "Subject data is safe :)", "error");
		  }
		});
		
	});
}
function renderUserModals(){

	$(_USERTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);
		modal.find('.modal-body').html(userForm);
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('.modal-body select').attr('disabled','disabled');
  		_USERTABLE_DATA.map(function(userobj){
  			if(userobj.id===_EXAMTABLE_SELECTED_ID){
  				$("#isadmin option").each(function(i){
			        if (userobj.isadmin==this.value) {
  						$(this).attr("selected","selected");
  					}
			    });
				modal.find('#firstname').val(userobj.firstname);
				modal.find('#lastname').val(userobj.lastname);
				modal.find('#email').val(userobj.email);
				modal.find('#password').val(userobj.password);
						  									  				
				modal.find('#createdat').val(userobj.createdat);
				console.log(userobj);
				return;
  			}
  		});
	});
	$(_USERTABLE_SELECTED_ID + 'modal-create').on('show.bs.modal', function (event) {
		var modal =$(this);
		modal.find('.modal-body').html(userForm);
	});

	$(_USERTABLE_SELECTED_ID + 'modal-update').on('show.bs.modal', function (event) {
		var modal =$(this);
		modal.find('.modal-body').html(userForm);
		_USERTABLE_DATA.map(function(userobj){
  			if(userobj.id===_EXAMTABLE_SELECTED_ID){
  				$("#isadmin option").each(function(i){
			        if (userobj.isadmin==this.value) {
  						$(this).attr("selected","selected");
  					}
			    });
				modal.find('#firstname').val(userobj.firstname);
				modal.find('#lastname').val(userobj.lastname);
				modal.find('#email').val(userobj.email);
				modal.find('#password').val(userobj.password);
						  									  				
				modal.find('#createdat').val(userobj.createdat);
				console.log(userobj);
				return;
  			}
  		});
	});

	$(_USERTABLE_SELECTED_ID + 'modal-delete').on('show.bs.modal', function (event) {
		var modal =$(this);
		modal.find('.modal-body').html(userForm);
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('.modal-body select').attr('disabled','disabled');
		_USERTABLE_DATA.map(function(userobj){
  			if(userobj.id===_EXAMTABLE_SELECTED_ID){
  				$("#isadmin option").each(function(i){
			        if (userobj.isadmin==this.value) {
  						$(this).attr("selected","selected");
  					}
			    });
				modal.find('#firstname').val(userobj.firstname);
				modal.find('#lastname').val(userobj.lastname);
				modal.find('#email').val(userobj.email);
				modal.find('#password').val(userobj.password);
						  									  				
				modal.find('#createdat').val(userobj.createdat);
				console.log(userobj);
				return;
  			}
  		});
	});

	$('#userbtnmodalcreate').on('click',function(){				
		console.log("clicked");
		var newUser = {
			firsname:$('#firstname').val(),
			lastname:$('#lastname').val(),
			email:$('#email').val(),
			password:$('#password').val(),
			isadmin:$('#isadmin').val()
		};
		console.log(newUser);
		$.ajax({
	        method: "POST",
	        url: "../app/models/user.php",
	        data: {
	        	action:'createuser',
	        	firstname:newUser.firstname,
	        	lastname:newUser.lastname,	        	
	        	email:newUser.email,	        	
	        	password:newUser.password,	             	
	        	isadmin:newUser.isadmin     	
	        }
	    }).done(function(res){
	    	// console.log(res);
	    	$('#usermodal-create').modal('hide');
	    	$('#firstname').val("");$('#lastname').val("");
	    	$('#email').val("");$('#password').val("");
	    	$('#createdat').val("");$('#isadmin').val("");
	    	$('#confirmpassword').val("");
	    	setTimeout(function(){
	    		$('#usertable-loading').html('<img src="dist/img/loading1.gif">');
	    		doRenderTable('#user');
	    		swal("Success!", "New user has been created!", "success");
	    	},1000);	    	
	    });
	});

	$('#userbtnmodalupdate').on('click',function(){				
		console.log("updateclicked");
		swal({
		  title: "Are you sure?",
		  text: "You wanna edit this data?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, delete it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
			var newUser = {
				firstname:$('#firstname').val(),
				lastname:$('#lastname').val(),
				email:$('#email').val(),
				password:$('#password').val(),
				isadmin:$('#isadmin').val()
			};
			console.log(newUser);
			$.ajax({
		        method: "POST",
		        url: "../app/models/user.php",
		        data: {
		        	action:'updateuser',
		        	id:_EXAMTABLE_SELECTED_ID,
		        	firstname:newUser.firstname,
		        	lastname:newUser.lastname,	        	
		        	email:newUser.email,	        	
		        	password:newUser.password,	        	
		        	isadmin:newUser.isadmin     	
		        }
		    }).done(function(res){
		    	console.log(res);
		    	$('#usermodal-update').modal('hide');
		    	$('#firstname').val("");$('#lastname').val("");
		    	$('#email').val("");$('#password').val("");
		    	$('#createdat').val("");$('#isadmin').val("");
		    	$('#confirmpassword').val("");
		    	setTimeout(function(){
		    		$('#usertable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#user');
		    		swal("Success!", "New user has been created!", "success");
		    	},1000);	    	
	    });
		  } else {
			    swal("Cancelled", "User data is safe :)", "error");
		  }
		});
	});

	$('#userbtnmodaldelete').on('click',function(){				
		console.log("delete  clicked");
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this data!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, delete it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		    $.ajax({
		        method: "POST",
		        url: "../app/models/user.php",
		        data: {
		        	action:'deleteuser',
		        	id:_EXAMTABLE_SELECTED_ID	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#usermodal-delete').modal('hide');
		    	$('#firstname').val("");$('#lastname').val("");
		    	$('#email').val("");$('#password').val("");
		    	$('#createdat').val("");$('#isadmin').val("");
		    	$('#confirmpassword').val("");
		    	setTimeout(function(){
		    		$('#usertable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#user');
		    		swal("Deleted!", "The user has been deleted!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "User data is safe :)", "error");
		  }
		});
		
	});
}

function renderNewsModals(){
	$(_NEWSTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID)	 
		modal.find('.modal-body').html(newsForm); 
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#content').attr('readonly','readonly');
  		_NEWSTABLE_DATA.map(function(newsobj){
  			if(newsobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(newsobj.user_id);
				modal.find('#name').val(newsobj.name);
				modal.find('#content').val(newsobj.content);	  									  				
				modal.find('#createdat').val(newsobj.date);
				// console.log(newsobj);
				return;
  			}
  		});
	});
	$(_NEWSTABLE_SELECTED_ID + 'modal-create').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(newsForm);
	});

	$(_NEWSTABLE_SELECTED_ID + 'modal-update').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(newsForm);
		modal.find('#userid').attr('readonly','readonly');
		modal.find('.modal-title').text('Edit Entry ID: ' + _USERTABLE_SELECTED_ID);
  		_NEWSTABLE_DATA.map(function(newsobj){
  			if(newsobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(newsobj.user_id);
				modal.find('#name').val(newsobj.name);
				modal.find('#content').val(newsobj.content);	  									  				
				modal.find('#createdat').val(newsobj.date);
				// console.log(newsobj);
				return;
  			}
  		});
	});

	$(_NEWSTABLE_SELECTED_ID + 'modal-delete').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(newsForm);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID)	
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#content').attr('readonly','readonly');
  		_NEWSTABLE_DATA.map(function(newsobj){
  			if(newsobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(newsobj.user_id);
				modal.find('#name').val(newsobj.name);
				modal.find('#content').val(newsobj.content);	  									  				
				modal.find('#createdat').val(newsobj.date);
				// console.log(newsobj);
				return;
  			}
  		});
	});

	$('#newsbtnmodalcreate').on('click',function(){				
		console.log("clicked");
		var newNews = {
			userid:$('#userid').val(),
			name:$('#name').val(),
			content:$('#content').val()
		};
		console.log(newNews);
		$.ajax({
	        method: "POST",
	        url: "../app/models/news.php",
	        data: {
	        	action:'createnews',
	        	userid:newNews.userid,	        	
	        	name:newNews.name,	        	
	        	content:newNews.content	   
	        }
	    }).done(function(res){
	    	// console.log(res);
	    	$('#newsmodal-create').modal('hide');
	    	$('#userid').val("");$('#name').val("");
	    	$('#content').val("");$('#createdat').val("");
	    	$('#createdat').val("");
	    	setTimeout(function(){
	    		$('#newstable-loading').html('<img src="dist/img/loading1.gif">');
	    		doRenderTable('#news');
	    		swal("Success!", "New news has been created!", "success");
	    	},1000);	    	
	    });
	});

	$('#newsbtnmodalupdate').on('click',function(){				
		console.log("updateclicked");
		swal({
		  title: "Are you sure?",
		  text: "You wanna edit this data?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, edit it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
			var newNews = {
				name:$('#name').val(),
				content:$('#content').val()
			};
			console.log(newNews);
			$.ajax({
		        method: "POST",
		        url: "../app/models/news.php",
		        data: {
		        	action:'updatenews',
		        	id:_EXAMTABLE_SELECTED_ID,     	
		        	name:newNews.name,	        	
		        	content:newNews.content	    
		        }
		    }).done(function(res){
		    	console.log(res);
		    	$('#newsmodal-update').modal('hide');
		    	$('#userid').val("");$('#name').val("");
		    	$('#content').val("");$('#createdat').val("");
		    	$('#createdat').val("");
		    	setTimeout(function(){
		    		$('#newstable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#news');
		    		swal("Success!", "New news has been updated!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "News data is safe :)", "error");
		  }
		});
	});

	$('#newsbtnmodaldelete').on('click',function(){				
		console.log("delete  clicked");
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this data!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, delete it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		    $.ajax({
		        method: "POST",
		        url: "../app/models/news.php",
		        data: {
		        	action:'deletenews',
		        	id:_EXAMTABLE_SELECTED_ID  	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#newsmodal-delete').modal('hide');
		    	$('#userid').val("");$('#subjectstopass').val("");
		    	$('#createdat').val("");
		    	setTimeout(function(){
		    		$('#newstable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#news');
		    		swal("Deleted!", "The news has been deleted!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "News data is safe :)", "error");
		  }
		});
		
	});
}

function renderFeedbackModals(){
	$(_FEEDBACKTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);
		modal.find('.modal-body').html(feedBackForms);	  
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#content').attr('readonly','readonly');
  		_FEEDBACKTABLE_DATA.map(function(feedbackobj){
  			if(feedbackobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(feedbackobj.user_id.toUpperCase());	  									  				
				modal.find('#content').val(feedbackobj.content);	  									  				
				modal.find('#createdat').val(feedbackobj.date);
				return;
  			}
  		});
	});

	$(_FEEDBACKTABLE_SELECTED_ID + 'modal-create').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(feedBackForms);
	});

	$(_FEEDBACKTABLE_SELECTED_ID + 'modal-update').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(feedBackForms);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);
		modal.find('.modal-body').html(feedBackForms);	  
  		_FEEDBACKTABLE_DATA.map(function(feedbackobj){
  			if(feedbackobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(feedbackobj.user_id.toUpperCase());	  									  				
				modal.find('#content').val(feedbackobj.content);	  									  				
				modal.find('#createdat').val(feedbackobj.date);
				return;
  			}
  		});
	});

	$(_FEEDBACKTABLE_SELECTED_ID + 'modal-delete').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(feedBackForms);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);
		modal.find('.modal-body').html(feedBackForms);	  
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#content').attr('readonly','readonly');
  		_FEEDBACKTABLE_DATA.map(function(feedbackobj){
  			if(feedbackobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(feedbackobj.user_id.toUpperCase());	  									  				
				modal.find('#content').val(feedbackobj.content);	  									  				
				modal.find('#createdat').val(feedbackobj.date);
				return;
  			}
  		});
	});

	$('#feedbackbtnmodalcreate').on('click',function(){				
		console.log("clicked");
		var newFeedback = {
			user_id:$('#userid').val(),
			name:$('#name').val(),
			content:$('#content').val()
		};
		console.log(newFeedback);
		$.ajax({
	        method: "POST",
	        url: "../app/models/feedback.php",
	        data: {
	        	action:'createfeedback',
	        	user_id:newFeedback.user_id,	        	
	        	name:newFeedback.name,	        	
	        	content:newFeedback.content	    
	        }
	    }).done(function(res){
	    	// console.log(res);
	    	$('#feedbackmodal-create').modal('hide');
	    	$('#userid').val("");
	    	$('#name').val("");
	    	$('#content').val("");$('#createdat').val("");
	    	$('#createdat').val("");
	    	setTimeout(function(){
	    		$('#feedbacktable-loading').html('<img src="dist/img/loading1.gif">');
	    		doRenderTable('#feedback');
	    		swal("Success!", "New feedback has been created!", "success");
	    	},1000);	    	
	    });
	});

	$('#feedbackbtnmodalupdate').on('click',function(){				
		console.log("updateclicked");
		swal({
		  title: "Are you sure?",
		  text: "You wanna edit this data?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, edit it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
			var newFeedback = {
				name:$('#name').val(),
				content:$('#content').val()
			};
			console.log(newFeedback);
			$.ajax({
		        method: "POST",
		        url: "../app/models/feedback.php",
		        data: {
		        	action:'updatefeedback',
		        	id:_EXAMTABLE_SELECTED_ID,       	
		        	name:newFeedback.name,	        	
		        	content:newFeedback.content	      
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#feedbackmodal-update').modal('hide');
		    	$('#userid').val("");
		    	$('#name').val("");
		    	$('#content').val("");$('#createdat').val("");
		    	$('#createdat').val("");
		    	setTimeout(function(){
		    		$('#feedbacktable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#feedback');
		    		swal("Success!", "New feedback has been created!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "Feedback data is safe :)", "error");
		  }
		});
	});

	$('#feedbackbtnmodaldelete').on('click',function(){				
		console.log("delete  clicked");
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this data!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, delete it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		    $.ajax({
		        method: "POST",
		        url: "../app/models/feedback.php",
		        data: {
		        	action:'deletefeedback',
		        	id:_EXAMTABLE_SELECTED_ID	  	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#feedbackmodal-delete').modal('hide');
		    	$('#userid').val("");$('#subjectstopass').val("");
		    	$('#createdat').val("");
		    	setTimeout(function(){
		    		$('#feedbacktable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#feedback');
		    		swal("Deleted!", "The feedback has been deleted!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "Feedback data is safe :)", "error");
		  }
		});
		
	});
}

function renderGuidelinesModals(){
	$(_GUIDELINESTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);	  
		modal.find('.modal-body').html(guidelinesForm);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#content').attr('readonly','readonly');
  		_GUIDELINESTABLE_DATA.map(function(guidelinesobj){
  			if(guidelinesobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(guidelinesobj.user_id.toUpperCase());	  									  				
				modal.find('#subjectstopass').val(guidelinesobj.subjects_toPass);	  									  				
				modal.find('#createdat').val(guidelinesobj.date);
				// console.log(guidelinesobj);
				return;
  			}
  		});
	});

	$(_GUIDELINESTABLE_SELECTED_ID + 'modal-create').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(guidelinesForm);
		// _SUBJECTTABLE_DATA.map(function(subjectobj){
		// 	// modal.find('.modal-body #createdat').val(Date.now());
		// 	modal.find('#createdat').val(new Date().getTime("Y-m-d H:i:s")).attr('readonly','readonly');
  //           modal.find('#subjectid').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
		// });
	});

	$(_GUIDELINESTABLE_SELECTED_ID + 'modal-update').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(guidelinesForm);
		modal.find('.modal-title').text('Edit Entry ID: ' + _USERTABLE_SELECTED_ID);	  
		modal.find('.modal-body').html(guidelinesForm);
		modal.find('#userid').attr('readonly','readonly');
  		_GUIDELINESTABLE_DATA.map(function(guidelinesobj){
  			if(guidelinesobj.id===_EXAMTABLE_SELECTED_ID){
				guidelinesobj.subjects_toPass=parseInt(guidelinesobj.subjects_toPass);	
				modal.find('#userid').val(guidelinesobj.user_id.toUpperCase());	  									  				
				modal.find('#subjectstopass').val(guidelinesobj.subjects_toPass);	  									  				
				modal.find('#createdat').val(guidelinesobj.date);
				// console.log(guidelinesobj);
				return;
  			}
  		});
	});

	$(_GUIDELINESTABLE_SELECTED_ID + 'modal-delete').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(guidelinesForm);
		modal.find('.modal-title').text('Delete Entry ID: ' + _USERTABLE_SELECTED_ID);	  
		modal.find('.modal-body').html(guidelinesForm);
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('#content').attr('readonly','readonly');
  		_GUIDELINESTABLE_DATA.map(function(guidelinesobj){
  			if(guidelinesobj.id===_EXAMTABLE_SELECTED_ID){
				modal.find('#userid').val(guidelinesobj.user_id.toUpperCase());	  									  				
				modal.find('#subjectstopass').val(guidelinesobj.subjects_toPass);	  									  				
				modal.find('#createdat').val(guidelinesobj.date);
				return;
  			}
  		});
	});


	$('#guidelinesbtnmodalcreate').on('click',function(){				
		console.log("clicked");
		var newGuidelines = {
			user_id:$('#userid').val(),
			subjects_toPass:$('#subjectstopass').val()
		};
		console.log(newGuidelines);
		$.ajax({
	        method: "POST",
	        url: "../app/models/guidelines.php",
	        data: {
	        	action:'createguidelines',
	        	user_id:newGuidelines.user_id,	            	
	        	subjects_toPass:newGuidelines.subjects_toPass	   
	        }
	    }).done(function(res){
	    	// console.log(res);
	    	$('#guidelinesmodal-create').modal('hide');
	    	$('#userid').val("");$('#subjectstopass').val("");
	    	$('#createdat').val("");
	    	setTimeout(function(){
	    		$('#guidelinestable-loading').html('<img src="dist/img/loading1.gif">');
	    		doRenderTable('#guidelines');
	    		swal("Success!", "New guidelines has been created!", "success");
	    	},1000);	    	
	    });
	});

	$('#guidelinesbtnmodalupdate').on('click',function(){				
		console.log("updateclicked");
		swal({
		  title: "Are you sure?",
		  text: "You wanna edit this data?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, edit it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
			var newGuidelines = {
				// user_id:$('#userid').val(),
				subjects_toPass:$('#subjectstopass').val()
				// date:$('#createdat').val()
			};
			console.log(newGuidelines);
			$.ajax({
		        method: "POST",
		        url: "../app/models/guidelines.php",
		        data: {
		        	action:'updateguidelines',
		        	id: _EXAMTABLE_SELECTED_ID,
		        	// user_id:newGuidelines.user_id,	            	
		        	subjects_toPass:newGuidelines.subjects_toPass	        	
		        	// date:newGuidelines.date 	
		        }
		    }).done(function(res){
		    	console.log(res);
		    	$('#guidelinesmodal-update').modal('hide');
		    	$('#userid').val("");$('#subjectstopass').val("");
		    	$('#createdat').val("");
		    	setTimeout(function(){
		    		$('#guidelinestable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#guidelines');
		    		swal("Success!", "New guidelines has been created!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "Guidelines data is safe :)", "error");
		  }
		});
	});

	$('#guidelinesbtnmodaldelete').on('click',function(){				
		console.log("delete  clicked");
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this data!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, delete it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		    $.ajax({
		        method: "POST",
		        url: "../app/models/guidelines.php",
		        data: {
		        	action:'deleteguidelines',
		        	id:_EXAMTABLE_SELECTED_ID,	
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#guidelinesmodal-delete').modal('hide');
		    	$('#userid').val("");$('#subjectstopass').val("");
		    	$('#createdat').val("");
		    	setTimeout(function(){
		    		$('#guidelinestable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#guidelines');
		    		swal("Deleted!", "The guidelines has been deleted!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "Guidelines data is safe :)", "error");
		  }
		});
		
	});
}

function renderTopicModals(){
	
	$(_TOPICTABLE_SELECTED_ID + 'modal-read').on('show.bs.modal', function (event) {
		console.log("I'm here " + _EXAMTABLE_SELECTED_ID);
		var modal = $(this);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);	  
		modal.find('.modal-body').html(topicForm);
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('.modal-body select').attr('disabled','disabled');
  		_TOPICTABLE_DATA.map(function(topicobj){
  			if(topicobj.id===_EXAMTABLE_SELECTED_ID){
  				_SUBJECTTABLE_DATA.map(function(subjectobj){
  					$('#subjectid').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
						$("#subjectid option").each(function(i){
				        if (topicobj.subject_id==this.text) {
	  						$(this).attr("selected","selected");
	  					}
				    });
					modal.find('#userid').val(topicobj.user_id.toUpperCase());	  									  				
					modal.find('#name').val(topicobj.name);	  									  				
					modal.find('#createdat').val(topicobj.date);
					// console.log(topicobj);
  				});
				return;
  			}
  		});
	});

	$(_TOPICTABLE_SELECTED_ID + 'modal-create').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(topicForm);
		modal.find('#userid').attr('readonly','readonly');
		modal.find('#userid').val(`<?php echo $_SESSION['id']; ?>`);
		_SUBJECTTABLE_DATA.map(function(subjectobj){
			// modal.find('.modal-body #createdat').val(Date.now());
			modal.find('#createdat').val(new Date().getTime("Y-m-d H:i:s")).attr('readonly','readonly');
            $('#subjectid').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
		});
	});

	$(_TOPICTABLE_SELECTED_ID + 'modal-update').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(topicForm);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID);  
		_SUBJECTTABLE_DATA.map(function(subjectobj){
			modal.find('#subjectid').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
		});
  		_TOPICTABLE_DATA.map(function(topicobj){
  			if(topicobj.id===_EXAMTABLE_SELECTED_ID){
					$("#subjectid option").each(function(i){
			        if (topicobj.subject_id==this.text) {
  						$(this).attr("selected","selected");
  					}
			    });
				modal.find('#userid').val(topicobj.user_id.toUpperCase());	  									  				
				modal.find('#name').val(topicobj.name);	  									  				
				modal.find('#createdat').val(topicobj.date);
				// console.log(topicobj);
				return;
  			}
  		});
	});

	$(_TOPICTABLE_SELECTED_ID + 'modal-delete').on('show.bs.modal', function (event) {
		var modal = $(this);
		modal.find('.modal-body').html(topicForm);
		modal.find('.modal-title').text('Read Entry ID: ' + _USERTABLE_SELECTED_ID)	  
		modal.find('.modal-body input').attr('readonly','readonly');
		modal.find('.modal-body select').attr('disabled','disabled');
		_SUBJECTTABLE_DATA.map(function(subjectobj){
			modal.find('#subjectid').append($('<option>').text(subjectobj.name).attr('value', subjectobj.id));
		});
  		_TOPICTABLE_DATA.map(function(topicobj){
  			if(topicobj.id===_EXAMTABLE_SELECTED_ID){
  				$("#subjectid option").each(function(i){
			        if (topicobj.subject_id==this.text) {
  						$(this).attr("selected","selected");
  					}
			    });
				modal.find('#userid').val(topicobj.user_id.toUpperCase());	  									  				
				modal.find('#name').val(topicobj.name);	  									  				
				modal.find('#createdat').val(topicobj.date);
				// console.log(topicobj);
				return;
  			}
  		});
	});

	$('#topicbtnmodalcreate').on('click',function(){				
		console.log("clicked");
		var newTopic = {
			user_id:$('#userid').val(),
			subject_id:$('#subjectid').val(),
			name:$('#name').val()
		};
		console.log(newTopic);
		$.ajax({
	        method: "POST",
	        url: "../app/models/topic.php",
	        data: {
	        	action:'createtopic',
	        	user_id:newTopic.user_id,	        	
	        	subject_id:newTopic.subject_id,	        	
	        	name:newTopic.name        
	        }
	    }).done(function(res){
	    	console.log(res);
	    	$('#topicmodal-create').modal('hide');
	    	$('#userid').val("");
	    	$('#subjectid').val("");$('#name').val("");
	    	$('#createdat').val("");
	    	setTimeout(function(){
	    		$('#topictable-loading').html('<img src="dist/img/loading1.gif"><br>Loading....');
	    		doRenderTable('#topic');
	    		swal("Success!", "New topic has been created!", "success");
	    	},1000);	    	
	    });
	});
	$('#topicbtnmodalupdate').on('click',function(){				
		console.log("updateclicked");
		swal({
		  title: "Are you sure?",
		  text: "You wanna edit this data?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, delete it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
			var newTopic = {
				user_id:$('#userid').val(),
				subject_id:$('#subjectid').val(),
				name:$('#name').val()
			};
			console.log(newTopic);
			$.ajax({
		        method: "POST",
		        url: "../app/models/topic.php",
		        data: {
		        	action:'updatetopic',
		        	id:_EXAMTABLE_SELECTED_ID,
		        	user_id:newTopic.user_id,	        	
		        	subject_id:newTopic.subject_id,	        	
		        	name:newTopic.name	
		        }
		    }).done(function(res){
		    	console.log(res);
		    	$('#topicmodal-update').modal('hide');
		    	$('#userid').val("");
		    	$('#subjectid').val("");$('#name').val("");
		    	$('#createdat').val("");
		    	setTimeout(function(){
		    		$('#topictable-loading').html('<img src="dist/img/loading1.gif"><br>Loading....');
		    		doRenderTable('#topic');
		    		swal("Success!", "New topic has been created!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "Topic data is safe :)", "error");
		  }
		});
	});

	$('#topicbtnmodaldelete').on('click',function(){				
		console.log("delete  clicked");
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this data!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, delete it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm){
		  if (isConfirm) {
		  	var newTopic = {
				user_id:$('#userid').val(),
				subject_id:$('#subjectid').val(),
				name:$('#name').val(),
			};
		    $.ajax({
		        method: "POST",
		        url: "../app/models/topic.php",
		        data: {
		        	action:'deletetopic',
		        	id:_EXAMTABLE_SELECTED_ID,
		        }
		    }).done(function(res){
		    	// console.log(res);
		    	$('#topicmodal-delete').modal('hide');
		    	$('#userid').val("");
		    	$('#subjectid').val("");$('#name').val("");
		    	$('#createdat').val("");
		    	setTimeout(function(){
		    		$('#topictable-loading').html('<img src="dist/img/loading1.gif">');
		    		doRenderTable('#topic');
		    		swal("Deleted!", "The topic has been deleted!", "success");
		    	},1000);	    	
		    });
		  } else {
			    swal("Cancelled", "Topic data is safe :)", "error");
		  }
		});
		
	});
}

var _EXAMTABLE_SELECTED_ID=0;
var _SUBJECTTABLE_SELECTED_ID=0;
var _QUESTIONTABLE_SELECTED_ID=0;
var _USERTABLE_SELECTED_ID=0;
var _NEWSTABLE_SELECTED_ID=0;
var _FEEDBACKTABLE_SELECTED_ID=0;
var _GUIDELINESTABLE_SELECTED_ID=0;
var _TOPICTABLE_SELECTED_ID=0;
var _EXAMTABLE_DATA=[];
var _SUBJECTTABLE_DATA=[];
var _QUESTIONTABLE_DATA=[];
var _USERTABLE_DATA=[];
var _NEWSTABLE_DATA=[];
var _FEEDBACKTABLE_DATA=[];
var _GUIDELINESTABLE_DATA=[];
var _TOPICTABLE_DATA=[];