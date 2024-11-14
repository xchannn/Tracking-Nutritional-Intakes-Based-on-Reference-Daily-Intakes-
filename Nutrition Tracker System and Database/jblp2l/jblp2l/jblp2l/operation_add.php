<?php
	session_start();
    require_once "config_server.php";
	
	$input_id = $_POST['formdelete_inputid'];	
    $sessionid = $_POST['sessionid'];	
    $meal = $_POST['meal'];	
	
    $sql = "INSERT INTO `nutritiontracker_inputs` (input_sessionid, input_fooditem, meal)
            VALUES ('$sessionid' , '$input_id', '$meal')";
	$result = $conn->query($sql);
    $conn->close();
?>