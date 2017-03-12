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
<div class="row take-exam-tab"></div>
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
			this.state = [];
			// this.verifyExamInfo();
			this.main();			
			this.initialize();
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
		}
		initialize(){
			$('#exam-user-password-notif').hide();
			$( "#exam-user-password" ).keypress(function (e) {var key = e.which; if(key == 13) {$('#exam-user-btnverify').click(); return false; } });
			$('#exam-user-btnverify').click(function(){
				$('#exam-user-btnverify').html("Loading...");
				setTimeout(function(){
					exam.verifyUser();
				},500);
			});
			let buttons = ``;
			for(let i=1;i<=200;i++){
				let btnvalue = this.formatItem(i);
				buttons += `
					<button type="button" id="exam-student-btn${btnvalue}" class="btn btn-default btn-flat btn-xs">${btnvalue}</button>										
				`;
			}			
			$('#exam-student-item-buttons').html(buttons);
			$('#exam-student-btn0001').addClass('active');
			// $('#exam-student-btn0001').removeClass('active');
			$('#exam-student-btnsubmitnow').click(function(){
				$('#exam-student-submitnow').modal('show');
			});
			$('#exam-student-yessubmitnow').click(function(){
				exam.submitNow("DONE ADVANCED");
			});

		}

		verifyUser(){
			let payload = {
				id:this.getUserID,
				email:this.getUserEmail,
				password: $('#exam-user-password').val()
			};
			$.ajax({
				url: "app/models/exam-student.php",
				method: "post",
	            data: {
	              action:"verifyuser",
	              payload: payload
	            }
			}).done(function(res){
				$('#exam-user-btnverify').html("Verify account and Take the exam!");
				let data = JSON.parse(res);
				// console.log(data);
				if(data.result=="ok"){
					if(data.data.length>0){
						// console.log("Verified");
						exam.main();
					}
					else{
						// console.log("Invalid Account");
						$('#exam-user-password-notif').show().delay(2000).fadeOut();
					}
				}
				else{
					// console.log("Query Error!");
					$('#exam-user-password-notif').html("Query Error. Please contact your database administrator!");
					$('#exam-user-password-notif').show().delay(2000).fadeOut();
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


                  <table class="table" id="quiz-table">
                    <tr>
                      <th style="width:150px">Choose Answer</th>
                      <th style="padding-left:30px">Question: <span id="quiz-question-sequence">001</span></th>
                    </tr>
                    <tr>
                      <td>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-3">
                              <label id="quiz_handle_a">
                                <div id="quiz_select1_a" style="position: absolute;margin-left: 6.5px;margin-top:1px;">A</div>
                                <div id="quiz_select2_a" class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="quiz_radio_a" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins id="quiz_select_a" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>                              
                            </div>
                            <div class="col-sm-3">
                              <label id="quiz_handle_b">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">B</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="quiz_radio_b" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 100;">
                                  <ins id="quiz_select_b" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                            <div class="col-sm-3">
                              <label id="quiz_handle_c">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">C</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="quiz_radio_c" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins id="quiz_select_c" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                            <div class="col-sm-3">
                              <label id="quiz_handle_d">
                                <div style="position: absolute;margin-left: 6.5px;margin-top:1px;">D</div>
                                <div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;">
                                  <input id="quiz_radio_d" type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;">
                                  <ins id="quiz_select_d" class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>
                              </label>   
                            </div>
                          </div>
                        </div>
                      </td>
                      <td style="padding-left:30px">
                        <div id="quiz-question">
                          The mailbox rule generally makes acceptance of an offer effective at the time the acceptance is dispatched. The mailbox rule does not apply if
                        </div>
                        <div>&nbsp;</div>
                        <table>
                          <tr>
                            <td valign="top">A.</td>
                            <td style="padding-left:5px" id="quiz-choice_a">Both the offeror and offeree are merchants.asdfasdfasdfasdf adsfa dfa sdfa sdf asdf asdf asdf asdf asdf asdf adsf asdf asdf adsf asdf asdf asdf asdf asdf asdf asdfasd f</td>
                          </tr>
                          <tr>
                            <td valign="top">B.</td>
                            <td style="padding-left:5px" id="quiz-choice_b">The offer proposes a sale of real estate.</td>
                          </tr>
                          <tr>
                            <td valign="top">C.</td>
                            <td style="padding-left:5px" id="quiz-choice_c">The offer provides that an acceptance shall not be effective until actually received.</td>
                          </tr>
                          <tr>
                            <td valign="top">D.</td>
                            <td style="padding-left:5px" id="quiz-choice_d">The duration of the offer is not in excess of 3 months.</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <span id="chosen_intromsg">Please choose a letter now</span>&nbsp;
                        <span id="chosen_letter"></span>.&nbsp;&nbsp;
                        <span id="chosen_details"></span>                        
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
				hours : 0,
				minutes :0,
				seconds: 5,
				timeUp : function(){
					exam.submitNow("DONE TIMESUP");
					$('#exam-student-submitnow').modal('hide');
					$('#exam-student-timesup').modal({backdrop: 'static', keyboard: false}); $('#exam-student-timesup').modal('show'); }
			});
			$('#exam-student-reload').click(function(){setTimeout(function(){exam.verifyExamInfo(); exam.initialize(); },1000); });


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
				status:status
			};
			$.ajax({
				url: "app/models/exam-student.php",
				method: "post",
	            data: {
	              action:"submit",
	              payload: payload
	            }
			}).done(function(res){				
				// console.log(data);
				if(res){
					try{
						let data = JSON.parse(res);
						if(data.result=="ok" && status=="DONE ADVANCED"){
							$('#exam-student-modal-yessubmitnow').modal({backdrop: 'static', keyboard: false});
							$('#exam-student-modal-yessubmitnow').modal('show');
							$("#exam-student-modal-yessubmitnow").on("hidden.bs.modal", function () {
							  setTimeout(function(){exam.verifyExamInfo(); exam.initialize(); },1000); 
							});
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

		//Utilities
		formatItem(val){if(val<10)return '000'+val; else if(val<100)return '00'+val; else if(val<1000)return '0'+val; else return val; }
	}
	let exam = new Exam();
</script>