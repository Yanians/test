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
				echo json_encode(["result" => "ok","data" => $arr]);
			}
			else if($_POST['action']=="submit"){
				$table='exam_user';
				$sql = "update $table set status='".$_POST['payload']['status']."' where id='".$_POST['payload']['id']."'";
				$result = mysqli_query($link, $sql) or die(json_encode(["result" => "not ok","query" => $sql]));				
				echo json_encode(["result" => "ok"]);
			}
		}	
	}
?>
