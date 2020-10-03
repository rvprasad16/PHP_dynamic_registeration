<?php
session_start();
$message = array();

if(isset($_SESSION['login_user'])){
	$message["type"]='ACTIVE';
}else{
	$message["type"]='INACTIVE';
}
header('Connect-type:application/json');
echo json_encode($message);

?>
