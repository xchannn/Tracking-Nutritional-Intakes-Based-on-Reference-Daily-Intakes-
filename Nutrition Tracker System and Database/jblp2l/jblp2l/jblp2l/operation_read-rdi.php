<?php
    require_once "config_server.php";
    
	$sql = "SELECT * FROM nutritiontracker_rdi";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{		
		// output data of each row
		echo "<!DOCTYPE html>";
		echo "<h2>Recommended Daily Intakes</h2>";
		echo "<table style='border: 1px solid white;' class='table'>";
		echo "<tr style='border: 1px solid white;'>";
		echo "<th style='border: 1px solid white; text-align: center;'>Genders</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Population Group</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Weight (kg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Energy (kcal)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Protein (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Fat (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Carbohydrate (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Calcium (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Iron (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin A (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Thiamin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Riboflavin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Niacin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C / Ascorbic acid (mg)</th>";
		echo "</tr>";
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr style='border: 1px dotted white;'>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['rdi_gender'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['rdi_range'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['rdi_weighthigh'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['rdi_energyhigh'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['rdi_proteinhigh'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['rdi_fathigh'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['rdi_carbohydrateshigh'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['rdi_calciumhigh'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['rdi_ironhigh'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['rdi_vitaminahigh'] . "</td>"; 
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['rdi_thiaminhigh'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['rdi_riboflavinhigh'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['rdi_niacinhigh'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['rdi_vitaminchigh'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	
	}
	else 
	{
		echo "No entries.";
	}
		
    $conn->close();
?>