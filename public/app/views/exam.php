<link href="dist/css/bootstrap-tour.min.css" rel="stylesheet">
<script src="dist/js/bootstrap-tour.min.js"></script>
<div class="content-wrapper" style="background-color: #999">
	<div class="container">
		<section class="content">
			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Manage Exam</h3>					
				</div>
				<div class="box-body">
					<div class="btn-group" role="group" aria-label="...">
						<button id="examtable-btncreate" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exammodal-create" data-id="0" style="display:none;">
							<i class="fa fa-plus text-gray"></i> &nbsp;&nbsp;Create </button>
						<button id="examtable-btnread" type="button" class="btn btn-success" data-toggle="modal" data-target="#exammodal-read" data-id="0" style="display:none;" disabled>
							<i class="fa fa-eye text-gray"></i> &nbsp;&nbsp;Read </button>
						<button id="examtable-btnupdate" type="button" class="btn btn-warning" data-toggle="modal" data-target="#exammodal-update" data-id="0" style="display:none;" disabled>
							<i class="fa fa-pencil text-gray"></i> &nbsp;&nbsp;Update</button>
						<button id="examtable-btndelete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#exammodal-delete" data-id="0" style="display:none;" disabled>
							<i class="fa fa-times text-gray"></i> &nbsp;&nbsp;Delete</button>
					</div>
					<div id="examtable-status" style="text-align: center"></div>
					<div>&nbsp;</div>
					<!-- datatable start-->
					<table id="examtable" class="table table-bordered table-hover">
						<div id="examtable-loading" style="text-align: center;">
							<img src="dist/img/loading1.gif">
						</div>
					</table>
					<!-- datatable end-->

				</div>
				<!-- /.box-body -->
			</div>

			<div class="box box-default">
				<div class="box-header with-border">
					<h3 class="box-title">Subject: <span id="subjecttitle"></span></h3>
				</div>
				<div class="box-body">					
					<table class="table">
						<caption>
							<div id="subjectdesc">table title and/or explanatory text</div>
							<button class="btn btn-danger pull-right" style="width: 200px" id="submit">SUBMIT</button>
						</caption>
						<thead>
							<tr>
								<th id="sheet" colspan="4">ANSWER SHEET</th>
								<th width="6%">ITEM NO.</th>
								<th width="70%">QUESTION SHEET</th>
							</tr>
						</thead>
						<tbody id="items"></tbody>
					</table>
				</div>
				<!-- /.box-body -->
			</div>			
		</section>
	</div>
	<!-- /.container -->
</div>

<!-- modals start-->
<div class="modal fade" id="exammodal-read" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-success modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="recipient-name" class="control-label">User:</label>
								<input type="text" class="form-control" id="examuser">
							</div>
							<div class="col-sm-6">
								<label for="recipient-name" class="control-label">Subject:</label>
								<input type="text" class="form-control" id="examsubject">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="message-text" class="control-label">Question:</label>
						<textarea class="form-control" id="examquestion"></textarea>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-6">
								<label for="recipient-name" class="control-label">User's Answer:</label>
								<input type="text" class="form-control" id="examuseranswer">
							</div>
							<div class="col-sm-6">
								<label for="recipient-name" class="control-label">iMOCK's Answer:</label>
								<input type="text" class="form-control" id="examimockanswer">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label">Result:</label>						
						<input type="text" class="form-control" id="examresult">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline">Save changes</button> -->
				<button type="button" class="btn btn-outline" data-dismiss="modal">Close</button> 
			</div>
		</div>
	</div>
</div>
<!-- modals end-->

<script src="app/controllers/exam.js"></script>
<script>
	// Instance the tour
	var tour = new Tour({
	  steps: [
	  {
	    element: "#sheet",
	    placement: "top",
	    title: "Check Boxes",
	    content: "click diri sa baba para mag answer..."
	  },
      {
	    element: "#submit",
	    title: "Submit Here",
	    placement: "left",
	    content: "click diri pag na answer na tanan"
	  }  
	],
	  backdrop: true,
	  storage: false,
	  smartPlacement: true
	});

tour.init();

tour.start();
</script>
