<?php
	include('conf.php');
	if($link){
		$table='exam_questions';
		if(isset($_POST['action'])){
			if($_POST['action']=="loadquestions"){
				$sql = "SELECT * FROM subject";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				$subjects = array();
				while($row=mysqli_fetch_assoc($result)){
					$subjects[] = $row;										
				}

				$sql = "SELECT * FROM $table";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				$questions = array();
				while($row=mysqli_fetch_assoc($result)){
					$row['selected'] = "X";
					$questions[] = $row;
				}

				$sql = "UPDATE exam_user SET status='ONGOING', time_start=NOW() WHERE user_id='".$_POST['user_id']."'";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));

				$data = array();
				$data['subjects'] = $subjects;
				$data['questions'] = $questions;
				echo json_encode($data);
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