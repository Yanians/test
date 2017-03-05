<script src="app/controllers/user.js"></script>
<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">Manage User</h3>
	</div>
	<div class="box-body">
		<div class="btn-group" role="group" aria-label="...">
			<button id="usertable-btncreate" type="button" class="btn btn-primary" data-toggle="modal" data-target="#usermodal-create" data-id="0" style="display:none;">
				<i class="fa fa-plus text-gray"></i> &nbsp;&nbsp;Create </button>
			<button id="usertable-btnread" type="button" class="btn btn-success" data-toggle="modal" data-target="#usermodal-read" data-id="0" style="display:none;" disabled>
				<i class="fa fa-eye text-gray"></i> &nbsp;&nbsp;Read </button>
			<button id="usertable-btnupdate" type="button" class="btn btn-warning" data-toggle="modal" data-target="#usermodal-update" data-id="0" style="display:none;" disabled>
				<i class="fa fa-pencil text-gray"></i> &nbsp;&nbsp;Update</button>
			<button id="usertable-btndelete" type="button" class="btn btn-danger" data-toggle="modal" data-target="#usermodal-delete" data-id="0" style="display:none;" disabled>
				<i class="fa fa-times text-gray"></i> &nbsp;&nbsp;Delete</button>
		</div>
		<div id="usertable-status" style="text-align: center"></div>
		<div>&nbsp;</div>
		<!-- datatable start-->
		<table id="usertable" class="table table-bordered table-hover table-responsive">
			<div id="usertable-loading" style="text-align: center;">
				<img src="dist/img/loading1.gif">
			</div>
		</table>
		<!-- datatable end-->

	</div>				
	<!-- /.box-body -->
</div>
<!-- modals start-->

<!-- read modal start -->
<div class="modal fade" id="usermodal-read" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-success modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			</div>
			<div class="modal-body">
				<!-- <form>
					<div class="form-group">
						<label for="recipient-name" class="control-label">First Name:</label>
						<input type="text" class="form-control" id="userfirstname">
						<label for="recipient-name" class="control-label">Last Name:</label>
						<input type="text" class="form-control" id="userlastname">
						<label for="recipient-name" class="control-label">Email:</label>
						<input type="email" class="form-control" id="useremail">
						<label for="recipient-name" class="control-label">Role:</label>
						<input type="text" class="form-control" id="userisadmin">
				        <select name="colors" class="form-control" name="userisadmin" id="userisadmin">
				            <option value="0">Student</option>
				            <option value="1">Admin</option>
				        </select>
			            <label for="recipient-name" class="control-label">Created at:</label>
			            <input type="text" class="form-control" id="usercreatedat">
			            <label for="recipient-name" class="control-label">Password:</label>
			            <input type="text" class="form-control" id="userpassword">
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
<div class="modal fade" id="usermodal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-primary modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">Create</h4>
			</div>
			<div class="modal-body">
				<!-- <form data-toggle="validator" role="form" id="addUser-form">
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">First Name:</label>
						<input type="text" class="form-control" placeholder="first name" id="createuserfirstname" required>
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Last Name:</label>
						<input type="text" class="form-control" placeholder="Last name" id="createuserlastname" required>
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">E-mail:</label>
						<input type="email" class="form-control" placeholder="Email" id="createuseremail" data-error="This email address is invalid" required>
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Role:</label>
						<select name="colors" class="form-control" id="userisadmin">
							<option value="0">Student</option>
							<option value="1">Admin</option>
						</select>
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Created at:</label>
						<input type="date" class="form-control" id="createusercreatedad" required>
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<label for="recipient-name" class="control-label">Password:</label>
						<input type="password" data-minlength="6" class="form-control" placeholder="Password" id="createuserpassword" required>
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						<div class="help-block">Minimum of 6 characters</div>
					</div>
					<div class="form-group has-feedback">
						<input type="password" class="form-control" placeholder="Retype password" id="createuserconfirmpassword" data-match="#createuserpassword" data-match-error="Password mismatch">
						<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
						<div class="help-block with-errors"></div>
					</div>
				</form> -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline" id="userbtnmodalcreate">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- create modal end -->

<!-- update modal start -->
<div class="modal fade" id="usermodal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-warning modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			</div>
			<div class="modal-body">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline" id="userbtnmodalupdate">Save changes</button>
				<!-- <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>  -->
			</div>
		</div>
	</div>
</div>

<!-- update modal end -->
<!-- delete modal start -->
<div class="modal fade" id="usermodal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	<div class="modal-danger modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="exampleModalLabel">New message</h4>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-outline" id="userbtnmodaldelete">Save changes</button>
				<!-- <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>  -->
			</div>
		</div>
	</div>
</div>

<!-- delete modal end -->
<!-- modals end-->


