<div class="text-center">
	<h5>This bar graph shows data statistics for total students and per subject information</h5>
</div>
<canvas id="myChart" width="400" height="200"></canvas>
<script src="app/views/settings/Chart.bundle.min.js"></script>
<script>

class AdminReport{
	constructor(){
		this.state = {
			"labels" : [],
			"datasets" : [],
			"exam_user_result" : []
		};
		/*
			sample exam_user_result data
			,	
				{
					"user_id" : 2,
					"subject" : [
						{
							"id" : 1,
							"result" : "passed"
						},
						{
							"id" : 2,
							"result" : "passed"
						},
						{
							"id" : 3,
							"result" : "passed"
						},
						{
							"id" : 4,
							"result" : "passed"
						},
						{
							"id" : 5,
							"result" : "passed"
						},
						{
							"id" : 6,
							"result" : "passed"
						},
					]
				},
				{
					"user_id" : 3,
					"subject" : [
						{
							"id" : 1,
							"result" : "passed"
						},
						{
							"id" : 2,
							"result" : "passed"
						},
						{
							"id" : 3,
							"result" : "passed"
						},
						{
							"id" : 4,
							"result" : "passed"
						},
						{
							"id" : 5,
							"result" : "passed"
						},
						{
							"id" : 6,
							"result" : "passed"
						},
					]
				},
				{
					"user_id" : 4,
					"subject" : [
						{
							"id" : 1,
							"result" : "failed"
						},
						{
							"id" : 2,
							"result" : "failed"
						},
						{
							"id" : 3,
							"result" : "failed"
						},
						{
							"id" : 4,
							"result" : "failed"
						},
						{
							"id" : 5,
							"result" : "failed"
						},
						{
							"id" : 6,
							"result" : "failed"
						},
					]
				}
		*/

		this.data = {
			"subject" : [],
			"user": [],
			"exam_user" : []
		};
		this.loadData(()=>{
			// console.log(this.data.subject);
			// console.log(this.data.user);
			// console.log(this.data.exam_user);
			this.main();
		});
	}
	loadData(callback){
		$.ajax({url: "app/models/subject.php"})
		.done(function(res){
			let data = JSON.parse(res);
			adminreport.data.subject = data;
			$.ajax({url: "app/models/user.php", method: "post", data:{action: "filterstudents"} })
			.done(function(res){
				let data = JSON.parse(res);
				adminreport.data.user = data;
				$.ajax({url: "app/models/exam-user.php"})
				.done(function(res){
					let data = JSON.parse(res);
					adminreport.data.exam_user = data;
					callback();
				});
			});
		});
	}
	main(){
		this.populateExamUserResult();
		this.setupBarGraph();	
	}
	populateExamUserResult(){
		for(let u=0;u<this.data.exam_user.length;u++){
			let userObject = {
				"user_id" : this.data.exam_user[u].user_id,
				"subject" : []
			};
			for(let s=0;s<this.data.subject.length;s++){				
				let result = "failed";
				//formula here
				let total_item = parseInt(this.data.subject[s].items);
				let correct = 0;
				let incorrect = 0;
				let data = JSON.parse(this.data.exam_user[u].data);
				for(let d=0;d<data.length;d++){
					if(data.subject_id==this.data.subject[s].id){
						if(data.selected == data.answer){
							correct++;
						}
						else{
							incorrect++;
						}
					}
				}				
				let average = (correct/total_item) * 100;
				let passingRate = this.data.subject[s].passingrate;
				if(average>=passingRate)result="passed";				
				let userSubjectObject = {
					"id" : this.data.subject[s].id,
					"result" : result
				};
				userObject.subject.push(userSubjectObject);
			}
			this.state.exam_user_result.push(userObject);
		}

	}

	setupBarGraph(){
		this.setupStateSubjectLabels();
		this.setupStateSubjectDatasets();

		//Actual Graph
		let ctx = $("#myChart")[0];
		let myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: this.state.labels,
		        datasets: this.state.datasets
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
	}

	setupStateSubjectLabels(){
		for(let s=1;s<=this.data.subject.length;s++){
			this.state.labels.push(`S${s}`);
		}
	}

	setupStateSubjectDatasets(){
		let passedData = [];
		let failedData = [];
		for(let s=0;s<this.data.subject.length;s++){
			let subject_id = this.data.subject[s].id;
			let totalPassed = 0;
			let totalFailed = 0;
			for(let r=0;r<this.state.exam_user_result.length;r++){
				for(let sid=0;sid<this.state.exam_user_result[r].subject.length;sid++){
					let result_subject_id = this.state.exam_user_result[r].subject[sid].id;
					let result_subject_result = this.state.exam_user_result[r].subject[sid].result;					
					if(subject_id == result_subject_id){
						if(result_subject_result == "passed")totalPassed++;
						else if(result_subject_result == "failed")totalFailed++;
						break;
					}					
				}
			}
			passedData.push(totalPassed);
			failedData.push(totalFailed);
		}

		this.state.datasets = [{
	            label: '# of Passed',
	            data: passedData,
	            backgroundColor: [
	                'rgba(63, 191, 127, 0.5)',
	                'rgba(63, 191, 127, 0.5)',
	                'rgba(63, 191, 127, 0.5)',
	                'rgba(63, 191, 127, 0.5)',
	                'rgba(63, 191, 127, 0.5)',
	                'rgba(63, 191, 127, 0.5)'
	            ],
	            borderColor: [
	                'rgba(63, 191, 127, 1)',
	                'rgba(63, 191, 127, 1)',
	                'rgba(63, 191, 127, 1)',
	                'rgba(63, 191, 127, 1)',
	                'rgba(63, 191, 127, 1)',
	                'rgba(63, 191, 127, 1)'
	            ],
	            borderWidth: 1
	        },
	        {
	            label: '# of Failed',
	            data: failedData,
	            backgroundColor: [
	                'rgba(191, 63, 95, 0.5)',
	                'rgba(191, 63, 95, 0.5)',
	                'rgba(191, 63, 95, 0.5)',
	                'rgba(191, 63, 95, 0.5)',
	                'rgba(191, 63, 95, 0.5)',
	                'rgba(191, 63, 95, 0.5)'
	            ],
	            borderColor: [
	                'rgba(191, 63, 95, 1)',
	                'rgba(191, 63, 95, 1)',
	                'rgba(191, 63, 95, 1)',
	                'rgba(191, 63, 95, 1)',
	                'rgba(191, 63, 95, 1)',
	                'rgba(191, 63, 95, 1)'
	            ],
	            borderWidth: 1
	        }];
	}
}
let adminreport = new AdminReport();

</script>