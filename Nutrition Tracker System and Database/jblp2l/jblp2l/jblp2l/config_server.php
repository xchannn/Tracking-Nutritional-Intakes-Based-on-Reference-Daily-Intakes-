<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "if0_34433555_nutritiontracker";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
?>