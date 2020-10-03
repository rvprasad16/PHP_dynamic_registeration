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
	$sql = "SELECT * FROM User";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["name"]. "<br>";
    }
} else {
    echo "0 results";
}
}

?>
