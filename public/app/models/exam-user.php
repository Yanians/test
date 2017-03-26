<?php
	include('conf.php');
	$table='exam_user';
	if($link){
		if(isset($_POST['action'])){
			if($_POST['action']=="getUserExam"){
				$sql = "select * from $table where user_id='".$_POST['user_id']."'";
			    $result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				$arr = array();
				while($row=mysqli_fetch_assoc($result)){
					$arr[] = $row;
				}
				echo json_encode($arr);	
			}
		}
		else{
			$sql = "select * from $table";
		    $result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
			$arr = array();
			while($row=mysqli_fetch_assoc($result)){
				$arr[] = $row;
			}
			echo json_encode($arr);			
		}
	}
?>