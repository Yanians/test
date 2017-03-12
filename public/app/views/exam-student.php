<style>
	.take-exam-comp-main{
		text-align: center;
		height: 100%;
	}
	.align-right{
		text-align: left;
	}
	.dl-horizontal dt, .dl-horizontal dd{
		padding: 3px;
	}
</style>
<div class="row take-exam-tab"></div>
<script>
	class Exam{
		constructor(){
			this.state = [];
			// this.verifyExamInfo();
			this.main();
			this.initialize(); //jquery actions
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
			$('#exam-user-btnverify').click(function(){
				$('#exam-user-btnverify').html("Loading...");
				setTimeout(function(){
					exam.verifyUser();
				},1000);
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
			let html = `
				<div class="col-md-12">
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title"><i class="fa fa-clock-o"></i> 00:00:00</h3>
							<div class="box-tools pull-right">
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
			`;
			$('.take-exam-tab').html(html);
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

		//Utilities
		formatItem(val){if(val<10)return '000'+val; else if(val<100)return '00'+val; else if(val<1000)return '0'+val; else return val; }
	}
	let exam = new Exam();
</script>