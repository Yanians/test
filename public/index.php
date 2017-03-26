<!-- 
	HOW TO READ TOPIC
		settings.php
		report.php
		quiz.php
		report-topic
	http://localhost/test/public/admin-settings.php?page=settings
	http://localhost/test/public/student.php?page=dashboard
-->
<!DOCTYPE html>
<html>
<head>
	<?php include_once 'layout/header.php'; ?>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-green layout-top-nav">
	<div class="wrapper">
		<!-- Nav -->
		<?php include_once 'layout/nav.php'; echo '<script>showNav(["login"]);</script>';?>		
		<!-- Routes -->
		<?php include_once 'layout/routes.php'; ?>
		<!-- Modals -->
		<?php include_once 'layout/modals.php'; ?>
	</div>
<!-- Scripts and Footer -->
<?php include_once 'layout/footer.php'; ?>
</body>
</html>
