<div class="row">
	<div class="col-sm-12">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Create New Question - Single Entry</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Choose Subject</label>
							<select class="form-control select2 chooseSubject" style="width: 100%;">
								<option selected="selected">Loading Subjects...</option>
							</select>
						</div>
						<div class="form-group">
							<label>Choose Topic</label>
							<select class="form-control select2 chooseSubject" style="width: 100%;">
								<option selected="selected">Loading Topics...</option>
							</select>
						</div>
						<hr>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label>Subject ID</label>
									<input type="text" class="form-control"  disabled="" value="0"/>
								</div>
								<div class="col-sm-6">
									<label>Topic ID</label>
									<input type="text" class="form-control"  disabled="" value="0"/>									
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<label>Question</label>
									<textarea class="form-control" placeholder="Write your question here"></textarea>
								</div>
								<div class="col-sm-12">
									<label>Choice A</label>
									<input type="text" class="form-control"  placeholder="Write answer here"/>									
								</div>
								<div class="col-sm-12">
									<label>Choice B</label>
									<input type="text" class="form-control"  placeholder="Write answer here"/>									
								</div>
								<div class="col-sm-12">
									<label>Choice C</label>
									<input type="text" class="form-control"  placeholder="Write answer here"/>									
								</div>
								<div class="col-sm-12">
									<label>Choice D</label>
									<input type="text" class="form-control"  placeholder="Write answer here"/>									
								</div>
								<div class="col-sm-12">
									<div>&nbsp;</div>
									<label>Set the correct answer</label>
									<select class="form-control select2 chooseSubject" style="width: 100%;">
										<option selected="selected">A</option>
										<option>B</option>
										<option>C</option>
										<option>D</option>
									</select>
								</div>
								<div>&nbsp;</div>
								<div class="col-sm-12">
									<label class="input-sm">Reference (Optional)</label>
									<input type="text" style="margin-left:10px;" class="form-control input-sm"  placeholder="Reference"/>									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<div class="btn-group pull-right">
					<button type="submit" class="btn bg-maroon btn-flat margin startquiz">Create Question</button>               
					<!-- <button type="submit" class="btn bg-purple btn-flat margin chooseagain">Choose Again</button> -->
				</div>
			</div>
		</div>  
	</div>
	<div class="col-sm-12">
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Upload Questions - Multiple Entry</h3>
				<div class="box-tools pull-right">
					<!-- <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button> -->
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">


					<input type="file" class="form-control" id="import">
				
				<label for="count" id="count">0</label>&nbsp;<label for="count" id="saved">0</label>
				<!-- <button class="btn btn-lg btn-success" id="btnImport" disabled="disable">Import</button> -->
				<table class="table table-condense table-responsive" id="excelData">
					<thead>
						<tr>
							<th>No.</th>
							<th>SID</th>
							<th>TID</th>
							<th>Question</th>
							<th>Answer</th>
							<th>Choice A</th>
							<th>Choice B</th>
							<th>Choice C</th>
							<th>Choice D</th>
							<!-- <th>Reference</th> -->
							<th>Status</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>
				<button type="button" class="btn btn-success" id="questionbtnmodalimport" disabled="disable">Import</button>


<!-- 							<form id="formUploadQuestions">
								<label class="form-label span3" for="file">File</label>
								<input type="file" name="file" id="file" required />
								<br><br>
								<button type="submit" id="btnUploadQuestions" class="btn bg-maroon btn-flat margin startquiz">Upload Questions Now</button>
							</form>		 -->				
<!-- 						
							<label for="exampleInputFile">File input</label>
							<input type="file" id="exampleInputFile">
							<p class="help-block">Upload excel files. See sample template <a href="">here</a>.</p>
 -->

						</div>
					</div>
				</div>
			</div>
			<!-- <div class="box-footer">
				<div class="btn-group pull-right">
					<button type="submit" class="btn bg-maroon btn-flat margin startquiz">Upload Questions Now</button>
					<button type="submit" class="btn bg-purple btn-flat margin chooseagain">Clear Fields</button>
				</div>
			</div> -->
		</div>  
	</div>
</div>

