<div class="row">
	<div class="col-sm-8">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">List of Users</h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>LASTNAME</th>
									<th>FIRSTNAME</th>
								</tr>
							</thead>
							<tbody id="report-usertable"></tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<div class="btn-group pull-right">
					<ul class="pagination pagination-sm no-margin pull-right">
						<li><a href="#">&laquo;</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">&raquo;</a></li>
					</ul>
					<!-- <button type="submit" class="btn bg-maroon btn-flat margin startquiz">Create Question</button>   -->             
					<!-- <button type="submit" class="btn bg-purple btn-flat margin chooseagain">Choose Again</button> -->
				</div>
			</div>
		</div>  
	</div>
	<div class="col-sm-4">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Details</h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div id="report-userdetail">
							
							<table class="table">
								<tr>
									<td align="right" style="color:#d2d6de">USER ID</td>
									<td id="report-default-id">2</td>
								</tr>
								<tr>
									<td align="right" style="color:#d2d6de">NAME</td>
									<td id="report-default-name">STUDENT, STUDENT</td>
								</tr>
							</table>
							<div id="report-subject-controls"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<span id="reportchart"></span>				
				<div class="btn-group pull-right">
					<span>Total Subjects: <span id="report-total-subject">0</span></span>
				</div>
			</div>
		</div>  
	</div>

</div>
<script>
	class Report{
		constructor(){
			this.state = {
				"selectedUserID":2,
				"selectedUserNAME":""
			};
			this.data = {
				"user" : [],
				"quizlog" : [],
				"exam_user" : [],
				"subject" : [],
				"topic" : []
			};
			this.loadData(()=>{
				// console.log(this.data.user);
				// console.log(this.data.quizlog);
				// console.log(this.data.exam_user);
				// console.log(this.data.subject);
				// console.log(this.data.topic);
				this.main();
			});
		}
		loadData(callback){
			$.ajax({url: "app/models/user.php"})
			.done(function(res){
				let data = JSON.parse(res);
				report.data.user = data;
				$.ajax({url: "app/models/quizlog.php"})
				.done(function(res){
					let data = JSON.parse(res);
					report.data.quizlog = data;
					$.ajax({url: "app/models/exam-user.php"})
					.done(function(res){
						let data = JSON.parse(res);
						report.data.exam_user = data;
						$.ajax({url: "app/models/subject.php"})
						.done(function(res){
							let data = JSON.parse(res);
							report.data.subject = data;
							$.ajax({url: "app/models/report-topic.php"})
							.done(function(res){								
								let data = JSON.parse(res);
								report.data.topic = data;							
								callback();
							});
						});
					});
				});
			});
		}
		main(){
			this.populateUserTable();
			this.initializePieChart();
			this.reportSubjectControls();
		}
		reportSubjectControls(){
			let html = `
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Subjects</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody id="report-subject-controls-tbody">					
					</tbody>				
				</table>
				<div>
					<button class="btn btn-danger btn-fill btn-block">Save</button>
				</div>
			`;
			$('#report-subject-controls').html(html);
			this.reportSubjectControlsBody();
		}
		reportSubjectControlsBody(){
			// console.log(this.data.subject);
			let html = ``;
			this.data.subject.map((subject)=>{
				html += `
					<tr>
						<td>${subject.name}</td>
						<td>
							<select>
								<option>NO ACCESS</option>
								<option>DEFAULT</option>
								<option>ONGOING</option>
								<option>INTERRUPTED</option>
								<option>DONE TIMESUP</option>
								<option>DONE ADVANCED</option>
							</select>
						</td>
					</tr>
				`;
			});			
			$('#report-subject-controls-tbody').html(html);
		}
		populateUserTable(){
			let html = ``;
			this.data.user.map((user)=>{
				if(user.isadmin==0){
					if(user.id==this.state.selectedUserID){
						this.state.selectedUserNAME = user.lastname.toUpperCase() + ", " + user.firstname.toUpperCase();
					}
					let user_str = JSON.stringify(user);
					html += `
						<tr onclick='report.showDetail(${user_str})'>
							<td>${user.id}</td>
							<td>${user.firstname}</td>
							<td>${user.lastname}</td>									
						</tr>
					`;
				}
			});
			$('#report-usertable').html(html);
		}
		showDetail(user){	
			this.state.selectedUserID = user.id;
			let html = `
				<table class="table">
					<tr>
						<td align="right" style="color:#d2d6de">USER ID</td>
						<td>${user.id}</td>
					</tr>
					<tr>
						<td align="right" style="color:#d2d6de">NAME</td>
						<td>${user.lastname.toUpperCase()}, ${user.firstname.toUpperCase()}</td>
					</tr>
				</table>
			`;
			$('#report-userdetail').html(html);
			this.showGraphLink();
		}
		initializePieChart(){
			this.showGraphLink();
			$('#report-total-subject').html(this.data.subject.length);
			$('#report-default-id').html(this.state.selectedUserID);
			$('#report-default-name').html(this.state.selectedUserNAME);
		}
		showGraphLink(){
			// console.log(this.data.exam_user.length);
			let isExamTaken = false;
			for(let i=0;i<this.data.exam_user.length;i++){
				// console.log(`${this.data.exam_user[i].user_id} == ${this.state.selectedUserID}`);
				if(this.data.exam_user[i].user_id == this.state.selectedUserID){
					let html = `
						<a href="app/views/settings/report/chart/?token=${maketoken(20)}-${this.state.selectedUserID}-${maketoken(10)}"><span>
							<i class="fa fa-pie-chart"></i> 
							See Graph</span>
						</a>
					`;
					$('#reportchart').html(html);
					isExamTaken = true;					
					function maketoken(length) {var text = ""; var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"; for( var i=0; i < length; i++ ) text += possible.charAt(Math.floor(Math.random() * possible.length)); return text; }
					break;
				}
			}
			if(!isExamTaken){
				let ctx = `
					<span class="text-red">
						<i class="fa fa-exclamation-circle"></i> 
						Have not taken the exam</span>
					</span>
				`;
				$('#reportchart').html(ctx);				
			}

		}
	}
	let report = new Report();
</script>