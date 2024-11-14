<?php
    require_once "config_server.php";
    
	$sql = "SELECT DISTINCT fc_foodname FROM nutritiontracker_foodcomposition";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{		
		echo "<select name='select_food' id='select_food'>";
		while($row = $result->fetch_assoc()) 
			{echo "<option value='" . $row['fc_id'] . "'>" . $row['fc_foodname'] . "</option>";}
		echo "</select>";
	}
	else 
	{
		echo "No entries.";
	}
		
    $conn->close();
?>