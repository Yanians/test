<!DOCTYPE html>
<html>
<head>
	<?php include_once 'layout/header.php'; ?>
	<style>
		.take-exam-comp-main{
			text-align: center;
			height: 100%;
		}
		.align-right{
			text-align: left;
		}
		.align-center{
			text-align: center;
		}
		.dl-horizontal dt, .dl-horizontal dd{
			padding: 3px;
		}
		.modal {
		  text-align: center;
		  padding: 0!important;
		}

		.modal:before {
		  content: '';
		  display: inline-block;
		  height: 100%;
		  vertical-align: middle;
		  margin-right: -4px;
		}

		.modal-dialog {
		  display: inline-block;
		  text-align: left;
		  vertical-align: middle;
		}	
	</style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
	<div class="wrapper">
		<!-- Nav -->
		<?php include_once 'layout/nav.php'; echo '<script>showNav(["dashboard","logout"]);</script>';?>		
		
		<div class="content-wrapper">
			<br/>
			<h1 class="align-center">Student Retake Page</h1>
			<div class="row take-exam-tab"></div>
		</div>

		
		<!-- Modals -->
		<?php include_once 'layout/modals.php'; ?>
	</div>
<!-- Scripts and Footer -->
<?php include_once 'layout/footer.php'; ?>


