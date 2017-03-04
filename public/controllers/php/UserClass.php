<?php
session_start();

class UserClass
{
	private $db;
	
	// constructor
	function __construct($db)
	{
		$this->db = $db;
	}
	
	function userLogin($email, $password){
		
        	
    	$password = md5($password);
		$sql2="SELECT id,firstname,lastname,isadmin from user WHERE email='$email' and password='$password'";
		
		//checking if the username is available in the table
    	$result = mysqli_query($this->db,$sql2);
    	$user_data = mysqli_fetch_array($result);
    	$count_row = $result->num_rows;
	
        if ($count_row == 1) {
            // this login var will use for the session thing
            $_SESSION['id']= $user_data['id'];
            $_SESSION['level']= intval($user_data['isadmin']);
            $_SESSION['fullname'] = $user_data['firstname'].' '.$user_data['lastname'];
            return true;
        }
        else{
		    return false;
		}
	}
	function userName()
	{
		return $_SESSION['fullname'];
	}
	function userID()
	{
		return $$_SESSION['id'];
	}
	function userLogout()
	{
		session_destroy();
		unset($_SESSION['id']);
		unset($_SESSION['level']);
		unset($_SESSION['fullname']);
		return;
	}
	
	function escapeString($str) {
		return $this->db->real_escape_string($str);
	}

	public function reg_user($first_name,$last_name, $is_admin, $password, $email){

			
		$password = md5($password);
		$sql="SELECT * FROM user WHERE email='$email'";
		
		//checking if the username or email is available in db
		$check =  $this->db->query($sql) ;
		$count_row = $check->num_rows;

		//if the username is not in db then insert to the table
		if ($count_row == 0){
			$sql1="INSERT INTO user SET firstname='$first_name', lastname='$last_name', is_admin='$is_admin', email='$email, password='$password'";
			$result = mysqli_query($this->db,$sql1) or die(mysqli_connect_errno()."Data cannot inserted");
			return $result;
		}
		else { return false;}
	}
}
?>