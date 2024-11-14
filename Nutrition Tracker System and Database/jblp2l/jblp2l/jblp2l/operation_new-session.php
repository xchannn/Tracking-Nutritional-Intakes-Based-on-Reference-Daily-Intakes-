<?php
	session_start();
    require_once "config_server.php";
	$sql1 = "SELECT * FROM nutritiontracker_sessions ORDER BY session_id DESC LIMIT 1";
	$result = $conn->query($sql1);
	
	if ($result->num_rows > 0) 
	{		
		while($row = $result->fetch_assoc()) 
		{
			$newid = $row['session_id'] + 1;
			$sql = "INSERT INTO `nutritiontracker_sessions` (`session_id`) VALUES ($newid)";
			if (mysqli_query($conn, $sql)) 
			{
				echo "<!DOCTYPE html>";
				echo "<script src='jquery.min.js'></script>";
				echo "<script src='jquery.session.js'></script>";
				echo "<script>";
				echo "$.session.set('id', '".$newid."');";
				//echo "sessionvariable1 = $.session.get('id');";
				//echo "alert(sessionvariable1);";
				echo "</script>";
				echo "Your session ID is: " . $newid . ".";
			}	
			else 
			{ 
				echo "Error: " . $sql . "<br>" . mysqli_error($conn); 
			}
		}
	} 
	else 
	{ 
		echo "Error: " . $sql1 . "<br>" . mysqli_error($conn); 
	}
		
    $conn->close();
?>