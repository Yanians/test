<?php
	include('conf.php');
	//id,user_id,subject_toPass,date

	if($link){
		$table='guidelines';
		if(isset($_POST['action'])){
			if($_POST['action']=="createguidelines"){
				echo "create guidelines ok!";
				$user_id = $_POST['user_id'];
				$subject_toPass = $_POST['subjects_toPass'];
				$date = date("Y-m-d H:i:s");
				$sql = "insert into $table VALUES('','$user_id','$subject_toPass', '$date')";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			if($_POST['action']=="updateguidelines"){
				echo "update guidelines ok!";
				$id = $_POST['id'];
				// $user_id = $_POST['user_id'];
				$subject_toPass = $_POST['subjects_toPass'];
				// $date = $_POST['date'];
				$sql = "update $table SET subject_toPass='$subject_toPass' where id='$id'";//, date='$dateuser_id='$user_id','
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			if($_POST['action']=="deleteguidelines"){
				echo "delete guidelines ok!";
				// $id = $_POST['id'];
				// $user_id = $_POST['userid'];
				// $subject_toPass = $_POST['subject_toPass'];
				// $date = $_POST['date'];
				$sql = "delete from $table where id='$id'";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
		}
		else{	
			$sql = "select g.id, concat_ws(' ', u.firstname, u.lastname) as user_id, g.subject_toPass, g.date from $table g join user u on g.user_id=u.id";
			// $sql = "select * from $table";
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