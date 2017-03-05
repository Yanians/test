<script src="app/controllers/guidelines.js"></script>
<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">Manage Guidelines</h3>
	</div>
	<div class="box-body">
		<div class="btn-group" role="group" aria-label="...">
			<button id="guidelinestable-btncreate" type="button" class="btn btn-primary" data-toggle="modal" data-target="#guidelinesmodal-create" data-id="0" style="display:none;">
				<i class="fa fa-plus text-gray"></i> &nbsp;&nbsp;Create </button>
			<button id="guidelinestable-btnread" type="button" class="btn btn-success" data-toggle="modal" data-target="#guidelinesmodal-read" data-id="0" style="display:none;" disabled>
				<i class="fa fa-eye text-gray"></i> &nbsp;&nbsp;Read </button>
			<button id="guidelinestable-btnupdate" type="button" class="btn btn-warning" data-toggle="modal" data-target="#guidelinesmodal-update" data-id="0" style="display:none;" disabled>
				<i class="fa fa-pencil text-gray"></i> &nbsp;&nbsp;Update</button>
			<button id="guidelinestable-btndelete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#guidelinesmodal-delete" data-id="0" style="display:none;" disabled>
				<i class="fa fa-times text-gray"></i> &nbsp;&nbsp;Delete</button>
		</div>
		<div id="guidelinestable-status" style="text-align: center"></div>
		<div>&nbsp;</div>
		<!-- datatable start-->
		<table id="guidelinestable" class="table table-bordered table-hover">
			<div id="guidelinestable-loading" style="text-align: center;">
				<img src="dist/img/loading1.gif">
			</div>
		</table>
		<!-- datatable end-->

	</div>				
	<!-- /.box-body -->
</div>
<!-- modals start-->

<!-- read modal start -->
<div class="modal fade" id="guidelinesmodal-read" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-success modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			</div>
			<div class="modal-body">
				<!-- <form>
					<div class="form-group">
						<label for="recipient-name" class="control-label">User Name:</label>
						<input type="text" class="form-control" id="guidelinesuserid">
						<label for="recipient-name" class="control-label">Subject:</label>
						<input type="text" class="form-control" id="guidelinessubjectid">
						<label for="recipient-name" class="control-label">No. of Subjects to pass</label>
						<input type="text" class="form-control" id="guidelinessubjectstopass">
						<label for="recipient-name" class="control-label">Created at:</label>
						<input type="text" class="form-control" id="guidelinescreatedat">
					</div>
				</form> -->
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline">Save changes</button> -->
				<button type="button" class="btn btn-outline" data-dismiss="modal">Close</button> 
			</div>
		</div>
	</div>
</div>
<!-- read modal end -->

<!-- create modal start-->
<div class="modal fade" id="guidelinesmodal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-primary modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Create</h4>
			</div>
			<div class="modal-body">
				<!-- <form data-toggle="validator" role="form" id="addGuidelines-form">
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">User Name:</label>
						<input type="text" class="form-control" placeholder="first name" id="createguidelinesuserid" required>
						<span class="glyphicon glyphicon-guidelines form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Subject:</label>
						<select name="colors" class="form-control" id="createguidelinessubjectid">
						</select>
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">No.of Subject to Pass:</label>
						<input type="number" class="form-control" placeholder="Subjects to Pass" id="createguidelinessubjectstopass" required>
						<span class="glyphicon glyphicon-guidelines form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Date:</label>
						<input type="datepicker" class="form-control" id="createguidelinescreatedad" required>
						<span class="glyphicon glyphicon-guidelines form-control-feedback"></span>
					</div>
				</form> -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline" id="guidelinesbtnmodalcreate">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- create modal end -->

<!-- update modal start -->
<div class="modal fade" id="guidelinesmodal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-warning modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Update</h4>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline" id="guidelinesbtnmodalupdate">Save changes</button>
				<!-- <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>  -->
			</div>
		</div>
	</div>
</div>
<!-- update modal end -->

<!-- delete modal start-->
<div class="modal fade" id="guidelinesmodal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-danger modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Delete</h4>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline" id="guidelinesbtnmodaldelete">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- delete modal end -->

<!-- modals end-->


