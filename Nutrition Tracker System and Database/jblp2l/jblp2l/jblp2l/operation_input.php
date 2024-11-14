<?php
	session_start();
    require_once "config_server.php";
	
	$food = $_POST['select_food'];
	$sessionid = $_POST['input_sessionid'];
	$meal = $_POST['meal']; 

	print_r($sessionid);
	
	$sql = "INSERT INTO `nutritiontracker_inputs` (input_sessionid, input_fooditem, meal) VALUES ('$sessionid', '$food', '$meal')";
	if (mysqli_query($conn, $sql)) 
	{
	    //echo "<script type='text/javascript'>window.location.replace('index.html'); </script>";
	} 
	else 
	{ 
		echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
	}
    $conn->close();
?>