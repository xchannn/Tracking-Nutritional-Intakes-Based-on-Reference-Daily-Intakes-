<?php
    require_once "config_server.php";
    
	$sql = "SELECT * FROM nutritiontracker_rdi WHERE rdi_gender != 'Female'";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{	
		echo "<select class='form-select' style='width:35%;' name='ages' id='ages' onchange='newevent()'>";
		while($row = $result->fetch_assoc()) 
			{echo "<option value='" . $row['rdi_range'] . "'>" . $row['rdi_range'] . "</option>";}
		echo "</select>";
	}
	else 
	{
		echo "No entries.";
	}
		
    $conn->close();
?>