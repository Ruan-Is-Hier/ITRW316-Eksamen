<?php

	$dbServername = "localhost";
	$dbUsername = "root"; 
	$dbPassword = "password";
	$dbName = "assignment2";
	//create a new connection 
	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

	$sql = "DELETE FROM queues";
	if(mysqli_query($conn, $sql))
	{
		include'Input.php';
	}
	mysqli_close($conn);

?>