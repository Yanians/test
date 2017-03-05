<?php
	include('conf.php');
	//id,user_id,feedback,date

	if($link){
		$table='feedback';
		if(isset($_POST['action'])){
			if($_POST['action']=="createfeedback"){
				echo "create feedback ok!";
				$user_id = $_POST['userid'];
				$feedback = $_POST['feedback'];
				$date = date("Y-m-d H:i:s"); 
				$sql = "insert into $table VALUES('','$user_id','$feedback', '$date')";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			if($_POST['action']=="updatefeedback"){
				echo "update feedback ok!";
				$id = $_POST['id'];
				// $user_id = $_POST['userid'];
				$feedback = $_POST['feedback'];
				// $date = $_POST['date'];
				$sql = "update $table SET feedback='$feedback' where id='$id'";//, date='$date'user_id='$user_id',
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			if($_POST['action']=="deletefeedback"){
				echo "delete feedback ok!";
				$id = $_POST['id'];
				// $user_id = $_POST['userid'];
				// $feedback = $_POST['feedback'];
				// $date = $_POST['date'];
				$sql = "delete from $table where id='$id'";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
		}
		else{	
			// $sql = "select * from $table";
			$sql = "select f.id, concat_ws(' ', u.firstname, u.lastname) as user_id, f.feedback, f.date from $table f join user u on n.user_id=u.id";
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