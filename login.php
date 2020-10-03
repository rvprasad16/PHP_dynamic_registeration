<?php



//require("info.php");
$message = array();
$error =false;
$DBserver = '127.0.0.1';
$DBUser = 'root';
$DBPass = 'paSS11@@';
$DBName = 'practiceDB';

$conn = new mysqli($DBserver,$DBUser,$DBPass,$DBName);
session_start();
if($_POST['type']=="Logout"){
	session_unset();
	session_destroy();
	$message["type"]="SUCCESS";
}


if($_POST['type']=="Login"){
	$required = array('username','password');
	foreach($required as $field){
		if(empty($_POST[$field])){
			$error=true;
		}
	}
	if(!$error){
		//$username =cleanUp($_POST['username']);
		//$password =md5(cleanUp($_POST['password']));
		//$username = mysql_real_escape_string($_POST['username']);
		$username =$_POST['username'];
		$password =md5($_POST['password']);
		
		/*$stmt = $conn->prepare("SELECT name FROM User WHERE name='$username' AND password='$password'";);
    		$stmt->bind_param("s", $username);
    		$stmt->bind_param("s", $password);

    		$stmt->execute();*/
		
		$sql = "SELECT name FROM User WHERE name='$username' AND password='$password'";
		$result = $conn->query($sql);
		$row_count = $result->num_rows;
		if($row_count){
			$_SESSION['login_user']=$username;
			$message['message']='Welcome';
			$message["type"]="SUCCESS";
		}else{
			$message["type"]='Failed';
			$message["message"]='Incorrect User information';
		}
	}else{
		$message["type"]='Failed';
		$message["message"]='Missing Fieled';
	}
}/*
if($_POST['type']=="Register"){

	$error=false;
	$required = array('username','password','email');
	foreach($required as $field){
		if(empty($_POST[$field])){
			$error=true;
		}
	}
	
	if(!$error){
		//$username =cleanUp(%_POST['username']);
		//$email =cleanUp(%_POST['email']);
		//$password =md5(cleanUp(%_POST['password']));
		$username =$_POST['username'];
		$password =$_POST['password'];
		$email=$_POST['email'];
		$sql = "SELECT name FROM User WHERE name='$username'";
		$result = $conn->query($sql);
		$row_count = $result->num_rows;
		if($row_count){
			$error=true;
			$message["type"]='Failed';
			$message["message"]='User already exist';
		}
		if(!$error){
			$token = sha1(uniqid());
			$sql2 = "INSERT INTO User (name,password,email,token) VALUES ('$username','$password','$email','$token')";
			$result = $conn->query($sql2);
			$message["type"]='SUCCESS';
			$message["message"]='User registered';
		}
	}else{
		$message["type"]='Failed';
		$message["message"]='Missing Fieled';
	}
}*/


header('Connect-type:application/json');
echo json_encode($message);

function cleanUp($data){
	return mysql_real_escape_string(trim(htmlentities(strip_tags($data))));
}

function clean($str) {
    $str = @trim($str);
    return mysql_real_escape_string($str);
}

?>
