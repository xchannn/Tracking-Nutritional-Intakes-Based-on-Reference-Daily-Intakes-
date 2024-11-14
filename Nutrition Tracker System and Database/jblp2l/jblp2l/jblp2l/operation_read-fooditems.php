<?php
    require_once "config_server.php";
    
	$sql = "SELECT * FROM nutritiontracker_foodcomposition";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{		
		// output data of each row
		echo "<!DOCTYPE html>"; 
		echo "<h2>Food Compositions</h2>";
		echo "<table id='table1' class='table' style='border: 1px solid white; width:102%;'>";
		echo "<tr style='border: 1px solid white;'>";
		echo "<th style='border: 1px solid white; text-align: left;'>Food Item</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Water (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Energy (kcal)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Protein (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Fat (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Carbohydrate (g)</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Dietary Fibers (g)</th>";
	//  echo "<th style='border: 1px solid white; text-align: center;'>Ash (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Calcium (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Iron (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin A (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Thiamin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Riboflavin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Niacin (mg)</th>";
		// echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C (mg)</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Retinol (μg)</th>";
	//  echo "<th style='border: 1px solid white; text-align: center;'>μCarotene (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C / Ascorbic acid (mg)</th>";
		echo "</tr>";
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr style='border: 1px dotted white;'>";
			echo "<td style='border: 1px dotted white; text-align: left;'>" . $row['fc_foodname'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_water'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_energy'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_protein'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_fat'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_carbohydrate'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_dietaryfiber'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_ash'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_calcium'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_iron'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_vitamina'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_thiamin'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_riboflavin'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_niacin'] . "</td>";
			// echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_vitaminc'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_retinol'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_carotene'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_ascorbicacid'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	
	}
	else 
	{
		echo "No entries.";
	}
		
    $conn->close();
?><?php
    require_once "config_server.php";
    
	$sql = "SELECT * FROM nutritiontracker_foodcomposition";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{		
		// output data of each row
		echo "<!DOCTYPE html>"; 
		echo "<h2>Food Compositions</h2>";
		echo "<table id='table1' class='table' style='border: 1px solid white; width:102%;'>";
		echo "<tr style='border: 1px solid white;'>";
		echo "<th style='border: 1px solid white; text-align: left;'>Food Item</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Water (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Energy (kcal)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Protein (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Fat (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Carbohydrate (g)</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Dietary Fibers (g)</th>";
	//  echo "<th style='border: 1px solid white; text-align: center;'>Ash (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Calcium (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Iron (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin A (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Thiamin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Riboflavin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Niacin (mg)</th>";
		// echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C (mg)</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Retinol (μg)</th>";
	//  echo "<th style='border: 1px solid white; text-align: center;'>μCarotene (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C / Ascorbic acid (mg)</th>";
		echo "</tr>";
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr style='border: 1px dotted white;'>";
			echo "<td style='border: 1px dotted white; text-align: left;'>" . $row['fc_foodname'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_water'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_energy'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_protein'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_fat'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_carbohydrate'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_dietaryfiber'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_ash'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_calcium'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_iron'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_vitamina'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_thiamin'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_riboflavin'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_niacin'] . "</td>";
			// echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_vitaminc'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_retinol'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_carotene'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_ascorbicacid'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	
	}
	else 
	{
		echo "No entries.";
	}
		
    $conn->close();
?><?php
    require_once "config_server.php";
    
	$sql = "SELECT * FROM nutritiontracker_foodcomposition";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{		
		// output data of each row
		echo "<!DOCTYPE html>"; 
		echo "<h2>Food Compositions</h2>";
		echo "<table id='table1' class='table' style='border: 1px solid white; width:102%;'>";
		echo "<tr style='border: 1px solid white;'>";
		echo "<th style='border: 1px solid white; text-align: left;'>Food Item</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Water (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Energy (kcal)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Protein (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Fat (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Carbohydrate (g)</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Dietary Fibers (g)</th>";
	//  echo "<th style='border: 1px solid white; text-align: center;'>Ash (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Calcium (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Iron (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin A (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Thiamin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Riboflavin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Niacin (mg)</th>";
		// echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C (mg)</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Retinol (μg)</th>";
	//  echo "<th style='border: 1px solid white; text-align: center;'>μCarotene (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C / Ascorbic acid (mg)</th>";
		echo "</tr>";
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr style='border: 1px dotted white;'>";
			echo "<td style='border: 1px dotted white; text-align: left;'>" . $row['fc_foodname'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_water'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_energy'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_protein'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_fat'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_carbohydrate'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_dietaryfiber'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_ash'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_calcium'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_iron'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_vitamina'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_thiamin'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_riboflavin'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_niacin'] . "</td>";
			// echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_vitaminc'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_retinol'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_carotene'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_ascorbicacid'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	
	}
	else 
	{
		echo "No entries.";
	}
		
    $conn->close();
?><?php
    require_once "config_server.php";
    
	$sql = "SELECT * FROM nutritiontracker_foodcomposition";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{		
		// output data of each row
		echo "<!DOCTYPE html>"; 
		echo "<h2>Food Compositions</h2>";
		echo "<table id='table1' class='table' style='border: 1px solid white; width:102%;'>";
		echo "<tr style='border: 1px solid white;'>";
		echo "<th style='border: 1px solid white; text-align: left;'>Food Item</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Water (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Energy (kcal)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Protein (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Fat (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Carbohydrate (g)</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Dietary Fibers (g)</th>";
	//  echo "<th style='border: 1px solid white; text-align: center;'>Ash (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Calcium (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Iron (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin A (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Thiamin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Riboflavin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Niacin (mg)</th>";
		// echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C (mg)</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Retinol (μg)</th>";
	//  echo "<th style='border: 1px solid white; text-align: center;'>μCarotene (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C / Ascorbic acid (mg)</th>";
		echo "</tr>";
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr style='border: 1px dotted white;'>";
			echo "<td style='border: 1px dotted white; text-align: left;'>" . $row['fc_foodname'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_water'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_energy'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_protein'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_fat'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_carbohydrate'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_dietaryfiber'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_ash'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_calcium'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_iron'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_vitamina'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_thiamin'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_riboflavin'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_niacin'] . "</td>";
			// echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_vitaminc'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_retinol'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_carotene'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_ascorbicacid'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	
	}
	else 
	{
		echo "No entries.";
	}
		
    $conn->close();
?><?php
    require_once "config_server.php";
    
	$sql = "SELECT * FROM nutritiontracker_foodcomposition";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{		
		// output data of each row
		echo "<!DOCTYPE html>"; 
		echo "<h2>Food Compositions</h2>";
		echo "<table id='table1' class='table' style='border: 1px solid white; width:102%;'>";
		echo "<tr style='border: 1px solid white;'>";
		echo "<th style='border: 1px solid white; text-align: left;'>Food Item</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Water (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Energy (kcal)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Protein (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Fat (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Carbohydrate (g)</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Dietary Fibers (g)</th>";
	//  echo "<th style='border: 1px solid white; text-align: center;'>Ash (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Calcium (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Iron (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin A (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Thiamin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Riboflavin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Niacin (mg)</th>";
		// echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C (mg)</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Retinol (μg)</th>";
	//  echo "<th style='border: 1px solid white; text-align: center;'>μCarotene (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C / Ascorbic acid (mg)</th>";
		echo "</tr>";
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr style='border: 1px dotted white;'>";
			echo "<td style='border: 1px dotted white; text-align: left;'>" . $row['fc_foodname'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_water'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_energy'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_protein'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_fat'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_carbohydrate'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_dietaryfiber'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_ash'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_calcium'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_iron'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_vitamina'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_thiamin'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_riboflavin'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_niacin'] . "</td>";
			// echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_vitaminc'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_retinol'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_carotene'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_ascorbicacid'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	
	}
	else 
	{
		echo "No entries.";
	}
		
    $conn->close();
?><?php
    require_once "config_server.php";
    
	$sql = "SELECT * FROM nutritiontracker_foodcomposition";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{		
		// output data of each row
		echo "<!DOCTYPE html>"; 
		echo "<h2>Food Compositions</h2>";
		echo "<table id='table1' class='table' style='border: 1px solid white; width:102%;'>";
		echo "<tr style='border: 1px solid white;'>";
		echo "<th style='border: 1px solid white; text-align: left;'>Food Item</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Water (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Energy (kcal)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Protein (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Fat (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Carbohydrate (g)</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Dietary Fibers (g)</th>";
	//  echo "<th style='border: 1px solid white; text-align: center;'>Ash (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Calcium (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Iron (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin A (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Thiamin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Riboflavin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Niacin (mg)</th>";
		// echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C (mg)</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Retinol (μg)</th>";
	//  echo "<th style='border: 1px solid white; text-align: center;'>μCarotene (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C / Ascorbic acid (mg)</th>";
		echo "</tr>";
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr style='border: 1px dotted white;'>";
			echo "<td style='border: 1px dotted white; text-align: left;'>" . $row['fc_foodname'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_water'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_energy'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_protein'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_fat'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_carbohydrate'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_dietaryfiber'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_ash'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_calcium'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_iron'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_vitamina'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_thiamin'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_riboflavin'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_niacin'] . "</td>";
			// echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_vitaminc'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_retinol'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_carotene'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_ascorbicacid'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
	
	}
	else 
	{
		echo "No entries.";
	}
		
    $conn->close();
?><?php
    require_once "config_server.php";
    
	$sql = "SELECT * FROM nutritiontracker_foodcomposition";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) 
	{		
		// output data of each row
		echo "<!DOCTYPE html>"; 
		echo "<h2>Food Compositions</h2>";
		echo "<table id='table1' class='table' style='border: 1px solid white; width:102%;'>";
		echo "<tr style='border: 1px solid white;'>";
		echo "<th style='border: 1px solid white; text-align: left;'>Food Item</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Water (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Energy (kcal)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Protein (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Fat (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Carbohydrate (g)</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Dietary Fibers (g)</th>";
	//  echo "<th style='border: 1px solid white; text-align: center;'>Ash (g)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Calcium (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Iron (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin A (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Thiamin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Riboflavin (mg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Niacin (mg)</th>";
		// echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C (mg)</th>";
	//	echo "<th style='border: 1px solid white; text-align: center;'>Retinol (μg)</th>";
	//  echo "<th style='border: 1px solid white; text-align: center;'>μCarotene (μg)</th>";
		echo "<th style='border: 1px solid white; text-align: center;'>Vitamin C / Ascorbic acid (mg)</th>";
		echo "</tr>";
		while($row = $result->fetch_assoc()) 
		{
			echo "<tr style='border: 1px dotted white;'>";
			echo "<td style='border: 1px dotted white; text-align: left;'>" . $row['fc_foodname'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_water'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_energy'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_protein'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_fat'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_carbohydrate'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_dietaryfiber'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_ash'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_calcium'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_iron'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_vitamina'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_thiamin'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_riboflavin'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_niacin'] . "</td>";
			// echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_vitaminc'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_retinol'] . "</td>";
		//	echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_carotene'] . "</td>";
			echo "<td style='border: 1px dotted white; text-align: center;'>" . $row['fc_ascorbicacid'] . "</td>";
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