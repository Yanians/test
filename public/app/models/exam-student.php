<?php
	include('conf.php');
	if($link){
		if(isset($_POST['action'])){
			if($_POST['action']=="verifyuser"){
				// print_r($_POST['payload']);
				$table='user';
				$sql = "select 	* from $table 
						where 	id='".$_POST['payload']['id']."' 
						and 	email='".$_POST['payload']['email']."'
						and 	password=MD5('".$_POST['payload']['password']."') ";				
				$result = mysqli_query($link, $sql) or die(json_encode(["result" => "not ok","query" => $sql]));
				$arr = array();
				while($row=mysqli_fetch_assoc($result)){
					$arr[] = $row;
				}
				// echo json_encode($arr);
				echo json_encode(["result" => "ok","data" => $arr]);
				// email='".$_POST['payload']['quiz_id']."' AND user_id='".$_POST['payload']['user_id']."' AND answer='".$_POST['payload']['selected']['answer']."' AND answer_details='".$_POST['payload']['selected']['answer_details']."'";
				// $result = mysqli_query($link, $sql) or die(json_encode(["result" => "not ok","query" => "$sql"]));
				// if(mysqli_fetch_assoc($result)['count']==0){
				// 	$sql1 = "insert into $table values('','".$_POST['payload']['quiz_id']."','".$_POST['payload']['user_id']."','".$_POST['payload']['selected']['answer']."','".$_POST['payload']['selected']['answer_details']."',CURRENT_TIMESTAMP)";			
				// 	$result1 = mysqli_query($link, $sql1) or die(json_encode(["result" => "not ok","query" => "$sql1"]));
				// 	echo json_encode(["result" => "ok"]);				
				// }
				// else{
				// 	//Do update here if user chooses another letter
				// 	//But since the rule is to select only once just like in mock exams
				// 	echo json_encode(["result" => "ok"]);
				// }
			}		
		}	
	}
?>
