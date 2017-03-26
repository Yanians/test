<?php
	include('conf.php');
	$table='topic';
	if($link){
		if(isset($_POST['action'])){
			//Write your actions here...
		}
		else{
			$sql = "select * from $table";
			$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
			$arr = array();
			while($row=mysqli_fetch_assoc($result)){
				$arr[] = array("id" => $row['id'], "subject_id" => $row['subject_id'], "name" => htmlspecialchars($row['name']));
			}
			echo json_encode($arr);
		}
	}
?>