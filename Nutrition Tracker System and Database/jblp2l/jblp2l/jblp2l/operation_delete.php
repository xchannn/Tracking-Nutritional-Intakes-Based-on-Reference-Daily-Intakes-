<?php
	session_start();
    require_once "config_server.php";
	
	$input_id = $_POST['formdelete_inputid'];	
	
	$sql = "DELETE FROM nutritiontracker_inputs WHERE input_id='$input_id'";
	$result = $conn->query($sql);
			
    $conn->close();
?>