<?php
	include('conf.php');
	//id,user_id,name,content,date

	if($link){
		$table='news';
		if(isset($_POST['action'])){
			if($_POST['action']=="createnews"){
				echo "create news ok!";
				$user_id = $_POST['userid'];
				$name = $_POST['name'];
				$content = $_POST['content'];
				$date = $_POST['date'];
				$sql = "insert into $table VALUES('','$user_id','$name', '$content','$date')";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			if($_POST['action']=="updatenews"){
				echo "update news ok!";
				$id = $_POST['id'];
				// $user_id = $_POST['userid'];
				$name = $_POST['name'];
				$content = $_POST['content'];
				// $date = $_POST['date'];
				$sql = "update $table SET name='$name', content='$content' where id='$id'";//,date='$date'user_id='$user_id',
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
			if($_POST['action']=="deletenews"){
				echo "delete news ok!";
				$id = $_POST['id'];
				// $user_id = $_POST['userid'];
				// $name = $_POST['name'];
				// $content = $_POST['content'];
				// $date = $_POST['date'];
				$sql = "delete from $table where id='$id'";
				$result = mysqli_query($link, $sql) or die("Invalid query" . mysqli_error($link));
				echo "ok";
			}
		}
		else{	
			// $sql = "select * from $table";
			$sql = "select n.id, concat_ws(' ', u.firstname, u.lastname) as user_id, n.name, n.content, n.date from $table n join user u on n.user_id=u.id";
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