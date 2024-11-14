<?php
	session_start();
	require_once "config_server.php";
	
	$age = $_POST["age"];
	$gender = $_POST["gender"];
	$age_range = "";

	
	$_SESSION['age'] = $age;
	$_SESSION['gender'] = $gender;

	if( ( $age >= "19" || $age <= "29" ) && $gender == "Male" ){
		$age_range = "MA1";
	}else if( ( $age >= "30" || $age <= "49" ) && $gender == "Male"  ){
		$age_range = "MA2";
	}else if( ( $age >= "50" || $age <= "59" ) && $gender == "Male"  ){
		$age_range = "MA3";
	}else if( ( $age >= "19" || $age <= "29" ) && $gender == "Female"  ){
		$age_range = "FA1";
	}else if( ( $age >= "30" || $age <= "49" ) && $gender == "Female"  ){
		$age_range = "FA2";
	}else if( ( $age >= "50" || $age <= "59" ) && $gender == "Female"  ){
		$age_range = "FA3";
	}

	$nutrient = $_POST["nutrient"];
	$imbalance = $_POST["type"];
	$i=0;
	$sql = "SELECT * FROM nutritiontracker_healthconditions WHERE
	( ( hc_nutrient = '$nutrient' ) AND ( hc_name = '$age_range' ) AND ( hc_imbalancetype = '$imbalance' ) );";
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc())
		{
			$nutrients = ($nutrient == "carbohydrate") ? "CARBOHYDRATES" : strtoupper($nutrient);
			echo "<tr>";
			// echo "<td id='hcname$i' style='border: 1px solid green; padding: 2px;'>" . $row['hc_name'] . "</td>";
			echo "<td style='border: 1px solid green; padding: 2px; color:red;'>" . ( ( $row['hc_imbalancetype'] == "excess") ? 'Plenty of' : 'Lack of') ." " . $nutrients . "</td>";
			echo "<td id='hcdescription$i'style='border: 1px solid green; padding: 2px;'> You may experience :</br><ul><li>" .join("<li>",explode(",", $row['hc_description'] ) ) . "</li></ul></td>";
			echo "</tr>";
			$i=$i + 1;
		}
	}
	else
	{}
?>