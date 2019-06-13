<?php

	$dbServername = "localhost";
	$dbUsername = "root"; 
	$dbPassword = "password";
	$dbName = "assignment2";
	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName); 
	//create a new connection 
	$sql = " SELECT  SUM(execute_time) as sum FROM queues"; 
	$res = mysqli_query($conn, $sql); // Fetch data from the table
	$val = $res -> fetch_array();
    $tech_total = $val['sum'];

	echo $tech_total;
?>