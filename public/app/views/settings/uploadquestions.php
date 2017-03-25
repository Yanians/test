<div class="row">
	<div class="col-sm-3">
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
	<div class="col-sm-9">
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

							<form id="formUploadQuestions">
								<label class="form-label span3" for="file">File</label>
								<input type="file" name="file" id="file" required />
								<br><br>
								<button type="submit" id="btnUploadQuestions" class="btn bg-maroon btn-flat margin startquiz">Upload Questions Now</button>
							</form>						
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
<script>
	class Settings{
		constructor(){
			this.data = [];
			this.main();
		}
		main(){
			this.initialize();
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