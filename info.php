<?php
$DBserver = '127.0.0.1';
$DBUser = 'root';
$DBPass = 'paSS11@@';
$DBName = 'practiceDB';

$conn = new mysqli($DBserver,$DBUser,$DBPass,$DBName);
if($conn->connect_error){
	echo $conn->connect_error;
}else{
	echo 'no error';
}
?>
