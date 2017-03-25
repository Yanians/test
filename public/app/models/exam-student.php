<?php
	include('conf.php');
	if($link){
		if(isset($_POST['action'])){
			if($_POST['action']=="verifyuser"){
				// print_r($_POST['payload']);
				if(!hasTakenExam($_POST['payload']['id'],$link)){
					$table='user';
					$sql = "select 	* from $table 
							where 	id='".$_POST['payload']['id']."' 
							and 	email='".$_POST['payload']['email']."'
							and 	password=MD5('".$_POST['payload']['password']."') ";				
					$result = mysqli_query($link, $sql) or die(json_encode(["result" => "not ok","type"=>"sqlerror","query" => $sql]));
					$arr = array();
					while($row=mysqli_fetch_assoc($result)){
						$arr[] = $row;
					}
					echo json_encode(["result" => "ok","data" => $arr]);
				}
				else{					
					echo json_encode(["result" => "not ok","type" => "systemerror","message" => "You have already taken the exam!"]);
				}
			}
			else if($_POST['action']=="submit"){
				$table='exam_user';
				$sql = "update $table set status='".$_POST['payload']['status']."', data='".$_POST['payload']['data']."' where id='".$_POST['payload']['id']."'";
				$result = mysqli_query($link, $sql) or die(json_encode(["result" => "not ok","query" => $sql]));				
				echo json_encode(["result" => "ok"]);
			}
		}	
	}

	function hasTakenExam($id,$link){
		$flag = false;
		$table='exam_user';
		$sql = "select 	id from $table 
				where 	user_id='".$id."' and status<>'DEFAULT'";				
		$result = mysqli_query($link, $sql) or die(json_encode(["result" => "not ok","type"=>"sqlerror","query" => $sql]));
		$count = 0;
		while($row=mysqli_fetch_assoc($result)){
			$count++;
		}
		if($count>0)$flag=true;
		return $flag;
	}
?>
