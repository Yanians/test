<?php
include('conf.php');

if($link){
	if(isset($_POST['action'])){
		if($_POST['action']=="savelog"){
			// print_r($_POST['payload']);
			$table='quizlog';
			$sql = "select count(id) as 'count' from $table where quiz_id='".$_POST['payload']['quiz_id']."' AND user_id='".$_POST['payload']['user_id']."' AND answer='".$_POST['payload']['selected']['answer']."' AND answer_details='".$_POST['payload']['selected']['answer_details']."'";
			$result = mysqli_query($link, $sql) or die(json_encode(["result" => "not ok","query" => "$sql"]));
			if(mysqli_fetch_assoc($result)['count']==0){
				$sql1 = "insert into $table values('','".$_POST['payload']['quiz_id']."','".$_POST['payload']['user_id']."','".$_POST['payload']['selected']['answer']."','".$_POST['payload']['selected']['answer_details']."',CURRENT_TIMESTAMP)";			
				$result1 = mysqli_query($link, $sql1) or die(json_encode(["result" => "not ok","query" => "$sql1"]));
				echo json_encode(["result" => "ok"]);				
			}
			else{
				//Do update here if user chooses another letter
				//But since the rule is to select only once just like in mock exams
				echo json_encode(["result" => "ok"]);
			}
			// $arr = array();
			// // $count=0;
			// while($row=mysqli_fetch_assoc($result)){
			// 	$arr[] = $row;
			// // 	$count++;
			// }
			// echo json_encode($arr);
		}
		else if($_POST['action']=="verifylog"){
			// print_r($_POST['payload']);
			$table='quizlog';
			$sql = "select * from $table where quiz_id='".$_POST['payload']['quiz_id']."' AND user_id='".$_POST['payload']['user_id']."' ";
			$result = mysqli_query($link, $sql) or die(json_encode(["result" => "not ok","query" => "$sql"]));
			$arr = array();
			while($row=mysqli_fetch_assoc($result)){
				$arr[] = $row;
			}
			echo json_encode($arr);
		}
		else if($_POST['action']=="getQuizLogs"){
			// print_r($_POST['payload']);
			$table='quizlog';
			$sql = "select * from $table where user_id='".$_POST['payload']['user_id']."' ";
			$result = mysqli_query($link, $sql) or die(json_encode(["result" => "not ok","query" => "$sql"]));
			$arr = array();
			while($row=mysqli_fetch_assoc($result)){
				$arr[] = $row;
			}
			echo json_encode($arr);
		}
		// else if($_POST['action']=="setlog"){
		// 	// print_r($_POST['examlog']['user_id']);
		// 	$table='exam';
		// 	$sql = "select * from $table WHERE user_id='".$_POST['examlog']['user_id']."' AND subject_id='".$_POST['examlog']['subject_id']."' AND topic_id='".$_POST['examlog']['topic_id']."' AND question_id='".$_POST['examlog']['question_id']."' AND answer='".$_POST['examlog']['answer']."'";
		// 	$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
		// 	$count=0;
		// 	while($row=mysqli_fetch_assoc($result)){
		// 		$arr[] = $row;
		// 		$count++;
		// 	}
		// 	if($count>0){
		// 		echo json_encode(["result" => "not ok"]);
		// 	}
		// 	else{
		// 		$sql = "insert into $table values('','".$_POST['examlog']['user_id']."','".$_POST['examlog']['subject_id']."','".$_POST['examlog']['topic_id']."','".$_POST['examlog']['question_id']."','".$_POST['examlog']['answer']."','".$_POST['examlog']['timeremaining']."')";
		// 		// $result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
		// 		echo json_encode(["result" => "ok"]);
		// 	}
		// }
		// else if($_POST['action']=="fetchquiz"){
		// 	$sql = "select * from quiz where subject_id='".$_POST['payload']['subject_id']."' AND topic_id='".$_POST['payload']['topic_id']."' order by id asc";
		// 	$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
		// 	$arr = array();
		// 	$count=0;
		// 	while($row=mysqli_fetch_assoc($result)){
		// 		// $arr['id'] = $row['id'];
		// 		// $arr['question_id'] = $row['question_id'];
		// 		$arr[] = $row;
		// 		$sql1 = "select id,question,choice_a,choice_b,choice_c,choice_d from question where id='".$row['question_id']."'";
		// 		$result1 = mysqli_query($link, $sql1) or die("Invalid query" . mysqli_error($link));
		// 		$arr1 = array();
		// 		while($row1=mysqli_fetch_assoc($result1)){
		// 			$arr[$count]['questions'] = $row1;
		// 			$choice = array();
		// 			$choice['quiz_id']="";
		// 			$choice['user_id']="";
		// 			$choice['answer_letter']="";					
		// 			$choice['answer_details']="";					
		// 			$arr[$count]['quizlog'] = $choice;
		// 			// print_r($arr1);
		// 			// array_merge($arr, $arr1);
		// 		}
		// 		$count++;
		// 	}
		// 	echo json_encode($arr);
		// }
	}
	else{
		// $table='exam';
		// $sql = "select * from $table";
		// $result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
		// $arr = array();
		// $count=0;
		// while($row=mysqli_fetch_assoc($result)){
		// 	$arr[] = $row;
		// 	$count++;
		// }
		// echo json_encode($arr);
	}		
}
?>

<?php
	// if($link){
	// 	$table = 'exam';
	// 	$primaryKey = 'id';
	// 	$columns = array(
	// 		array( 'db' => 'id', 'dt' => 0 ),
	// 		array( 'db' => 'user_id',  'dt' => 1 ),
	// 		array( 'db' => 'subject_id',   'dt' => 2 ),
	// 		array( 'db' => 'question_id',     'dt' => 3 ),
	// 		array( 'db' => 'answer',     'dt' => 4 )
	// 	);
	// 	$sql_details = array(
	// 	    'user' => USER,
	// 	    'pass' => PASS,
	// 	    'db'   => DBSE,
	// 	    'host' => HOST
	// 	);
	// 	require( 'ssp.php' );
	// 	echo json_encode(
	// 	    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
	// 	);
	// }
?>