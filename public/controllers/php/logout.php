<?php
	include('dbconnect.php');
	$con->userLogout();
header('Location: /public');
?>