<script>
	class Exam{
		/*
			NOTE: The following are the status on exam_user table
				DEFAULT 	- Student has been allowed to take the exam but did not take it yet
				ONGOING		- Student has already clicked the take exam start button
				INTERRUPTED	- Student exprienced an internet failure or accidentally refresh the page.
							  This status need to follow recovery protocol:
							  	1. Request permission to admin to take another exam.
							  	2. Attach reason.
							  	3. Wait for admin approval.
							  	4. Once approved, student may take again the exam.
				DONE TIMESUP  - Student has been finished taking the exam with no time remaining left.
				DONE ADVANCED - Student has been finished taking the exam with an extra time remaining left.
		*/
		constructor(){
			this.state = {
				questionID: 0,
				subjectID: 0,
				itemNumber: '0001',
				hours : 0,
				minutes :1,
				seconds: 0,
				retake_exam_data: []
			};
			this.data = {
				"user" : [],
				"subject" : [],
			};
			this.questions = [];			
			// this.verifyExamInfo();
			this.loadData(()=>{
				// console.log(this.data.user);
				// console.log(this.data.quizlog);
				// console.log(this.data.exam_user);
				// console.log(this.data.subject);
				// console.log(this.data.topic);
				this.verifyExamInfo();
				this.verifyExamInfoInitialize();
				// this.main();
			});


			// this.loadQuestions(()=>{				
			// 	// this.questions['questions'][0].selected = "A";
			// 	this.main();			
			// });
		}

		loadData(callback){
			$.ajax({url: "app/models/subject.php"})
			.done(function(res){
				let data = JSON.parse(res);
				exam.data.subject = data;					
				$.ajax({url: "app/models/user.php"})
				.done(function(res){
					let data = JSON.parse(res);
					exam.data.user = data;										
					callback();							
				});						
			});
		}

		verifyExamInfoInitialize(){
			$('#exam-user-password-notif').hide();
			$( "#exam-user-password" ).keypress(function (e) {var key = e.which; if(key == 13) {$('#exam-user-btnverify').click(); return false; } });
			$('#exam-user-btnverify').click(function(){
				$('#exam-user-btnverify').html("Loading...");
				setTimeout(function(){
					exam.verifyUser();
				},500);
			});
		}
		loadQuestions(callback){			
			$.ajax({
				url: "app/models/exam-questions-retake.php",
				method: "post",
	            data: {
	            	action:"loadquestions",
	            	user_id:this.getUserID(),
	            	subject_id:this.getSubjectID()
	            }
			})
			.done((result)=>{
				result = JSON.parse(result);
				exam.questions = result;				
				callback();
			});
		}
		verifyExamInfo(){
			let html = `
				<div class="col-md-6 col-md-offset-3 take-exam-comp-main">
					<div class="box box-solid">
						<div class="box-header with-border">
							<i class="fa fa-pencil-square-o"></i>
							<h3 class="box-title">Examinee Information</h3>
						</div>
						<div class="box-body">
							<dl class="dl-horizontal align-right">
								<dt>User Email</dt>
									<dd id="exam-user-email">${this.getUserEmail()}</dd>
								<dt>User ID</dt>
									<dd id="exam-user-id">${this.getUserID()}</dd>	
								<dt>Choose Subject</dt>
									<dd>
										<div class="form-group">
					                      <select class="form-control select2 chooseSubject" style="width: 100%;">
					                        <option selected="selected">Loading Subjects...</option>
					                      </select>
					                    </div>
									</dd>
								<dt>Password</dt>
									<dd>
										<input class="form-control" id="exam-user-password" type="password" placeholder="Password"/>
									</dd>
									<dd id="exam-user-password-notif" style="color:maroon">
										Invalid account. Try Again!
									</dd>
							</dl>
							<button id="exam-user-btnverify" class="btn btn-block bg-maroon">Verify account and Take the exam!</button>
						</div>
					</div>
				</div>     
			`;
			$('.take-exam-tab').html(html);

			let retakeExamData = localStorage.getItem('retakeexamdata');
			this.retake_exam_data = JSON.parse(retakeExamData);
			let choosehtml = `<option>--=== Select ===--</option>`;
			this.retake_exam_data.map((data)=>{
				if(data.score.data<65){
					choosehtml += `<option value='${data.subject_id}'>${data.subject}</option>`;
				}
			});
			$('.chooseSubject').html(choosehtml);
			$('.chooseSubject').change(function(){
          		// console.log($('.chooseSubject').val()); 
          		exam.state.subjectID = $('.chooseSubject').val();
          		for(let i=0;i<exam.data.subject.length;i++){
          			if(exam.data.subject[i].id==exam.state.subjectID){
          				exam.state.minutes = parseInt(exam.data.subject[i].timeduration);
          				console.log(exam.state.minutes);
          			}
          		}
        	});
			console.log(JSON.parse(retakeExamData));
		}
		initialize(){
			let buttons = ``;
			for(let i=1;i<=this.questions['questions'].length;i++){
				let btnvalue = this.formatItem(i);
				buttons += `
					<button onclick="exam.showQuestion(${i-1},'${btnvalue}'	)" type="button" id="exam-student-btn${btnvalue}" class="btn btn-default btn-flat btn-xs">${btnvalue}</button>										
				`;
			}						
	        
	        $("#exam-student-icheckA").on("ifChanged", function(){
	          	if($('#exam-student-icheckA').iCheck('update')[0].checked){
	          		exam.saveExamAnswer("A");
	      		}
	        });
	        $("#exam-student-icheckB").on("ifChanged", function(){
	          	if($('#exam-student-icheckB').iCheck('update')[0].checked){
	          		exam.saveExamAnswer("B");
	      		}
	        });
	        $("#exam-student-icheckC").on("ifChanged", function(){
	          	if($('#exam-student-icheckC').iCheck('update')[0].checked){
	          		exam.saveExamAnswer("C");
	      		}
	        });
	        $("#exam-student-icheckD").on("ifChanged", function(){
	          	if($('#exam-student-icheckD').iCheck('update')[0].checked){
	          		exam.saveExamAnswer("D");
	      		}
	        });
	        

			$('#exam-student-item-buttons').html(buttons);			
			// $('#exam-student-btn0001').removeClass('active');
			$('#exam-student-btnsubmitnow').click(function(){
				$('#exam-student-submitnow').modal('show');
			});
			$('#exam-student-yessubmitnow').click(function(){
				exam.submitNow("DONE ADVANCED");
			});

			this.showQuestion(0,"0001");
		}

		showQuestion(questionID,itemNumber){			
			this.state.questionID = questionID;
			this.state.itemNumber = itemNumber;
			$('#exam-question-sequence').html(itemNumber);
			$('#exam-question').html(this.questions['questions'][questionID].question);
			$('#exam-choice_a').html(this.questions['questions'][questionID].choice_a);
			$('#exam-choice_b').html(this.questions['questions'][questionID].choice_b);
			$('#exam-choice_c').html(this.questions['questions'][questionID].choice_c);
			$('#exam-choice_d').html(this.questions['questions'][questionID].choice_d);			
			this.resetExamCheckbox();
			this.updateExamButtons();
		}

		saveExamAnswer(answer){
			this.questions['questions'][this.state.questionID].selected = answer;
			this.updateExamButtons();
		}
		updateExamButtons(){			
			for(let i=1;i<=this.questions['questions'].length;i++){
				if(this.questions['questions'][i-1].selected!="X"){
					let btnExam = '#exam-student-btn' + this.formatItem(i);
					$(btnExam).addClass('bg-green');
				}
			}
			let answer = this.questions['questions'][this.state.questionID].selected;				
			this.examSelectAnswer(answer);					
		}
		examSelectAnswer(answer){
			if(answer=="A"){
				$('#exam-student-icheckA').iCheck('check');
				$('#exam-student-icheckB').attr('disabled','disabled');
				$('#exam-student-icheckC').attr('disabled','disabled');
				$('#exam-student-icheckD').attr('disabled','disabled');
				$('#exam-chosen_intromsg').html("You choose ");
				$('#exam-chosen_letter').html("A");
				$('#exam-chosen_details').html($('#exam-choice_a').html());				
			}
			else if(answer=="B"){
				$('#exam-student-icheckB').iCheck('check');
				$('#exam-student-icheckA').attr('disabled','disabled');
				$('#exam-student-icheckC').attr('disabled','disabled');
				$('#exam-student-icheckD').attr('disabled','disabled');
				$('#exam-chosen_intromsg').html("You choose ");
				$('#exam-chosen_letter').html("B");
				$('#exam-chosen_details').html($('#exam-choice_a').html());
			}
			else if(answer=="C"){
				$('#exam-student-icheckC').iCheck('check');
				$('#exam-student-icheckA').attr('disabled','disabled');
				$('#exam-student-icheckB').attr('disabled','disabled');
				$('#exam-student-icheckD').attr('disabled','disabled');
				$('#exam-chosen_intromsg').html("You choose ");
				$('#exam-chosen_letter').html("C");
				$('#exam-chosen_details').html($('#exam-choice_c').html());
			}
			else if(answer=="D"){
				$('#exam-student-icheckD').iCheck('check');
				$('#exam-student-icheckA').attr('disabled','disabled');
				$('#exam-student-icheckB').attr('disabled','disabled');
				$('#exam-student-icheckC').attr('disabled','disabled');
				$('#exam-chosen_intromsg').html("You choose ");
				$('#exam-chosen_letter').html("D");
				$('#exam-chosen_details').html($('#exam-choice_d').html());
			}
			else{							
				// this.resetExamCheckbox();
				// $('#exam-student-icheckA').iCheck('uncheck');
				// $('#exam-student-icheckA').iCheck('uncheck');
				// $('#exam-student-icheckA').iCheck('uncheck');
				// $('#exam-student-icheckA').iCheck('uncheck');
				// $('#exam-chosen_intromsg').html("Please choose a letter now");
				// $('#exam-chosen_letter').html('');
				// $('#exam-chosen_details').html('');			
			}			
		}

		verifyUser(){
			let payload = {
				id:this.getUserID,
				email:this.getUserEmail,
				subject_id:this.getSubjectID,
				password: $('#exam-user-password').val()
			};
			$.ajax({
				url: "app/models/exam-student-retake.php",
				method: "post",
	            data: {
	              action:"verifyuser",
	              payload: payload
	            }
			}).done(function(res){
				$('#exam-user-btnverify').html("Verify account and Take the exam!");
				let data = JSON.parse(res);
				// console.log(data);
				// console.log(res);
				if(data.result=="ok"){
					if(data.data.length>0){
						// console.log("Verified");
						// exam.main();						
						exam.loadQuestions(()=>{						
							exam.main();			
						});
					}
					else{
						// console.log("Invalid Account");
						$('#exam-user-password-notif').show().delay(2000).fadeOut();
					}
				}
				else{
					if(data.type=="sqlerror"){
						// console.log("Query Error!");
						$('#exam-user-password-notif').html("Query Error. Please contact your database administrator!");
						$('#exam-user-password-notif').show().delay(2000).fadeOut();
					}
					else if(data.type=="systemerror"){
						$('#exam-user-password-notif').html(data.message);
						$('#exam-user-password-notif').show().delay(2000).fadeOut();
					}
				}			
			});
		}

		main(){			
			this.mainLayout();
			this.initialize(); //jquery actions
		}

		mainLayout(){
			let html = `
				<div class="col-md-12">
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title"><i class="fa fa-clock-o"></i> <span id="exam-student-timer">00:00:00</span></h3>
							<div class="box-tools pull-right">
								<button id="exam-student-btnsubmitnow" type="button" class="btn btn-danger btn-flat">Submit Now</button>
								<!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
							</div>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									<div class="btn-group" id="exam-student-item-buttons">
										<!-- >>>>>>>>>>>>>>> POPULATED BUTTONS HERE.. -->		
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">


                  <table class="table" id="exam-table">
                    <tr>
                      <th style="width:150px">Choose Answer</th>
                      <th style="padding-left:30px">Question: <span id="exam-question-sequence">0001</span></th>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group">
                          <div class="row">
                          	<div class="col-sm-3">
                          		<div id="" class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="margin:2px;position:relative;">
									<span style="position:absolute;top:1px;left:7px;font-weight:bold;">A</span>
                          			<input id="exam-student-icheckA" type="radio" class="flat-red">
                          			<ins id="" class="iCheck-helper"></ins>
                          		</div>
                          	</div>
                          	<div class="col-sm-3">
                          		<div id="" class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="margin:2px;position:relative;">
									<span style="position:absolute;top:1px;left:7px;font-weight:bold;">B</span>
                          			<input id="exam-student-icheckB" type="radio" class="flat-red">
                          			<ins id="" class="iCheck-helper"></ins>
                          		</div>
                          	</div>
                          	<div class="col-sm-3">
                          		<div id="" class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="margin:2px;position:relative;">
									<span style="position:absolute;top:1px;left:7px;font-weight:bold;">C</span>
                          			<input id="exam-student-icheckC" type="radio" class="flat-red">
                          			<ins id="" class="iCheck-helper"></ins>
                          		</div>
                          	</div>
                          	<div class="col-sm-3">
                          		<div id="" class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="margin:2px;position:relative;">
									<span style="position:absolute;top:1px;left:7px;font-weight:bold;">D</span>
                          			<input id="exam-student-icheckD" type="radio" class="flat-red">
                          			<ins id="" class="iCheck-helper"></ins>
                          		</div>
                          	</div>
                          </div>
                          
                        </div>
                      </td>
                      <td style="padding-left:30px">
                        <div id="exam-question"></div>
                        <div>&nbsp;</div>
                        <table>
                          <tr>
                            <td valign="top">A.</td>
                            <td style="padding-left:5px" id="exam-choice_a">Both the offeror and offeree are merchants.asdfasdfasdfasdf adsfa dfa sdfa sdf asdf asdf asdf asdf asdf asdf adsf asdf asdf adsf asdf asdf asdf asdf asdf asdf asdfasd f</td>
                          </tr>
                          <tr>
                            <td valign="top">B.</td>
                            <td style="padding-left:5px" id="exam-choice_b">The offer proposes a sale of real estate.</td>
                          </tr>
                          <tr>
                            <td valign="top">C.</td>
                            <td style="padding-left:5px" id="exam-choice_c">The offer provides that an acceptance shall not be effective until actually received.</td>
                          </tr>
                          <tr>
                            <td valign="top">D.</td>
                            <td style="padding-left:5px" id="exam-choice_d">The duration of the offer is not in excess of 3 months.</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <span id="exam-chosen_intromsg">Please choose a letter now</span>&nbsp;
                        <span id="exam-chosen_letter"></span>.&nbsp;&nbsp;
                        <span id="exam-chosen_details"></span>                        
                      </td>
                    </tr>
                  </table>

								</div>
							</div>						
						</div>						
					</div>      
				</div>

				${this.modals()}
			`;
			$('.take-exam-tab').html(html);
			$('input[type=radio]').iCheck({
			  checkboxClass: 'icheckbox_square-green',
			  radioClass: 'iradio_square-green',
			  increaseArea: '20%' // optional
			});
			$('#exam-student-timer').countdowntimer({
				hours : exam.state.hours,
				minutes :exam.state.minutes,
				seconds: exam.state.seconds,
				timeUp : function(){
					exam.submitNow("DONE TIMESUP");
					$('#exam-student-submitnow').modal('hide');
					$('#exam-student-timesup').modal({backdrop: 'static', keyboard: false}); $('#exam-student-timesup').modal('show'); }
			});
			// $('#exam-student-reload').click(function(){setTimeout(function(){exam.verifyExamInfo(); exam.initialize(); },1000); });


		}

		modals(){
			return `
				<div class="modal fade" tabindex="-1" role="dialog" id="exam-student-submitnow">
					<div class="modal-dialog" role="document">
						<div class="modal-content">							
							<div class="modal-body align-center">
								<div> <i class="fa fa-question-circle fa-5x"></i> </div>
								<h4>Are you sure you want to submit this exam?</h4>
								<h6>You have more time left and you might want to review your answers first.</h6>
							</div>
							<div class="modal-footer align-center">								
								<a href="#" class="btn btn-default" data-dismiss="modal">No, not yet!</a>
								<a href="#" id="exam-student-yessubmitnow" class="btn btn-primary" data-dismiss="modal">Yes, I am sure!</a>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" tabindex="-1" role="dialog" id="exam-student-timesup">
					<div class="modal-dialog" role="document">
						<div class="modal-content">							
							<div class="modal-body align-center">
								<div> <i class="fa fa-clock-o fa-5x"></i> </div>
								<h4>Time is up!</h4>
								<h6>Your answers has been successfully submitted.</h6>
							</div>
							<div class="modal-footer align-center">								
								<a href="#" id="exam-student-reload" class="btn btn-primary" data-dismiss="modal">Back to Home</a>
							</div>
						</div>
					</div>
				</div>
				<div class="modal fade" tabindex="-1" role="dialog" id="exam-student-modal-yessubmitnow">
					<div class="modal-dialog" role="document">
						<div class="modal-content">							
							<div class="modal-body align-center">
								<div> <i class="fa fa-thumbs-o-up fa-5x"></i> </div>
								<h4>Done!</h4>
								<h6>All exam logs have been successfully saved.</h6>
							</div>
							<div class="modal-footer align-center">								
								<a href="#" id="exam-student-reload" class="btn btn-primary" data-dismiss="modal">Back to Home</a>
							</div>
						</div>
					</div>
				</div>
				<div class="modal modal-danger fade" tabindex="-1" role="dialog" id="exam-student-servererror">
					<div class="modal-dialog" role="document">
						<div class="modal-content">							
							<div class="modal-body align-center">
								<div> <i class="fa fa-cloud-upload fa-5x"></i> </div>
								<h4>Slow internet connection detected!</h4>
								<h6>Kindly provide a stable internet connection in order to get full service.</h6>
							</div>
							<div class="modal-footer align-center">								
								<a href="#" id="exam-student-reload" class="btn btn-warning" data-dismiss="modal">Check Connection Again</a>
							</div>
						</div>
					</div>
				</div>
			`;
		}

		submitNow(status){
			let payload = {
				id:this.getExamUserID,
				status:status,
				data:JSON.stringify(this.questions['questions'])
			};
			$.ajax({
				url: "app/models/exam-student.php",
				method: "post",
	            data: {
	              action:"submit",
	              payload: payload
	            }
			}).done(function(res){				
				// console.log(res);
				if(res){
					try{
						let data = JSON.parse(res);
						if(data.result=="ok" && status=="DONE ADVANCED"){
							$('#exam-student-modal-yessubmitnow').modal({backdrop: 'static', keyboard: false});
							$('#exam-student-modal-yessubmitnow').modal('show');
							$("#exam-student-modal-yessubmitnow").on("hidden.bs.modal", function () {
							  setTimeout(function(){exam.verifyExamInfo(); exam.verifyExamInfoInitialize(); },1000); 
							});
						}
						else if(data.result=="ok" && status=="DONE TIMESUP"){
							$('#exam-student-reload').click(function(){setTimeout(function(){exam.verifyExamInfo(); exam.verifyExamInfoInitialize(); },1000); });
						}
						else if(data.result=="not ok"){
							$('#exam-student-servererror').modal('show');
						}
					}
					catch(e){
						$('#exam-student-servererror').modal('show');
					}
				}
			});
		}

		//Getter and Setter
		getUserEmail(){
			//this must be updated. Make sure to use >> this.state << user data
			return "student@gmail.com";
		}
		getUserID(){
			//this must be updated. Make sure to use >> this.state << user data
			return 2;
		}
		getExamUserID(){
			//this must be updated. Make sure to use >> this.state << user data
			//refer exam_user table
			return 1;
		}
		getSubjectID(){
			return exam.state.subjectID;
		}

		//Utilities
		resetExamCheckbox(){$('#exam-student-icheckA').prop('disabled',false);$('#exam-student-icheckA').iCheck('uncheck'); $('#exam-student-icheckB').prop('disabled',false);$('#exam-student-icheckB').iCheck('uncheck'); $('#exam-student-icheckC').prop('disabled',false);$('#exam-student-icheckC').iCheck('uncheck'); $('#exam-student-icheckD').prop('disabled',false);$('#exam-student-icheckD').iCheck('uncheck'); $('#exam-chosen_intromsg').html("Please choose a letter now"); $('#exam-chosen_letter').html(""); $('#exam-chosen_details').html(""); }
		formatItem(val){if(val<10)return '000'+val; else if(val<100)return '00'+val; else if(val<1000)return '0'+val; else return val; }
	}
	let exam = new Exam();
</script>

</body>
</html>
