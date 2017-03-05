<?php
    //routes
	if(isset($_GET['page'])){
		if($_GET['page'] == "login"){
			$page_url = "app/views/login.php";
		}          
		else if($_GET['page'] == "register"){
			$page_url = "app/views/register.php";
		}          
		else if($_GET['page'] == "exam"){
			$page_url = "app/views/exam.php";
		}          
		else if($_GET['page'] == "subject"){
			$page_url = "app/views/subject.php";
		}
		else if($_GET['page'] == "user"){
			$page_url = "app/views/user.php";
		}
		else if($_GET['page'] == "topic"){
			$page_url = "app/views/topic.php";
		}
		else if($_GET['page'] == "news"){
			$page_url = "app/views/news.php";
		}
		else if($_GET['page'] == "feedback"){
			$page_url = "app/views/feedback.php";
		}
		else if($_GET['page'] == "dashboard"){
			$page_url = "app/views/dashboard.php";
		}
		else if($_GET['page'] == "guidelines"){
			$page_url = "app/views/guidelines.php";
		}
		else{
			$page_url = "app/views/error404.php";
		}
		require_once($page_url);
	}
	else{
    	// require_once("../app/views/login.php");
	}
?> 