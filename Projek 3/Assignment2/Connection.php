<?php
	try {
		$pdo = new PDO('mysql: host=localhost; dbname=assignment2', 'root', 'password');
	}
	catch (PDOException $e) {
		exit('Database Error');
	}
?>