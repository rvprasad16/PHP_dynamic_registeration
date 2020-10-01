<?php

$username = cleanUp($_POST['username']);
$email = cleanUp($_POST['email']);
$password = md5(cleanUp($_POST['password']));
$arrays = array();
if(some_error){
	$arrays['message']="some error message";
}

if(!empty($arrays)){

}else{

	//some error
}

require_once 'info.php';
$sql = "SELECT name FROM User WHERE name ='".$username."'";
$result = $conn->query($sql);



function cleanUp($data){
	return mysql_real_escape_string(trim(htmlentities(strip_tags($data))));
}


?>
