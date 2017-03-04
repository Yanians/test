<div id="login-modal" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="login-modal-container">
			<form id="login-form" data-toggle="validator" role="form">
				<div class="modal-header" style="background-color: #00A65A;">
					<h1 style="color: white; text-align: center;">iMock</h1>
				</div>
				<div class="modal-body">
					<h2>Login To Your Account </h2>
					<div id="err-msg"></div>
					<div class="form-group has-feedback">
						<input type="email" id="email" name="email" placeholder="Your email address" class="form-control input-lg" data-error="This email address is invalid" required />
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group has-feedback">
						<input type="password" id="password" data-minlength="6" name="password" placeholder="Password" class="form-control input-lg" required />
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
						<div class="help-block">Minimum of 6 characters</div>
					</div>
					<div class="form-group">
						<div id="captcha"></div>
					</div>
					<div class="form-group">
						<input type="submit" id="login" name="login" value="Sign In" class="btn btn-success btn-block btn-lg" />
					</div>
				</div>
				<div class="modal-footer">
					<!-- Don't have an account? <a href="#">Sign Up here</a> -->
				</div>
			</form>
		</div>
	</div>
</div>