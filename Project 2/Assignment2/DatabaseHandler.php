<?php
    $dbServername = "localhost";
	$dbUsername = "root"; 
	$dbPassword = "password";
	$dbName = "assignment2";
	//create a new connection 
	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
	// Escape user inputs for security
	$number_process = mysqli_real_escape_string($conn, $_REQUEST['number_process']);
	$arrival_time = mysqli_real_escape_string($conn, $_REQUEST['arrival_time']);
	$execute_time = mysqli_real_escape_string($conn, $_REQUEST['execute_time']);
 
	// Attempt insert query execution
	$sql = "INSERT INTO queues (number_process, arrival_time, execute_time) VALUES ('$number_process', '$arrival_time', '$execute_time')";
	if(mysqli_query($conn, $sql))
	{
		include'Input.php';
	}
	mysqli_close($conn);
?>
