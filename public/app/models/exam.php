<?php
include('conf.php');

if($link){
	if(isset($_POST['action'])){
		if($_POST['action']=="getquestions"){
			$table='question';
			$sql = "select * from $table WHERE subject_id=".$_POST['subjectid'];
			$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
			$arr = array();
			$count=0;
			while($row=mysqli_fetch_assoc($result)){
				$arr[] = $row;
				$count++;
			}
			echo json_encode($arr);
		}
		else if($_POST['action']=="setlog"){
			// print_r($_POST['examlog']['user_id']);
			$table='exam';
			$sql = "select * from $table WHERE user_id='".$_POST['examlog']['user_id']."' AND subject_id='".$_POST['examlog']['subject_id']."' AND topic_id='".$_POST['examlog']['topic_id']."' AND question_id='".$_POST['examlog']['question_id']."' AND answer='".$_POST['examlog']['answer']."'";
			$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
			$count=0;
			while($row=mysqli_fetch_assoc($result)){
				$arr[] = $row;
				$count++;
			}
			if($count>0){
				echo json_encode(["result" => "not ok"]);
			}
			else{
				$sql = "insert into $table values('','".$_POST['examlog']['user_id']."','".$_POST['examlog']['subject_id']."','".$_POST['examlog']['topic_id']."','".$_POST['examlog']['question_id']."','".$_POST['examlog']['answer']."','".$_POST['examlog']['timeremaining']."')";
				// $result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo json_encode(["result" => "ok"]);
			}
		}
	}
	else{
		$table='exam';
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