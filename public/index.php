<?php
<<<<<<< HEAD
	echo "Index";
	echo "<br/>";
	require __DIR__.'/../app/app.php';
?>
=======
		// require __DIR__.'/../app/app.php';
	define('APP_DIR',__DIR__.'/../app/');
	define('CONTROLLERS_DIR',"/controllers/");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>iMock</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="icon" type="image/png" href="dist/img/favicon.png" />
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="dist/css/font-awesome.min.css">
	<link rel="stylesheet" href="dist/css/ionicons.min.css">

	<!-- css plugins -->
	<link rel="stylesheet" href="plugins/iCheck/square/green.css">
	<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
	<link rel="stylesheet" type="text/css" href="plugins/sweetalert/sweetalert.css">

	<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="dist/css/skins/skin-green.min.css">  
	<link rel="stylesheet" href="dist/css/app.css">
	<link href="dist/css/custom.css" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	  <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  <![endif]-->

	  <!-- js plugins -->
	  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>  
	  <script src="plugins/iCheck/icheck.min.js"></script>
	  <script src="dist/js/validator.min.js"></script>

	  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
	  <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
	  <script src="controllers/app.js"></script>
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
	<div class="wrapper">

		<header class="main-header">
			<nav class="navbar navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<a href="?page=login" class="navbar-brand"><b>i</b>MOCK</a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse pull-right" id="navbar-collapse">
						<ul class="nav navbar-nav">
							<li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
				              <!-- <li class=""><a href="?page=login">Login</a></li>
				              <li><a href="?page=register">Register</a></li>
				              <li><a href="?page=user">User</a></li> -->
				              <!-- <li><a href="?page=exam">Exam</a></li> -->
				              <!-- <li><a href="?page=subject">Subject</a></li>
				              <li><a href="?page=question">Question</a></li>
				              <li><a href="?page=topic">Topic</a></li>
				              <li><a href="?page=quiz">Quiz</a></li>
				              <li><a href="?page=news">News</a></li>
				              <li><a href="?page=feedback">Feedback</a></li>
				              <li><a href="?page=guidelines">Guidelines</a></li>
				              <li><a href="?page=logout">Logout</a></li> -->
				          </ul>
				      </div>
				      <!-- /.navbar-collapse -->
				  </div>
				  <!-- /.container-fluid -->
				</nav>
			</header>
<!-- Full Width Column -->

<?php
        //routes
if(isset($_GET['page'])){
	if($_GET['page'] == "login"){
		$page_url = "../app/views/login.php";
	}          
	else if($_GET['page'] == "register"){
		$page_url = "../app/views/register.php";
	}          
	else if($_GET['page'] == "exam"){
		$page_url = "../app/views/exam.php";
	}          
	else if($_GET['page'] == "subject"){
		$page_url = "../app/views/subject.php";
	}
	else if($_GET['page'] == "user"){
		$page_url = "../app/views/user.php";
	}
	else if($_GET['page'] == "topic"){
		$page_url = "../app/views/topic.php";
	}
	else if($_GET['page'] == "news"){
		$page_url = "../app/views/news.php";
	}
	else if($_GET['page'] == "feedback"){
		$page_url = "../app/views/feedback.php";
	}
	else if($_GET['page'] == "guidelines"){
		$page_url = "../app/views/guidelines.php";
	}
	else{
		$page_url = "../app/views/error404.php";
	}
	require_once($page_url);
}
else{
          // require_once("../app/views/login.php");
}
        // include('AltoRouter.php');
        // $router = new AltoRouter();

        // map homepage
        // $router->map( 'GET', 'admin/exam', function() {
        //     require __DIR__ . 'index.php?page=exam';
        // });

        // // map users details page
        // $router->map( 'GET|POST', '/admin/[i:page]/', function( $page ) {
        //   $user = '#load';
        //   require __DIR__ . '/';
        // });
?>        
<!-- bago -->
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
	</div>


<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="plugins/sweetalert/sweetalert.min.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="controllers/script.js"></script>
<script src="dist/js/demo.js"></script>
</body>
</html>
>>>>>>> feature-version1.0.0