<script src="app/views/settings/xlsx.full.min.js"></script>
<script>
	class Settings{
		constructor(){
			this.data = {
				"subject" : [],
				"topic" : []
			};
			this.loadData(()=>{
				// console.log(this.data.subject);
				// console.log(this.data.topic);
				this.main();
			});
		}
		loadData(callback){
			$.ajax({url: "app/models/subject.php"})
			.done(function(res){
				let data = JSON.parse(res);
				settings.data.subject = data;
				$.ajax({url: "app/models/report-topic.php"})
				.done(function(res){								
					let data = JSON.parse(res);
					settings.data.topic = data;
					callback();
				});
			});
		}

		main(){
			// this.initialize();
			this.sampleUpload();
		}
		initialize(){
			$('input[type=file]').on('change', (event)=>{
					settings.files = event.target.files;
			});
			$('#formUploadQuestions').submit((event)=>{
				console.log("submitted");
				event.preventDefault();
				let formData = new FormData();
				$.each(this.files,(key,value)=>{
					formData.append(key, value);
				});
				console.log(formData);			
				return false;
			});
		}

		sampleUpload(){
			// $elm = $('#import');
			$('#import').on('change', function (changeEvent) {
		        var reader = new FileReader();
		        
		        reader.onload = function (evt) {
					var data = evt.target.result;
					var workbook = XLSX.read(data, {type: 'binary'});
					var headerNames = XLSX.utils.sheet_to_json( workbook.Sheets[workbook.SheetNames[0]], { header: 1 })[0];
					var data = XLSX.utils.sheet_to_json( workbook.Sheets[workbook.SheetNames[0]]);
					// console.log('RAW______'+XLSX.utils.sheet_to_json(workbook.Sheets[workbook.SheetNames]));
					// console.log('head____'+headerNames);
					// console.log(data);
					// dt = JSON.parse(data);
					
					data.map(function(xlobject){
						// console.log(rowCount);
						var html = "";
						html+=  "<tr><td>"+xlobject.__rowNum__+"</td>";
						html+=  "<td>"+settings.getSubjectID(xlobject.subject)+"</td>";
						html+=  "<td>"+settings.getTopicID(xlobject.topic)+"</td>";
						html+=  "<td>"+xlobject.question+"</td>";
						html+=  "<td>"+xlobject.answer+"</td>";
						html+=  "<td>"+xlobject.choice_a+"</td>";
						html+=  "<td>"+xlobject.choice_b+"</td>";
						html+=  "<td>"+xlobject.choice_c+"</td>";
						html+=  "<td>"+xlobject.choice_d+"</td>";
						// html+=  "<td>"+xlobject.reference+"</td>";
						html+=  '<td><span class="label label-danger">Not Saved</span></td><tr>';
						$('#excelData tbody').append(html);
						$('#count').text('Rows: '+xlobject.__rowNum__);
						if ($('#questionbtnmodalimport').on('click', function(e){
							e.preventDefault();
							if (saveData(xlobject.question,xlobject.answer,xlobject.choice_a,xlobject.choice_b,xlobject.choice_c,xlobject.choice_d,xlobject.reference)) {
								alert('Saved....');
							}
							
						}));
					});
					setTimeout(changeTableStatus('<span class="label label-warning">Already Saved</span>'),10000);
					$('#questionbtnmodalimport').removeAttr('disabled', 'disable');
		        };
		        
		        reader.readAsBinaryString(changeEvent.target.files[0]);
		  });
			function saveData(question,answer,choice_a,choice_b,choice_c,choice_d,reference)
			{
				var success = false;
				$.ajax({
					method :"POST",
					url : "app/models/question.php",
					data : {
						'action':'importquestion',
						'question' : question,
						'answer' : answer,
						'choice_a' : choice_a,
						'choice_b' : choice_b,
						'choice_c' : choice_c,
						'choice_d' : choice_d,
						'reference' : reference
					}
					}).done(function(res){
						// alert(res);
						// console.log(res); 
						setTimeout(changeTableStatus('<span class="label label-success">Saved</span>'),3000);
						success = true;
						
					});
					return success;
			}
			function changeTableStatus(status)
			{
				var count = 0;
				$.ajax({
					method :"POST",
					url : "app/models/question.php",
					data : {
						'action':'getQuest1'
					}
				}).done(function(dt){
					var dbe = JSON.parse(dt);
					// console.log(dt);
					dbe.map(function(dbobject){
						$('#excelData tbody tr').each(function(row, tr){
					        if ($(tr).find('td:eq(1)').text() === dbobject.question && $(tr).find('td:eq(2)').text()===dbobject.answer && $(tr).find('td:eq(3)').text()===dbobject.choice_a && $(tr).find('td:eq(4)').text()===dbobject.choice_b && $(tr).find('td:eq(5)').text()===dbobject.choice_c && $(tr).find('td:eq(6)').text()===dbobject.choice_d && $(tr).find('td:eq(7)').text()===dbobject.reference) 
					        {
					        	$(tr).find('td:eq(8)').html(status);
					        	$('#questionbtnmodalimport').attr('disabled','disable');
					        	count++;
					        }
					        
					    }); 
					});
					 $('#saved').text(' / Rows saved: '+count);
				});
			}


		}

		getSubjectID(subject){
			// console.log(this.data.subject);				
			console.log(subject);
			return 1;
		}
		getTopicID(topic){
			// console.log(this.data.topic);
			console.log(topic);
			return 1;
		}

	}
	let settings = new Settings();
/*
initialize(){
	$('input[type=file]').on('change', (event)=>{
			settings.files = event.target.files;
	});
	$('#formUploadQuestions').submit((event)=>{
		console.log("submitted");
		event.preventDefault();
		var formData = new FormData();
		$.each(this.files,(key,value)=>{
			formData.append(key, value);
		});
		console.log(formData);			
		return false;
	});
}

		initialize(){
			$('#formUploadQuestions').submit((event)=>{
				console.log("submitted");
				event.preventDefault();
				var formData = new FormData($(this)[0]);
				console.log(formData);
				return false;
			});
		}
*/

</script>