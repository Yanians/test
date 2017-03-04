<?php
	include('conf.php');
	//id,email,password,firstname,lastname,createdat,isadmin

	if($link){
		$table='user';
		if(isset($_POST['action'])){
			if($_POST['action']=="createuser"){
				echo "create user ok!";
				$email = $_POST['email'];
				$password = $_POST['password'];
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$isadmin = $_POST['isadmin'];
				$date = date("Y-m-d H:i:s");
				$password = md5($password);
				$sql = "insert into $table VALUES('','$email','$password', '$firstname','$lastname', '$date', $isadmin')";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			if($_POST['action']=="updateuser"){
				echo "update user ok!";
				$id = $_POST['id'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$isadmin = $_POST['isadmin'];
				$password = md5($password);
				$sql = "update $table SET email='$email',password='$password', firstname='$firstname',lastname='$lastname',isadmin='$isadmin' where id='$id'";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			if($_POST['action']=="deleteuser"){
				echo "delete user ok!";
				$id = $_POST['id'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$isadmin = $_POST['isadmin'];
				$sql = "delete from $table where id='$id'";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
		}
		else{	
			$sql = "select * from $table";
		    $result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
			$arr = array();
			$count=0;
			while($row=mysqli_fetch_assoc($result)){
				$arr[] = $row;
				$count++;
			}
			echo json_encode($arr);
		}
	}
?>