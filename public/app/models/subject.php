<?php
	//id,name,description,timeduration,passingrate,attempt,items
	include('conf.php');

	if($link){
		$table='subject';
		if(isset($_POST['action'])){
			if($_POST['action']=="createsubject"){
				echo "create subject ok!";
				$name = $_POST['name'];
				$description = $_POST['description'];
				$timeduration = $_POST['timeduration'];
				$passingrate = $_POST['passingrate'];
				$attempt = $_POST['attempt'];
				$items = $_POST['items'];
				$sql = "insert into $table VALUES('','$name','$description', '$timeduration','$passingrate','$attempt','$items')";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			else if($_POST['action']=="updatesubject"){
				echo "update subject ok!";
				$id = $_POST['id'];
				$name = $_POST['name'];
				$description = $_POST['description'];
				$firstname = $_POST['firstname'];
				$timeduration = $_POST['timeduration'];
				$passingrate = $_POST['passingrate'];
				$attempt = $_POST['attempt'];
				$items = $_POST['items'];
				$sql = "update $table SET name='$name',description='$description', timeduration='$timeduration',passingrate='$passingrate',attempt='$attempt', items='$items' where id='$id'";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			else if($_POST['action']=="deletesubject"){
				echo "delete subject ok!";
				$id = $_POST['id'];
				$sql = "delete from $table where id='$id'";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			else if($_POST['action']=="topics"){	
				$table2 = "topic";
				$sql = "select * from $table";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				$arr = array();
				$i=0;
				while($row=mysqli_fetch_assoc($result)){
					$sql2 = "select * from $table2 where subject_id='".$row['id']."'";
					$result2 = mysqli_query($link, $sql2) or die("Invalid query" . mysqli_error($link));
					$topic = array();
					while($row2=mysqli_fetch_assoc($result2)){
						$topic[] = array("id" => $row2['id'], "name" => htmlspecialchars($row2['name']));
					}
					array_push($row, $topic);					
					$arr[] = $row;
				}
				echo json_encode($arr);
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