<?php
	require_once "config_server.php";
	
	$nutrient = $_POST["nutrient"];
	
	$sql = "SELECT * FROM food_recommendation WHERE name_disease = '$nutrient';";
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc())
		{
			
			echo "<tr>";
			echo "<td id='frname' style='border: 1px solid green; padding: 2px;'>" . $row['foodN'] . "</td>";
			//echo "<td>" . $nutrient . " " . $row['hc_imbalancetype'] . "</td>";
			echo "<td id='frdescription' style='border: 1px solid green; padding: 2px;'>" . $row['Discreption'] . "</td>";
			echo "</tr>";
		}
	}
	else
	{}
?>